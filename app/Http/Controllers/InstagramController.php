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

        $img_src_list = array();
        $insta_link_list = array();
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
        // показывает избранные картинки, урл берем из бд
        $image_list = FavoriteImage::all();

        return view('favorites', ['image_list' => $image_list, 'number' => 9]);
    }

    public function add (Request $request)
    {
        // $data = $request->url_inst;
        // if ($request->ajax()) {
        //     return response()->json([ $data
        //     ]);
        // }

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
        // $data = $request->url_inst;
        // if ($request->ajax()) {
        //     return response()->json([ $data
        //     ]);
        // }

        # удаляет урл картинки из бд
        $url = $request->url;
        $deletedRows = FavoriteImage::where('url', $url)->delete();

        $data = $request->url;
        return ($data);
    }
}
