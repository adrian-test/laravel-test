<x-app-layout>

       <script>
        
        function calculateSum(){

         var quantity = document.getElementById("quantity").value===""?1:document.getElementById("quantity").value;
         var unit_cost = document.getElementById("unit_cost").value===""?0:document.getElementById("unit_cost").value;

         var json = JSON.parse('{!! $products_profit !!}');

         var index = document.getElementById("products").value;

         var profit_margin = json[index];

         var symbol = '£';

         var cost = quantity * unit_cost;

         var Shipping_cost = 10;

         var selling_price = (cost / ( 1 - profit_margin ) ) + Shipping_cost;

             if(selling_price > 0){

                document.getElementById("selling_price").innerText = symbol + selling_price.toFixed(2);

                document.getElementsByName("selling_price")[0].setAttribute("value", selling_price.toFixed(2));

                document.getElementsByName("product_id")[0].setAttribute("value", index);
             }            
         }
        
       </script>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New ☕️ Sales') }}
        </h2>
    </x-slot>

            @if(Session::has('success'))

        <div class="alert alert-success">

            {{ Session::get('success') }}

            @php

                Session::forget('success');

            @endphp

        </div>

        @endif

        <!-- Display All Error Messages -->
        @if ($errors->any())

            <div class="alert alert-danger">

                <strong>Error: </strong> There were some problems with your input.<br><br>

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form class="row g-3" method="POST" action="/sale-made">

                      @csrf

                        <div class="col-md-2">
                        <label for="products">Product</label>    
                        <select class="form-select" name="products" id="products">

                            @if(isset($products))
                                    
                                @foreach ($products AS $id => $name)

                                  <option value="{{ $id }}" 

                                    @if($id ==1)

                                    selected

                                    @endif

                                    >{{ $name  }} </option>                         
                                
                                @endforeach

                            @endif

                        </select>
                        </div>

                      <div class="col-md-2">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity"
                        name="quantity" placeholder="" onkeyup="calculateSum()">
                    @error('quantity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                      </div>


                      <div class="col-md-2">
                        <label for="unit_cost" class="form-label">Unit Cost (£)</label>
                        <input type="number" class="form-control" id="unit_cost" name="unit_cost" placeholder="" onkeyup="calculateSum()">
                      </div>


                      <div class="col-md-2">
                        <label for="selling_price" class="form-label">Selling Price</label>
                        <p id="selling_price">£00.00</p>
                      </div>

                      <div class="col-md-2">
                        <label for="unit_cost" class="submit_button">Save Sale</label>
        
                        <button class="btn button-temp" type="submit" id="submit_button">Record Sale</button>

                      </div>

                      <input type="hidden" name="selling_price" value="">

                      <input type="hidden" name="product_id" value="">

                    </form>
                    <div class="mt-3">                        
                
                        <h1>
                            {{ __('Previous Sales') }}
                        </h1>
                    
                    </div>

                        <div>

                        <table class="table table-bordered table-striped">
                          <thead>
                            <tr class="bg-primary"  >
                              <th scope="col">Product</th>  
                              <th scope="col">Quantity</th>
                              <th scope="col">Unit Cost</th>
                              <th scope="col">Selling Price</th>
                            </tr>
                          </thead>
                          <tbody>

                            @if(isset($sales))
                                    
                                @foreach ($sales as $sale)

                                    <tr>      
                                        <td>{{ $sale['product']['name'] }}</td>  
                                        <td>{{ $sale['qty'] }}</td>     
                                        <td>£{{ number_format($sale['unit_cost']/100, 2) }}</td>      
                                        <td>£{{ number_format($sale['selling_price']/100, 2) }}</td>    
                                    </tr>    
                                
                                @endforeach

                            @endif

                          </tbody>
                        </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
