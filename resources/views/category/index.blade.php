@extends('layouts.app')

@section('content')
<div class="clearfix">
    <h3 class="float-left">Categories</h3>
    <a href="{{ route('category.create') }}" class="btn btn-primary float-right">Add new category</a>
</div>
@include('layouts.partials._alert')
<hr>
<table class="table table-bordered table-striped">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php $no = ($categories->currentPage() - 1) * $categories->perPage() + 0 ?>
    @if(count($categories) > 0)
        @foreach($categories as $category)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    {!! Form::model($category, ['route' => ['category.destroy', $category], 'method' => 'delete']) !!}
                        <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-success">Edit</a>
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick' => "return confirm('Anda yakin ?')"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="3">Tidak ada data kategori !</td>
        </tr>
    @endif
</table>
{{ $categories->links() }}
@endsection