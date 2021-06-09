<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use App\User;
use Session;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
class RestoController extends Controller

{
    function index() {
        return view('home');
    }

    function list() {
        $data =  Restaurant::all();
        return view('list', ["data"=>$data]);
    }

    function add(Request $req) {
        // return $req->input();
        $resto = new Restaurant;
        $resto->name = $req->input('name');
        $resto->email = $req->input('email');
        $resto->address = $req->input('address');
        $resto->save();
        $req->session()->flash('status', 'Restaurant Submitted Successfully');
        return redirect('list');
    }

    function delete($id) {
        Restaurant::find($id)->delete();
        Session::flash('status', 'Restaurant Delete Successfully');
        return redirect('list');
    }

    function edit($id) {
        $data = Restaurant::find($id);
        return view('edit',['data'=>$data]);
    }

    function update(Request $req) {
        $resto = Restaurant::find($req->input('id'));
        $resto->name = $req->input('name');
        $resto->email = $req->input('email');
        $resto->address = $req->input('address');
        $resto->save();
        $req->session()->flash('status', 'Restaurant Updated Successfully');
        return redirect('list');
    }

    function register(Request $req) {
        // return $req->input();
        $user = new User;
        $user->name=$req->input('name');
        $user->email=$req->input('email');
        $user->password= Crypt::encrypt($req->input('password'));
        $user->contact=$req->input('contact');
        $user->save();
        $req->session()->put('user', $req->input('name'));
        return redirect('/');
    }

    function login(Request $req) {
        $user = User::where("email", $req->input('email'))->get();
        if(Crypt::decrypt($user[0]->password)==$req->input('password'))
        {
            $req->session()->put('user',$req->input('name'));
            return redirect('/');
        }
    }
}
