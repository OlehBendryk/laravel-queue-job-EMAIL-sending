@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"> Create group</div>
            <div class="card-body">
                {{ Form::open([
                        'route' => 'group.store',
                        'method' => 'post',
                        'role' => 'form',
                        'enctype' => 'multipart/form-data',
                    ]) }}
                @csrf
                <div class="form-group row">

                    {{ Form::label('name', 'Name', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::text('name',null , ['class' => "form-control col-8" .  ($errors->has('name') ? 'is-invalid' : '')], 'required') }}
                    @if($errors->has('name'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('name') }}</strong>
                    @endif

                    <h6 class="card-title mt-2">Select Customers for group</h6>

                    @foreach($customers as $id => $customer)
                        <div class="col-md-2">
                            {{ Form::checkbox('customers[]', $id ) }}
                            {{ Form::label('customers', $customer, ['class' => 'text-md-right']) }}
                        </div>
                    @endforeach

                    @if($errors->has('customers'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('customers') }}</strong>
                    @endif
                </div>

                <div class="form-group mt-3 ">
                        {{ Form::submit('Create group', ['class' => 'btn btn-primary']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
