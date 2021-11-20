@extends('master')

@section('content')
    <div class="container">
        <div class="card mt-2 col-6">
            <div class="card-header"> Edit Group </div>
            <div class="card-body">
                {{ Form::open([
                        'route' => ['group.update', $group],
                        'method' => 'put',
                        'files' => true,
                    ]) }}
                <div class="form-group row">

                    {{ Form::label('name', 'Name', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::text('name', $group->name, ['class' => "form-control col-8" .  ($errors->has('name') ? 'is-invalid' : '')], 'required') }}
                    @if($errors->has('name'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('name') }}</strong>
                    @endif

                    {{ Form::label('customers[]', 'Add customers', ['class' => 'col-4 text-md-right']) }}
                    {{ Form::select('customers[]', $customers, null, ['class' => "form-control col-8" .  ($errors->has('sex') ? 'is-invalid' : ''), 'multiple'], ['required']) }}
                    @if($errors->has('customers'))
                        <span class="invalid-feedback" role="alert"></span>
                        <strong> {{ $errors->first('customers') }}</strong>
                    @endif
                </div>

                <div class="form-group mt-3 ">
                    {{ Form::submit('Edit Group', ['class' => 'btn btn-primary']) }}
                </div>
                {{ Form::close() }}
            </div>

        </div>
        </div>
@endsection
