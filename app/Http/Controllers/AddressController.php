<?php
namespace App\Http\Controllers;

use Auth;
use App\Domain\Helpers;
use App\Models\UserAddress;
use App\Models\Charge;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $basket = Helpers::getCartSummary();
        $charge = Charge::pluck('percentage');

        return view('address.create', compact('basket', 'charge'));
    }

    public function store(Request $request)
    {
        if($request->isMethod('post')){

            $this->validate($request, [
                'address' => 'required|min:10',
                'city' => 'required|min:3',
            ]);

            $new_address = new UserAddress($request->all());

            Auth::user()->user_addresses()->save($new_address);

            return redirect('/checkout/choose-address');
        }

        return redirect('/new-address');
    }
}