<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;

class ApiController extends Controller
{

    // login
    function login(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
		
		$login = Auth::Attempt($data);
		
		if( ! $login)
		{
			return [
				'login' => false,
				'msg' => "Email/Password Salah."
			];
		}

        if (Auth::user()->is_admin)
        {
            return [
				'login' => false,
				'msg' => "Gunakan Akun User."
			];
        }
		
		return [
             'email' => Auth::user()->email,
             'user_id' => Auth::user()->id,
             'admin' => Auth::user()->is_admin,
             'login' => true
        ];
    }    

    //  register
    function register(Request $request)
    {
        // if($request->password !== $request->password_confirm)
        // {
        //   return [
        //        'registered' => false,
        //        'msg' => 'Password konfirmasi tidak sama'
        //   ];
        // } 

        if(User::where(['email'=>$request->email])->get()->count() !== 0){
            return [
                'registered' => false,
                'msg' => 'Email sudah terdaftar.'
            ];
        }

        $register = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($register) return [
            'registered' => true,
            'msg' => 'Registrasi berhasil silahkan login'
        ];

        return [
            'registered' => false,
            'msg' => 'Registrasi gagal'
        ];
    }
// Pesan
// mengambil pesan
    function messageGet($receiver_id)
    {
        $where = [
            1,
            $receiver_id,
            $receiver_id,
            1,
        ];

        $chats = DB::select('SELECT * FROM (
                                        SELECT * FROM chats WHERE sender_id = ? AND receiver_id = ? 
                                        UNION SELECT * FROM chats WHERE sender_id = ? AND receiver_id = ?) 
                                AS A order BY A.id', $where);

        return $chats;
    }
// kirim pesan
    function messageSend(Request $request)
    {

        if( ! $request->valid) return ['valid'=>false];		
		return Chat::create([
                    'sender_id' => $request->sender_id,
                    'receiver_id' => 1,
                    'message' => $request->message,
                    'type' => ($request->image_base64 == 'false') ? 0 : 2,
					'image_base64' => $request->image_base64,
                    'valid' => true
        ]);
    }
	// cek id pesan
	function checkNewMessage($id, $count)
	{
		$where = [
            1,
            $id,
            $id,
            1,
        ];

        $D['receiverId'] = $id;
        $D['chats'] = DB::select('SELECT * FROM (
                                        SELECT * FROM chats WHERE sender_id = ? AND receiver_id = ? 
                                        UNION SELECT * FROM chats WHERE sender_id = ? AND receiver_id = ?) 
                                AS A order BY A.id', $where);
								
		if(count($D['chats']) == $count) return [
			'new_message' => false
		];
		
		return [
			'new_message' => true,
			'count' => count($D['chats'])
		];
	}
// room
    function room($id)
    {
        $where = [
            1,
            $id,
            $id,
            1,
        ];

        $D['receiverId'] = $id;
        $D['user'] = User::where(['id' => $id])->get()->first();
        $D['chats'] = DB::select('SELECT * FROM (
                                        SELECT * FROM chats WHERE sender_id = ? AND receiver_id = ? 
                                        UNION SELECT * FROM chats WHERE sender_id = ? AND receiver_id = ?) 
                                AS A order BY A.id', $where);
        return view('room_mobile', $D);
    }
}
