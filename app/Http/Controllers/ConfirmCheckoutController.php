<?php
namespace App\Http\Controllers;

use Auth;
use \Cart;
use Session;
use App\Models\Slot;
use App\Models\Order;
use App\Domain\Helpers;
use App\Models\OrderSlot;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Models\OrderProduct;

class ConfirmCheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $basket = Helpers::getCartSummary();

        $order = Cart::content();

        $slot = Slot::find(Session::get('order_details.slot_id'));
        $slots = Slot::getSingleDaySlots(Session::get('order_details.delivery_date'), $slot->day_of_week);


        $address = UserAddress::find(Session::get('order_details.user_address_id'));
        $addresses = UserAddress::where('user_id', Auth::user()->id)->get();

        $options = array_merge($address->toArray(), Session::get('order_details'));

        $options['slot'] = $slot->toArray();

        // dd($basket);

        return view('checkout.confirm', compact('basket', 'order', 'options', 'addresses', 'slots'));
    }

    public function checkout(Request $request)
    {
        if($request->isMethod('post')){
            // dd("jd");

            $slot_id = $request->slot_id? $request->slot_id: Session::get('order_details.slot_id');
            $user_address_id =  isset($request->user_address_id)? $request->user_address_id: Session::get('order_details.user_address_id');
            $basket = Helpers::getCartSummary();
            $items = Cart::content();

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'status' => 'processing',
                'total' => $basket['total'],
                'delivery_fee' => $basket['taxes']['delivery_fee'],
                'service_charge' => $basket['taxes']['service_charge'],
                'delivery_instruction' => Session::get('order_details.delivery_instruction'),
                'user_address_id' => $user_address_id,
                'receiver_phone' => Session::get('order_details.receiver_phone'),
                'order_unique_reference' => " ",
                'payment_status' => 'unpaid'
            ]);

            $order->order_unique_reference = Helpers::generateOrderReference($order->id);
            $order->save();

            $order->orderSlot()->save(new OrderSlot([
                'slot_id' => $slot_id,
                'delivery_date' => Session::get('order_details.delivery_date')
            ]));

            $order_product = [];

            foreach($items as $item){
                $order_product[] = new OrderProduct([
                    'product_id' => $item->id,
                    'qty' => $item->qty,
                    'price' => $item->price,
                    'sub_total' => round($item->price * $item->qty,2),
                ]);
            }

            $order->orderProducts()->saveMany($order_product);
        }

        return redirect('/checkout/payment/'.$order->order_unique_reference);
    }
}