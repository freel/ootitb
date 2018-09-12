@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Создать профессию @endslot
    @slot('parent') Главная @endslot
    @slot('active') Профессии @endslot
  @endcomponent

<hr>


<div class="container">

  <form class="" action="{{route('admin.user_management.profession.store', $profession)}}" method="post">
    {{csrf_field()}}

    {{-- Form include --}}
    @include('admin.user_management.professions.partials.form')
  </form>
</div>

@endsection
