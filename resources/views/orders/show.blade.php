@extends('layouts.app')

@section('content')
<div class="container   ">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form action="/orders/{{$order->id}}/edit">
                        <button class="btn btn-default">Edit</button>
                    </form>
                </div>
            </div>

            <table id="order_details" class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>Supplier</td>
                    <td>Supplier ID</td>
                    <td>Order Date</td>

                </tr>
                
                <tr>
                    <td>
                        {{ $order->id }}
                    </td>
                    <td>{{ $order->supplier }}</td>
                    <td>{{ $order->supplier_id }}</td>
                    <td>{{ $order->order_date }}</td>
                </tr>

            </table>

            <table id="orderlines" class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>Item ID</td>
                    <td>Item</td>
                    <td>Quantity</td>
                    <td>Item Cost</td>
                    <td>Unit Cost</td>
                    <td>Total Cost</td>
                    <td>Reorder</td>

                </tr>
                    @foreach( $order->orderlines as $orderline )
                        <tr>
                            <td><a href="/orderlines/{{ $orderline->id }}">{{ $orderline->id }}</a></td>
                            <td><a href="/items/{{ $orderline->item_id }}">{{ $orderline->item_id }}</a></td>
                            <td><a href="/items/{{ $orderline->item_id }}">{{ $orderline->item }}</a></td>
                            <td>{{ $orderline->quantity }}</td>
                            <td>{{ $orderline->item_cost }}</td>
                            <td>{{ $orderline->unit_cost }}</td>
                            <td>{{ $orderline->total_cost }}</td>
                            <td>{{ $orderline->reorder }}</td>

                        </tr>
                    @endforeach
            </table>
        
        </div>
    </div>
</div>
@endsection
