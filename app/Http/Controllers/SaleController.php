<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $sales = Sale::all();

        return view('coffee_sales', ['sales' => $sales]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request);

         $product_id = 1;

         $covert_to_pence = 100;


        $validatedData = $request->validate([
                'quantity'       => 'required|numeric',
                'unit_cost'      => 'required|numeric',
                'selling_price' => 'required|numeric'
            ], [
                'quantity.required' => 'Quantity is required.',
                'unit_cost.required' => 'Unit Cost is required.',
                'selling_price.required' => 'Selling Price is required.',
                ]);







            // validate
        // read more on validation at http://laravel.com/docs/validation
        // $rules = array(
        //     'qty'       => 'required|numeric',
        //     'unit_cost'      => 'required|numeric',
        //     'selling_price' => 'required|numeric'
        // );
        // $validator = Validator::make(Input::all(), $rules);

        // Validate the request
            // $validated = $request->validate([
            //     'qty' => 'required|numeric',
            //     'unit_cost' => 'required|numeric',
            //     'selling_price' => 'required|numeric',
            // ]);

// dd('after validate');


//         // process the login
//         if ($validated->fails()) {

// dd('validated NOT');

// dd($validated);


//             return Redirect::to('/coffee_sales')
//                 ->withErrors($validated)
//                 ->withInput();
//         } else {

// dd('validated NOT');

            // store
            $sale = new Sale;

            $sale->product_id = $product_id;
            $sale->qty = $request->quantity;
            $sale->unit_cost = ($request->unit_cost * $covert_to_pence);
            $sale->selling_price = ($request->selling_price * $covert_to_pence);

            $sale->save();

            

            // redirect
            // return Redirect::route('coffee.sales')->with( ['sales' => $sales] );

            return Redirect::route('coffee.sales')->with('success', 'Sale created successfully.');

            // return back()->with(['success' =>'sale created successfully!',
            //                         'sales' => $sales]);

//         }



    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
