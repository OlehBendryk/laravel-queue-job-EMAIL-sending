@extends('master')

@section('content')
    <div class="container">
        <div class="row pt-3 pb-3 mb-3 border-bottom">
            <div class="col-6">
                <h2> Groups - {{ $groups->count() }}</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('group.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>Add Group
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr class="table-success">
                        <th>#</th>
                        <th>name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <td>{{ $group->id }}</td>
                            <td>
                                <a href="{{ route('group.show', $group) }}">
                                    {{ $group->name }}
                                </a>
                            </td>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
        {{--Pagination--}}
        @if($groups->total() > $groups->count())
            <div class="d-flex justify-content-center">
                {{ $groups->links() }}
            </div>
        @endif
    </div>

@endsection
