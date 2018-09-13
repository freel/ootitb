@foreach ($test_groups as $test_group_list)
  <option class="diasabled" disabled>
    {!! $delimiter or "" !!}{{ $test_group_list->title or "" }}{{ $test_group_list->description or "" }}
     {{$test_group_list->papers()->count()}}
  </option>

  @if (count($test_group_list->children) > 0)

    @include('admin.questions.partials.areas', [
      'test_groups' => $test_group_list->children,
      'delimiter'   => ' - '.$delimiter
    ])

  @endif

  @if ($test_group_list->papers()->count() > 0)
    @include('admin.questions.partials.papers', [
      'papers'    => $test_group_list->papers()->get(),
      'delimiter' => ' - '.$delimiter
    ])
  @endif
@endforeach
