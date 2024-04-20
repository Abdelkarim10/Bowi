<?php

namespace App\Http\Controllers\Admin;

use App\Models\MerchantSubCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMerchantSubCategoryRequest;
use App\Http\Requests\UpdateMerchantSubCategoryRequest;
use App\Models\MerchantCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class MerchantSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCats = MerchantSubCategory::all();
        return view('admin_dashboard.merchants.sub_categories.index', [
            'subCats' => $subCats
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.merchants.sub_categories.create', [

            "subCats" => MerchantSubCategory::all(),
            "cats" => MerchantCategory::all()

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMerchantSubCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $requestData = $request->all();
        $subCat=MerchantSubCategory::create($requestData);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $subCat->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/sub-category/'), $filename);
            $subCat->image = $filename;
            $subCat->save();
        }
        return  redirect('/categories')->with('message','Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MerchantSubCategory  $merchantSubCategory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = MerchantCategory::find($id);
        $subCats = MerchantSubCategory::where('category_id', $id)->get();
        return view('admin_dashboard.merchants.sub_categories.show', [
            'subCats' => $subCats,
            'cat' => $cat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MerchantSubCategory  $merchantSubCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subCat = MerchantSubCategory::find($id);
        return view('admin_dashboard.merchants.sub_categories.edit', [
            'subCat' => $subCat,
            "cats" => MerchantCategory::all()
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMerchantSubCategoryRequest  $request
     * @param  \App\Models\MerchantSubCategory  $merchantSubCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255|string',
            'category_id' => 'required|integer',
        ]);
        
        $subCat = MerchantSubCategory::find($id);
      

        $input = $request->all();

        if ($request->hasFile('image')) {

            if ($subCat->image != null) {
                $image_path = public_path('/images/sub-category/' .   $subCat->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $subCat->update($input);

            $image = $request->file('image');


            $imageName = time() . $subCat->name .  '.' . $image->extension();


            $destinationPath = public_path('/images/sub-category/');


            $image->move($destinationPath, $imageName);


            $subCat->update([
                "image" => $imageName
            ]);
        }
       else{
        $subCat->update([
            "name" => $request->name,
            "category_id" => $request->category_id,
            "image" => $subCat->image,
        ]);
        }
        return redirect('/categories')->with('message', 'Edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MerchantSubCategory  $merchantSubCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subCats = MerchantSubCategory::findOrFail($id);
        if($subCats->image != null){
            $image_path = public_path('images/sub-category/'.$subCats->image);
            if(file_exists($image_path)){
                unlink($image_path);
            }
        }
        $subCats->delete();


        return Redirect::back()->with('flash_message', 'Deleted!');
    }
}
