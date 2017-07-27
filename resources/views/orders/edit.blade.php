@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Add Order</div>

                <div class="panel-body">
                   

                        <form action="/orders/{{$order->id}}/update" method="POST">

                          {{ csrf_field() }}
                          <input name="_method" type="hidden" value="PUT">
                          <input name="order_id" type="hidden" value="{{$order->id}}">



                           <div class="form-group">
                              <label for="supplier">Supplier</label>
                              <div>
                                <select class="form-control" id="sel1" name="supplier">
                                  @php
                                    foreach($suppliers as $supplier)
                                    {
                                      if( $supplier->name == $order->supplier)
                                      {
                                        echo('<option selected ="selected">'. $supplier->name . '</option>');
                                      }else{
                                        echo('<option>'. $supplier->name .'</option>');
                                      }
                                    }
                                  @endphp
                                </select>
                              </div>
                           </div>

                           <div class="form-group">
                            <label for="order_date">Order Date</label>
                            <div><input name="order_date" class="form-control" value="{{$order->order_date}}"></div>
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
                            
                            @foreach($orderlines as $orderline)
                              <tr id="row0">

                                <input name="orderline_id[]" type="hidden" value="{{$orderline->id}}">

                                <td>
                                  <div class="form-group">
                                    <select class="form-control" id="sel1" name="item[]">

                                      @php
                                        $lineItem = $orderline->item;
                                        foreach($items as $item)
                                        {
                                          if( $item->product == $lineItem)
                                          {
                                            echo('<option selected ="selected">'. $item->product . '</option>');
                                          }else{
                                            echo('<option>'. $item->product .'</option>');
                                          }
                                        }
                                      @endphp

                                    </select>
                                  </div>
                                </td>
                           
                           
                                 <td>
                                   <div class="form-group">
                                       <input name="quantity[]" class="form-control" value="{{$orderline->quantity}}">
                                   </div>
                                 </td>
                             
                                 <td>
                                   <div class="form-group">
                                       <input name="item_cost[]" class="form-control" value="{{$orderline->item_cost}}">
                                   </div>
                                 </td>

                                 <td>
                                   <div class="form-group">
                                       <input name="unit_cost[]" class="form-control" value="{{$orderline->unit_cost}}">
                                   </div>
                                 </td>

                                 <td>
                                   <div class="form-group">
                                       <input name="total_cost[]" class="form-control" value="{{$orderline->total_cost}}">
                                   </div>
                                 </td>

                                 <td>
                                   <div class="form-group">
                                       <select class="form-control" id="sel1" name="reorder[]">
                                        @php
                                          $options = array('ok','no');
                                          foreach($options as $option)
                                            {
                                              $lineReorder = $orderline->reorder;
                                              if( $option == $lineReorder)
                                              {
                                                echo('<option selected ="selected">'. $lineReorder . '</option>');
                                              }else{
                                                echo('<option>'. $option .'</option>');
                                              }
                                            }
                                        @endphp
                                       </select>
                                   </div>
                                 </td>

                                 <td><input class="btn btn-default" type="button" value="Delete" onclick="deleteRow(this)"></td>
                                 
                              </tr>
                            @endforeach

                            <tr id="row1"></tr>

                          </table>

                            <div class="form-group">
                              <a id="add_row" class="btn btn-default pull-left">Add Row</a>
                            </div>
                       
                           <button class="btn btn-primary">Submit</button>
                       
                        </form>

                        <div class="form-group">
                          <form action="/orders/{{$order->id}}/delete" method="POST">

                            <input type="hidden" name="_method" value="DELETE">
                            
                            {{ csrf_field() }}

                            @foreach($orderlines as $orderline)

                              <input name="orderline_id[]" type="hidden" value="{{$orderline->id}}">

                            @endforeach
                            
                            <button type="submit" class="btn btn-danger">Delete Order</button>

                          </form>
                        </div>

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
