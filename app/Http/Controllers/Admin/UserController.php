<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Order;
use App\Models\UserAddress;
use App\Models\Role;


use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $completedOrders = DB::table('orders')->where('status', 'Completed')->sum('total');
        $ordersResult = number_format($completedOrders);
        $users = DB::select("Select u.first_name, u.last_name, u.email, u.phone, u.created_at,u.id from users u LEFT JOIN roles r ON u.role_id = r.id where r.name = 'User' GROUP By u.id,u.first_name, u.last_name, u.email, u.phone, u.created_at
        ");
        // dd($users); exit;
        return view('admin.dashboard.users', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::with(['user_addresses', 'role', 'orders' => function($q) {

                                $q->with(['order_products'=> function($qq){
                                    $qq->with('product');
                                }]);
                        }])
                        ->findOrFail($id);
        return view('admin.dashboard.user_view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $method = $request->isMethod('post');
        switch ($method) {
            case true:
                $search = $request->input('search');
                if(!$search){
                    return redirect()->back()->with(['delete_message'=>'Please! type to search for a user']);
                }else{
                    $users = User::latest()->where('first_name', 'LIKE', "%$search%")
                                            ->orWhere('last_name', 'LIKE', "%$search%")
                                            ->orWhere('email', 'LIKE', "%$search%")
                                            ->orWhere('phone', 'LIKE', "%$search%")
                                            ->paginate(10);
                    return view('admin.dashboard.user_search', compact('users'))->with('success' ,'Search result completed for '.$search);
                }
                break;
            case false:
                break;
            default:
                break;
        }
        
        
    }

    public function setAdmin($id)
    {
        $role = Role::where('name', 'Super Admin')->first();
        $user = User::findOrFail($id);
        $assigned_new_role = $user->role()->associate($role);
        $assigned_new_role->update();

        return back()->with('success', $user->first_name.' is now set as an administrator.');
    }

    public function setUser($id)
    {
        $role = Role::where('name', 'User')->first();
        $user = User::findOrFail($id);
        $assigned_new_role = $user->role()->associate($role);
        $assigned_new_role->update();
        return back()->with('success', $user->first_name.' is no longer an Administrator but now set as a normal User.');
    }
}
