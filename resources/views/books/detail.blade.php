@extends('layouts.app')

@section('content')
<h3>Detail {{ $book->name }}</h3>
<hr>
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <td>{{ $book->name }}</td>
    </tr>

    <tr>
        <th>Author</th>
        <td>{{ $book->author }}</td>
    </tr>

    <tr>
        <th>Publisher</th>
        <td>{{ $book->publisher }}</td>
    </tr>

    <tr>
        <th>Category</th>
        <td>
            @if($book->category_id != null)
                {{ $book->category->name }}
            @else
                -
            @endif
        </td>
    </tr>

    <tr>
        <th>Price</th>
        <td>{{ $book->price }}</td>
    </tr>

    <tr>
        <th>Cover</th>
        <td><img src="{{ asset('storage/'.$book->cover) }}" alt="{{ $book->name }}" width="150px;"></td>
    </tr>
</table>
@endsection