<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use InstagramScraper\Instagram;
use App\FavoriteImage;

class InstagramController extends Controller
{
    public function index()
    {
        $number = 9;
        $tag = '';

        $param = array(
            'number' => $number,
            'tag' => $tag,
        );

        return view('index', $param);
    }

    public function search(Request $request)
    {
        $instagram = new Instagram();

        $tag = request('tag');
        $number = (int)request('number');

        if (trim($tag) == '') {
            $err_msg = 'The request must not be empty. Try again, please.';
            $param = array(
                'number' => $number,
                'tag' => $tag,
                'err_msg' => $err_msg
            );
            return view('error', $param);
        }

        try {
            $medias = $instagram->getMediasByTag($tag, $number);

            foreach ($medias as $media) {
                $links_list[] = [
                    'img' => $media->getImageHighResolutionUrl(),
                    'link' => $media->getLink()
                ];
            }
        }
        catch (\Exception $e) {
            $err_msg = "There is nothing found by '$tag'";
            $param = array(
                'number' => $number,
                'tag' => $tag,
                'err_msg' => $err_msg
            );
            return view('error', $param);
        }
        $param = array(
            'number' => $number,
            'tag' => $tag,
            'links_list' => $links_list
            );

            return view('show', $param);
    }

    public function favorite ()
    {
        $image_list = FavoriteImage::all();

        if ($image_list) {
            $msg = 'There are the pictures that you liked';
            return view('favorites', ['image_list' => $image_list, 'msg' => $msg]);
        } else {
            $msg = 'It seems we cant find any picrures you like to. Please search some pictures and press "Add to favorite" button.';
            return view('favorites', ['image_list' => $image_list, 'msg' => $msg]);
        }
    }

    public function add (Request $request)
    {
        if(FavoriteImage::find($request->url)) {
            return NULL;
        }

        $image = new FavoriteImage;

        $image->url = $request->url;
        $image->url_inst = $request->url_inst;

        // добавляет урл картинки в бд
        $image->save();

        $data = $request->url;
        return ($data);
    }

    public function delete (Request $request)
    {
        // удаляет урл картинки из бд
        $url = $request->url;
        $deletedRows = FavoriteImage::where('url', $url)->delete();

        $data = $request->url;
        return ($data);
    }
}
