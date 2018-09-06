@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Вопросы @endslot
    @slot('parent') Главная @endslot
    @slot('active') Вопросы @endslot
  @endcomponent

<hr>

<a href="{{ route('admin.question.create') }}" class="btn btn-primary pull-right">Добавить</a>
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
          {{$question->certification_areas()->pluck('title')->implode(', ')}}
          @foreach ($question->certification_areas as $area)
              {{ $area->title }}
          @endforeach

        </td>
        <td>
          <a href="{{route('admin.question.edit', ['id'=>$question->id])}}">Редактировать</a>
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
</table>

</div>
@endsection
