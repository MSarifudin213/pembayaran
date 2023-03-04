<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use DB;
use Session;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        return view('admin');
    }

    function peopleList()
    {
        $D['users'] = User::get()->all();
        return view('ajax.people_list', $D);
    }

    function room(Request $request, $id)
    {
        $where = [
            Session::get('user_id'),
            $id,
            $id,
            Session::get('user_id'),
        ];

        $D['receiverId'] = $id;
        $D['user'] = User::where(['user_id' => $id])->get()->first();
        $D['chats'] = DB::select('SELECT * FROM (
                                        SELECT * FROM chats WHERE sender_id = ? AND receiver_id = ? 
                                        UNION SELECT * FROM chats WHERE sender_id = ? AND receiver_id = ?) 
                                AS A order BY A.id', $where);

        return view('ajax.room', $D);
    }

    function messageSend(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = date('d-m-Y-H-i-s-') . $file->getClientOriginalName();
            Storage::disk('local')->putFileAs(
                'public/',
                $file,
                $filename
            );

            return Chat::create([
                'sender_id' => 1,
                'receiver_id' => $request->receiverId,
                'message' => $request->message,
                'type' => 1,
                'url_file' =>  $filename,
            ]);
        }

        if ($request->message) Chat::create([
            'sender_id' => 1,
            'receiver_id' => $request->receiverId,
            'message' => $request->message,
            'type' => 0,
            'url_file' => '',
        ]);
    }
}
