<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Gender;
use App\Role;
use App\Image;
use App\Traits\storeImageTraits;

class UsersController extends Controller
{

    // Adding my custom traits
    use storeImageTraits;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('gender', 'roles')->get();
        // return $users;
        return view('admin.users.showUsers')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.createUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      =>  'required|string',
            'username'  =>  'required|string',
            'email'     =>  'required|email|unique:users,email',
            'password'  =>  'required|confirmed|min:8',
            'age'       =>  'nullable|numeric',
            'gender_id' =>  'required|numeric',
            'image'     =>  'nullable|image|max:2048'
        ]);

        $newUser = new User();

        $newUser->name      =  $request->post('name');
        $newUser->username  =  $request->post('username');
        $newUser->email     =  $request->post('email');
        $newUser->password  =  Hash::make($request->post('password'));
        $newUser->age       =  $request->post('age');
        $newUser->gender_id =  $request->post('gender_id');

        $newUser->save();

        if($request->hasFile('image')){
            // $requestFile = $request->file('image');
            $fileNameToStore = $this->storeImage($request, 'image' ,'public/users');

        }else{
            $fileNameToStore = 'noimage.jpg';
        }
    // first method for storing image for specific user in images table
        $newImage = new Image([
                                'image_name' => $fileNameToStore,
                                'image_path' => 'storage/users/'
                                ]);


         $newUser->image()->save($newImage);

    // second method for storing image for specific user is using create method
        // $newUser->image()->create([
        //     'image_name' => $fileNameToStore,
        //     'image_path' => 'storage/users/'
        //     ]);

        // set "user" role by default for every user
         $userRole = Role::where('name', 'User')->first();
         $newUser->roles()->attach($userRole);



        return redirect('admin/users')->with('status', 'کاربر جدید اضافه شد.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        return view('admin.users.editUser')->with([
                                                    'user' => $user,
                                                    'roles'=> $roles
                                                  ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $suser = User::find($id);

        $request->validate([
            'name'       => 'required|string',
            'username'   => 'required|string',
            'gender_id'  => 'required|numeric',
            'age'        => 'required|numeric',
            'image'      =>  'nullable|image|max:2048',
            'email'      => [
                'required',
                Rule::unique('users')->ignore($suser->id),
            ],
         ]);

         $suser->name        =  $request->post('name');
         $suser->username    =  $request->post('username');
         $suser->age         =  $request->post('age');
         $suser->gender_id   =  $request->post('gender_id');
         $suser->email       =  $request->post('email');
         $suser->save();

         //saving user's role in role_user pivot table
         $suser->roles()->sync($request->roles);


         //saving edited image
        if($request->hasFile('image')){
            // $requestFile = $request->file('image');
            $fileNameToStore = $this->storeImage($request, 'image' ,'public/users');
            $suser->image()->create([
                'image_name' => $fileNameToStore,
                'image_path' => 'storage/users/'
                ]);
        }



         return redirect()->route('admin.users.index')->with('status', 'اطلاعات کاربر با موفقیت انجام شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->roles()->detach();        // delete roles of this user from role-user pivot table
        $user->comments()->delete();    //delete user's comments from comments table
        // dd($user->first()->images()->first()->image_name);


        //if user has any image saved in images table then delete it from storage
        if(isset($user->image))
        {

            if($user->image()->first()->image_name != 'noimage.jpg'){
                Storage::delete('/public/users/'. $user->image()->first()->image_name);  //delete image
            }
            $user->image()->delete();     //delete user's image from images table
        }


        $user->delete();  //finally delete the user

        return redirect('admin/users')->with('status', 'کاربر با موفقیت حذف شد.');
    }
}
