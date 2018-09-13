<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        // if(Auth::check())
        // {
        //     view()->share('current_user',Auth::user());
        // }
    }

    public function getUserList()
    {
        $list = User::where('level',0)->paginate(10); 
        return view('admin.user.user_list',['list'=>$list]);
    }

    //Dang nhap dang xuat admin

    public function getDangnhapAdmin() 
    {
        return view('admin.layout.dangnhapadmin');
    }

    public function postDangnhapAdmin(Request $request)
    {
        $this->validate($request,
        [
            'email'=>'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'Bạn chưa nhập địa chỉ e-mail',
            'password.required' => 'Bạn chưa nhập mật khẩu'
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            return redirect('admin');
        }
        else
        {
            return redirect('admin/dangnhap')->with('alert-danger','Sai thông tin đăng nhập');
        }
    }

    public function getDangxuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }


    //Dang nhap Dang xuat Dang ki user
    public function getDangnhap() 
    {
        return view('pages.dangnhap');
    }

    public function postDangnhap(Request $request)
    {
        $this->validate($request,
        [
            'email'=>'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'Bạn chưa nhập địa chỉ e-mail',
            'password.required' => 'Bạn chưa nhập mật khẩu'
        ]);

        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            return redirect('');
        }
        else
        {
            return redirect('dangnhap')->with('alert-danger','Sai thông tin đăng nhập');
        }
    }

    public function getDangxuat()
    {
        Auth::logout();
        return redirect('dangnhap');
    }

    public function getDangki()
    {
        return view('pages.dangki');
    }

    public function postDangki(Request $request)
    {
        $this->validate($request,
        [
            'name' => 'required|string|max:191',
            'email' => 'required|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required',
            'phone' => 'required'
        ],
        [
            'name.required' => 'Bạn chưa nhập họ tên',
            'name.string' => 'Họ tên phải là một chuỗi kí tự',
            'name.max' => 'Tên của bạn quá dài',
            'email.required' => 'Bạn chưa nhập địa chỉ e-mail',
            'email.unique' => 'E-mail này đã được sử dụng',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.string' => 'Mật khẩu của bạn phải là chuỗi kí tự',
            'password.min' => 'Mật khẩu phải có từ 6 kí tự trở lên',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng'

        ]);

        $u = new User;
        $u->name = $request->name;
        $u->email = $request->email;
        $u->password = Hash::make($request->password);
        $u->address = $request->address;
        $u->phone = $request->phone;
        $u->save();

        return redirect('dangnhap')->with('alert-success','Đăng kí tài khoản thành công, mời đăng nhập tại đây');

    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
