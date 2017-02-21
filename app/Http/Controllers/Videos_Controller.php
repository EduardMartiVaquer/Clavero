<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class Videos_Controller extends Controller
{
    public function uploadVideo()
    {
        $video = new Video();
        $video->title = Input::get('video-title');
        $video->url = Input::get('url');
        $video->save();

        return redirect('/');
    }

    public function deletelVideo()
    {
        $video = Video::find(Input::get('id'));
        $video->delete();

        return response()->json(['id' => $video->id]);
    }
}
