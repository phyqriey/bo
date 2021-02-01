<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\CartItem;
use Session;

class CartController extends Controller
{
    //
    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        } else {
            $user_id = Auth::user()->id;
            $cartId = Cart::where('user_id', "$user_id")
                ->where('status', 'Pending')
                ->pluck('id');
            if ($cartId->isEmpty()) {
                $cartId = 0;
            } else {
                $cartId = $cartId[0];
            }
            $cartItems = CartItem::where('cart_id', "$cartId")->get();
            $arrImgUrl = array();
            foreach ($cartItems as $item) {
                $arrImgUrl[$item->item_id] = $this->getImage($item->item_id);
            }

            return view('checkout')->with(compact('cartId'))
                ->with(compact('cartItems'))
                ->with(compact('cartId'))
                ->with(compact('arrImgUrl'));
        }
    }

    public function getImage($id)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://mangomart-autocount.myboostorder.com/wp-json/wc/v1/products/$id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic Y2tfMjY4MmIzNWM0ZDlhOGI2YjZlZmZhYzEyNmFjNTUyZTBiZmIzMTVhMDpjc19jYWI4YzlhNzI5ZGZiNDljNTBjZTgwMWE5ZWE0MWI1NzdjMDBhZDcx',
                'Cookie: PHPSESSID=0qcni9758ctgo8qoq8jh3vg5uv'
            ),
        ));

        $response = curl_exec($curl);
        $http_code = curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        curl_close($curl);
        if($http_code != 200){
            $imgurl='';
        }
        else{
            $detail = json_decode($response, false);
            $imgurl = $detail->images[0]->src;
        }
        return $imgurl;
    }

    public function store(Request $request)
    {
        $msg = "";
        $input = $request->all();
        $item_id = $input['item_id'];
        $item_name = $input['item_name'];
        $quantity = $input['quantity'];
        $price = $input['price'];
        if (!Auth::check()) {
            $status = false;
            $msg = "Not Login";
        } else {
            $user_id = Auth::user()->id;
            $cartId = Cart::where('user_id', "$user_id")
                ->where('status', 'Pending')
                ->pluck('id');
            if ($cartId->isEmpty()) {
                $cart = new Cart;
                $cart->user_id = $user_id;
                $cart->status = 'Pending';
                $cart->save();
                $cartId = $cart->id;
            } else {
                $cartId = $cartId[0];
            }
            $item_exist_id = CartItem::where('cart_id', "$cartId")
                ->where('item_id', "$item_id")
                ->pluck('id');
            if ($item_exist_id->isEmpty()) {
                $cartItem = new CartItem;
                $cartItem->cart_id = $cartId;
                $cartItem->item_id = $item_id;
                $cartItem->item_name = $item_name;
                $cartItem->quantity = $quantity;
                $cartItem->price = $price;
            } else {
                $item_exist_id = $item_exist_id[0];
                $cartItem = CartItem::find($item_exist_id);
                $cartItem->quantity = $cartItem->quantity + $quantity;
                $cartItem->price = $price;
            }
            if ($cartItem->save()) {
                $countItem = Session::get('countItem');
                Session::put('countItem', ($countItem + 1));
                $status = true;
            } else {
                $status = false;
            }
        }
        $result_arr = array("status" => $status, "msg" => $msg);
        echo json_encode($result_arr);
    }

    public function removeItem(Request $request)
    {
        $msg = "";
        if (!Auth::check()) {
            $status = false;
            $msg = "Not Login";
        } else {
            $input = $request->all();
            $id = $input['id'];
            $cartItem = CartItem::find($id);
            if ($cartItem->delete()) {
                $status = true;
                $countItem = Session::get('countItem');
                Session::put('countItem', ($countItem - 1));
            } else {
                $status = false;
            }
        }
        $result_arr = array("status" => $status, "msg" => $msg);
        echo json_encode($result_arr);
    }

    public function updateQty(Request $request)
    {
        $msg = "";
        if (!Auth::check()) {
            $status = false;
            $msg = "Not Login";
        } else {
            $input = $request->all();
            $id = $input['id'];
            $qty = $input['qty'];
            $cartItem = CartItem::find($id);
            $cartItem->quantity = $qty;
            if ($cartItem->save()) {
                $status = true;
            } else {
                $status = false;
            }
        }
        $result_arr = array("status" => $status, "msg" => $msg);
        echo json_encode($result_arr);
    }
}
