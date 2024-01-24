<?php

namespace App\Http\Controllers;

use App\Models\RuanganPoadcast;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OperatorController extends Controller
{
    public function index(){
        $operators = User::all();
        $roles = Role::all();
        return view('backend/operators.index',[
            'operators'  =>  $operators,
            'roles'  =>  $roles,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'name'      =>  'required',
            'username'      =>  'required|unique:users',
            'email' => 'required|email|unique:users',
            'role_id'   =>  'required',
            'password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'password_confirmation' => 'required|same:password', // Ini adalah validasi konfirmasi password
        ];

        $text = [
            'name.required'           => 'Nama User harus diisi',
            'username.required'           => 'Nama User harus diisi',
            'username.unique'           => 'Usernane sudah digunakan',
            'email.required'               => 'Email harus diisi',
            'email.unique'               => 'Email sudah digunakan',
            'password.required'            => 'Password harus diisi',
            'password.min'                 => 'Password harus memiliki setidaknya :min karakter',
            'password.regex'               => 'Password harus mengandung huruf besar, huruf kecil, angka, dan karakter khusus',
            'password_confirmation.required' => 'Konfirmasi Password harus diisi',
            'password_confirmation.same'   => 'Konfirmasi Password harus sama dengan Password',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $simpan = User::create([
            'name'         =>  $request->name,
            'username'         =>  $request->username,
            'email'             =>  $request->email,
            'password'          =>  Hash::make($request->password),
        ]);

        $operatorRole = Role::where('id', $request->role_id)->first();
        $simpan->assignRole($operatorRole);
        $simpan->assignRole('admin');

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, Operator berhasil ditambahkan',
                'url'   =>  url('/operator/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Operator gagal disimpan']);
        }
    }
    public function edit(User $operator){
        return $operator;
    }

    public function update(Request $request){
        $user = User::where('id',$request->operator_id)->first();
        $rules = [
            'name'      =>  'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id), // $user adalah instance dari model User yang sedang diedit
            ],
            'username' => [
                'required',
                Rule::unique('users')->ignore($user->id), // $user adalah instance dari model User yang sedang diedit
            ],
        ];

        $text = [
            'name.required'           => 'Nama User harus diisi',
            'username.required'           => 'Username harus diisi',
            'email.required'               => 'Email harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = $user->update([
            'name'        =>  $request->name,
            'username'        =>  $request->username,
            'email'            =>  $request->email,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, Operator berhasil diubah',
                'url'   =>  url('/operator/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Operator gagal diubah']);
        }
    }

    public function delete(User $operator){
        $delete = $operator->delete();
        if ($delete) {
            $notification = array(
                'message' => 'Yeay, operator berhasil dihapus',
                'alert-type' => 'success'
            );
            return redirect()->route('operator')->with($notification);
        }else {
            $notification = array(
                'message' => 'Ooopps, operator gagal dihapus',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function ubahPassword(Request $request){
        $rules = [
            'password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'password_confirmation' => 'required|same:password', // Ini adalah validasi konfirmasi password
        ];

        $text = [
            'password.required'            => 'Password harus diisi',
            'password.min'                 => 'Password harus memiliki setidaknya :min karakter',
            'password.regex'               => 'Password harus mengandung huruf besar, huruf kecil, angka, dan karakter khusus',
            'password_confirmation.required' => 'Konfirmasi Password harus diisi',
            'password_confirmation.same'   => 'Konfirmasi Password harus sama dengan Password',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $ubahPassword = User::where('id',$request->id)->update([
            'password'  =>  Hash::make($request->password),
        ]);

        if ($ubahPassword) {
            return response()->json([
                'text'  =>  'Yeay, Password operator berhasil diubah',
                'url'   =>  url('/operator/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, Password operator gagal diubah']);
        }
    }
}
