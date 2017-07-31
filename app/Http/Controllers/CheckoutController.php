<?php
namespace App\Http\Controllers;

use Auth;
use \Cart;
use Session;
use App\User;
use Carbon\Carbon;
use App\Models\Slot;
use App\Models\Order;
use App\Models\Role;
use App\Models\Charge;
use App\Domain\Helpers;
use App\Models\OrderSlot;
use App\Models\Transaction;
use App\Models\UserAddress;
use App\Models\OrderProduct;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['billingAddress']);
    }

    public function billingAddress(Request $request)
    {
        $charge =  Charge::pluck('percentage');

        if(Auth::user())
            return redirect('/checkout/choose-address')->with('charge', $charge);

        if($request->isMethod('post')){
            // dd("kk");

            $this->validate($request,[
                'phone' => 'required|digits:11',
                'address' => 'required|min:10',
                'city' => 'required|min:3|alpha',
                'password' => 'required',
                'first_name' => 'required|alpha',
                'last_name' => 'required|alpha',
                'email' => 'required|unique:users'
            ]);


            $new_user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
            ]);

            $token = bcrypt($new_user->email);

            \DB::table("password_resets")->insert([
                'email' => $new_user->email,
                'token' => $token
            ]);

            $role = Role::where('name', 'User')->first();

            $new_user->role()->associate($role);

            $new_user->save();

            $new_address = new UserAddress([
                                'address' => $request->address,
                                'city' => $request->city
                            ]);


            $new_user->user_addresses()->save($new_address);

            if($request->instruction)
                Session::put('order_details.delivery_instruction', $request->instruction);

            if (Auth::attempt(['email'=> $request->email, 'password' => $request->password])) {

                return redirect()->intended('/checkout/choose-address');
            }


            return redirect()->intended('/checkout/choose-address');
        }

        $basket = Helpers::getCartSummary();

        return view('checkout.address', compact('basket', 'charge'));
    }


    public function chooseAddress(Request $request)
    {
        $basket = Helpers::getCartSummary();

        $charge = Charge::pluck('percentage');

        // dd($charge);

        $addresses = UserAddress::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        if($request->isMethod('post'))
        {
            // dd("ks");

            $this->validate($request, [
                'address' => 'integer|required',
                'receiver_no' => 'required|digits:11',
            ]);
            // dd($request->receiver_no);
            if(!\Auth::user()->phone){
                \Auth::user()->phone = $request->receiver_no;
                \Auth::user()->save();
            }

            Session::put('order_details.user_address_id', $request->address);

            if($request->receiver_no)
                Session::put('order_details.receiver_phone', $request->receiver_no);
            return redirect('/checkout/choose-delivery-slot')->with('charge', $charge);
        }

        return view('checkout.choose-address', compact('basket', 'addresses', 'charge'));
    }


    public function payment(Request $request)
    {
        $total = 0;

         $items = Cart::content();

         foreach ($items as $item) {
             $total += $item->price * $item->qty;
         }

         $charges = Charge::all();

         $charges_subtotal = 0;

         foreach ($charges as $charge) {

            if($charge['percentage'] <= 0)
                $charges_subtotal += $charge['fixed_amount'];
            else
                $charges_subtotal += $total * ($charge['percentage']/100);
         }

         $total +=  $charges_subtotal;
    }

    public function makeOrder(Request $request)
    {
        $total = 0;

        $items = Cart::content();

        foreach ($items as $item) {
            $total += $item->price * $item->qty;
        }

        $charges = Charge::all();

        $charges_subtotal = 0;

        foreach ($charges as $charge) {
            if($charge['percentage'] <= 0)
                $charges_subtotal += $charge['fixed_amount'];
            else
                $charges_subtotal += $total * ($charge['percentage']/100);
        }

        $total += $charges_subtotal;

        $order = Order::create([
             'user_id' => Auth::user()->id,
             'total' => $total,
             'status' => 'processing'
        ]);

        $transaction_arr = [
             'reference' => $request->reference,
             'status' => 'unpaid',
             'response' => 'transaction started'
        ];
        $order->transactions()->save(new Transaction($transaction_arr));
    }

}