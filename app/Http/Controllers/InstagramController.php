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
        $error_warning = '';

        $params = array(
            'number' => $number,
            'tag' => $tag,
            'error_warning' => $error_warning
        );

        return view('index', $params);
    }

    public function search(Request $request) {

            $instagram = new Instagram();

            $urls = array();
            $tag = request('tag');
            $number = (int)request('number');

            $error_warning = '';

        try {
            if ($tag) {
                $medias = $instagram->getMediasByTag($tag, $number);
                if (empty($medias)) {
                    $error_warning = 'There is nothing found by';
                } else {
                    $media = $medias[0];

                    foreach ($medias as $media) {
                        $urls[] = $media->getImageHighResolutionUrl();
                    }
                }
            }

            $params = array(
                'number' => $number,
                'tag' => $tag,
                'error_warning' => $error_warning,
                'urls' => $urls
            );

            return view('index', $params);
        } catch (\Exception $e) {

            $error_warning = 'There is nothing found by';

            $params = array(
                'number' => $number,
                'tag' => $tag,
                'error_warning' => $error_warning
            );
            return view('error', $params);
        }
    }
}
