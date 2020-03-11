<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use InstagramScraper\Instagram;

class InstagramController extends Controller
{
    public function index() {

            $instagram = new Instagram();

            $urls = array();
            $tag = request('tag');
            $error_warning = '';

            if ($tag) {
                $medias = $instagram->getMediasByTag($tag, 9);
                if (empty($medias)) {
                    $error_warning = 'There is nothing found by';
                } else {
                    $media = $medias[0];

                    foreach ($medias as $media) {
                        $urls[] = $media->getImageHighResolutionUrl();
                    }
                }
            }

        return view('index', ['tag' => $tag,
                'urls' => $urls,
                'error_warning' => $error_warning
            ]
        );
    }
}
