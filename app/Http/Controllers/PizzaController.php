<?php

namespace App\Http\Controllers;

use App\Http\Requests\PizzaStoreRequest;
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
