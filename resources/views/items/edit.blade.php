@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Edit Item</div>

                <div class="panel-body">
                   

                  <form action="/items/{{ $item->id }}/update" method="POST">

                    <input name="_method" type="hidden" value="PUT">

                      {{ csrf_field() }}
                     
                      <div class="form-group"> 
                         <label for="product">Porduct Name:</label>
                         <input name="product" class="form-control" value="{{ $item->product }}">
                      </div>
                 
                       <div class="form-group">
                           <label for="sku">Sku:</label>
                           <input name="sku" class="form-control" value="{{ $item->sku }}">
                       </div>
                   
                       <div class="form-group">
                           <label for="quantity">Quantity:</label>
                           <input name="quantity" class="form-control" value="{{ $item->quantity }}">
                       </div>
                   
                       <div class="form-group">
                           <label for="description">description:</label>
                           <input name="description" class="form-control" value="{{ $item->description }}">
                       </div>
                   
                       <div class="form-group">
                         <button class="btn btn-primary">Submit</button>
                       </div>
                 
                  </form> 

                  <div class="form-group">
                    
                    <form action="/items/{{ $item->id }}" method="POST">
                      
                      <input type="hidden" name="_method" value="DELETE">
                      {{ csrf_field() }}
                      <button type="submit" class="btn btn-danger">DELETE</button>

                    </form>

                  </div>

                </div>
    
                </div>
            
            </div>
        
        </div>
    </div>
</div>
@endsection
