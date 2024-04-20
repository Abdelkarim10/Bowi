<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Newsroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class NewsroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsrooms = Newsroom::all();
        return view('admin_dashboard.users.news.index', [
            'newsrooms' => $newsrooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.users.news.create', [

            "newsrooms" => Newsroom::all(),

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
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string',
            'pic'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $requestData = $request->all();

        $newsrooms =  Newsroom::create($requestData);

        if ($request->hasFile('pic')) {

            $image = $request->file('pic');


            $imageName = time() . $newsrooms->title .  '.' . $image->extension();


            $destinationPath = public_path('/assets/news_pics/');


            $image->move($destinationPath, $imageName);


            $newsrooms->update([
                "pic" => $imageName
            ]);
        }
        return redirect('/news')->with('message','Added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newsroomsShow = Newsroom::find($id);
        return view('admin_dashboard.users.news.show', [
            'newsroomsShow' => $newsroomsShow,
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

        $newsrooms = Newsroom::find($id);
        return view('admin_dashboard.users.news.edit', [
            'newsrooms' => $newsrooms,
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
            'title' => 'required|string|min:3|max:255',
            'content' => 'required|string',   
        ]);

        $newsroom = Newsroom::find($id);
        $input = $request->all();


        if ($request->hasFile('pic')) {

            if ($newsroom->pic != null) {
                $image_path = public_path('/assets/news_pics/' .   $newsroom->pic);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            $newsroom->update($input);

            $image = $request->file('pic');


            $imageName = time() . $newsroom->title .  '.' . $image->extension();


            $destinationPath = public_path('/assets/news_pics/');


            $image->move($destinationPath, $imageName);


            $newsroom->update([
                "pic" => $imageName
            ]);
        }
        else{
            $newsroom->update([
                "title" => $request->title,
                "content" => $request->content,
                "pic" => $newsroom->pic,
            ]);
        }


        return redirect('/news')->with('message', 'news edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $newsroom = Newsroom::findOrFail($id);
        if ($newsroom->pic != null) {
            $image_path = public_path('/assets/news_pics/' .   $newsroom->pic);

            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $newsroom->delete();


        return redirect('/news')->with('flash_message', 'News deleted!');
    }
}
