@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('All Pizza') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif


                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Image</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Description</th>
                            <th scope="col" class="text-center">Category</th>  
                            <th scope="col" class="text-center">S. price</th>
                            <th scope="col" class="text-center">M. price</th>
                            <th scope="col" class="text-center">L. price</th>
                            <th scope="col" class="text-center"  colspan="2">Actions</th>

                        </tr>
                        </thead>
                        <tbody>
                            @forelse ($pizzas as $key=> $pizza)
                        <tr class="text-center">
                            <th scope="row">{{$key+1}}</th>
                            <td>
                                <img src="{{Storage::url($pizza->image)}}" class="img-responsive" width="80" alt="pizzas">
                            </td>
                            <td>{{$pizza->name}}</td>
                            <td>{{$pizza->description}}</td>
                            <td>{{$pizza->category}}</td>
                            <td>{{$pizza->small_pizza_price}}</td>
                            <td>{{$pizza->medium_pizza_price}}</td>
                            <td>{{$pizza->large_pizza_price}}</td>
                            <td>
                                <a href="" class="btn btn-primary"><img src="https://img.icons8.com/material-outlined/20/000000/edit--v3.png"/></a>
                                <a href="" class="btn btn-danger"><img src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/20/000000/external-delete-miscellaneous-kiranshastry-solid-kiranshastry.png"/></a>
                            </td>
                          </tr>
                          @empty
                            <p>No pizzas to show</p>
                          @endforelse
                        </tbody>
                      </table>
                  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
