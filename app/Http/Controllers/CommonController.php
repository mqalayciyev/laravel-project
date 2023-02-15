<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function generateXml () {

        $posts = Post::all();

        return response()->streamDownload(function() use ($posts) {
            echo view('sitemap', compact('posts'))->render();
        }
            , 'sitemap.xml'
            , ['Content-Type' => 'text/xml']
        );
    }
}
