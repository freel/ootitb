@extends('admin.layouts.app_admin')

@section('content')
<div class="container">

  <form class="" action="{{route('admin.paper.update', $paper)}}" method="post">
    {{csrf_field()}}
    {{method_field('PUT')}}

    {{-- Form include --}}
    @include('admin.papers.partials.form')

  </form>

</div>

@endsection
