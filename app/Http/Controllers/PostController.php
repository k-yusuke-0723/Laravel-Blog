<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Session;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // DBからidの新しい順に取り出し、変数に保存する
        $posts = Post::orderBy('id', 'desc') -> paginate(5);
        // 変数を入れたビューを返す
        return view('posts.index') -> withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //データをvalidateする
        $this -> validate($request, array(
            'title' => 'required|max:255',
            'slug'  => 'required|alpha_dash|min:5|max:255',
            'body'  => 'required'

        ));

        // store in the database(データベースに格納する)
        $post = new Post;

        $post -> title = $request -> title;
        $post -> slug  = $request => slug;
        $post -> body  = $request -> body;

        $post -> save();
        // redirect to another page(ページ遷移させる)

        Session::flash('success', 'The blog post was successfully save!');

        return redirect() -> route('posts.show', $post ->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')-> withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // データベースからpostされたデータを探す
        $post = Post::find($id);
        // 探してきたpostのビューを返す
        return view('posts.edit') -> withPost($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // バリデーションをかける
        $this -> validate($request, array(
            'title' => 'required|max:255',
            'body'  => 'required'
        ));
        // DBにデータを保存する
        $post = Post::find($id);

        $post -> title = $request -> input('title');
        $post -> body  = $request -> input('body');

        $post -> save();
        // 成功時にフラッシュメッセージを表示する
        Session::flash('success', 'この投稿は変更し保存されました。');
        // posts.showにリダイレクトさせる
        return redirect() -> route('posts.show', $post -> id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DBからpostされたデータを探す
        $post = Post::find($id);
        // 削除するメソッド
        $post -> delete();
        // 投稿削除成功のフラッシュの表示
        Session::flash('success', 'この投稿の削除に成功しました。');
        // posts.indexにリダイレクトさせる
        return redirect() -> route('posts.index');
    }
}
