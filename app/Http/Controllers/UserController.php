<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Thread;
use App\Message;
use Illuminate\Support\Facades\Crypt;
use Mockery\CountValidator\Exception;

class UserController extends Controller
{

    public function home ()
    {
        return view('home');
    }

    public function getUsers ()
    {
        $arr    = [];
        $data   = User::get();

        foreach($data as $row) {
            $arr[] = [ 'id' => Crypt::encryptString($row->id), 'name'  => 'asdasd' ];
        }

        return $arr;
    }

    public function getThread (Request $request)
    {
        $id = $request->input('id');

        $decrypted_id = Crypt::decryptString($id);

        try {
            $thread_id = Thread::orWhere('createdBy_id', $decrypted_id)->orWhere('receiver_id', $decrypted_id)->first()->id;

            $message = Message::where('thread_id', $thread_id)->get();

        } catch (Exception $e ){
            $message = "";
        }

        return $message;
    }

    public function login (Request $request)
    {
        if ($request->isMethod('post')) {
            return redirect()->intended('/home');
        } else {
            return view('login');
        }
    }

    public function validateUser (Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if($password) {
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                return redirect()->intended('home');
            }
        } else {
            if(User::where('email', $email)->exists()) {
                return 1;
            }
        }

        return $password;
    }
}