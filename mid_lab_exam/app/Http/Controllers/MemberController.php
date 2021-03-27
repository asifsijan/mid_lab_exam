<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Member;



class MemberController extends Controller
{
    //



	public function index(){
		return view('member.register');
	}

	public function store(Request $request){

		$umail = Member::where('email', $request->email)->get();
		$uname = Member::where('name',$request->user_name)->get();

		if(sizeof($umail) > 0 or sizeof($uname) > 0){

			$msg = 'username or email already exists';
			echo $msg;
		       // return back();
		}

		else{

			$user = new Member();


			$user->name = request('name');
			$user->full_name = request('full_name');

			$user->email = request('email');
			$user->password = request('password');
			$user->dob = request('dob');
			$user->contact = request('contact');
			$user->save();

			return redirect('/member/login');


		}




	}


	public function login(){

		return view('member.login');
	}



	public function verify(Request $req){



		$user = DB::table('members')
		->where('password', $req->password)
		->where('name', $req->name)
		->get();


		if($req->name == "" || $req->password == ""){
			$req->session()->flash('msg', 'null name or password...');
			return redirect('/login');

		}elseif(count($user) > 0 ){

			$req->session()->put('member_name', $req->name);
			return redirect('/member/home');
		}else{

			$req->session()->flash('msg', 'Invalid name or password...');
			return redirect('/member/login');
		}
	}



	public function home(Request $req){
		if($req->session()->has('member_name')){
			return view('member.home');;
		}else{
			$req->session()->flash('msg', 'invalid request...login first!');
			return redirect('/member/login');
		}
		
	}
	public function logout(Request $req){

		$req->session()->flush();
		return redirect('/member/login');
	}

}
