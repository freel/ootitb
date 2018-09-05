@extends('admin.layouts.app_admin')

@section('content')

<div class="container">
  @component('admin.components.breadcrumb')
    @slot('title') Области аттестации @endslot
    @slot('parent') Главная @endslot
    @slot('active') Области аттестации @endslot
  @endcomponent

<hr>

<a href="{{ route('admin.certification_area.create') }}" class="btn btn-primary pull-right">Добавить</a>
<table class="table">
  <thead>
    <th>Пункт</th>
    <th>Наименование</th>
    <th>Описание</th>
    <th>Действие</th>
  </thead>
  <tbody>
    @forelse ($certification_areas as $certification_area)
      <tr>
        <td>{{$certification_area->id}}</td>
        <td>{{$certification_area->title}}</td>
        <td>{{$certification_area->description}}</td>
        <td>
          <a href="{{route('admin.certification_area.edit', ['id'=>$certification_area->id])}}">Редактировать</a>
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
          {{ $certification_areas->links() }}
        </ul>
      </td>
    </tr>
  </tfoot>
</table>

</div>
@endsection
