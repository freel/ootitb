@extends('admin.layouts.app_admin')

@section('content')
<div class="container">

  <form class="" action="{{route('admin.paper.store')}}" method="post">
    {{csrf_field()}}

    {{-- Form include --}}
    @include('admin.papers.partials.form')

  </form>

</div>

@endsection
