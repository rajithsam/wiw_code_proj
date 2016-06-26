@extends('layout.app')

@section('content')
<h1>Edit Shift</h1>
<form action="/manager/shift/{{ $shift->id }}?user_id={{ $user->id }}" method="POST">
  {{ method_field('PUT') }}
  @include('partials.shift_form')
</form>

@include('errors.list')

@endsection
