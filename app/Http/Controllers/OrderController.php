<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;
use App\CartItem;
use App\Order;
use App\OrderItem;
use Session;

class OrderController extends Controller
{
    //
    protected $CartController;
    public function __construct(CartController $CartController)
    {
        $this->CartController = $CartController;
    }


    public function index()
    {
        if (!Auth::check()) {
            return redirect('login');
        } else {
            $arrImgUrl = array();
            $user_id = Auth::user()->id;
            $orders = Order::with('order_items')
                ->where('user_id', "$user_id")->get();
            foreach ($orders as $order) {
                foreach ($order->order_items as $item) {
                    if (!isset($arrImgUrl[$item->item_id])) {
                        $arrImgUrl[$item->item_id] = $this->CartController->getImage($item->item_id);
                    }
                }
            }
            // dd($orders);
            return view('orderlist')->with(compact('orders'))
                ->with(compact('arrImgUrl'));
        }
    }
    public function manageOrder()
    {
        if (!Auth::check()) {
            return redirect('login');
        } else {
            $accessRights = Auth::user()->accessRights;
            $authorised = false;
            if (!$accessRights->isEmpty()) {
                foreach ($accessRights as $access) {
                    if ($access->grant == 'manage_order') {
                        $authorised = true;
                    }
                }
            }
            if ($authorised) {
                $arrImgUrl = array();
                $arrStatus = array(
                    "Pending", "Process", "Shipped"
                );
                $user_id = Auth::user()->id;
                $orders = Order::with('order_items', 'user')
                    ->get();
                // dd($orders);
                foreach ($orders as $order) {
                    foreach ($order->order_items as $item) {
                        if (!isset($arrImgUrl[$item->item_id])) {
                            $arrImgUrl[$item->item_id] = $this->CartController->getImage($item->item_id);
                        }
                    }
                }
                // dd($orders);
                return view('orderManage')->with(compact('orders'))
                    ->with(compact('arrImgUrl'))
                    ->with(compact('arrStatus'));
            }
            else{
                return redirect(route('showOrder'));
            }
        }
    }

    public function store(Request $request)
    {

        sleep(4); //sleep to simulate fpx transaction
        $msg = "";
        if (!Auth::check()) {
            $status = false;
            $msg = "Not Login";
        } else {
            $input = $request->all();
            $cartId = $input['id'];
            $user_id = Auth::user()->id;


            //insert cart item into order and orderItem after checkout
            $order = new Order;
            $order->user_id = $user_id;
            $order->status = "Pending"; //pending seller/admin to process
            if ($order->save()) {
                $orderId = $order->id;
                $cartItems = CartItem::where('cart_id', "$cartId")->get();
                foreach ($cartItems as $item) {
                    $orderItem = new OrderItem;
                    $orderItem->order_id = $orderId;
                    $orderItem->item_id = $item->item_id;
                    $orderItem->item_name = $item->item_name;
                    $orderItem->quantity = $item->quantity;
                    $orderItem->price = $item->price;
                    $orderItem->save();
                }
                //change cart status to completed
                $cart = Cart::find($cartId);
                $cart->status = 'Completed';
                if ($cart->save()) {
                    $status = true;
                    Session::put('countItem', 0);
                } else {
                    $status = false;
                    $msg = "Failed";
                }
            }
        }
        $result_arr = array("status" => $status, "msg" => $msg);
        echo json_encode($result_arr);
    }
    public function update(Request $request)
    {
        $msg = "";
        if (!Auth::check()) {
            $status = false;
            $msg = "Not Login";
        } else {
            $input = $request->all();
            $orderId = $input['id'];
            $order = Order::find($orderId);
            $order->status = $input['status'];
            if ($order->save()) {
                $status = true;
            } else {
                $status = false;
            }
            $result_arr = array("status" => $status, "msg" => $msg);
            echo json_encode($result_arr);
        }
    }
}
