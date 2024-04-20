<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public const LOCALES = [
        'en' => 'English',
        'ru' => 'Russian',
    ];
    
    public function setLanguage($locale)
    {
        App::setLocale($locale);
        Session::put('locale', $locale);

        return redirect()->back();
    }
}
