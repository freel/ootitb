@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Список пользователей @endslot
    @slot('parent') Главная @endslot
    @slot('active') Пользователи @endslot
  @endcomponent

<hr>

  @include('admin.partials.table', [
    'route' => 'admin.user_management.user',
    'head' => ['name'=>'Имя','email'=>'Email'],
    'data' => $users,
  ])

</div>
@endsection
