<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use App\Product;
use App\Image;
use App\Pimage;
use App\Category;
// code mahsool bayad unique bashad ke in nokte ra dar jadvale product dar nazar nagereftam.
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::with('category', 'pimages')->get();
        $products = Product::with('category', 'images')->get();
        $categories = Category::all();
        // $products = Product::all();

        return view('admin.products.index')->with('products', $products)->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.createProduct')->with('categories', $categories);
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
            'product_code'  =>  'required|string',
            'product_name'  =>  'required|string',
            'product_price' =>  'required|string',
            'product_count' =>  'required|string',
            'category_id'   =>  'nullable|numeric',
            'file'          =>  'nullable',    //name of image field in form
            'file.*'          =>  'max:2048|image' //name of image field in form
        ]);



        //saving product's attribute
        $newProduct = new Product();

        $newProduct->product_code  =  $request->post('product_code');
        $newProduct->product_name  =  $request->post('product_name');
        $newProduct->product_price =  $request->post('product_price');
        $newProduct->product_count =  $request->post('product_count');
        $newProduct->category_id   =  $request->post('category_id');

        $newProduct->save();


        if($request->hasFile('file')){
            foreach($request->file('file') as $image)
            {

                $fileNamewithExtension = $image->getClientOriginalName();         //get file name with extension
                $filename = pathinfo($fileNamewithExtension, PATHINFO_FILENAME); //get file name
                $fileExtension = $image->getClientOriginalExtension();          //get file extension
                $fileNameToStore = $filename.'_'.time().'.'.$fileExtension;    // file name to store
                $image->storeAs('public/products', $fileNameToStore);


                //store product's image in Images table
                $newProductImage = new Image();
                $newProductImage->imageable_id = $newProduct->id;
                $newProductImage->imageable_type = "App\Product";
                $newProductImage->image_name = $fileNameToStore;
                $newProductImage->image_path = "storage/products/";

                $newProductImage->save();
            }
        }
        else{
            $fileNameToStore = 'noimage.jpg';  //if no image is selected by user, then place default image as noimage to this article
            //store product's image in Images table
            $newProductImage = new Image();
            $newProductImage->imageable_id = $newProduct->id;
            $newProductImage->imageable_type = "App\Product";
            $newProductImage->image_name = $fileNameToStore;
            $newProductImage->image_path = "storage/products/";

            $newProductImage->save();
        }



        // //store product's image in Images table
        // $newProductImage = new Image();
        // $newProductImage->imageable_id = $newProduct->id;
        // $newProductImage->imageable_type = "App\Product";
        // $newProductImage->image_name = $fileNameToStore;
        // $newProductImage->image_path = "storage/products/";

        // $newProductImage->save();


        return redirect('admin/products')->with('status', 'محصول جدید با موفقیت اضافه شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);        //finding product based on received id
        return view('admin.products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.products.editProduct')->with('product', $product);
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
        $editProduct = Product::find($id);

        $request->validate([
            'product_code'    =>   'required|string',
            'product_name'    =>   'required|string',
            'product_price'   =>   'required|string',
            'product_count'   =>   'required|numeric',
            'category_id'     =>   'nullable|numeric'
         ]);

         $editProduct->product_code    =   $request->post('product_code');
         $editProduct->product_name    =   $request->post('product_name');
         $editProduct->product_price   =   $request->post('product_price');
         $editProduct->product_count   =   $request->post('product_count');
         $editProduct->category_id     =   $request->post('category_id');

         $editProduct->save();

         return redirect()->route('admin.products.index')->with('status', 'محصول با موفقیت ویرایش شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteProduct = Product::find($id);
        //get product's image name
        $productImageName = $deleteProduct->images()->first()->image_name;


        if($productImageName != 'noimage.jpg'){
            Storage::delete('public/products/'. $productImageName);  //delete image from storage
        }

        $deleteProduct->images()->delete();   //delete all images related to this product
        $deleteProduct->comments()->delete();  //delete all comments related to this product

        $deleteProduct->delete();  //and in final step, delete the product itself

        return redirect('admin/products')->with('status', "محصول با موفقیت حذف شد.");
    }
}
