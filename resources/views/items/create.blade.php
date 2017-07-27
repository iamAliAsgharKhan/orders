@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Add Item</div>

                <div class="panel-body">
                   

                        <form action="/items" method="POST">

                            {{ csrf_field() }}
                           
                            <div class="form-group"> 
                               <label for="product">Porduct Name:</label>
                               <input name="product" class="form-control">
                            </div>
                       
                           <div class="form-group">
                               <label for="sku">Sku:</label>
                               <input name="sku" class="form-control">
                           </div>
                       
                           <div class="form-group">
                               <label for="quantity">Quantity:</label>
                               <input name="quantity" class="form-control">
                           </div>
                       

                           <div class="form-group">
                               <label for="description">Description:</label>
                               <textarea name="description" class="form-control" cols="3" rows="2"></textarea>
                           </div>
                       
                           <div class="form-group">
                               <label for="supplier">Supplier:</label>
                               <select class="form-control" name="supplier">
                                 @foreach($suppliers as $supplier)
                                  <option>{{$supplier->name}}</option>
                                 @endforeach
                               </select>
                           </div>

                           <button class="btn btn-primary">Submit</button>
                       
                        </form> 

                    </div>
    
                </div>
            
            </div>
        
        </div>
    </div>
</div>
@endsection
