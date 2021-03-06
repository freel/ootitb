@foreach ($categories as $category_list)
  <option value="{{ $category_list->id or ""}}"
    @isset($paper->id)
      @if ($paper->testGroup()->first() == $category_list)
        selected
      @endif
    @endisset
  >
    {!! $delimiter or "" !!}{{ $category_list->title or "" }}{{ $category_list->description or "" }}
  </option>

  @if (count($category_list->children) > 0)

    @include('admin.papers.partials.areas', [
      'categories' => $category_list->children,
      'delimiter'   => ' - '.$delimiter
    ])

  @endif
@endforeach
