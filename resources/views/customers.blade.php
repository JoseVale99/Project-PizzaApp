@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Customers') }}</div>
                    <div class=" text-right mx-4 mt-2">
                        <a href="{{ route('pizza.create') }}" class="btn btn-primary">Create Pizza</a>
                        <a href="{{ route('pizza.index') }}" class="btn btn-success">View Pizza</a>

                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                       <div class="container-fluid table-responsive ">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Member since</th>


                                </tr>
                            </thead>
                            <tbody>
                                @forelse($customers as $customer)
                                    <tr class="text-center">
                                        <td>{{$customer->name}}</td>
                                        <td>{{$customer->email}}</td>
                                        <td>{{\carbon\Carbon::parse($customer->created_at)->format('M D Y')}}</td>
                                     </tr>

                                    @empty
                                        <p>There is no order!</p>
                                @endforelse

                            </tbody>
                        </table>
                       </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
