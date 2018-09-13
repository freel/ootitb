@extends('layouts.app')

@section('content')
  <div class="container">
    <form class="" action="{{route('admin.question.store')}}" method="post">
      {{csrf_field()}}

      @include('test.partials.form')


    </form>

      {{ $questions->links() }}

  </div>
@endsection
