@extends('admin.layouts.app_admin')

@section('content')
<div class="container">

  <form class="" action="{{route('admin.question.store')}}" method="post">
    {{csrf_field()}}

    {{-- Form include --}}
    @include('admin.questions.partials.form')

  </form>

</div>

@endsection
