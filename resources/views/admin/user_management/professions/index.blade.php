@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Список профессий @endslot
    @slot('parent') Главная @endslot
    @slot('active') Профессии @endslot
  @endcomponent

<hr>

@include('admin.partials.table', [
  'route' => 'admin.user_management.profession',
  'head' => ['name'=>'Название'],
  'data' => $professions,
])

</div>
@endsection
