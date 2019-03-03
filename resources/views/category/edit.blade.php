@extends('layouts.app')

@section('content')
<h3>Edit category</h3>
<hr>
{!! Form::model($category, ['route' => ['category.update', $category], 'method' => 'patch', 'autocomplete' => 'off']) !!}
    @include('category._form', ['model' => $category])
{!! Form::close() !!}
@endsection