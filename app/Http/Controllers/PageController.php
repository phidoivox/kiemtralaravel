<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Product;
use App\Models\TypeProduct;
use App\Models\User;
use App\Models\Customer;
use App\Models\Bill;
use App\Models\BillDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();
        // new = 1 means new product
        $new_product = Product::where('new', 1)->paginate(4, ['*'], 'new_page');
        // promotion_price != 0 means top products/sale
        $sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(8, ['*'], 'promo_page');
        
        return view('banhang.index', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }

    public function getDetail(Request $req){
        $sanpham = Product::where('id', $req->id)->first();
        if(!$sanpham) abort(404);
        $sp_tuongtu = Product::where('id_type', $sanpham->id_type)->where('id', '!=', $sanpham->id)->paginate(3);
        $new_product = Product::where('new', 1)->take(4)->get();
        $best_sellers = Product::where('promotion_price', '<>', 0)->take(4)->get(); // sản phẩm bán chạy = sản phẩm đang khuyến mãi
        
        return view('banhang.product-detail', compact('sanpham', 'sp_tuongtu', 'new_product', 'best_sellers'));
    }

    public function getCheckout(){
        return view('banhang.checkout');
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        if(!$cart){
            return redirect()->back()->with('error', 'Giỏ hàng trống!');
        }

        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes ?? '';
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        
        $totalPrice = 0;
        foreach($cart as $item){
            $totalPrice += $item['price'];
        }
        $bill->total = $totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes ?? '';
        $bill->save();

        foreach($cart as $id => $item){
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $id;
            $bill_detail->quantity = $item['qty'];
            $bill_detail->unit_price = $item['unit_price'];
            $bill_detail->save();
        }

        Session::forget('cart');
        return redirect()->back()->with('success', 'Đặt hàng thành công! Chúng tôi sẽ liên hệ với bạn sớm.');
    }

    public function getProductType($id){
        $loaisp = TypeProduct::find($id);
        if(!$loaisp) abort(404);
        $products = Product::where('id_type', $id)->paginate(9);
        return view('banhang.product-type', compact('loaisp', 'products'));
    }

    public function getAbout(){
        return view('banhang.about');
    }

    public function getContact(){
        return view('banhang.contact');
    }

    public function postContact(Request $req){
        $req->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'message' => 'required|min:10',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'name.min' => 'Họ tên phải có ít nhất 2 ký tự.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'message.required' => 'Vui lòng nhập nội dung tin nhắn.',
            'message.min' => 'Nội dung phải có ít nhất 10 ký tự.',
        ]);

        // Here you could save to database or send email
        // For now, just flash a success message
        return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ! Chúng tôi sẽ phản hồi trong thời gian sớm nhất.');
    }

    public function getLogin(){
        return view('banhang.login');
    }

    public function postLogin(Request $req){
        $req->validate(
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        if(Auth::attempt($credentials)){
            return redirect()->route('trangchu')->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
        }
        else{
            return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
        }
    }

    public function getSignin(){
        return view('banhang.signup');
    }

    public function postSignin(Request $req){
        $req->validate(
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->save();
        return redirect()->back()->with('success','Tạo tài khoản thành công');
    }

    public function getSearch(Request $req){
        $key = $req->key;
        if(!$key){
            return redirect()->back()->with(['flag'=>'danger','message'=>'Vui lòng nhập từ khóa tìm kiếm']);
        }
        $product = Product::where('name', 'like', '%'.$key.'%')
                            ->orWhere('unit_price', $key)
                            ->paginate(12);
        return view('banhang.search', compact('product', 'key'));
    }

    public function postLogout(){
        Auth::logout();
        return redirect()->route('trangchu');
    }
}

