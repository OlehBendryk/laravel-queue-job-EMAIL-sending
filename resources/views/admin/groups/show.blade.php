@extends('master')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Group #{{$group->id}}</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div> ID - {{$group->id}}</div>
                        <div> Name - {{$group->name}}</div>
                    </div>

                    <div class="col-4 text-right">
                        <a href="{{ route('group.edit', $group) }}" class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i> Edit group
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('group.destroy', $group) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Ви впевнені, що хочете видалити group {{$group->name }}?">
                                <i class="fas faw fa-trash-alt "></i>  Remove
                            </a>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <table class="table">
                            <span class="table-title">
                                <h6> Customers of the {{$group->name}} group </h6>
                            </span>
                            <thead>
                                <tr class="table-success">
                                    <th>ID</th>
                                    <th>FName</th>
                                    <th>LName</th>
                                    <th>Phone</th>
                                    <th>Birth</th>
                                    <th>Sex</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($customers as $customer)
                                    <tr class="table-primary">
                                        <td>{{$customer->id}}</td>
                                        <td>{{$customer->first_name}}</td>
                                        <td>{{$customer->last_name}}</td>
                                        <td>{{$customer->phone}}</td>
                                        <td>{{$customer->date_of_birth}}</td>
                                        <td>{{$customer->sex}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
