@extends('layouts.app')

@section('title') {{$post["title"]}} @endsection

@section("content")

  <div class="card mt-5">
    <h5 class="card-header text-primary">{{$post["name"]}}</h5>
    <div class="card-body">
      <h5 class="card-title">{{$post["title"]}}</h5>
      <p class="card-text">
        {{$post["text"]}}
      </p>
      <p class="card-text">
        {{$post["date"]}}
      </p>
    </div>
  </div>


@endsection