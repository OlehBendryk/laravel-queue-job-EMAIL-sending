@extends('master')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Create Email Template</div>
            <div class="card-body">
                {{ Form::open([
                         'route' => 'send',
                         'method' => 'post',
                         'role' => 'form',
                         'enctype' => 'multipart/form-data',
                     ]) }}
                @csrf
                <div class="form-group row">

                    {{ Form::label('group_id', 'Recipients', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::select('group_id', $recipients, null, ['class' => "form-control col-8 mb-2" .  ($errors->has('group_id') ? 'is-invalid' : ''), 'placeholder'=> 'Select Group'], ['required']) }}
                    @if($errors->has('group_id'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('group_id') }}</strong>
                    @endif

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

                    {{ Form::label('time', 'Time sending', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::text('time', null, ['class' => "form-control col-8" .  ($errors->has('time') ? 'is-invalid' : ''), 'placeholder'=>'Year-month-day hour:minute (2021-12-31 10:00)'], 'required') }}

                </div>

                <div class="form-group mt-3 ">
                    {{ Form::submit('Send Email', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
