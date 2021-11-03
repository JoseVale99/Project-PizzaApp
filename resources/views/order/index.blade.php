@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Order') }}</div>
                        <div class=" text-right mx-4 mt-2">
                            <a href="{{route('pizza.create')}}" class="btn btn-primary">Create Pizza</a>
                            <a href="{{route('pizza.index')}}" class="btn btn-success">View Pizza</a>

                        </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <table class="table table-responsive table table-striped table-bordered">
                            <thead class="table-danger">
                                <tr class="text-center">
                                    <th scope="col">User</th>
                                    <th scope="col">Phone/Email</th>
                                    <th scope="col">Date/Time</th>
                                    <th scope="col">Pizza</th>
                                    <th scope="col">S. Pizza</th>
                                    <th scope="col">M. Pizza</th>
                                    <th scope="col">L. Pizza</th>
                                    <th class="col">Total ($)</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col" colspan="3">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    <tr class="text-center">
                                        <th>
                                            <p class="font-weight-normal">{{ $order->user->name }}</p>
                                        </th>
                                        <th>
                                            <p class="font-weight-normal">{{ $order->user->email }} <br> {{$order->phone}}  </p>
                                        </th>
                                        <th>
                                            <p class="font-weight-normal">{{ $order->date }}/{{ $order->time }}</p>
                                        </th>
                                        <th>
                                            <p class="font-weight-normal">{{ $order->pizza->name }}</p>
                                        </th>
                                        <th>
                                            <p class="font-weight-normal">{{ $order->small_pizza }}</p>
                                        </th>
                                        <th>
                                            <p class="font-weight-normal">{{ $order->medium_pizza }}</p>
                                        </th>
                                        <th>
                                            <p class="font-weight-normal">{{ $order->large_pizza }}</p>
                                        </th>
                                        <th>
                                          <p class="font-weight-normal">
                                            {{
                                              ($order->pizza->small_pizza_price*$order->small_pizza)+
                                              ($order->pizza->medium_pizza_price*$order->medium_pizza)+
                                              ($order->pizza->large_pizza_price*$order->large_pizza)
                                            }}

                                          </p>
                                        </th>
                                        <th>
                                            <p class="font-weight-normal">{{ $order->body }}</p>
                                        </th>
                                        <th>

                                            @if ($order->status == 'accepted')
                                                <div class="text-primary">{{ $order->status }}</div>
                    </div>
                @elseif($order->status == 'pending')
                    <div class="text-secondary">{{ $order->status }}</div>
                    @elseif($order->status == 'rejected')
                    <div class="text-danger">{{ $order->status }}</div>
                @else
                    <div class="text-success">{{ $order->status }}</div>
                    @endif
                    </th>

                    <form action="{{ route('order.status', $order->id) }}" method="POST">
                        @csrf
                        @method('put')

                        <td class="col-sm-2 mx-2">
                            <input type="submit" name="status" value="accepted" class="btn btn-primary btn-sm mt-2">
                            <input type="submit" name="status" value="rejected" class="btn btn-danger btn-sm mt-2">
                            <input type="submit" name="status" value="completed" class="btn btn-success btn-sm mt-2">
                        </td>
                    </form>

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
@endsection
