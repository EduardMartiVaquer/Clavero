<?php

namespace App\Http\Controllers;

use App\Story;
use App\Video;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Torann\GeoIP\GeoIPFacade as GeoIP;

class Main_Controller extends Controller
{
    public function mainView()
    {
        $location = GeoIP::getLocation();
        if($location["isoCode"] != "ES"){
            App::setLocale('en');
        } else {
            App::setLocale('es');
        }
        $locale = App::getLocale();
        $videos = Video::orderBy('id', 'desc')->get();
        if(!Auth::check()){
            $stories = Story::orderBy('id', 'desc')->get();
            return view('layouts.index')->with('stories', $stories)->with('videos', $videos)->with('locale', $locale);
        } else {
            $stories = Story::orderBy('id', 'desc')->get();
            return view('layouts.dashboard')->with('stories', $stories)->with('videos', $videos);
        }
    }

    public function acceptCookies()
    {
        $cookie = cookie()->forever('accept_cookies', '1');
        return Redirect::back()->withCookie($cookie);
    }
}
