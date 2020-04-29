@extends('layouts.app')
@section('content')
<div class="container">
<h1>Phones Page</h1><br>
    <div class="row">
        <div class="col-5">
            <div class="card">
                @forelse($phones as $phone)
                    <div class="card-body">
                        {{ $phone->phone }}
                        {!! Form::open(['route' => ['phone.destroy', $phone], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'style' => "float:right;margin-left:7px;'"]) !!}
                        {!! Form::close() !!}
                        <a href="{{ route('phone.edit', $phone) }}" class="btn btn-primary" style="float:right;">Update</a>
                    </div>
                @empty
                    <div class="card-body">
                        There is No Phones For you Please add Some
                    </div>
                @endforelse
            </div>
        </div>
        <div class="col-5 offset-1" style="margin-top:-30px;">
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
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection