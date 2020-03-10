<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use InstagramScraper\Instagram;

class InstagramController extends Controller
{
    public function index() {
        return view('index');
    }

    public function search() {
        $instagram = new Instagram();
        
        $urls = array();
        $tag = request('tag');

        $medias = $instagram->getMediasByTag($tag, 20);
        $media = $medias[0];
        $error_warning = false;

        foreach ($medias as $media) {
            $urls[] = $media->getImageHighResolutionUrl();
        }

        return view('index', ['tag' => $tag, 'urls' => $urls]);
    }
}
