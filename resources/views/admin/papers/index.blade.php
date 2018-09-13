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
    <th>Группа</th>
    <th>Номер билета</th>
    <th>Действие</th>
  </thead>
  <tbody>
    @forelse ($papers as $paper)
      <tr>
        <td>{{ $paper->testGroup()->first()->description_short }}</td>
        <td>{{$paper->paper_index}}</td>
        <td>
          <a href="{{route('admin.paper.edit', $paper)}}">Редактировать</a>
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
