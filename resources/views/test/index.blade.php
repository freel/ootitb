@extends('layouts.app')

@section('content')
  <div class="container">
    @foreach ($test_groups as $group)
      <div class="row">
        <div class="col-lg-8">
          <a href="#">{{ $group->title }}</a>
        </div>

      </div>
    @endforeach


  </div>

@endsection