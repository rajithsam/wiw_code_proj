@extends('layout.app')

@section('content')
<h1>Add Shift</h1>
<form action="/manager/shifts?user_id={{ $user->id }}" method="POST">
  @include('partials.shift_form')
</form>

@include('errors.list')

@endsection
