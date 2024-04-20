<?php

namespace App\Http\Controllers\Admin;

use App\Models\MediaAssetsAlbums;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMediaAssetsAlbumsRequest;
use App\Http\Requests\UpdateMediaAssetsAlbumsRequest;

class MediaAssetsAlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMediaAssetsAlbumsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMediaAssetsAlbumsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MediaAssetsAlbums  $mediaAssetsAlbums
     * @return \Illuminate\Http\Response
     */
    public function show(MediaAssetsAlbums $mediaAssetsAlbums)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaAssetsAlbums  $mediaAssetsAlbums
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaAssetsAlbums $mediaAssetsAlbums)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMediaAssetsAlbumsRequest  $request
     * @param  \App\Models\MediaAssetsAlbums  $mediaAssetsAlbums
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMediaAssetsAlbumsRequest $request, MediaAssetsAlbums $mediaAssetsAlbums)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaAssetsAlbums  $mediaAssetsAlbums
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaAssetsAlbums $mediaAssetsAlbums)
    {
        //
    }
}
