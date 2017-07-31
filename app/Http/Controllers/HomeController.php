<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $completed_orders = Order::GetOrderDetails(\Auth::user()->id, 'delivered')->get();

        $pending_orders = Order::GetOrderDetails(\Auth::user()->id, 'pending')->get();

        return view('account.index', compact('completed_orders', 'pending_orders'));
    }

    public function orders()
    {

        $completed_orders = Order::GetOrderDetails(\Auth::user()->id, 'delivered')->get();

        $confirmed_orders = Order::GetOrderDetails(\Auth::user()->id, 'confirmed')->get();

        $gone_to_market = Order::GetOrderDetails(\Auth::user()->id, 'gone-to-market')->get();

        $pending_orders = Order::GetOrderDetails(\Auth::user()->id, 'processing')->get();

        $cancelled_orders = Order::GetOrderDetails(\Auth::user()->id, 'cancelled')->get();

        // dd($pending_orders);
        

        return view('account.my-orders', compact('completed_orders', 'cancelled_orders', 'gone_to_market', 'confirmed_orders', 'pending_orders'));
    }


    public function addresses()
    {
        $addresses = \Auth::user()->user_addresses;

        return view('account.addresses', compact('addresses'));
    }


    public function saveAddress(Request $request)
    {
        if($request->isMethod('post')){
            $this->validate($request, [
                'address' => 'required',
                'city' => 'required'
            ]);

            $address = new UserAddress($request->all());

            \Auth::user()->user_addresses()->save($address);

            return redirect()->back()->with('status_message', 'Address added');
        }
        return view('account.new-address');
    }

    public function cancelOrder($order_id)
    {
        try{
            $order = Order::findOrFail($order_id);
        }
        catch(ModelNotFoundException $e){
            return redirct()->back()->with('status', 'Order not found');
        }

        if($order->status != "delivered"){
            $order->status = "cancelled";
            $order->save();
        }

        return redirect()->back()->with('status_message', 'Order #'.$order->order_unique_reference." cancelled");
    }
}