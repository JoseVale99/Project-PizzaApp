<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaStoreRequest;
use App\Models\Pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    //  Return the main view of orders
    public function index()
    {
      return  view('pizza.index');
    }


    public function create()
    {
        return view('pizza.create');
    }

 
    public function store(PizzaStoreRequest $request)
    {

        $path = $request->image->store('public/pizza');
        
      Pizza::create(
          [
              'name' => $request->name,
              'description' => $request->description,
              'small_pizza_price' => $request->small_pizza_price,
              'medium_pizza_price' => $request->medium_pizza_price,
              'large_pizza_price' => $request->large_pizza_price,
              'category' => $request->category,
              'image' => $path
          ]
      );

      return redirect()->route('pizza.index');
    }

 
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
