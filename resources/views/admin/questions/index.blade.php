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
  'route' => 'admin.test_group',
  'head' => ['title'=>'Пункт','text'=>'Текст','test_groups'=>'Области'],
  'data' => $questions,
])

{{-- <a href="{{ route('admin.question.create') }}" class="btn btn-primary pull-right">Добавить</a>
<table class="table">
  <thead>
    <th>Пункт</th>
    <th>Текст</th>
    <th>Области</th>
    <th>Действие</th>
  </thead>
  <tbody>
    @forelse ($questions as $question)
      <tr>
        <td>{{$question->id}}</td>
        <td>{{$question->title}}</td>
        <td>
          {{$question->test_groups()->pluck('title')->implode(', ')}}

        </td>
        <td>
          <a href="{{route('admin.question.edit', $question)}}">Редактировать</a>
        </td>
      </tr>
    @empty
      <tr>
        <td colspan="3">Данные отсутствуют</td>
      </tr>
    @endforelse
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3">
        <ul>
          {{ $questions->links() }}
        </ul>
      </td>
    </tr>
  </tfoot>
</table> --}}

</div>
@endsection
