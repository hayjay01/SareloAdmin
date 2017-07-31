<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Order;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Models\Role;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $completedOrders = number_format(DB::table('orders')->where('status', 'Delivered')->sum('total'));
        $ordersResult = number_format(DB::table('orders')->where('status', 'Delivered')->count());
        $totalOrders = Order::count();
        $goneToMarket = Order::where('status', 'gone-to-market')->count();
        $cancelledOrders = Order::where('status', 'cancelled')->count();
        $processingOrders = Order::where('status', 'processing')->count();

        $users = User::join('roles', 'users.role_id', 'roles.id')
                    ->where('roles.name', 'User')->count();
        $products = Product::count();
        $keyword = $request->get('search');
        $perPage = 10;
        if (!empty($keyword)) {
            $orders = Order::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('total', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $orders = Order::latest()->paginate($perPage);
        }
    	return view('admin.dashboard.index', compact('ordersResult', 'users', 'products', 'orders', 'totalOrders', 'goneToMarket', 'completedOrders', 'cancelledOrders', 'processingOrders'));
    }
     public function show()
    {
        $admins = User::selectRaw('users.*')
                        ->with('role') //relationship created
                        ->join('roles','roles.id', '=', 'users.role_id')
                        ->where('roles.name', 'Super Admin')
                        ->paginate(10);
                        
    	return view('admin.show', compact('admins'));
    }

    public function orders()
    {
    	return view('admin.dashboard.order');
    }

    public function order_view()
    {
    	return view('admin.dashboard.order_view');
    }
    public function products()
    {
    	return view('admin.dashboard.product');
    }
    public function product_edit()
    {
    	return view('admin.dashboard.product_edit');
    }
    

    public function signin(Request $request)
    {
         $method = $request->isMethod('post');
            // dd($method);
            switch ($method) {
                case true:
                        $this->validate($request, [
                            'email' => 'required|required',
                            'password' => 'required|min:4'
                        ]);
                        $authenticate_user = Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]);
                        if ($authenticate_user) {
                            return redirect('admin/dashboard');
                        }else{
                            return redirect('/admin')->with('delete_message', 'Wrong Email or Password');
                        }
                break;
                case false:
                    if (Auth::check()) {
                        return redirect('admin/dashboard');
                    }
                    return view('/admin.dashboard.login');
                break;
                default:
                    if (Auth::check()) {
                        return redirect('admin/dashboard');
                    }
                    return view('/admin.dashboard.login');
                break;
            }
    }

    public function signup(Request $request)
    {
         $method = $request->isMethod('post');
            switch ($method) {
                case true:
                        $this->validate($request, [
                            'email' => 'required|unique:users',
                            'password' => 'required|min:4',
                            'confirm_password' => 'required|min:4'
                        ]);
                        $password = $request->input('password');
                        $confirm_password = $request->input('confirm_password');
                        if ($password === $confirm_password) {
                            $role = Role::where('name', 'Super Admin')->first();
                            $user = new User([
                              'email' => $request->input('email'),
                              'password' => Hash::make($password),
                              ]);
                            $user->role()->associate($role);
                            $user->save();
                            return redirect('admin/dashboard')->with('success','Admin created successfully!');
                        }else{
                            return redirect('/admin/create')->with('delete_message', 'Password does not match!');
                        }
                break;
                case false:
                    return view('/admin/create');
                break;
                default:
                    return view('/admin/create');
                break;
            }
    }

    
    public function edit(Request $request, $id)
    {
        $method = $request->isMethod('post');
        switch ($method) {
            case true:
                    $this->validate($request, [
                        'email' => 'required|unique:users'
                    ]);
                    $requestData = $request->all();
                    $admin = User::findOrFail($id);
                    $admin->update($requestData);
                    return redirect('admin/show')->with('success', 'Admin detail updated successfully!'); 
                break;
                case false:
                    $admin = User::all();
                    $admin = User::findOrFail($id);
                    return view('/admin/edit', compact('admin'));
                break;

            default:

                break;
        }
        
    }

    public function changePassword(Request $request, $id)
    {
        $method = $request->isMethod('post');
        switch ($method) {
            case true:
                    $this->validate($request, [
                        'password' => 'required|min:4',
                        'confirm_password' => 'required|min:4'
                    ]);
                    $password = $request->input('password');
                    $confirm_password = $request->input('confirm_password');
                    $bcrypted_password = bcrypt($password);
                    if ($password === $confirm_password) {
                        $admin = User::findOrFail($id);
                        $admin->password = $bcrypted_password;
                        $admin->update();
                        return redirect('admin/show')->with('success', 'Password was successfully changed!'); 
                    }else{
                        return back()->with('delete_message', 'Password doesn\'t match');
                    }
                break;
                case false:
                    $admin = User::all();
                    $admin = User::findOrFail($id);
                    return view('/admin/change_password', compact('admin'));
                break;
            default:

                break;
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }

    public function destroy($id)
    {
        Order::findOrFail($id);
        Order::destroy($id);
        return redirect('admin/orders')->with('delete_message', 'Order successfully deleted!'); 
    }

}
