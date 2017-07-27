@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Add Order</div>

                <div class="panel-body">
                   

                        <form action="/orders" method="POST">

                            {{ csrf_field() }}
                           <div class="form-group">
                              <label for="supplier">Supplier</label>
                              <div>
                                <select class="form-control" id="sel1" name="supplier">
                                  @foreach( $suppliers as $supplier)
                                    <option >{{ $supplier->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                           </div>

                          <table class="table table-bordered" id="orderlines">

                            <tr>
                                <td><label for="item">Item</label></td>
                                <td><label for="quantity">Quantity</label></td>
                                <td><label for="item_cost">Item Cost</label></td>
                                <td><label for="unit_cost">Unit Cost</label></td>
                                <td><label for="total_cost">Total Cost</label></td>
                                <td><label for="redorder">Redorder</label></td>
                                <td><label >Delete</label></td>
                                
                            </tr> 
                            
                            <tr id="row0">

                              <td>
                                <div class="form-group">
                                  <select class="form-control" id="sel1" name="item[]">
                                    @foreach($items as $item)
                                      <option>{{ $item->product }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </td>
                         
                         
                               <td>
                                 <div class="form-group">
                                     <input name="quantity[]" class="form-control">
                                 </div>
                               </td>
                           
                               <td>
                                 <div class="form-group">
                                     <input name="item_cost[]" class="form-control">
                                 </div>
                               </td>

                               <td>
                                 <div class="form-group">
                                     <input name="unit_cost[]" class="form-control">
                                 </div>
                               </td>

                               <td>
                                 <div class="form-group">
                                     <input name="total_cost[]" class="form-control">
                                 </div>
                               </td>

                               <td>
                                 <div class="form-group">
                                     <select class="form-control" id="sel1" name="reorder[]">
                                        <option>ok</option>
                                        <option>no</option>
                                     </select>
                                 </div>
                               </td>

                               <td><input class="btn btn-default" type="button" value="Delete" onclick="deleteRow(this)"></td>
                               
                            </tr>

                            <tr id="row1"></tr>

                          </table>

                            <a id="add_row" class="btn btn-default pull-left">Add Row</a>
                       
                           <button class="btn btn-primary">Submit</button>
                       
                        </form> 

                    </div>
    
                </div>
            
            </div>
        
        </div>
    </div>
</div>

<script type="text/javascript">
  var products = [
    @foreach($items as $item)
      '<option>{{ $item->product }}</option>',
    @endforeach
    ];

  function deleteRow(r) {
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("orderlines").deleteRow(i);
  }
</script>

@endsection
