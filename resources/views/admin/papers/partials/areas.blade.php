@foreach ($test_groups as $test_group_list)
  <option value="{{ $test_group_list->id or ""}}"
    @isset($areas)
      @if ($areas->contains($test_group_list))
        selected
      @endif
    @endisset
  >
    {!! $delimiter or "" !!}{{ $test_group_list->title or "" }}{{ $test_group_list->description or "" }}
  </option>

  @if (count($test_group_list->children) > 0)

    @include('admin.papers.partials.areas', [
      'test_groups' => $test_group_list->children,
      'delimiter'   => ' - '.$delimiter
    ])

  @endif
@endforeach
