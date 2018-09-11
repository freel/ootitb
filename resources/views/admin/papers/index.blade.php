@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Вопросы @endslot
    @slot('parent') Главная @endslot
    @slot('active') Вопросы @endslot
  @endcomponent

<hr>

<a href="{{ route('admin.paper.create') }}" class="btn btn-primary pull-right">Добавить</a>
<table class="table">
  <thead>
    <th>Пункт</th>
    <th>Текст</th>
    <th>Области</th>
    <th>Действие</th>
  </thead>
  <tbody>
    @forelse ($papers as $paper)
      <tr>
        <td>{{$paper->id}}</td>
        <td>{{$paper->title}}</td>
        <td>
          {{$paper->test_groups()->pluck('title')->implode(', ')}}

        </td>
        <td>
          <a href="{{route('admin.paper.edit', $papers)}}">Редактировать</a>
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
          {{ $papers->links() }}
        </ul>
      </td>
    </tr>
  </tfoot>
</table>

</div>
@endsection
