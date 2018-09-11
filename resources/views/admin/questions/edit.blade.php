@extends('admin.layouts.app_admin')

@section('content')
<div class="container">

  <form class="" action="{{route('admin.question.update', $question)}}" method="post">
    {{csrf_field()}}
    {{method_field('PUT')}}

    {{-- Form include --}}
    @include('admin.questions.partials.form')

  </form>

</div>

@endsection
