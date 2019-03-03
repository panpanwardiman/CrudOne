@extends('layouts.app')

@section('content')
<h3>Add new book</h3>
<hr>
{!! Form::open(['route' => 'book.store', 'files' => true, 'autocomplete' => 'off']) !!}
    @include('books._form')
{!! Form::close() !!}
@endsection

@push('scripts')
<script>
    CKEDITOR.replace('ckdescription')
</script>
@endpush