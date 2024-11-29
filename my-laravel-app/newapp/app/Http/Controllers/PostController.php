<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
  public function index() {
    $postsFromDb = Post::all();
    return view("posts.index", ["posts" => $postsFromDb]);
  }
  public function show(Post $post) {
    // $singlPostFromDB = Post::findOrFail($postId);
    //  if (is_null($singlPostFromDB)) {
    //     return to_route("posts.index");
    //  }
    return view('posts.show', ["post" => $post]);
  }

  public function create() {
    $users = User::all();
    return view("posts.create", ["users" => $users]);
  }

  public function store() {
    $title = request()->title;
    $creator = request()->creator;
    $content = request()->content;


    $post = new Post;
    $post->title = $title;
    $post->text = $content;
    $post->name = $creator;
    $post->save();

    

    return to_route('posts.index');
  }

  public function edit(Post $post) {
    $users = User::all();
    return view("posts.edit", ["users" => $users, "post" => $post]);
  }

  public function update($postId) {
    //1- get the user data

    $title = request()->title;
    $creator = request()->creator;
    $content = request()->content;


    $singlePostFromDB = Post::find($postId);
    $singlePostFromDB->update([
      'title' => $title,
      'text' => $content,
    ]);

    return to_route('posts.show', $postId);
  }


  public function delete($postId) {
    $post = Post::find($postId);
    $post->delete();

    Post::where('id', $postId)->delete();
    return to_route('posts.index');
  }
}