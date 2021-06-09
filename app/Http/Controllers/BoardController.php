<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
use Illuminate\Support\Facades\Auth;

class BoardController extends Controller
{
    public function top(Request $request)
    {
    	return view('board.top');
    }
    
    public function index(Request $request)
    {
    	$items = Board::with('user')->get();
    	return view('board.index', ['items' => $items]);
    }
    
    public function add(Request $request)
    {
    	return view('board.add');
    }
    
    public function create(Request $request)
    {
    	$this->validate($request, Board::$rules);
    	$board = new Board;
    	$form = $request->all();
    	unset($form['_token']);
    	$board->fill($form)->save();
    	return redirect('/board');
    }
    
    public function getAuth(Request $request)
    {
    	$param = ['message' => 'ログインしてださい。'];
    	return view ('board.auth', $param);
    }
    
    public function postAuth(Request $request)
    {
    	$email = $request->email;
    	$password = $request->password;
    	if (Auth::attempt(['email' => $email, 'password' => $password])){
    		$msg = 'ログインしました。(' . Auth::user()->name . ')';
    		return redirect('/top');
    	} else {
    		$msg = 'ログインに失敗しました。';
    	}
    	return view ('board.auth',['message' => $msg]);
    }
}
