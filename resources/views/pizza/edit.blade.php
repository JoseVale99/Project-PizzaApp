@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                @if (count($errors) > 0)
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li class="p-6">{{ $error }}</li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                <div class="card">

                    <div class="card-header">{{ __('Edit Pizza') }}</div>


                    <form action="{{ route('pizza.update', $pizza->id) }}" method="POST" enctype="multipart/form-data">
                       @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="form-group ">
                                <label for="name">Name of Pizza</label>
                                <input type="text" class="form-control" name="name" placeholder="name of pizza"
                                    value="{{ old('name', $pizza->name) }}">
                            </div>

                            <div class="form-group ">
                                <label for="description">Description of Pizza</label>
                                <textarea class="form-control" name="description" >{{old('description', $pizza->description)}}</textarea>
                            </div>

                            <div class="form-group">

                                <label>Pizza Price ($)</label>
                                <input type="text" name="small_pizza_price" class="form-control mt-3"
                                    placeholder="small pizza price" value="{{ old('small_pizza_price', $pizza->small_pizza_price) }}">
                                <input type="text" name="medium_pizza_price" class="form-control mt-3"
                                    placeholder="medium pizza price" value="{{ old('medium_pizza_price', $pizza->medium_pizza_price) }}">
                                <input type="text" name="large_pizza_price" class="form-control mt-3"
                                    placeholder="large pizza price" value="{{old('large_pizza_price', $pizza->large_pizza_price)}}">

                            </div>

                            <div class="form-group ">
                                <label for="description">Category</label>
                                <select class="form-control" name="category" id="" value="{{old('category', $pizza->category)}}>
                                    <option value=""></option>
                                    <option value="vegetarian">Vegetarian Pizza</option>
                                    <option value="nonvegetarian">Non vegetarian Pizza</option>
                                    <option value="traditional">Traditional Pizza</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image">
                                <img src="{{Storage::url($pizza->image)}}" width="100" class="img-responsive" alt="pizza image">
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">save</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>




        </div>
    </div>
@endsection
