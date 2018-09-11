@extends('layouts.app')

@section('content')
  <div class="container">
    @foreach ($test_groups as $group)
      <div class="row">
        <div class="col-lg-8">
          <a href="{{ route('test.group', $group ) }}">{{ $group->title }} {{ $group->description_short }}</a>
        </div>

      </div>
    @endforeach


  </div>

@endsection
