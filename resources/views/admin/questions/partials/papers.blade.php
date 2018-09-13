@foreach ($papers as $paper)
  <option value="{{ $paper->id or ""}}">
    {!! $delimiter or "" !!} Билет {{ $paper->paper_index or "" }}
  </option>
@endforeach
