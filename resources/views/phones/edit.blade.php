@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-5">

        </div>
        <div class="col-5 offset-1">
            {!! Form::model($phone, ['route' => ['phone.update', $phone], 'method' => 'put']) !!}
                <div class="form-group">
                    <label for="exampleInputEmail1">Update Phone</label>
                    {!! Form::text('phone', $phone->phone, ['class' => 'form-control', 'placeholder' => 'Enter Phone']) !!}
                    <small id="" class="form-text text-muted">We'll never share your Phone with anyone else.</small>
                </div>
                {!! Form::submit('Update Phone', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection