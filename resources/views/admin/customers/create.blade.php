@extends('master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header"> Add customer</div>
            <div class="card-body">
                {{ Form::open([
                        'route' => 'customer.store',
                        'method' => 'post',
                        'role' => 'form',
                        'enctype' => 'multipart/form-data',
                    ]) }}
                @csrf
                <div class="form-group row">

                    {{ Form::label('first_name', 'First Name', ['class' => 'col-4 text-md-right']) }}
                        {{ Form::text('first_name',null , ['class' => "form-control col-8" .  ($errors->has('first_name') ? 'is-invalid' : '')], 'required') }}
                        @if($errors->has('first_name'))
                            <span class="invalid-feedback" role="alert"></span>
                            <strong> {{ $errors->first('first_name') }}</strong>
                        @endif

                    {{ Form::label('last_name', 'Last Name', ['class' => 'col-4 text-md-right']) }}
                        {{ Form::text('last_name',null , ['class' => "form-control col-8" .  ($errors->has('last_name') ? 'is-invalid' : '')], 'required') }}
                        @if($errors->has('last_name'))
                            <span class="invalid-feedback" role="alert"></span>
                            <strong> {{ $errors->first('last_name') }}</strong>
                        @endif

                    {{ Form::label('phone', 'Phone', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::text('phone', null, ['class' => "form-control col-8" .  ($errors->has('phone') ? 'is-invalid' : '')], 'required') }}
                    @if($errors->has('phone'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('phone') }}</strong>
                    @endif

                    {{ Form::label('date_of_birth', 'Birth Date', ['class' => 'col-4 text-md-right'])}}
                    {{ Form::date('date_of_birth', \Carbon\Carbon::now(), ['class' => "form-control col-8" .  ($errors->has('date_of_birth') ? 'is-invalid' : '')], 'required') }}
                    @if($errors->has('date_of_birth'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('date_of_birth') }}</strong>
                    @endif

                    {{ Form::label('sex', 'Sex', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::select('sex', ['male'=> 'Male', 'female'=>'Female'], null, ['placeholder' => 'Pick a sex...'], ['class' => "form-control col-8" .  ($errors->has('sex') ? 'is-invalid' : '')], ['required']) }}
                    @if($errors->has('sex'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('sex') }}</strong>
                    @endif

                </div>

                <div class="form-group mt-3 ">
                        {{ Form::submit('Add customer', ['class' => 'btn btn-primary']) }}
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
