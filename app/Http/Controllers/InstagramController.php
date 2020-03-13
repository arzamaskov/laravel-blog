<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use InstagramScraper\Instagram;

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

        try {
            if (trim($tag) == '') {
                $err_msg = 'The request must not be empty. Try again, please.';
                $param = array(
                    'number' => $number,
                    'tag' => $tag,
                    'err_msg' => $err_msg
                );
                return view('error', $param);
            } else {
                $medias = $instagram->getMediasByTag($tag, $number);
                $media = $medias[0];

                foreach ($medias as $media) {
                    $img_src_list[] = $media->getImageHighResolutionUrl();
                    $insta_link_list[] = $media->getLink();
                }

                $links_list = array_combine($insta_link_list, $img_src_list);
                $param = array(
                    'number' => $number,
                    'tag' => $tag,
                    'links_list' => $links_list
                );

                return view('show', $param);
            }
        } catch (\Exception $e) {
            $err_msg = "There is nothing found by '$tag'";
            $param = array(
                'number' => $number,
                'tag' => $tag,
                'err_msg' => $err_msg
            );
            return view('error', $param);
        }
    }

    public function favorite ()
    {
        // показывает избранные картинки, урл берем из бд

        // Временно переключаем на главную
        $number = 9;
        $tag = 'this is favorites';

        $param = array(
            'number' => $number,
            'tag' => $tag,
        );

        return view('index', $param);
    }

    public function add ()
    {
        // добавляет урл картинки в бд
    }

    public function delete ()
    {
        # удаляет урл картинки из бд
    }
}
