@extends('admin.layouts.app_admin')

@section('content')
<div class="container">

  <form class="" action="{{route('admin.certification_area.store')}}" method="post">
    {{csrf_field()}}

    {{-- Form include --}}
    @include('admin.certification_areas.partials.form')
  </form>
</div>

@endsection
