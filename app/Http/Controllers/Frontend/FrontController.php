<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Slider;
use App\Tag;

class FrontController extends Controller
{

    public function showMainPage()
    {

        //retrieve new added products
        $newProducts = Product::with('images', 'category')->latest()->limit(5)->get();

        // get slider image from database
        $slidersImage = Slider::with('images')->latest()->limit(5)->get();
        // return $slidersImage;

        //get latest bags from database
        $newBags = Product::with('images', 'category')->where('category_id', '13')->latest()->limit(5)->get();

        //ALL PRODUCTS
        $newwatches = Product::with('images', 'category')->where('category_id', '14')->latest()->limit(5)->get();
        // return $newwatches;
        return view('index')->with([
                                    'newProducts'  =>  $newProducts,
                                    'sliders'      =>  $slidersImage,
                                    'newBags'      =>  $newBags,
                                    'newwatches'  =>  $newwatches
                                     ]);
    }

//displaying single product
    public function showProduct($id)
    {
        $product = Product::find($id);
        // dd($id);
        //display a single product in showSingleProduct.blade.php in frontEnd view folder in view directory of resources directory
        return view('product')->with('product', $product);
    }

//displaying related products of selected tag
    public function tagRelatedProduct($id)
    {
        $selectedTag = Tag::find($id);   //finding tag object based on tag id

        $tagRelatedProducts = $selectedTag->products()->get();
        // dd($tagRelatedProducts->chunk(3));
        return view('tagRelatedProducts', compact('tagRelatedProducts'));

    }


}
