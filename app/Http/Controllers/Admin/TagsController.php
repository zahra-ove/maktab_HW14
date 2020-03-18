<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index')->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
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
            'tag_name'    => 'required|string',
            'description' => 'required|string'
        ]);


        $newTag = new Tag();

        $newTag->tag_name     =  $request->post('tag_name');
        $newTag->description  =  $request->post('description');

        $newTag->save();
        return redirect('admin/tags')->with('status', 'تگ جدید اضافه شد.');
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
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
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
        $editedTag = Tag::find($id);

        $request->validate([
            'tag_name'    => 'required|string',
            'description' => 'required|string'
        ]);


        $editedTag->tag_name     =  $request->post('tag_name');
        $editedTag->description  =  $request->post('description');

        $editedTag->save();
        return redirect('admin/tags')->with('status', 'تگ با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedTag = Tag::find($id);
        $deletedTag->products()->detach();
        $deletedTag->delete();

        return redirect('admin/tags')->with('status', 'تگ با موفقیت حذف شد.');
    }
}
