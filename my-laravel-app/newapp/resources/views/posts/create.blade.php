@extends('layouts.app')

@section('title') Create Post @endsection

@section("content")


<form method="POST" action="{{route('posts.store')}}">
  @csrf
  <div class="form-group mt-3">
    <label>Post title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter post title.." required>
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
    <textarea class="form-control" rows="3" placeholder="content.." name="content" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary mt-3">Submit</button>
</form>

@endsection