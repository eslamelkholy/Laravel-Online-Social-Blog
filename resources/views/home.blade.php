@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-5 offset-1">
            {!! Form::model($user, ['route' => ['home.update', $user], 'method' => 'put']) !!}
                <div class="form-group">
                    <label for="exampleInputEmail1">Update Address</label>
                    {!! Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' => 'Enter Address']) !!}
                    <small id="" class="form-text text-muted">We'll never share your Address with anyone else.</small>
                </div>
                {!! Form::submit('Update Address', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection