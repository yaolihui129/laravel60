<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/**
 * 缓存练习
 */
class CacheController extends Controller
{
	public function putCache(){
		
		\Cache::put('key1','val1',10);
		dd('put 成功');
	}
	
	public function addCache(){
		
		$bool = \Cache::add('key1','val1',10);
		dd($bool);
	}
	
	public function foreverCache(){
		
		\Cache::forever('key1','val1');
		dd('forever 成功');
	}
	
	public function hasCache(){
		$val=\Cache::has('key1');
		if($val){
			dd($val);
		}else{
			dd('No!');
		}
	}
	
	public function getCache(){
		dd(\Cache::get('key1'));
	}
	
	public function pullCache(){
		$bool=\Cache::pull('key1');
		$val=\Cache::get('key1');
		dd([$bool,$val]);
	}
	public function forgetCache(){
		$bool=\Cache::forget('key1');
		$val=\Cache::get('key1');
		dd([$bool,$val]);
	}



}
