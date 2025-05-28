<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
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
        $sales = Sale::with('product')->get();

        $products = Product::pluck('name', 'id')

        // for use with JavaScript        
        $products_profit = Product::pluck('profit', 'id');

        $products_profit = json_encode($products_profit);

        return view('coffee_sales', ['sales' => $sales,
                                    'products' => $products,
                                    'products_profit' => $products_profit]);
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

            $sale = new Sale;

            $sale->product_id = $request->product_id;
            $sale->qty = $request->quantity;
            $sale->unit_cost = ($request->unit_cost * $covert_to_pence);
            $sale->selling_price = ($request->selling_price * $covert_to_pence);

            $sale->save();

            return Redirect::route('coffee.sales')->with('success', 'Sale created successfully.');

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
