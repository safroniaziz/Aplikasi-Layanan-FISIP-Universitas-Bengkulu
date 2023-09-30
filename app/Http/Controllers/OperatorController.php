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
        $ruanganPoadcasts = RuanganPoadcast::all();
        return view('backend/ruanganPoadcasts.index',[
            'ruanganPoadcasts'  =>  $ruanganPoadcasts,
        ]);
    }

    public function store(Request $request){
        $rules = [
            'nama_user'      =>  'required',
            'kodefak'  =>  'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
            'password_confirmation' => 'required|same:password', // Ini adalah validasi konfirmasi password
            'is_active' => 'required|boolean',
        ];
        
        $text = [
            'nama_user.required'           => 'Nama User harus diisi',
            'email.required'               => 'Email harus diisi',
            'kodefak.required'       => 'Jurusan harus diisi',
            'password.required'            => 'Password harus diisi',
            'password.min'                 => 'Password harus memiliki setidaknya :min karakter',
            'password.regex'               => 'Password harus mengandung huruf besar, huruf kecil, angka, dan karakter khusus',
            'password_confirmation.required' => 'Konfirmasi Password harus diisi',
            'password_confirmation.same'   => 'Konfirmasi Password harus sama dengan Password',
            'is_active.required'           => 'Status operator harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $simpan = User::create([
            'nama_user'         =>  $request->nama_user,
            'kodefak'     =>  $request->kodefak,
            'email'             =>  $request->email,
            'password'          =>  Hash::make($request->password),
            'is_active'         =>  $request->is_active,
        ]);

        $operatorRole = Role::where('name', 'operator')->first();
        $simpan->assignRole($operatorRole);

        if ($simpan) {
            return response()->json([
                'text'  =>  'Yeay, operator remunerasi berhasil ditambahkan',
                'url'   =>  url('/operator/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, operator remunerasi gagal disimpan']);
        }
    }
    public function edit(User $user){
        return $user;
    }

    public function update(Request $request){
        $user = User::where('id',$request->operator_id)->first();
        $rules = [
            'nama_user'      =>  'required',
            'kodefak'  =>  'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id), // $user adalah instance dari model User yang sedang diedit
            ],
            'is_active' => 'required|boolean',
        ];
        
        $text = [
            'nama_user.required'           => 'Nama User harus diisi',
            'email.required'               => 'Email harus diisi',
            'kodefak.required'              => 'Jurusan harus diisi',
            'is_active.required'           => 'Status operator harus diisi',
        ];

        $validasi = Validator::make($request->all(), $rules, $text);
        if ($validasi->fails()) {
            return response()->json(['error'  =>  0, 'text'   =>  $validasi->errors()->first()],422);
        }

        $update = $user->update([
            'nama_user'        =>  $request->nama_user,
            'kodefak'    =>  $request->kodefak,
            'email'            =>  $request->email,
            'is_active'        =>  $request->is_active,
        ]);

        if ($update) {
            return response()->json([
                'text'  =>  'Yeay, operator remunerasi berhasil diubah',
                'url'   =>  url('/operator/'),
            ]);
        }else {
            return response()->json(['text' =>  'Oopps, operator remunerasi gagal diubah']);
        }
    }

    public function delete(User $user){
        $delete = $user->delete();
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

    public function active(User $user){
        $user->update([
            'is_active'   =>  1,
        ]);

        $notification = array(
            'message' => 'Berhasil, operator berhasil diaktifkan',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function nonactive(User $user){
        $user->update([
            'is_active'   =>  0,
        ]);

        $notification = array(
            'message' => 'Berhasil, operator berhasil dinonaktifkan',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
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
