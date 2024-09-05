<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::paginate();
        return view('index', compact('categories'));
    }

    public function login()
    {
        // Hiển thị form login
        return view('login');
    }

    public function check_login(Request $req)
    {
        // Khai báo các quy ràng buộc xác thực
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        // customize các tin nhắn
        $message = [
            'email.required' => 'Địa chỉ email không được để trống',
            'email.email'    => 'Địa chỉ email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống'
        ];
        // nếu Các ràng buộc đã hợp lệ, thì xử lý tiếp
        $req->validate($rules, $message);

    }
    public function handle_upload(Request $req)
    {
    // Khai báo các quy ràng buộc xác thực
        $rules = [
            // CHỉ cho phép chọn file có định dạng: jpg,jpeg,png,gif
            'image' => 'required|mimes:jpg,jpeg,png,gif',
        ];
        // customize các tin nhắn
        $message = [
            'image.required' => 'Vui lòng chọn ảnh',
            'image.mimes'    => 'Định dạng file cho phép là: jpg,jpeg,png,gif '
        ];
        // nếu Các ràng buộc đã hợp lệ, thì xử lý tiếp
        $req->validate($rules, $message);
        $ext = $req->image->extension();
        $file_name = time().'.'.$ext;
        // dd (public_path('uploads'));
        // upload vào thư mục public/uploads
        $req->image->move(public_path('uploads'), $file_name);
    }
    public function upload()
    {
        return view('upload_form');  // This corresponds to the view: resources/views/upload_form.blade.php
    }

}

