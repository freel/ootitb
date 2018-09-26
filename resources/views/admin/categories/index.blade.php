@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Группы @endslot
    @slot('parent') Главная @endslot
    @slot('active') Список групп @endslot
  @endcomponent

<hr>

@include('admin.partials.table', [
  'route' => 'admin.category',
  'head' => ['title'=>'Наименование','description_short'=>'Краткое описание'],
  'data' => $categories,
])

</div>
@endsection
