@extends('layouts.app')
@section('content')
<div class="container">
<h1>Contacts Page</h1><br>
    <div class="row">
        <div class="col-5">
            <div class="card">
                @forelse($users as $user)
                    <div class="card-body">
                        {{ $user->username }}
                        {!! Form::open(['route' => ['contact.destroy', $user], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete Contact', ['class' => 'btn btn-danger', 'style' => "float:right;margin-top:-20px;'"]) !!}
                        {!! Form::close() !!}
                        <br>
                        <strong>Phone Numbers :</strong>
                        <ul class="list-group list-group-flush">
                            @forelse($user->usersphones as $phone)
                                <li class="list-group-item">{{$phone->phone}}</li>
                            @empty
                                <li>Sorry This User Doesn't Have Any Phone Number</li>
                            @endforelse
                        </ul>
                    </div>
                @empty
                    <div class="card-body">
                        There is No Contacts For you Please add Some
                    </div>
                @endforelse
            </div>
        </div>
        <div class="col-5 offset-1" style="margin-top:-30px;">
            {!! Form::open(['route' => 'contact.store']) !!}
                <div class="form-group">
                    <label for="exampleInputEmail1">Add New Contact</label>
                    {!! Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'Enter user']) !!}  
                    <small id="" class="form-text text-muted">We'll never share your user with anyone else.</small>
                </div>
                {!! Form::submit('Add Contact', ['class' => 'btn btn-success']) !!}
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
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection