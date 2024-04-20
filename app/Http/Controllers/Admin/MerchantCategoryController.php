<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MerchantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class MerchantCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = MerchantCategory::all();
        return view('admin_dashboard.merchants.categories.index', [
            'cats' => $cats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.merchants.categories.create', [

            "cats" => MerchantCategory::all(),

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
        $request->validate([
            'name' => 'required|max:255|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $requestData = $request->all();
        $cat=MerchantCategory::create($requestData);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $cat->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/category/'), $filename);
            $cat->image = $filename;
            $cat->save();
        }

        return  redirect('/categories')->with('message','Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cats = MerchantCategory::find($id);
        return view('admin_dashboard.merchants.categories.show', [
            'cats' => $cats,
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
        $cat = MerchantCategory::find($id);
        return view('admin_dashboard.merchants.categories.edit', [
            'cat' => $cat,
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
            'name' => 'required|max:255|string',
        ]);
        
        $cat = MerchantCategory::find($id);


        $input = $request->all();

        if ($request->hasFile('image')) {

            if ($cat->image != null) {
                $image_path = public_path('/images/category/' .   $cat->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $cat->update($input);

            $image = $request->file('image');


            $imageName = time() . $cat->name .  '.' . $image->extension();


            $destinationPath = public_path('/images/category/');


            $image->move($destinationPath, $imageName);


            $cat->update([
                "image" => $imageName
            ]);
        }
       else{
        $cat->update([
            "name" => $request->name,
            "image" => $cat->image,
        ]);
        }

        return redirect('/categories')->with('message', 'Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cats = MerchantCategory::findOrFail($id);
        if($cats->image != null){
            $image_path = public_path('images/category/'.$cats->image);
            if(file_exists($image_path)){
                unlink($image_path);
            }
        }
        $cats->delete();


        return redirect('/categories')->with('flash_message', 'Deleted!');
    }
}
