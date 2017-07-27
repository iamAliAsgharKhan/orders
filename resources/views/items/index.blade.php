@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading">
                <form action="/items/create">
                    <button class="btn btn-default">Create New Item</button>
                </form>
            </div>
          </div>


            <table class="table table-bordered">
                <tr>
                    <td>Product</td>
                    <td>Sku</td>
                    <td>Description</td>
                    <td>Quantity</td>
                </tr>
                @foreach( $items as $item )
                    <tr>
                        <td>
                            <a href="/items/{{ $item->id }}">{{ $item->product }}</a>
                        </td>
                        <td>{{ $item->sku }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->quantity }}</td>
                    </tr>
                @endforeach
            </table>
        
        </div>
    </div>
</div>
@endsection
