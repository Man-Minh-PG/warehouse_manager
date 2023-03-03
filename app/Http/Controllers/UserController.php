<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;  
// use App\Http\Requests\StoreaccountsRequest;
// use App\Http\Requests\UpdateaccountsRequest;
// use Illuminate\Support\Facades\DB; 
// use Illuminate\Database\Eloquent\ModelNotFoundException; 
// use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * Redirec to view login
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
                $user = User::where('email', $request->email)->first();
                // $tai_khoan->update(['token'=>$token]);
            
                $request->session()->regenerate();
                // session(['hinh' => $tai_khoan->hinh]); // Do dùng Auth nên không có thể xử lý phần hình ảnh        
                return redirect()->route('admin.home');
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
        //
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
      //
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
}
