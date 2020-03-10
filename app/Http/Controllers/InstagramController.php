<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramController extends Controller
{
    public function index() {
        return view('index');
    }

    public function search() {
        $tag = request('tag');
        return view('index', ['tag' => $tag]);
    }
}
