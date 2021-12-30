<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class TestController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		//
	}

	public function index() {
		return "This is test controller";
	}

	public function parameter($name) {
		return "This is test controller with parameter " . $name;
	}

	public function parameterRequest(Request $request) {
		return "This is test controller with parameter Request " . $request->input('name');
	}

	public function getUser(Request $request) {
		// return User::first();
		// echo $request->user()->unvalid_at . "<br>";
		// echo date('Y-m-d H:i:s') . "<br>";
		// echo date('Y-m-d H:i:s') < $request->user()->unvalid_at;
		return $request->user();
	}
}
