<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Table;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Order by table
    public function Order()
    {
        $tables = Table::latest()->get();
        return view('order.index', compact('tables'));
    } // End Order Method


    // Add Order Method
    public function AddOrder($id)
    {
        $table = Table::findOrFail($id);
        $category = Category::latest()->get();
        $menu = Menu::latest()->get();
        $cart = session()->get('cart', []);

        return view('order.order_layout', compact('table', 'category', 'menu', 'cart'));

    } // End Add Order Method

    // Add Cart Method
    public function AddCart(Request $request)
    {
        $menuId = $request->id;
        $qty = $request->qty;
        $extra=$request->extra;
        $menu = Menu::findOrFail($menuId);

        if (!$menu) {
            return redirect()->back()->with('error', 'Menu Not Found');
        }
        $cart = session()->get('cart', []);

        if (isset($cart[$menuId])) {
            $cart[$menuId]['qty'] += $qty;
        } else {
            $cart[$menuId] = [
                'name' => $menu->name,
                'qty' => $qty,
                'extra'=> $extra,
                'id' => $menu->id,
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back();

    } // End Add Cart Method


    // Update Cart Method
    public function UpdateCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty'] = $request->qty;
            session()->put('cart', $cart);
        }

        return redirect()->back();
    } // End Update Cart Method


    // Remove Cart Method
    public function RemoveCart($menu_id)
    {

        $cart = session()->get('cart', []);

        if (isset($cart[$menu_id])) {
            unset($cart[$menu_id]);
            session()->put('cart', $cart);
        }
        return redirect()->back();
    } // End Remove Cart Method


    // Kitchen Order Method
    public function KitchenOrder(Request $request)
    {
        $user_id = Auth::user()->id;
        $cart = session()->get('cart', []);
        $table_id = $request->table_id;

        if (empty($cart)) {
            $noti = [
                'message' => 'မီးနူးရွေးချယ်ရန်လိုအပ်ပါသည်။',
                'alert-type' => 'error',
            ];
            return redirect()->back()->with($noti);
        } else {
            $orderData = array();
            foreach ($cart as $key => $value) {
                $orderItem = [
                    'user_id' => $user_id,
                    'table_id' => $table_id,
                    'menu_id' => $value['id'],
                    'quantity' => $value['qty'],
                    'extra'=>$value['extra'],
                    'status' => 'cooking',
                    'created_at' => Carbon::now(),
                ];
                $orderData[] = $orderItem; // Append the order item to the array
            }

            Order::insert($orderData);
            // Remove the cart session after inserting order data
            session()->forget('cart');
            $noti = [
                'message' => 'အော်ဒါမှာယူခြင်း အောင်မြင်ပါသည်။',
                'alert-type' => 'success',
            ];
            return redirect()->back()->with($noti);
        }

    } // End Kitchen Order Method

}
