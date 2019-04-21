<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

  public function getIndex() {
    $posts = Post::paginate(2);

    return view('blog.index') -> withPosts($posts);
  }
  public function getSingle($slug) {
    // slugに基づいてDBからデータを取得
    $post = Post::where('slug', '=', $slug) -> first();

    // ビューを返してPostオブジェクトを渡す
    return view('blog.single') -> withPost($post);
  }
}
