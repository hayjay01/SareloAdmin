<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Charge;




class IndexController extends Controller
{
    public function index()
    {
    	$charge = Charge::pluck('percentage');
    	// dd($charge[1]);
        return view('index', compact('charge'));
    }
}
