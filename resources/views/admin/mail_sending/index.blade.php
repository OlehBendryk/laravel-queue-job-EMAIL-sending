@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row pt-3 pb-3 mb-3 border-bottom">
            <div class="col-6">
                <h2> Message Templates - {{ $templates->count() }}</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('mail.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>Send Email
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr class="table-success">
                        <th>#</th>
                        <th>subject</th>
                        <th>group</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($templates as $template)
                        <tr>
                            <td>{{ $template->id }}</td>
                            <td>{{ $template->subject }}</td>
                            <td>{{ $template->group_id }}</td>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
