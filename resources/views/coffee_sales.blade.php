<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New ☕️ Sales') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="row g-3">
                      <div class="col-md-3">
                        <label for="inputEmail4" class="form-label">Quantity</label>
                        <input type="email" class="form-control" id="inputEmail4">
                      </div>
                      <div class="col-md-3">
                        <label for="inputPassword4" class="form-label">Unit Cost (£)</label>
                        <input type="password" class="form-control" id="inputPassword4">
                      </div>
                      <div class="col-md-3">
                        <label for="inputPassword4" class="form-label">Selling Price</label>
                        <!-- <input type="password" class="form-control" id="inputPassword4"> -->
                        <p>£20.00</p>
                      </div>

                      <div class="col-md-3">
                        <button type="submit" class="button-temp">Record Sale</button>
                        <!-- <button type="submit" class="btn btn-primary">Sign in</button> -->
                        <!-- <label for="inputPassword4" class="form-label">...</label> -->
                        <!-- <input type="button">Record Sale</button> -->
                         <!-- <input type="submit" value="Submit"> -->

                      </div>

                    </form>
                    <div>
                        
                         <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-3">
                            {{ __('Previous Sales') }}
                        </h2>

                    </div>

<!--                         <div class="container">
                          <div class="row">
                            <div class="col">
                              Quantity
                            </div>
                            <div class="col">
                              Unit Cost
                            </div>
                            <div class="col">
                              Selling Price
                            </div>
                          </div>

                          <div class="row">
                            <div class="col">
                              1
                            </div>
                            <div class="col">
                              £10.00
                            </div>
                            <div class="col">
                              £23.33
                            </div>
                          </div>
                        </div> -->


<!--                         <div class="container">
                          <div class="row">
                            <div class="col">
                              1 of 2
                            </div>
                            <div class="col">
                              2 of 2
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              1 of 3
                            </div>
                            <div class="col">
                              2 of 3
                            </div>
                            <div class="col">
                              3 of 3
                            </div>
                          </div>
                        </div> -->

                        <div>
<!--                             
                            <table>
                                
                                <tr>
                                  <td class="table-primary">Quantity</td>
                                  <td class="table-secondary">Unit Cost</td>
                                  <td class="table-success">Selling Price</td>
                                </tr> 

                                  <tr>
                                  <td class="table-danger">1</td>
                                  <td class="table-warning">£10.00</td>
                                  <td class="table-info">£23.33</td>
                                </tr>

                            </table> -->


        <table class="table-fixed">  
            <thead>    
                <tr>     
                 <th>Quantity</th>      
                 <th>Unit Cost</th>      
                 <th>Selling Price</th>    
             </tr>  
         </thead>  
         <tbody>    
  
            <tr>      
                <td>1</td>     
                 <td>£10.00</td>      
                 <td>1972</td>    
             </tr>    

         </tbody>

     </table>



                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
