@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Группы @endslot
    @slot('parent') Главная @endslot
    @slot('active') Создание группы @endslot
  @endcomponent

<hr>

<div class="container">

  <form class="" action="{{route('admin.category.store')}}" method="post">
    {{csrf_field()}}

    {{-- Form include --}}
    @include('admin.categories.partials.form')
  </form>
</div>

@endsection
