{!! Form::model($model, [
    'route' => $model->exists ? ['user.update', $model->id] : 'user.store',
    'method' => $model->exists ? 'PATCH' : 'POST'
]) !!}

<!-- Name -->
<div class="form-group">
    <label for="name">Name</label>
    {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
</div>

<!-- Email -->
<div class="form-group">
    <label for="email">Email</label>
    {!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
</div>

<!-- Gender -->
<div class="form-group">
    <label for="gender">Gender</label><br>
    {!! Form::radio('gender', 'female', false, ['id' => 'female']) !!}
    <label for="female">Female</label>
    {!! Form::radio('gender', 'male', false, ['id' => 'male']) !!}
    <label for="male">Male</label>
</div>

<!-- Address -->
<div class="form-group">
    <label for="address">Address</label>
    {!! Form::textarea('address', null, ['class' => 'form-control', 'rows' => '4']) !!}
</div>

<!-- Level -->
<div class="form-group">
    <label for="level">Level</label><br>
    {!! Form::radio('level', 'members', false, ['id' => 'members']) !!}
    <label for="members">Members</label>
    {!! Form::radio('level', 'admin', false, ['id' => 'admin']) !!}
    <label for="admin">Admin</label>
</div>

@if(!$model->exists)
<!-- Password -->
<div class="form-group">
    <label for="password">Password</label>
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    <label for="password_confirm">Password Confirmation</label>
    {!! Form::password('password_confirm', ['class' => 'form-control']) !!}
</div>
@endif

{!! Form::close() !!}