@foreach ($categories as $category_list)
  <option value="{{ $category_list->id or ""}}"
  @if (count($category_list->children) > 0)
    class="diasabled" disabled
  @endif
    >
    {!! $delimiter or "" !!}{{ $category_list->title or "" }}{{ $category_list->description or "" }}
     {{$category_list->papers()->count()}}
  </option>

  @if (count($category_list->children) > 0)

    @include('admin.questions.partials.areas', [
      'categories' => $category_list->children,
      'delimiter'   => ' - '.$delimiter
    ])

  @endif

  @if ($category_list->papers()->count() > 0)
    @include('admin.questions.partials.papers', [
      'papers'    => $category_list->papers()->get(),
      'delimiter' => ' - '.$delimiter
    ])
  @endif
@endforeach
