@foreach ($test_groups as $test_group_list)
  <option value="{{ $test_group_list->id or ""}}"
    @isset($test_group->id)
      @if ($test_group->parent_id == $test_group_list->id )
        selected=""
      @endif
      @if ($test_group->id == $test_group_list->id )
        hidden=""
      @endif
    @endisset
  >
    {!! $delimiter or "" !!}{{ $test_group_list->title or "" }}{{ $test_group_list->description or "" }}
  </option>

  @if (count($test_group_list->children) > 0)

    @include('admin.test_groups.partials.parents', [
      'test_groups' => $test_group_list->children,
      'delimiter'           => ' - '.$delimiter
    ])

  @endif
@endforeach
