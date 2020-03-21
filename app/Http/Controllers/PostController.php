<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(){
        return [
            'error' => false,
            'data' => Post::all()
        ];
    }

    public function detail($id){
        $post = Post::find($id);
        if(empty($post)){
            return [
                'error' => 'Post data not found'
            ];
        }

        return [
            'error' => false,
            'data' => $post
        ];
    }
}
