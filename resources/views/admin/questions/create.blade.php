@extends('admin.layouts.app_admin')

@section('content')
<div class="container">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="once-tab" data-toggle="tab" href="#once" role="tab" aria-controls="once" aria-selected="true">Одна запись</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="mass-tab" data-toggle="tab" href="#mass" role="tab" aria-controls="mass" aria-selected="false">Загрузить файл</a>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="once" role="tabpanel" aria-labelledby="home-tab">
      <form action="{{route('admin.question.store')}}" method="post">
        {{csrf_field()}}
        {{-- Form include --}}
        @include('admin.questions.partials.form')
      </form>
    </div>
    <div class="tab-pane fade" id="mass" role="tabpanel" aria-labelledby="mass-tab">
      {{-- @component('admin.components.file')
          @slot('action')
            {{ route('admin.question.mass_store') }}
          @endslot
      @endcomponent --}}
      <form action="{{route('admin.question.mass_store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        {{-- Form include --}}
        @include('admin.questions.partials.file')
      </form>
    </div>
  </div>
</div>

@endsection
