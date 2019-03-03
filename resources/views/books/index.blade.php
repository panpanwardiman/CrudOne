@extends('layouts.app')

@section('content')
<div class="clearfix">
    <h3 class="float-left">Books</h3>
    @if(Auth::check() && Auth::user()->level == 'admin')
        <a href="{{ route('book.create') }}" class="btn btn-primary float-right">Add new book</a>
    @endif
</div>
@include('layouts.partials._alert')
<hr>
<table class="table table-bordered table-striped">
    <tr>
        <th>No.</th>
        <th>Name</th>
        <th>Author</th>
        <th>Category</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php $no = ($books->currentPage() - 1) * $books->perPage() + 0 ?>
    @if(count($books) > 0) 
        @foreach($books as $book)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author }}</td>
                <td>
                    @if($book->category_id != null)
                        {{ $book->category->name }}
                    @else 
                        -
                    @endif
                </td>
                <td>{{ $book->price }}</td>
                <td>
                    {!! Form::model($book, ['route' => ['book.destroy', $book], 'method' => 'delete']) !!}
                        <a href="{{ route('book.show', ['id' => $book->id]) }}" class="btn btn-warning">Detail</a>
                        @if(Auth::user()->level == 'admin')
                            <a href="{{ route('book.edit', ['id' => $book->id]) }}" class="btn btn-success">Edit</a>
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Anda yakin ?')" ]) !!}
                        @endif
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="6">Tidak ada data buku !</td>
        </tr>
    @endif
</table>
{{ $books->links() }}
@endsection