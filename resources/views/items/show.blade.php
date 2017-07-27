@extends('layouts.app')

@section('content')
<div class="container   ">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="/items/{{$item->id}}/edit">
                        <button class="btn btn-default">Edit</button>
                    </form>
                </div>
            </div>


            <table class="table table-bordered">
                <tr>
                    <td>Product</td>
                    <td>Quantity</td>
                    <td>Sku</td>
                    <td>Description</td>
                </tr>
                
                    <tr>
                        <td>
                            <a href="/items/{{ $item->id }}">{{ $item->product }}</a>
                        </td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->sku }}</td>
                        <td>{{ $item->description }}</td>
                    </tr>

            </table>

            <table class="table table-bordered">
                
                <tr>
                    <td>Supplier ID</td>
                    <td>Supplier</td>
                </tr>
                @foreach($item->supplier as $supplier)
                <tr>
                    
                    <td>
                    <a href="/suppliers/{{$supplier->id}}">{{$supplier->id}}</a>
                    </td>
                    <td>
                    <a href="/suppliers/{{$supplier->id}}">{{$supplier->name}}</a>
                    </td>

                </tr>
                @endforeach

            </table>
            
            <table class="table table-bordered">

                <tr>
                    
                    <td>Order</td>
                    <td>Quantity</td>
                    <td>Item Cost</td>
                    <td>Unit Cost</td>
                    <td>total Cost</td>

                </tr>
            

                @foreach( $item->orderlines as $orderlines )

                    <tr>

                        <td><a href="/orders/{{$orderlines->order_id}}">{{$orderlines->order_id}}</a></td>
                        <td>{{$orderlines->quantity}}</td>
                        <td>{{$orderlines->item_cost}}</td>
                        <td>{{$orderlines->unit_cost}}</td>
                        <td>{{$orderlines->total_cost}}</td>
                        
                    </tr>

                @endforeach
                
            </table>

        
        </div>
    </div>
</div>
@endsection
