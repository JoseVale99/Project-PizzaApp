@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">{{ __('Menu') }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <a href="" class="list-group-item list-group-item-action">View</a>
                            <a href="" class="list-group-item list-group-item-action">Create</a>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Pizza') }}</div>

                    <div class="card-body">
                        <div class="form-group ">
                            <label for="name">Name of Pizza</label>
                            <input type="text" class="form-control" name="name" placeholder="name of pizza">
                        </div>

                        <div class="form-group ">
                            <label for="description">Description of Pizza</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>

                        <div class="form-group">

                            <label>Pizza Price ($)</label>
                            <input type="number" name="small_pizza_price" class="formm-control mt-3" placeholder="small pizza price">
                            <input type="number" name="medium_pizza_price" class="form-control mt-3" placeholder="medium pizza price">
                            <input type="number" name="large_pizza_price" class="form-control mt-3" placeholder="large pizza price">

                        </div>

                        <div class="form-group ">
                            <label for="description">Category</label>
                            <select class="form-control" name="category" id="">
                                <option value=""></option>
                                <option value="vegetarian">Vegetarian Pizza</option>
                                <option value="nonvegetarian">Non vegetarian Pizza</option>
                                <option value="traditional">Traditional Pizza</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>

                        <div class="form-group text-center">
                            <button class="btn btn-primary" type="submit">save</button>
                        </div>

                    </div>
                    

                </div>
            </div>




        </div>
    </div>
@endsection
