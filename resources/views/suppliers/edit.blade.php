@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Edit Item</div>

                <div class="panel-body">
                   

                        <form action="/suppliers/{{ $supplier->id }}/update" method="POST">

                          <input name="_method" type="hidden" value="PUT">


                            {{ csrf_field() }}
                           
                            <div class="form-group"> 
                               <label for="name">Name:</label>
                               <input name="name" class="form-control" value="{{ $supplier->name }}">
                            </div>
                       
                           <div class="form-group">
                               <label for="address">Address:</label>
                               <input name="address" class="form-control" value="{{ $supplier->address }}">
                           </div>
                       
                           <div class="form-group">
                               <label for="city">city:</label>
                               <input name="city" class="form-control" value="{{ $supplier->city }}">
                           </div>
                       
                           <div class="form-group">
                               <label for="state">state:</label>
                               <input name="state" class="form-control" value="{{ $supplier->state }}">
                           </div>

                           <div class="form-group">
                               <label for="country">country:</label>
                               <input name="country" class="form-control" value="{{ $supplier->country }}">
                           </div>

                           <div class="form-group">
                               <label for="zipcode">zipcode:</label>
                               <input name="zipcode" class="form-control" value="{{ $supplier->zipcode }}">
                           </div>

                           <div class="form-group">
                               <label for="email">email:</label>
                               <input name="email" class="form-control" value="{{ $supplier->email }}">
                           </div>

                           <div class="form-group">
                               <label for="phone">phone:</label>
                               <input name="phone" class="form-control" value="{{ $supplier->phone }}">
                           </div>

                           <div class="form-group">
                               <label for="fax">fax:</label>
                               <input name="fax" class="form-control" value="{{ $supplier->fax }}">
                           </div>
                       
                           <div class="form-group">
                             <button class="btn btn-primary">Submit</button>
                           </div>
                       
                        </form>

                        <div class="form-group">
                    
                          <form action="/suppliers/{{ $supplier->id }}" method="POST">
                            
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
