<?php

namespace App\Http\Controllers;

use App\Item;
use App\Order;
use App\Orderlines;
use App\Supplier;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Item::all();
        $suppliers = Supplier::all();
        return view('orders.create', compact(['items','suppliers']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->all();

        // var_dump($input['item']);
        // die();

        $supplier = Supplier::where('name', '=', $input['supplier'])->get();


        $order = Order::create([

                    'supplier' => $supplier[0]->name,
                    'supplier_id' => $supplier[0]->id,
                    'order_date' => date('Y-m-d'),

                    ]);

        $orderId = $order->id;



        for( $i = 0; $i < count($input['item']); $i++ ) 
        {
            $item = Item::where('product', '=', $input['item'][$i])->get();

            Orderlines::create([

                'order_id' => $orderId,
                'item_id' => $item[0]->id,
                'item' => $input['item'][$i],
                'quantity' => $input['quantity'][$i],
                'unit_cost' => $input['unit_cost'][$i],
                'item_cost' => $input['item_cost'][$i],
                'total_cost' => $input['total_cost'][$i],
                'reorder' => $input['reorder'][$i]


                ]);
        }


        return redirect('/orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $items = Item::all();
        $suppliers = Supplier::all();
        $orderlines = Orderlines::where('order_id', $order->id)->get();
        return view('orders.edit', compact(['items','suppliers','orderlines','order']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $input = $request->all();

        // dd($input);

        $supplier = Supplier::where('name', '=', $input['supplier'])->get();


        $order = Order::find($order->id)->update([

                    'supplier' => $supplier[0]->name,
                    'supplier_id' => $supplier[0]->id,
                    'order_date' => $input['order_date'],

                    ]);

        for( $i = 0; $i < count($input['orderline_id']); $i++ ) 
        {
            $item = Item::where('product', '=', $input['item'][$i])->get();

            Orderlines::find($input['orderline_id'][$i])->update([

                'order_id' => $input['order_id'],
                'item_id' => $item[0]->id,
                'item' => $input['item'][$i],
                'quantity' => $input['quantity'][$i],
                'unit_cost' => $input['unit_cost'][$i],
                'item_cost' => $input['item_cost'][$i],
                'total_cost' => $input['total_cost'][$i],
                'reorder' => $input['reorder'][$i]


                ]);
        }

        for( $i = count($input['orderline_id']) ; $i < count($input['item']); $i++ ) 
        {
            $item = Item::where('product', '=', $input['item'][$i])->get();

            Orderlines::create([

                'order_id' => $input['order_id'],
                'item_id' => $item[0]->id,
                'item' => $input['item'][$i],
                'quantity' => $input['quantity'][$i],
                'unit_cost' => $input['unit_cost'][$i],
                'item_cost' => $input['item_cost'][$i],
                'total_cost' => $input['total_cost'][$i],
                'reorder' => $input['reorder'][$i]


                ]);
        }

        return redirect('/orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Order $order)    
    {
        $input = $request->all();
        // dd($input);


        for( $i = count($input['orderline_id']); $i < count(['orderline_id']); $i++)
        {
            Orderline::find($input['orderline_id'][$i])->delete();
        }

        Order::find($order->id)->delete();

        return redirect('/orders');
    }
}
