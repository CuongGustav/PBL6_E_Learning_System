<?php

namespace App\Http\Controllers;

use App\Models\InfoAccount;
use App\Models\User;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    function adminPage($username){
        return view('admin.homePage', compact('username'));
    }

    function userPage($username){
        return view('userHomePage', compact('username'));
    }

    function infoPage($username){
        $user = User::where('name', $username)->first();
        $infoUser = InfoAccount::where('id_user', $user->id)->first();
        return view('infoPage', compact('user', 'infoUser'));
    }
    function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('passwordField');
        $request -> validate(
            [
            'username' => 'required',
            'passwordField' => 'required'
            ],//ràng buộc
            [
                'required' => ':attribute không được để trống',
            ],// thông báo của ràng buộc
            [
                'username' => 'Tài khoản',
                'passwordField' => 'Mật khẩu'
            ] //tên của các attribute
        );
        $checkuser = false;
        $role = -1;
        $users = User::all();
        foreach ($users as $user) {
            if($username == $user->name){
                if($password == $user->password){
                    $role = $user->role;
                    $checkuser = true;
                }
            }
        }

        if($checkuser == true){
            if($role == 0){   
                return redirect()->route('adminHomePage', ['username' => $username]);
            }
            elseif($role == 1){
                return redirect()->route('userHomePage', ['username' => $username]);
                }
        }
        else{
            return redirect()->route('loginPage')->with('status', 'Please check your username and password');
        }  
    }

    function register(Request $request){
        $request->validate(
            [
                'username' => 'required|unique:users,name',
                'password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[@$!%*#?&])/|confirmed',
                'email' => 'required|email|unique:users,email',
                'password_confirmation' => 'required',
            ],
            [
                'required' => ':attribute không được để trống',
                'email.required' => 'Email là bắt buộc.',
                'email.email' => 'Địa chỉ email không hợp lệ.',
                'email.unique' => 'Email này đã tồn tại trong hệ thống.',
                'username.unique' => ':attribute này đã tồn tại trong hệ thống.',
                'password_confirmation.required' => 'Xác nhận mật khẩu là bắt buộc.',
                'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
                'password.confirmed' => 'Xác nhận mật khẩu không khớp với mật khẩu.',
                'password.regex' => 'Mật khẩu phải có ít nhất một chữ hoa, một chữ thường, một chữ số và một ký tự đặc biệt.',
            ],
            [
                'username' => 'Tài khoản',
                'password' => 'Mật khẩu',
                'password_confirmation' => 'Xác nhận mật khẩu',
            ]
        );
        
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        User::create([
            'name' => $username,
            'email' => $email,
            'password' => $password,
            'role' => 1
        ]);

        return redirect()->route('loginPage')->with('status_reg', 'Đã đăng ký tài khoản thành công.');
    }

    function updateUser(Request $request) {
        $request->validate(
            [
                'fullname' => 'required'
            ],
            [
                'fullname.required' => 'Tên không được để trống.'
            ]
        );
        $data = $request->all();
        $infouser = InfoAccount::where('id_user', $data['id_user'])->first();
        if ($infouser) {
            $infouser->update([
                'fullname' => $data['fullname']
            ]);
        }
        else{
            InfoAccount::create([
                'fullname' => $data['fullname'],
                'id_user' => $data['id_user']
            ]);
        }
        return redirect()->route('infoPage', ['username' => $data['username']])->with('status', 'Đã cập nhật thành công');
    }

    function changePassword(Request $request){
        $request->validate(
            [
                'password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[@$!%*#?&])/|confirmed',
                'password_confirmation' => 'required',
            ],
            [
                'required' => ':attribute không được để trống',
                'password_confirmation.required' => 'Xác nhận mật khẩu là bắt buộc.',
                'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
                'password.confirmed' => 'Xác nhận mật khẩu không khớp với mật khẩu.',
                'password.regex' => 'Mật khẩu phải có ít nhất một chữ hoa, một chữ thường, một chữ số và một ký tự đặc biệt.',
            ],
            [
                'password' => 'Mật khẩu',
                'password_confirmation' => 'Xác nhận mật khẩu',
            ]
        );
        $data = $request->all();
        $infouser = User::find($data['id_user']);
        if ($infouser) {
            $infouser->update([
                'password' => $data['password']
            ]);
        }
        return redirect()->route('infoPage', ['username' => $infouser->name])->with('status', 'Đã cập nhật mật khẩu thành công');

    }
    
}
