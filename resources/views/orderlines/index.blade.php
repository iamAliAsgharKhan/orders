@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <table class="table table-bordered">
                <tr>
                    <td>Order ID</td>
                    <td>Supplier</td>
                    <td>Supplier ID</td>
                    <td>Order Date</td>
                </tr>

                <tr>
                    <td><a href="/orders/{{ $orders->id }}">{{ $orders->id }}</a></td>
                    <td><a href="/suppliers/{{ $orders->supplier_id }}">{{ $orders->supplier }}</a></td>
                    <td><a href="/suppliers/{{ $orders->supplier_id }}">{{ $orders->supplier_id }}</a></td>
                    <td>{{ $orders->order_date }}</td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <td>ID</td>
                    <td>Item ID</td>
                    <td>Item</td>
                    <td>Quantity</td>
                    <td>Item Cost</td>
                    <td>Unit Cost</td>
                    <td>Total Cost</td>
                </tr>
                    @foreach( $orders->orderlines as $orderline )
                        <tr>
                            <td><a href="/orderlines/{{ $orderline->id }}">{{ $orderline->id }}</a></td>
                            <td><a href="/items/{{ $orderline->item_id }}">{{ $orderline->item_id }}</a></td>
                            <td><a href="/items/{{ $orderline->item }}">{{ $orderline->item }}</a></td>
                            <td>{{ $orderline->quantity }}</td>
                            <td>{{ $orderline->item_cost }}</td>
                            <td>{{ $orderline->unit_cost }}</td>
                            <td>{{ $orderline->total_cost }}</td>
                        </tr>
                    @endforeach
            </table>
        
        </div>
    </div>
</div>
@endsection
