<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutus = AboutUs::all();
        return view('admin_dashboard.users.abouts-us.index', [
            'aboutus' => $aboutus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.users.abouts-us.create', [

            "aboutus" => AboutUs::all(),

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

        $aboutus =  AboutUs::create($requestData);

        if ($request->hasFile('pic')) {

            $image = $request->file('pic');


            $imageName = time() . $aboutus->title .  '.' . $image->extension();


            $destinationPath = public_path('/assets/aboutus_pics/');


            $image->move($destinationPath, $imageName);


            $aboutus->update([
                "pic" => $imageName
            ]);
        }
        return redirect('/about-us')->with('message', 'About-us created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aboutus = AboutUs::find($id);
        return view('admin_dashboard.users.abouts-us.show', [
            'aboutus' => $aboutus,
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
        $aboutus = AboutUs::find($id);
        return view('admin_dashboard.users.abouts-us.edit', [
            'aboutus' => $aboutus,
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
            'pic'=> 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ]);

        $aboutus = AboutUs::find($id);
        
        
        $input = $request->all();
     

        if ($request->hasFile('pic')) {

            if ($aboutus->pic != null) {
                $image_path =public_path('/assets/aboutus_pics/' .   $aboutus->pic) ;

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }
            }
            
            $aboutus->update($input);

            $image = $request->file('pic');


            $imageName = time() . $aboutus->title .  '.' . $image->extension();


            $destinationPath = public_path('/assets/aboutus_pics/');


            $image->move($destinationPath, $imageName);


            $aboutus->update([
                "pic" => $imageName
            ]);
        }
       else{
        $aboutus->update($input);
        }
        

        return redirect('/about-us')->with('message', 'about-us edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $aboutus = AboutUs::findOrFail($id);
        if ($aboutus->pic != null) {
            $image_path = public_path('/assets/aboutus_pics/' .   $aboutus->pic);

            if (File::exists($image_path)) {
                File::delete($image_path);
            }
        }
        $aboutus->delete();


        return redirect('/about-us')->with('flash_message', 'About-us deleted!');
    }
}
