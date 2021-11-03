@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-4">
            <div class="card">
                <div class="card-header rounded" >{{ __('Menu') }}</div>

                <div class="card-body rounded-lg">
                    @if (Auth::check())
                   <form action="{{route('order.store')}}" method="POST">
                       @csrf

                       <div class="form-group text-left">
                            <p class="font-weight-bold">Name: <p class=" font-weight-normal">{{auth()->user()->name}}</p> </p> 
                            <p class="font-weight-bold">Email:  <p class="font-weight-normal">{{auth()->user()->email}}</p></p>
                            <p class="font-weight-bold">Phone Number: <input type="number" class="form-control" name="phone"> </p>
                            <p class="font-weight-bold">Small Pizza: <input type="number" class="form-control" name="small_pizza" min="0" value="0"> </p>
                            <p class="font-weight-bold">Medium Pizza: <input type="number" class="form-control" name="medium_pizza" min="0" value="0" > </p>
                            <p class="font-weight-bold">Large Pizza: <input type="number" class="form-control" name="large_pizza" min="0" value="0"> </p>
                            <p><input type="hidden" name="pizza_id" value="{{$pizza->id}}"></p>
                            <p><input type="date" name="date" class="form-control"></p>
                            <p><input type="time" name="time" class="form-control"></p>
                            <p> <textarea name="body" class="form-control"></textarea></p>
                            <p></p>
                            
                            <p>
                                <button class="btn btn-danger btn-block" type="submit">Make order</button>
                            </p>
                       
                            @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (session('warning_message'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('warning_message') }}
                        </div>
                    @endif
                        </div>

                   </form>
                    @else
                    <p><a href="/login">Please login  to make order </a></p>
                    @endif 
                </div>
            </div>
        </div>
       
       
       
       
        <div class="col-md-8">
            <div class="card">
                <div class="card-header rounded">{{ __('Pizza') }}</div>

                <div class="card-body rounded-lg">
                  <div class="row mx-2">
                   
                        
                      <div class="col-md-11 mt-4  text-center">
                        <img src="{{Storage::url($pizza->image)}}" class="img-fluid  mt-2 shadow-lg p-3 mb-5 bg-white rounded-lg"  alt="">
                        <p class="h3">{{$pizza->name}}</p>
                        <p class="h3">{{$pizza->description}}</p>
                        
                        <div class="container mx-5 mt-5 justify-content-center">
                            <div class="row text-left ">
                              <div class="col">Small pizza price:  </div>
                              <div class="col">$ {{$pizza->small_pizza_price}}</div>
                              <div class="w-100 mt-2"></div>
                              <div class="col">Medium pizza price: </div>
                              <div class="col">$ {{$pizza->medium_pizza_price}} </div>
                              <div class="w-100 mt-2"></div>
                              <div class="col">Large Pizza price:</div>
                              <div class="col">$ {{$pizza->large_pizza_price}}</div>
                            </div>
                          </div>
                       
                      
               


                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
