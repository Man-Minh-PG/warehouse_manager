<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;    
use Illuminate\Support\Facades\Session;
use App\Models\user;
use App\Models\orders;
use App\Models\order_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;    
use App\Http\Requests\StoreaccountsRequest;
use App\Http\Requests\UpdateaccountsRequest;
use App\Models\products;
use Illuminate\Support\Facades\DB; 
use Illuminate\Database\Eloquent\ModelNotFoundException; 
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $product = new user;
   
        // $product->fill([
        //     'name'     => 'user',
        //     'email'    => 'bt@gmail.com',
        //     'password' => bcrypt('123'),
        // ]);

        // $product->save();
        return view('login');
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
     * @param  \App\Http\Requests\StoreaccountsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreaccountsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'], 
        ]);
        
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => config('constants.account.role_admin') ]))  {
                // $token= strtoupper(Str::random(10));
                $user = User::where('email', $request->email)->first();
                // $tai_khoan->update(['token'=>$token]);
            
                $request->session()->regenerate();
                // session(['hinh' => $tai_khoan->hinh]); // Do dùng Auth nên không có thể xử lý phần hình ảnh        
                return redirect()->route('admin.dashboard');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => config('constants.account.role_user') ]))  {
            // $token= strtoupper(Str::random(10));
            // $tai_khoan = User::where('email', $request->email)->first();
            // $tai_khoan->update(['token'=>$token]);
            $request->session()->regenerate();
            // session(['hinh' => $tai_khoan->hinh]); // Do dùng Auth nên không có thể xử lý phần hình ảnh        
            return redirect()->route('client.order');
        }

        return back();
    }

    /**
     * Show view edit password for admin
     *
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('change_password');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateaccountsRequest  $request
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = user::where('id', Auth::user()->id)->first();;
            
        $user->fill([
            'password'       => bcrypt($request->password)
        ]);

        $user->save();
        return redirect()->route('admin.dashboard')->with('notification','Update success'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(accounts $accounts)
    {
        //
    }

    /**
     * Logout
     *
     * @param  \App\Http\Requests\UpdateaccountsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Return view order
     *
     * @param  \App\Http\Requests\UpdateaccountsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function create_order(request $request)
    {
        $session_name = Auth::user()->name;
        $products = products::all();
        $orders  = [];

        if ($request->session()->has( $session_name )) {
            $orders = session($session_name);            
        }        

        return view('client/home_page2', compact('products', 'orders'));
    }

    /**
     * Process add order into session
     * Insert with condition distric_id match
     * 
     * @param  \App\Http\Requests\UpdateaccountsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function order(request $request)
    { 
        // Get name db with distric
        $session_name = Auth::user()->name;

        // Check if session isset
        $array        = Session::get($session_name, function() {
            return 'not found';
        });

        if(is_array($array))
        {   
            // Check product isset in session 
            // Sum total - and update total & amount in session
            $index        = array_search($request->product_id, array_column($array, 'product_id'));
            
            if($index !== false) {
               
                Session::forget( $session_name );
                $arr_replace           = $array[$index];
                $arr_replace['total']  = ($request->amount * $request->price);  
                $arr_replace['amount'] = $arr_replace['amount'] + $request->amount;
        
                // remove old row data session
                unset($array[$index]);
                // refresh data get new index 
                $index        = array_search(1, array_column($array, 'product_id'));
                
                $array[$index] = $arr_replace;
        
                foreach($array as $key => $item)
                {
                    Session::push( $session_name, 
                    [
                        'product_id' => $item['product_id'], 
                        'price'      => $item['price'], 
                        'amount'     => $item['amount'], 
                        'name'       => $item['name'], 
                    ]);
                }

                return;
            }
            else{
                // If product not isset in session continute insert to session 
                $sessions     = Session::push( $session_name, 
                [
                    'product_id' => $request->product_id, 
                    'price'      => $request->price, 
                    'amount'     => $request->amount, 
                    'name'       => $request->name
                ]); 
                return;     
            }
        }

        // If session not isset - create new session and insert data to session
        $sessions     = Session::push( $session_name, 
            [
                'product_id' => $request->product_id, 
                'price'      => $request->price, 
                'amount'     => $request->amount, 
                'name'       => $request->name
            ]); 
    }

    /**
     * Process edit order into db
     * 
     * @param  \App\Http\Requests\UpdateaccountsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function edit_order(request $request)
    {   
        $order_detail = new order_details();
        $product_add  = products::findOrFail($request->product_id);

        DB::beginTransaction();
        try {
            $order_detail->fill([
                'order_id'   => $request->order_id,
                'product_id' => $request->product_id,
                'price'      => $product_add->price, 
                'amount'     => $request->amount, 
                'name'       => $product_add->name
            ]);
            $sucess = $order_detail->save();
    
            if(!$sucess){
                App::abort(500, 'Error');
                return;
            }

             // get last id order
            $id_last   = order_details::orderBy('id', 'desc')->first();
            // return response()->json(['users' => $id_last['order_id']], 200);
            $order     = orders::where('id', $id_last['order_id'])->first();
            $new_total = $order['total'] + ($product_add->price * $request->amount);

            //update price order
            $order->fill([
                'total'      => $new_total, 
            ]);
            $order->save();

            DB::commit();
            return response()->json(['users' => $order], 200);

        }catch(Exception $e) {
            DB::rollBack();

            throw new Exception($e->getMessage());
        }
        // return redirect()->route('client.show_list')->with('notification','Cập nhật thành công');
    }
    
    /**
    * redirec to screen edit order
    * 
    * @param  \App\Http\Requests\UpdateaccountsRequest  $request
    * @param  int $id
    * @return \Illuminate\Http\Response
    */
    public function redirect_order(request $request, $id)
    {
        $products     = products::all();
        $id_order     = orders::findOrFail($id);   
        $orders       = order_details::where('order_id', $id_order['id'])->get(); 
        
        return view('client/home_page_edit', compact('products', 'orders', 'id_order'));
    }

     /**
     * Process remove order
     * 
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function remove_order($name)
    {
        $session_name = Auth::user()->name;
        $array        = Session::get( $session_name );
        $index        = array_search($name, array_column($array, 'name'));
   
        unset($array[$index]);
        Session::forget( $session_name );
        
        foreach($array as $key => $item)
        {
            Session::push( $session_name, 
            [
                'product_id' => $item['product_id'], 
                'price'      => $item['price'], 
                'amount'     => $item['amount'], 
                'name'       => $item['name'], 
            ]);
        }
    }

    /**
     * Process add order into db
     * 
     * @param  \App\Http\Requests\UpdateaccountsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function add_order_into_database(request $request)
    {
        $session_name = Auth::user()->name;
        $total = 0;
        $order = new orders();
        $data  =  Session::get($session_name);
        $distric_id = Auth::user()->check_distric;

        foreach($data as $item)
        {
            $total += ($item['amount']*$item['price']);
        }

        DB::beginTransaction();
        try {
            $order->fill([
                'total'       => $total,
                'note'        => $request->note,
                'district_id' => $distric_id
            ]);
    
            $order->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            
            throw new Exception($e->getMessage());
        }

        $id = orders::orderBy('id', 'desc')->first()->id;

        foreach($data as $item)
        {
            $order_detail = new order_details();

            $order_detail->fill([
                'order_id'   => $id,
                'product_id' => $item['product_id'],
                'price'      => $item['price'],
                'amount'     => $item['amount']
            ]);

            $order_detail->save();
        } 
        Session::forget( $session_name );
    }

    /**
     * Show list order
     * 
     * @param  \App\Http\Requests\UpdateaccountsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function show_list_order(request $request)
    { 
        $distric_id = Auth::user()->check_distric;
        $data = orders::whereDate('created_at', Carbon::today())->where([
            ['district_id','=',$distric_id],
            ['status','=', config('constants.order.order_doing')]
        ])->paginate(4);
       
        return view('client/list_order', ['lst_order' => $data]);

        // $test = orders::all();
        // $a = $test[0]->order_detail;
        // 14h20
        // dd($a);
    }

    /**
     * Test Process order
     * 
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function test(request $request)
    {
        $session_name = Auth::user()->name;
        $a =  Session::get($session_name);

        dd($a);
        // $total = 0;
        // foreach($a as $item)
        // {
        //     $total += ($item['amount']*$item['price']);
        // }
        // dd($total); 
        // $id = orders::orderBy('id', 'desc')->first()->id;
       
        // dd($id);
    }

    /**
     * Update status order to order_complete
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function change_status_order($id)
    {
        $order      = orders::findOrFail($id);
        $order->fill([
            'status' => 1
        ]); 

        $order->save();
        return redirect()->route('client.show_list')->with('notification','Cập nhật thành công');
    }

    /**
     * Process delete order in database   
     * 
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function process_delete_order($id)
    {
        //add status delete order details
        try {
            // search first or fail
            $detail     = order_details::where("order_id", $id)->firstOrFail();
            $detail->delete();

            $order      = orders::findOrFail($id);
            $order->delete();
        }catch(ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
     
        return redirect()->route('client.show_list')->with('notification','Cập nhật thành công');
    }

    /**
     * Show list history order
     * 
     * Get order status complete 
     * 
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function history(request $request)
    { 
        $distric_id = Auth::user()->check_distric;
        $data       = orders::whereDate('created_at', Carbon::today())->where([
            ['district_id','=', $distric_id],
            ['status','=', config('constants.order.order_complete')],
        ])->orWhere([
            ['district_id','=', $distric_id],
            ['status', '=', config('constants.order.order_complete_payment_online')],
            ['created_at','=',  Carbon::today()],
        ])->paginate(4);
       
        return view('client/order_history', ['lst_order' => $data]);
    }

    /**
     * Rollback history order to order_doing
     * 
     * Get order status complete
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function rollback_history($id)
    { 
        $order      = orders::findOrFail($id);
        $order->fill([
            'status' => 0
        ]);

        $order->save();
        return redirect()->route('client.history')->with('notification','Cập nhật thành công');
    }

    /**
     * Add status payment online
     * 
     * If status order is 3   => payment online sucesss
     *                 is 1 => Cash payment success 
     * 
     * @param  \App\Models\accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function update_status_payonline($id)
    { 
        $order      = orders::findOrFail($id);
        $order->fill([
            'status' => 2
        ]);

        $order->save();
        return redirect()->route('client.show_list')->with('notification','Cập nhật thành công');
    }

    /**
     * DELETE order detail in db
     * 
     * @return \Illuminate\Http\Response
     */
    public function delete_order_detail($id_order_detail)
    {
        DB::beginTransaction();
        try {
            $order_detail = order_details::findOrFail($id_order_detail);

            // get order and update total
            $order     = orders::findOrFail($order_detail['order_id']);
            $new_total = $order['total'] - ($order_detail['amount'] * $order_detail['price']);

            $order->fill([
                'total' => $new_total,
            ]);
            $order->save();

            // delete order details
            $order_detail->delete();   
            $order_detail->save();

            DB::commit();

        }catch(ModelNotFoundException $exception) {
            DB::rollBack();
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
