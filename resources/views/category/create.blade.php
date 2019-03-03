@extends('layouts.app')

@section('content')
<h3>Add new category</h3>
<hr>
{!! Form::open(['route' => 'category.store', 'autocomplete' => 'off']) !!}
    @include('category._form')
{!! Form::close() !!}
@endsection