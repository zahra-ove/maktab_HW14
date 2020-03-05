<?php

namespace App;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function imageable()
    {
        return $this->morphTo();
    }


    // public function storeImage(Request $request, $fileName, $savingPath)
    // {
    //     //get file name with extension
    //     $fileNamewithExtension = $request->file($fileName)->getClientOriginalName();
    //     //get file name
    //     $filename = pathinfo($fileNamewithExtension, PATHINFO_FILENAME);
    //     //get file extension
    //     $fileExtension = $request->file($fileName)->getClientOriginalExtension();
    //     // file name to store
    //     $fileNameToStore = $filename.'_'.time().'.'.$fileExtension;
    //     $request->file($fileName)->storeAs($savingPath, $fileNameToStore);
    // }
}
