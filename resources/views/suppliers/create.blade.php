@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <div class="panel panel-default">
                <div class="panel-heading">Add Supplier</div>

                <div class="panel-body">
                   

                        <form action="/suppliers" method="POST">

                            {{ csrf_field() }}
                           
                            <div class="form-group"> 
                               <label for="name">Name:</label>
                               <input name="name" class="form-control">
                            </div>
                       
                           <div class="form-group">
                               <label for="address">Address:</label>
                               <input name="address" class="form-control">
                           </div>
                       
                           <div class="form-group">
                               <label for="city">city:</label>
                               <input name="city" class="form-control">
                           </div>
                       
                           <div class="form-group">
                               <label for="state">state:</label>
                               <input name="state" class="form-control">
                           </div>

                           <div class="form-group">
                               <label for="country">country:</label>
                               <input name="country" class="form-control">
                           </div>

                           <div class="form-group">
                               <label for="zipcode">zipcode:</label>
                               <input name="zipcode" class="form-control">
                           </div>

                           <div class="form-group">
                               <label for="email">email:</label>
                               <input name="email" class="form-control">
                           </div>

                           <div class="form-group">
                               <label for="phone">phone:</label>
                               <input name="phone" class="form-control">
                           </div>

                           <div class="form-group">
                               <label for="fax">fax:</label>
                               <input name="fax" class="form-control">
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
