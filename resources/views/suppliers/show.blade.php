@extends('layouts.app')

@section('content')
<div class="container   ">
    <div class="row">
        <div class="col-md-12 ">
            <div class="panel panel-default">
               <div class="panel-heading">
                    <form action="/suppliers/{{$supplier->id}}/edit">
                        <button class="btn btn-default">Edit</button>
                    </form>  
                </div>
            </div>

            <table class="table table-bordered">
                <tr>
                    <td>Name</td>
                    <td>Address</td>
                    <td>City</td>
                    <td>State</td>
                    <td>Zipcode</td>
                    <td>Coutry</td>
                    <td>Email</td>
                    <td>Phone</td>
                    <td>Fax</td>
                </tr>
                
                    <tr>
                        <td>
                            <a href="/suppliers/{{ $supplier->id }}">{{ $supplier->name }}</a>
                        </td>
                        <td>{{ $supplier->address }}</td>
                        <td>{{ $supplier->city }}</td>
                        <td>{{ $supplier->state }}</td>
                        <td>{{ $supplier->zipcode }}</td>
                        <td>{{ $supplier->country }}</td>
                        <td>{{ $supplier->email }}</td>
                        <td>{{ $supplier->phone }}</td>
                        <td>{{ $supplier->fax }}</td>
                    </tr>

            </table>

            <table class="table table-bordered">
                <tr>
                    <td class="text-center">Order Number</td>
                    <td class="text-center">Order Date</td>
                </tr>

                @foreach($supplier->orders as $order)
                <tr>
                    <td class="text-center">
                        <a href="/orders/{{$order->id}}">{{$order->id}}</a>
                    </td>
                    <td class="text-center">{{$order->order_date}}</td>
                </tr>
                @endforeach

            </table>
        
        </div>
    </div>
</div>
@endsection
