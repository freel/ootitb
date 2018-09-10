@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Пользователи @endslot
    @slot('parent') Главная @endslot
    @slot('active') Список пользователей @endslot
  @endcomponent

<hr>

<a href="{{ route('admin.user_management.user.create') }}" class="btn btn-primary pull-right">Добавить</a>
<table class="table">
  <thead>
    <th>Имя</th>
    <th>Email</th>
    <th>Действие</th>
  </thead>
  <tbody>
    @forelse ($users as $user)
      <tr>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
          <a href="{{route('admin.user_management.user.edit', $user)}}">Редактировать</a>
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
          {{ $users->links() }}
        </ul>
      </td>
    </tr>
  </tfoot>
</table>

</div>
@endsection
