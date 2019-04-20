<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    // slugに基づいてDBからデータを取得
    $post = Post::where('slug', '=', $slug) -> first();

    // ビューを返してPostオブジェクトを渡す
    return view('blog.single') -> withPost($post);
}
