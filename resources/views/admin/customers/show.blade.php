@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>Customer #{{$customer->id}}</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <div> ID - {{$customer->id}}</div>
                        <div> FName - {{$customer->first_name}}</div>
                        <div> LName - {{$customer->last_name}}</div>
                        <div> Email - {{$customer->email}}</div>
                        <div> Phone - {{$customer->phone}}</div>
                        <div> Birth - {{$customer->date_of_birth}}</div>
                        <div> Sex - {{$customer->sex}}</div>
                    </div>

                    <div class="col-4 text-right">
                        <a href="{{ route('customer.edit', $customer) }}" class="btn btn-warning">
                            <i class="fas fa-pencil-alt"></i> Edit customer
                        </a>
                        <div class="mt-2">
                            <a href="{{ route('customer.destroy', $customer) }}" class="btn btn-danger" data-method="DELETE" data-confirm="Ви впевнені, що хочете видалити customer {{$customer->first_name }} {{$customer->last_name}}}?">
                                <i class="fas faw fa-trash-alt "></i>  Remove
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
