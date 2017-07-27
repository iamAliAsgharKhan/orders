@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="/orders/create">
                        <button class="btn btn-default">Create New Order</button>
                    </form>
                </div>
            </div>

            <table class="table table-bordered">
                <tr>
                    <td>ID Number</td>
                    <td>Order Date</td>
                    <td>Supplier</td>

                </tr>
                @foreach( $orders as $order )
                    
                        <tr>
                            <td class="text-center">
                                <a href="/orders/{{ $order->id }}">
                                    {{ $order->id }}
                                </a>
                            </td>
                            <td>{{ $order->order_date }}</td>
                            <td>
                                <a href="/suppliers/{{ $order->supplier_id }}">
                                    {{ $order->supplier }}
                                </a>
                            </td>
                        </tr>
                    
                @endforeach
            </table>
        
        </div>
    </div>
</div>
@endsection
