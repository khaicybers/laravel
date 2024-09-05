<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;


class CategoryController extends Controller
{
    public function index(){
        $cats = DB::table('categories')->paginate(3);
        return view('category.index',compact('cats'));
    }

     /**
     * Phương thức create hiển thị form nhập dữ liệu
     */
    public function create(){
        return view('category.create');
    }
    /**
     * Phương thức store để nhận và lưu dữ liệu vào bảng
     */
    public function store(Request $request){
        // $request->only() lấy dữ liệu từ form giống với $_POST
        //Category::create(); // như lệnh INSERT INTO category
        DB::table('categories')->insert($request->only('name','status'));
        return redirect()->route('category.index'); // chuyển hướng về danh sách
    }
}

