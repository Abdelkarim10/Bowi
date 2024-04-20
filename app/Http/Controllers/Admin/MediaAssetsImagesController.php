<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediaAssetsImages;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaAssetsImagesRequest;
use App\Http\Requests\UpdateMediaAssetsImagesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MediaAssetsImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_dashboard.users.media-assets.index',[
            'Images'=>MediaAssetsImages::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.users.media-assets.create', [
            "Image" => MediaAssetsImages::all(),
            "Albums" => \App\Models\MediaAssetsAlbums::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMediaAssetsImagesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'album_id' => 'required',
        ]);
        $requestData = $request->all();
        $MAimage =  MediaAssetsImages::create($requestData);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $MAimage->id . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/media-assets/'), $filename);
            $MAimage->image = $filename;
            $MAimage->save();
        }

        return redirect('/media-assets')->with('message','Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MediaAssetsImages  $mediaAssetsImages
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $image = MediaAssetsImages::find($id);
        return view('admin_dashboard.users.media-assets.show', [
            'image' => $image,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaAssetsImages  $mediaAssetsImages
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $i = MediaAssetsImages::find($id);
        return view('admin_dashboard.users.media-assets.edit', [
            'Image' => $i,
            "Albums" => \App\Models\MediaAssetsAlbums::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMediaAssetsImagesRequest  $request
     * @param  \App\Models\MediaAssetsImages  $mediaAssetsImages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'album_id' => 'required',
        ]);
        $i = MediaAssetsImages::find($id);
        $i->update($request->all());
        return redirect('/media-assets')->with('message','Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaAssetsImages  $mediaAssetsImages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = MediaAssetsImages::findOrFail($id);

        if($image->image != null){
            $image_path = public_path('images/media-assets/'.$image->image);
            if(file_exists($image_path)){
                unlink($image_path);
            }
        }

        $image->delete();


        return Redirect::back()->with('message1','Deleted !');
    }
}
