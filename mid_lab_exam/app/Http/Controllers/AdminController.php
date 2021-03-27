<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Admin;
use App\Car;


class AdminController extends Controller
{
    //



	public function index(){
		return view('admin.register');
	}

	public function store(Request $request){

		$umail = Admin::where('email', $request->email)->get();
		$uname = Admin::where('name',$request->user_name)->get();

		if(sizeof($umail) > 0 or sizeof($uname) > 0){

			$msg = 'username or email already exists';
			echo $msg;
		       // return back();
		}

		else{

			$user = new Admin();


			$user->name = request('name');
			$user->full_name = request('full_name');

			$user->email = request('email');
			$user->password = request('password');
			$user->dob = request('dob');
			$user->contact = request('contact');
			$user->save();

			return redirect('/admin/login');


		}




	}


	public function login(){

		return view('admin.login');
	}



	public function verify(Request $req){



		$user = DB::table('admins')
		->where('password', $req->password)
		->where('name', $req->name)
		->get();


		if($req->name == "" || $req->password == ""){
			$req->session()->flash('msg', 'null name or password...');
			return redirect('/login');

		}elseif(count($user) > 0 ){

			$req->session()->put('name', $req->name);
			return redirect('/admin/home');
		}else{

			$req->session()->flash('msg', 'Invalid name or password...');
			return redirect('/admin/login');
		}
	}




	public function home(Request $req){
		if($req->session()->has('name')){
			$cars = \App\Car::all();
			
			return view('admin.home', ['cars' => $cars]);
		}else{
			$req->session()->flash('msg', 'invalid request...login first!');
			return redirect('/admin/login');
		}
		
	}











	public function logout(Request $req){

		$req->session()->flush();
		return redirect('/admin/login');
	}






	public function addCar(Request $req){
		if($req->session()->has('name')){
			return view('admin.car');;
		}else{
			$req->session()->flash('msg', 'invalid request...login first!');
			return redirect('/admin/login');
		}
		
	}

	public function storeCar(){



	

			$user = new Car();
			$file = request('image');  
			$filename = time().".".$file->getClientOriginalExtension();
			$file->move('upload', $filename);

			$user->name = request('name');
			$user->category = request('category');
			$user->image = $filename;
			$user->price = request('price');
			$user->save();

			return redirect('/admin/car');


		




	}












}
