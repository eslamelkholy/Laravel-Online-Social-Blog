@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-5">

        </div>
        <div class="col-5 offset-1">
            {!! Form::open(['route' => 'phone.store']) !!}
                <div class="form-group">
                    <label for="exampleInputEmail1">Add New Phone</label>
                    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Enter Phone']) !!}  
                    <small id="" class="form-text text-muted">We'll never share your Phone with anyone else.</small>
                </div>
                {!! Form::submit('Add Phone', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
            <br/>
            @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection