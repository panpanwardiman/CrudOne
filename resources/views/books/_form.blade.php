<div class="row">
    <div class="col-md-6">
        <!-- Book Name -->
        <div class="form-group">
            <label for="name">Book Name</label>
            {!! Form::text('name', null, ['class' => $errors->has('name') ? 'form-control is-invalid' : 'form-control']) !!}
            @if($errors->has('name'))
                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
            @endif
        </div>

        <!-- Author -->
        <div class="form-group">
            <label for="author">Author</label>
            {!! Form::text('author', null, ['class' => $errors->has('author') ? 'form-control is-invalid' : 'form-control']) !!}
            @if($errors->has('author'))
                <div class="invalid-feedback">{{ $errors->first('author') }}</div>
            @endif
        </div>

        <!-- Publisher -->
        <div class="form-group">
            <label for="publisher">Publisher</label>
            {!! Form::text('publisher', null, ['class' => $errors->has('publisher') ? 'form-control is-invalid' : 'form-control']) !!}
            @if($errors->has('publisher'))
                <div class="invalid-feedback">{{ $errors->first('publisher') }}</div>
            @endif
        </div>

        <!-- Category -->
        <div class="form-group">
            <label for="category_id">Category</label>
            {!! Form::select('category_id', $categories->pluck('name', 'id')->all(), null, ['class' => 'form-control']) !!}            
        </div>

        <!-- Price -->
        <div class="form-group">
            <label for="price">Price</label>
            {!! Form::number('price', null, ['class' => $errors->has('price') ? 'form-control is-invalid' : 'form-control']) !!}
            @if($errors->has('price'))
                <div class="invalid-feedback">{{ $errors->first('price') }}</div>
            @endif
        </div>

        <!-- Cover -->
        <div class="form-group">
            <label for="cover">Book Cover</label>
            {!! Form::file('cover', ['class' => $errors->has('cover') ? 'form-control-file is-invalid' : 'form-control-file']) !!}
            @if($errors->has('cover'))
                <div class="invalid-feedback">{{ $errors->first('cover') }}</div>
            @endif
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            {!! Form::textarea('description', null, ['id' => 'ckdescription']) !!}
        </div>

        {!! Form::submit(isset($model) ? 'Update' : 'Save', ['class' => 'btn btn-primary mb-3']) !!}
    </div>
</div>