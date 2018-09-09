@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Группы @endslot
    @slot('parent') Главная @endslot
    @slot('active') Список групп @endslot
  @endcomponent

<hr>

<a href="{{ route('admin.test_group.create') }}" class="btn btn-primary pull-right">Добавить</a>
<table class="table">
  <thead>
    <th>Наименование</th>
    <th>Краткое описание</th>
    <th>Действие</th>
  </thead>
  <tbody>
    @forelse ($test_groups as $test_group)
      <tr>
        <td>{{$test_group->title}}</td>
        <td>{{$test_group->description_short}}</td>
        <td>
          <a href="{{route('admin.test_group.edit', $test_group)}}">Редактировать</a>
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
          {{ $test_groups->links() }}
        </ul>
      </td>
    </tr>
  </tfoot>
</table>

</div>
@endsection
