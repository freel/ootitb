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
  'route' => 'admin.test_group',
  'head' => ['title'=>'Наименование','description_short'=>'Краткое описание'],
  'data' => $test_groups,
])

</div>
@endsection
