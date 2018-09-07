@foreach ($certification_areas as $certification_area_list)
  <option value="{{ $certification_area_list->id or ""}}"
    @isset($areas)
      @if ($areas->contains($certification_area_list))
        selected
      @endif
    @endisset
  >
    {!! $delimiter or "" !!}{{ $certification_area_list->title or "" }}{{ $certification_area_list->description or "" }}
  </option>

  @if (count($certification_area_list->children) > 0)

    @include('admin.questions.partials.areas', [
      'certification_areas' => $certification_area_list->children,
      'delimiter'           => ' - '.$delimiter
    ])

  @endif
@endforeach
