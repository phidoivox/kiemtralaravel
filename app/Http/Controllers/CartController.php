<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Xem trang giỏ hàng
    public function getCart(){
        $cart = session('cart', []);
        $totalQty = 0;
        $totalPrice = 0;
        foreach($cart as $item){
            $totalQty += $item['qty'];
            $totalPrice += $item['price'];
        }
        return view('banhang.cart', compact('cart', 'totalQty', 'totalPrice'));
    }

    // Thêm sản phẩm vào giỏ
    public function addToCart(Request $req){
        $id = $req->id;
        $product = Product::find($id);
        if(!$product){
            return redirect()->back()->with('error', 'Sản phẩm không tồn tại!');
        }

        $cart = session('cart', []);

        if(isset($cart[$id])){
            $cart[$id]['qty']++;
            $cart[$id]['price'] = $cart[$id]['qty'] * $cart[$id]['unit_price'];
        } else {
            $cart[$id] = [
                'name'       => $product->name,
                'image'      => $product->image,
                'unit_price' => $product->unit_price,
                'qty'        => 1,
                'price'      => $product->unit_price,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Đã thêm "' . $product->name . '" vào giỏ hàng!');
    }

    // Giảm 1 sản phẩm
    public function reduceByOne($id){
        $cart = session('cart', []);
        if(!isset($cart[$id])){
            return redirect()->route('giohang');
        }

        $cart[$id]['qty']--;
        $cart[$id]['price'] = $cart[$id]['qty'] * $cart[$id]['unit_price'];

        if($cart[$id]['qty'] <= 0){
            unset($cart[$id]);
        }

        session()->put('cart', $cart);
        return redirect()->route('giohang');
    }

    // Xóa toàn bộ 1 mặt hàng
    public function removeItem($id){
        $cart = session('cart', []);
        if(isset($cart[$id])){
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        return redirect()->route('giohang');
    }

    // Xoá toàn bộ giỏ hàng
    public function clearCart(){
        session()->forget('cart');
        return redirect()->route('giohang');
    }
}
