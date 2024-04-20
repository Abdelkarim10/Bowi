<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $products = Product::where('merchant_id', Session::get('admin_view_merchant_id'))->get();
        }else{
            if(Auth::user()->role_id == 2)
                $products = Product::where('merchant_id', Auth::user()->merchant->id)->paginate(10);
        }
        return view('admin_dashboard.merchants.merchant_products.index', [
            'products' => $products,
            'merchant' => Auth::user()->merchant
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role_id == 2) {
            $merchant = Auth::user()->merchant;

        }else if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
        }else{
            throw new UnauthorizedException();
        }
        $id = $merchant->id;
        $products = Product::where('merchant_id', $id)->get();
        return view('admin_dashboard.merchants.merchant_products.create', [
            "productCategorys" => ProductCategory::all(),
            "products" => $products,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        if(Auth::user()->role_id == 2) {
            $merchant = Auth::user()->merchant;

        }else if(Auth::user()->role_id == 3 && Session::get('view_as_merchant') == true){
            $merchant = Merchant::findOrFail(Session::get('admin_view_merchant_id'));
        }else{
            throw new UnauthorizedException();
        }

        $Product = new Product();
        $Product->name = $request->name;
        $Product->picture = $request->picture;
        $Product->price = $request->price;
        $Product->merchant_id = Auth::user()->merchant->id;
        $Product->description = $request->description;
        $Product->product_category_id = $request->product_category_id;

        $Product->save();
        if ($request->hasFile('picture')) {

            $image = $request->file('picture');


            $imageName = $Product->id .time() . $Product->name .  '.' . $image->extension();


            $destinationPath = public_path('/assets/product_pics/');


            $image->move($destinationPath, $imageName);


            $Product->update([
                "picture" => $imageName
            ]);
        }
        return redirect('/my-products')->with('message', 'Product Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('admin_dashboard.merchants.merchant_products.show', [
            'product' => $product,
            'merchant' => Auth::user()->merchant
        ]);
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
        return view('admin_dashboard.merchants.merchant_products.edit', [
            'product' => $product,
            "productCategorys" => ProductCategory::all(),
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
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'price'=> 'required|string|min:3|max:255',
            'description' => 'required|string',
            'product_category_id'=> 'required',
            'picture'=> 'image|mimes:jpeg,png,jpg,gif,svg',
            
        ]);

        $product = Product::find($id);
        $input = $request->all();

        if ($request->hasFile('picture')) {

            if ($product->picture != null) {
                $image_path =public_path('/assets/product_pics/' .   $product->picture) ;

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            
            $product->update($input);

            $image = $request->file('picture');


            $imageName = time() . $product->title .  '.' . $image->extension();


            $destinationPath = public_path('/assets/product_pics/');


            $image->move($destinationPath, $imageName);


            $product->update([
                "picture" => $imageName
            ]);
        }
        else{
            $product->update($input);
        }
        return redirect('/my-products')->with('message', 'Product Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();


        return redirect('/my-products')->with('flash_message', 'Product deleted!');
    }
}
