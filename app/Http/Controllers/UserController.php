<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UserController extends Controller
{
	public function index(Request $request) {
		return $request->user();
	}

	public function login(Request $request) {
		echo "This is test controller with parameter " . $request->password . " = " . Hash::make($request->password);
		echo "<br> Test to user<br>";
		$user = User::where('email',$request->email)->first();
		if($user) {
			echo "<p style='color:green'>User found</p>";
			if (Hash::check($request->password, $user->password)) {
				echo "<p style='color:green'>Valid, password match</p>";
				$new_api_token = Str::random(64);
				$user->api_token = $new_api_token;
				echo "<p style='color:green'>Generated new api_token</p>";
				$duration = "14 days";
				$user->unvalid_at = date('Y-m-d H:i:s',strtotime($duration));
				echo "<p style='color:green'>Extend for " . $duration . " new api_token</p>";
				$user->save();
				echo "<p>api_token = " . $user->api_token . "</p>";
				echo "<p>unvalid_at = " . $user->unvalid_at . "</p>";
			} else {
				echo "<p style='color:red'>Not Valid, password not match</p>";
			}
		} else {
			echo "<p style='color:red'>User Not Found</p>";
		}
	}

	private function extendExpireKey(User $user) {
		echo "<pre>Extended befor " . $user->unvalid_at . "</pre>";
		$duration = "7 days";
		$user->unvalid_at = date('Y-m-d H:i:s',strtotime($duration));
		$user->save();
		echo "<pre>Extended after " . $user->unvalid_at . "</pre>";
		echo "<p style='color:green'>Extend Expire key success</p>";
	}

	public function testKey(Request $request) {
		$user = User::where('api_token',$request->api_token)->first();
		if($user){
			if(date('Y-m-d H:i:s') < $user->unvalid_at) {
				$this->extendExpireKey($user);
			} else {
				return response('Unauthorized. API Token Expire', 401);
			}
		} else {
			// return response('Unauthorized. User Not Found', 401);
			echo "<p style='color:red'>User Not Found</p>";
		}
	}

	// public function getUser(Request $request) {
	// 	// return User::first();
	// 	return $request->user();
	// }
}


