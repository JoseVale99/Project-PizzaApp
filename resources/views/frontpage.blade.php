@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
       
        <div class="col-md-4">
            <div class="card">
                <div class="card-header rounded" >{{ __('Menu') }}</div>

                <div class="card-body rounded-lg">
                  <ul class="list-group">
                    <form action="{{route('frontpage')}}" method="GET">
                      <input type="submit" value="All pizzas" name="all" class="list-group-item list-group-item-action">
                      <input type="submit" value="Vegetarian" name="category" class="list-group-item list-group-item-action">
                      <input type="submit" value="nonvegetarian" name="category" class="list-group-item list-group-item-action"> 
                      <input type="submit" value="traditional" name="category" class="list-group-item list-group-item-action">      
                   </form>
                  </ul>
               <h1 class="text-center">{{count($pizzas)}} pizza</h1>
                </div>
            </div>
        </div>
       
       
       
       
        <div class="col-md-8">
            <div class="card">
                <div class="card-header rounded">{{ __('Pizza') }}</div>

                <div class="card-body rounded-lg">
                  <div class="row mx-2">
                    @forelse ($pizzas as $pizza)
                        
                      <div class="col-md-auto mt-4 mx-2 text-center shadow p-3 mb-5 bg-white rounded">
                        <img src="{{Storage::url($pizza->image)}}" class="img-thumbnail mt-2 border-top-0" width="170" alt="">
                        <p>{{$pizza->name}}</p>
                        <p>{{$pizza->description}}</p>
                        <a href="{{route('pizza.show', $pizza->id)}}">
                            <button class="btn btn-danger mb-1 rounded"> order Now</button>
                        </a>
                       
                      </div>
                    @empty
                        <p>No pizzas to show</p>
                    @endforelse


                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
