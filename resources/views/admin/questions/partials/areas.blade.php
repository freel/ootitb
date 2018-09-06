@foreach ($certification_areas as $certification_area_list)
  <option value="{{ $certification_area_list->id or ""}}"
    @isset($certification_area->id)
      @if ($certification_area->parent_id == $certification_area_list->id )
        selected=""
      @endif
      @if ($certification_area->id == $certification_area_list->id )
        hidden=""
      @endif
    @endisset
  >
    {!! $delimiter or "" !!}{{ $certification_area_list->title or "" }}{{ $certification_area_list->description or "" }}
  </option>

  @if (count($certification_area_list->children) > 0)

    @include('admin.certification_areas.partials.parents', [
      'certification_areas' => $certification_area_list->children,
      'delimiter'           => ' - '.$delimiter
    ])

  @endif
@endforeach
