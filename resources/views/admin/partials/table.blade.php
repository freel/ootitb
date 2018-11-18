<a href="{{ route($route.'.create') }}" class="btn btn-primary float-right">Добавить</a>
<table class="table">
  <thead>
    @foreach ($head as $header_td)
      <th>{{ $header_td }}</th>
    @endforeach
    <th>Действие</th>
  </thead>
  <tbody>
    @forelse ($data as $data_row)
      <tr>
        @foreach ($head as $header_key=>$header_td)
          @if ($data_row[$header_key] instanceof Illuminate\Database\Eloquent\Collection)
            <td>{{$data_row[$header_key]->pluck('title')->implode(', ')}}</td>
          @else
            <td>{{$data_row[$header_key]}}</td>
          @endif
        @endforeach
        <td>
          <a href="{{route($route.'.edit', $data_row)}}">Редактировать</a>
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
          {{ $data->links() }}
        </ul>
      </td>
    </tr>
  </tfoot>
</table>
