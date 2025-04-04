<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Client;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{

    public function __construct(){
        $this->middleware('auth:client');
    }

    public function index(){
        try {

            $orders = Order::where('client_id', Auth::guard('client')->id())
            ->orderByDesc('created_at')
            ->get();

            return view('client.profile.index', compact('orders'));

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error while getting profile try again later.');
        }
    }

    public function edit(){
        return view('client.profile.edit');
    }

    public function update(Request $request, Client $client){
        try {

            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.  Auth::guard('client')->id(),
                'phone' => 'required|unique:users,phone,'.  Auth::guard('client')->id(),
            ]);

            $isUpdated = $client->update([
                'name' => $request->name,
                'emaio' => $request->email,
                'phone' => $request->phone,
            ]);

            if (!$isUpdated) {
                return redirect()->back()->with('error', 'Error while updating profile try again later.');
            }

            return redirect()->route('client.index')->with('success', 'Profile updated successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error while updating profile try again later.');
        }
    }

    public function checkout()
    {

        try {
            $cart = Cart::where('client_id', Auth::guard('client')->id())->first();

            if (!$cart) {
                return redirect()->route('home')->with('error', 'Your cart is empty');
            }


            $cart->load('cartBooks.book');
            return view('client.payment.checkout', compact('cart'));

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error while gatting cart try again later.');
        }
    }
}
