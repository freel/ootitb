@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Вопросы @endslot
    @slot('parent') Главная @endslot
    @slot('active') Вопросы @endslot
  @endcomponent

<hr>

@include('admin.partials.table', [
  'route' => 'admin.question',
  'head' => ['title'=>'Пункт','text'=>'Текст','categories'=>'Области'],
  'data' => $questions,
])

</div>
@endsection
