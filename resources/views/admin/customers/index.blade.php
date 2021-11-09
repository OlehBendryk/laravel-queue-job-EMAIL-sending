@extends('master')

@section('content')
    <div class="container">
        <div class="row pt-3 pb-3 mb-3 border-bottom">
            <div class="col-6">
                <h2> Customer - {{ $customers->count() }}</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{ route('customer.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i>Add customer
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>first name</th>
                        <th>last name</th>
                        <th>phone</th>
                        <th>date of birth</th>
                        <th>sex</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>
                                <a href="{{ route('customer.show', $customer) }}">
                                    {{ $customer->first_name }}
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('customer.show', $customer) }}">
                                    {{ $customer->last_name }}
                                </a>
                            </td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->date_of_birth }}</td>
                            <td>{{ $customer->sex }}</td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
