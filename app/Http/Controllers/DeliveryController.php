<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Slot;
use App\Models\Charge;
use App\Domain\Helpers;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->time_zone = new \DateTimeZone('Africa/Lagos');
    }

    public function index(Request $request)
    {
        
        $charge = Charge::pluck('percentage');
        $slots = []; 
        $days = Slot::getDeliveryDays();

        usort($days, function ($a, $b)
        {
            return $a['date'] > $b['date'];
        });

        for($i=0; $i < count($days); $i++){
            $index = $days[$i]['date'];
            $slots[$index] = Slot::getAvailableSlot($days[$i]['date'], $days[$i]['day_int']);
        }

        if($request->isMethod('post')){
            //check if slot is still available

            $this->validate($request, [
                'delivery_date' => 'required',
                'slot_id' => 'required',
            ]);
            //save slot to session and redirect
            $request->session()->put('order_details.slot_id', $request->slot_id);
            $request->session()->put('order_details.delivery_date', $request->delivery_date);

            return redirect('/checkout/confirm-order')->with('charge', $charge);
        }
        // dd($request);

        $basket = Helpers::getCartSummary();

        return view('checkout.select-slot', compact('slots', 'basket', 'charge'));
    }
}