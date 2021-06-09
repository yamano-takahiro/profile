<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    public function index(Request $request)
    {
    	$hasItems = Person::has('boards')->get();
    	$noItems = Person::doesntHave('boards')->get();
    	$param = ['hasItems' => $hasItems, 'noItems' => $noItems];
    	return view('person.index', $param);
    }
    
    public function find(Request $request)
    {
    	return view('person.find', ['input' => '']);
    }
    
    public function search(Request $request)
    {
    	$min = $request->input * 1;
    	$max = $min + 10;
    	$item = Person::ageGreaterThan($min)->ageLessThan($max)->first();
    	$param = ['input' => $request->input, 'item' => $item];
    	return view('person.find', $param);
    }
    
    public function add(Request $request)
	{
		return view('person.add');
	}
	
	public function create(Request $request)
	{
		$this->validate($request, Person::$rules);
		$param = [
			'name' => $request->name,
			'mail' => $request->mail,
			'age' => $request->age,
		];
		DB::table('people')->insert($param);
		return redirect('/person');
	}
	
	public function edit(Request $request) {
		$item = DB::table('people')->where('id', $request->id)->first();
		return view('person.edit', ['form' => $item]);
	}
	
	public function update(Request $request) {
		$param = [
			'name' => $request->name,
			'mail' => $request->mail,
			'age' => $request->age,
		];
		DB::table('people')
			->where('id', $request->id)
			->update($param);
		return redirect('/person');
	}
	
	public function delete(Request $request) {
		$item = DB::table('people')->where('id', $request->id)->first();
		return view('person.del', ['form' => $item]);
	}
	
	public function remove(Request $request) {
		DB::table('people')->where('id', $request->id)->delete();
		return redirect('/person');
	}
}
