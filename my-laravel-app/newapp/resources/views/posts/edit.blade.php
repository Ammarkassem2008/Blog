@extends('layouts.app')

@section('title') Update Post @endsection

@section("content")


<form method="POST" action="{{route('posts.update', $post->id)}}">
  @csrf
  @method('put')
  <div class="form-group mt-3">
    <label>Post title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter post title.." value="{{$post->title}}" required>
  </div>
  <div class="form-group mt-3">
    <label>Your Name</label>
    <select class="form-control" name="creator" required>
      @foreach($users as $user)
      <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
    </select>
  </div>
  <div class="form-group mt-3">
    <label>Post content</label>
    <textarea class="form-control" rows="3" placeholder="content.." name="content" required>{{$post->text}}</textarea>
  </div>
  <button type="submit" class="btn btn-success mt-3">Update</button>
</form>

@endsection