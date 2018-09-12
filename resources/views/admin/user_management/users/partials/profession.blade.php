@foreach ($professions as $profession_list)
  <option value="{{ $profession_list->id or ""}}"
    @isset($user->id)
      @if ($user->profession()==$profession_list)
        selected
      @endif
    @endisset
  >
    {{ $profession_list->name or "" }}
  </option>
@endforeach
