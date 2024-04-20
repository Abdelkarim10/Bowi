<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UploadCV extends Controller
{
    function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048'
        ]);
        $request->file('file')->store('CVs');
        return Redirect::back()->with('message','Sent !');
    }
}
