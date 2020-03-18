<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.showCategories')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.createCategory', compact('categories'));
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
            'category_name' => 'required|string',
            'parent_id' => 'required|numeric'
        ]);


        $newCat = new Category();

        $newCat->category_name = $request->post('category_name');
        $newCat->parent_id = $request->post('parent_id');

        $newCat->save();
        return redirect('admin/categories')->with('status', 'دسته بندی جدید اضافه شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thisCategory = Category::find($id);
        $allCategory = Category::all();
        return view('admin.categories.editCategory')->with([
                                                            'thisCategory'=> $thisCategory,
                                                            'allCategory' => $allCategory
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
        $newCat = Category::find($id);

        $request->validate([
            'category_name' => 'required|string',
            'parent_id'     => 'required|numeric'
        ]);


        $newCat->category_name  =  $request->post('category_name');
        $newCat->parent_id      =  $request->post('parent_id');

        $newCat->save();
        return redirect('admin/categories')->with('status', 'دسته بندی با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedCategory = Category::find($id);
        $deletedCategory->delete();

        return redirect('admin/categories')->with('status', 'دسته بندی با موفقیت حذف شد.');

    }
}
