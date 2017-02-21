<?php

namespace App\Http\Controllers;

use App\Image;
use App\Story;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class Stories_Controller extends Controller
{
    public function newStory()
    {
        $story = new Story();
        $story->description = Input::get('description');
        $story->save();
        return response()->json(['id' => $story->id]);
    }
    
    public function newImages(Request $request)
    {
        $id = Input::get('storyId');
        $imagesNum = (int)Input::get('imageNum');

        if($imagesNum > 0){
            for($x = $imagesNum; $x > 0; $x--){
                $file = Input::file('image-'.$x);
                if(!is_null($file)){
                    $path = 'images/story_images/';
                    $filename = str_random(10) .  $file->getClientOriginalName();
                    $file->move($path, $filename);
                    $path = $path.$filename;

                    $image = new Image();
                    $image->image = $path;
                    $image->story_id = $id;
                    $image->save();
                }
            }
        }

        return redirect('/');
    }
    
    public function getStory()
    {
        $story = Story::find(Input::get('id'));
        $images = Image::where('story_id', Input::get('id'))->get();
        
        return response()->json(['story' => $story, 'images' => $images]);
    }

    public function editStory()
    {
        $story = Story::find(Input::get('story_id'));
        $story->description = Input::get('description');
        $story->save();
        return redirect('/');
    }
    public function editStory2()
    {
        $story = Story::find(Input::get('story_id'));
        $story->description2 = Input::get('description2');
        $story->save();
        return redirect('/');
    }
    
    public function moreImage()
    {
        $file = Input::file('more-image');

        $path = 'images/story_images/';
        $filename = str_random(10) .  $file->getClientOriginalName();
        $file->move($path, $filename);
        $path = $path.$filename;
        $image = new Image();
        $image->image = $path;
        $image->story_id = Input::get('more-story-id');
        $image->save();

        return response()->json(['image' => $image]);
    }

    public function deleteImage()
    {
        $image = Image::find(Input::get('id'));
        File::delete($image->image);
        $image->delete();

        return response()->json(['status' => 'ok']);
    }

    public function deleteStory()
    {
        $story = Story::find(Input::get('story_id'));
        $story->delete();

        $images = Image::where('story_id', Input::get('story_id'))->get();

        foreach ($images as $image){
            File::delete($image->image);
            $image->delete();
        }

        return redirect('/');
    }

    public function changeLang()
    {
        $story = Story::find(Input::get('story_id'));
        $story->lang = Input::get('lang');
        $story->save();
        return response()->json(['status' => 'Guardado correctamente']);
    }
}
