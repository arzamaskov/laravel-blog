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

        $urls = array();
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
                $error_warning = 'There is nothing found by';
                $media = $medias[0];

                foreach ($medias as $media) {
                    $urls[] = $media->getImageHighResolutionUrl();
                }
                $param = array(
                    'number' => $number,
                    'tag' => $tag,
                    'urls' => $urls
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
}
