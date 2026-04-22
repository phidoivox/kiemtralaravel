<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\TypeProduct;
use App\Models\Bill;
use App\Models\BillDetail;
use App\Models\Customer;

class AdminController extends Controller
{
    public function getDashboard(){
        $product_count = Product::count();
        $user_count = User::count();
        $type_count = TypeProduct::count();
        $bill_count = Bill::count();
        return view('admin.dashboard', compact('product_count', 'user_count', 'type_count', 'bill_count'));
    }

    public function getLogin(){
        if(auth()->check() && auth()->user()->level == 1){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function postLogin(Request $req){
        $req->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $req->only('email', 'password');
        if(auth()->attempt($credentials)){
            if(auth()->user()->level == 1){
                return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công');
            } else {
                auth()->logout();
                return redirect()->back()->with('error', 'Tài khoản của bạn không có quyền quản trị');
            }
        }
        return redirect()->back()->with('error', 'Email hoặc mật khẩu không chính xác');
    }

    /* PRODUCT MANAGEMENT */
    public function getProductList(){
        $products = Product::orderBy('id', 'desc')->paginate(10);
        return view('admin.product.list', compact('products'));
    }

    public function getAddProduct(){
        $types = TypeProduct::all();
        return view('admin.product.add', compact('types'));
    }

    public function postAddProduct(Request $req){
        $req->validate([
            'name' => 'required',
            'id_type' => 'required',
            'unit_price' => 'required|numeric',
            'image' => 'required|image'
        ]);

        $product = new Product();
        $product->name = $req->name;
        $product->id_type = $req->id_type;
        $product->description = $req->description;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price ? $req->promotion_price : 0;
        $product->unit = $req->unit;
        $product->new = $req->new ? 1 : 0;

        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image/product'), $filename);
            $product->image = $filename;
        }

        $product->save();
        return redirect()->route('admin.product.list')->with('success', 'Thêm sản phẩm thành công');
    }

    public function getEditProduct($id){
        $product = Product::findOrFail($id);
        $types = TypeProduct::all();
        return view('admin.product.edit', compact('product', 'types'));
    }

    public function postEditProduct(Request $req, $id){
        $req->validate([
            'name' => 'required',
            'id_type' => 'required',
            'unit_price' => 'required|numeric'
        ]);

        $product = Product::findOrFail($id);
        $product->name = $req->name;
        $product->id_type = $req->id_type;
        $product->description = $req->description;
        $product->unit_price = $req->unit_price;
        $product->promotion_price = $req->promotion_price ? $req->promotion_price : 0;
        $product->unit = $req->unit;
        $product->new = $req->new ? 1 : 0;

        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image/product'), $filename);
            $product->image = $filename;
        }

        $product->save();
        return redirect()->route('admin.product.list')->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function getDeleteProduct($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Xóa sản phẩm thành công');
    }

    /* CATEGORY MANAGEMENT */
    public function getCategoryList(){
        $categories = TypeProduct::paginate(10);
        return view('admin.category.list', compact('categories'));
    }

    public function getAddCategory(){
        return view('admin.category.add');
    }

    public function postAddCategory(Request $req){
        $req->validate(['name' => 'required']);
        $cat = new TypeProduct();
        $cat->name = $req->name;
        $cat->description = $req->description;
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image/product'), $filename); // Using same dir for simplicity or custom dir
            $cat->image = $filename;
        }
        $cat->save();
        return redirect()->route('admin.category.list')->with('success', 'Thêm loại sản phẩm thành công');
    }

    public function getDeleteCategory($id){
        $cat = TypeProduct::findOrFail($id);
        $cat->delete();
        return redirect()->back()->with('success', 'Xóa loại sản phẩm thành công');
    }

    /* USER MANAGEMENT */
    public function getUserList(){
        $users = User::paginate(10);
        return view('admin.user.list', compact('users'));
    }

    public function getDeleteUser($id){
        $user = User::findOrFail($id);
        if($user->id == auth()->user()->id){
            return redirect()->back()->with('error', 'Bạn không thể tự xóa chính mình');
        }
        $user->delete();
        return redirect()->back()->with('success', 'Xóa người dùng thành công');
    }

    /* ORDER MANAGEMENT */
    public function getOrderList(){
        $bills = Bill::with('customer')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.order.list', compact('bills'));
    }

    public function getOrderDetail($id){
        $bill = Bill::with(['customer', 'bill_detail.product'])->findOrFail($id);
        return view('admin.order.detail', compact('bill'));
    }

    public function getDeleteOrder($id){
        $bill = Bill::findOrFail($id);
        BillDetail::where('id_bill', $id)->delete();
        $bill->delete();
        return redirect()->back()->with('success', 'Xóa đơn hàng thành công');
    }
}
