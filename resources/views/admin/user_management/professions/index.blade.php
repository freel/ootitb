@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Список профессий @endslot
    @slot('parent') Главная @endslot
    @slot('active') Профессии @endslot
  @endcomponent

<hr>

<a href="{{ route('admin.user_management.profession.create') }}" class="btn btn-primary pull-right">Добавить</a>
<table class="table">
  <thead>
    <th>Название</th>
    <th>Действие</th>
  </thead>
  <tbody>
    @forelse ($professions as $profession)
      <tr>
        <td>{{$profession->name}}</td>
        <td>
          <a href="{{route('admin.user_management.profession.edit', $profession)}}">Редактировать</a>
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
        <ul class="pagination pull-right">
          {{ $professions->links() }}
        </ul>
      </td>
    </tr>
  </tfoot>
</table>

</div>
@endsection
