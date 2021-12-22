@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create Email Template</div>
            <div class="card-body">
                {{ Form::open([
                         'route' => 'email.store',
                         'method' => 'post',
                         'role' => 'form',
                         'enctype' => 'multipart/form-data',
                     ]) }}
                @csrf
                <div class="form-group row">

                    {{ Form::text('subject',null , ['class' => "form-control col-8 mb-2" .  ($errors->has('subject') ? 'is-invalid' : ''), 'placeholder' => 'Subject'], 'required') }}
                    @if($errors->has('subject'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('subject') }}</strong>
                    @endif

                    {{ Form::textarea('body',null , ['class' => "form-control col-8" .  ($errors->has('body') ? 'is-invalid' : '')], 'required') }}
                    @if($errors->has('body'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('body') }}</strong>
                    @endif

                </div>

                <div class="form-group mt-3 ">
                    {{ Form::submit('Create Email Template', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
