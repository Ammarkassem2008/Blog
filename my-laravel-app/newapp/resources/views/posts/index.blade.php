@extends('layouts.app')

@section('title', 'All Posts')

@section("content")
<section class="posts">
  <div class="container">
    <a class="btn btn-primary" href="{{route('posts.create')}}">New Post +</a>

@foreach($posts as $post)
    <div class="post">
      <div class="user-info">
        <img src="images/user.png">
        <h4>{{$post["name"]}}</h4>
      </div>
      <hr>
      <div class="post-content">
        <p>{{$post["text"]}}</p>
      </div>
      <div class="card-body d-flex">
        <a href="{{route('posts.edit', $post['id'])}}" class="btn btn-success m-3">Edit</a>
        <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info m-3">View</a>

        <form method="POST" action="{{route('posts.destroy',$post['id'])}}">
          @csrf
          @method('delete')
          <button type="submit" class="btn btn-danger m-3">Delete</button>
        </form>
      </div>
    </div>
    </div>
    
</section>

@endforeach

@endsection