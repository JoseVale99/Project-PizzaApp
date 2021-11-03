@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header">{{ __('Menu') }}</div>

                    <div class="card-body">
                        <ul class="list-group">
                            <a href="{{ route('pizza.index') }}" class="list-group-item list-group-item-action">View</a>
                            <a href="{{ route('pizza.create') }}" class="list-group-item list-group-item-action">Create</a>
                            <a href="{{ route('user.order') }}" class="list-group-item list-group-item-action">User order</a>

                        
                        </ul>
                    </div>
                </div>
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
            </div>


            <div class="col col-md-10">
                <div class="card">
                    <div class="card-header">{{ __('All Pizza') }}</div>
                    <div class="text-right mt-3 mx-3">
                        <a href="{{ route('pizza.create') }}">
                            <button class="btn btn-success">Add Pizza</button>
                        </a>
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif


                        <table class="table table-bordered table-responsive">
                            <thead class="table-danger">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Image</th>
                                    <th scope="col" class="text-center">Name</th>
                                    <th scope="col" class="text-center">Description</th>
                                    <th scope="col" class="text-center">Category</th>
                                    <th scope="col" class="text-center">S. price</th>
                                    <th scope="col" class="text-center">M. price</th>
                                    <th scope="col" class="text-center">L. price</th>
                                    <th scope="col" class="text-center" colspan="2">Actions</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pizzas as $key=> $pizza)
                                    <tr class="text-center">
                                        <th scope="row">{{ $key + 1 }}</th>
                                        <td>
                                            <img src="{{ Storage::url($pizza->image) }}" class="img-responsive" width="80"
                                                alt="pizzas">
                                        </td>
                                        <td>{{ $pizza->name }}</td>
                                        <td>{{ $pizza->description }}</td>
                                        <td>{{ $pizza->category }}</td>
                                        <td>{{ $pizza->small_pizza_price }}</td>
                                        <td>{{ $pizza->medium_pizza_price }}</td>
                                        <td>{{ $pizza->large_pizza_price }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('pizza.edit', $pizza->id) }}" class="btn btn-primary mt-2"><img
                                                    src="https://img.icons8.com/material-outlined/20/000000/edit--v3.png" /></a>
                                            <button class="btn btn-danger mt-2" data-toggle="modal"
                                                data-target="#exampleModal{{ $pizza->id }}" type="button"><img
                                                    src="https://img.icons8.com/external-kiranshastry-solid-kiranshastry/20/000000/external-delete-miscellaneous-kiranshastry-solid-kiranshastry.png" /></button>
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal{{ $pizza->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <form action="{{ route('pizza.destroy', $pizza->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                    confirmation
                                                                </h5>
                                                                <button type="button" class="close"
                                                                    data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure to eliminate this product?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-danger">Delete
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No pizzas to show</p>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $pizzas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
