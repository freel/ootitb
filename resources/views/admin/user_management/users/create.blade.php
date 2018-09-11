@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Редактирование Пользователя @endslot
    @slot('parent') Главная @endslot
    @slot('active') Польлзователи @endslot
  @endcomponent

<hr>


<div class="container">

  <form class="" action="{{route('admin.user_management.user.store', $user)}}" method="post">
    {{csrf_field()}}
    {{method_field('PUT')}}

    {{-- Form include --}}
    @include('admin.user_management.user.partials.form')
  </form>
</div>

@endsection
