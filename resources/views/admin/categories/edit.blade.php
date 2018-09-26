@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Группы @endslot
    @slot('parent') Главная @endslot
    @slot('active') Редактирование группы @endslot
  @endcomponent

<hr>


<div class="container">

  <form class="" action="{{route('admin.category.update', $category)}}" method="post">
    {{csrf_field()}}
    {{method_field('PUT')}}

    {{-- Form include --}}
    @include('admin.categories.partials.form')
  </form>
</div>

@endsection
