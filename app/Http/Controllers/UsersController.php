<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

use App\User;
use App\Role;

class UsersController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
		$this->view_data = ['model_name'=>'App\User',
		                    'title'=>'User',
							'model'=>'User',
              'controller_name'=>'UsersController',
							'content'=>null,
							'checkbox'=>null
							];
    
    parent::__construct();
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();
		$this->view_data['content'] = $users;
		return view('default',$this->view_data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);
		$this->view_data['content'] = $user;
		return view('default',$this->view_data);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::findOrFail($id);
		$this->view_data['content'] = $user;
		return view('default',$this->view_data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(UserRequest $request, $id)
	{
		$user = User::findOrFail($id);
		$data = $request->except('role_ids');
		$user->update($data);
		
		$roles = $request->only('role_ids')['role_ids'];
		if (is_null($roles))
			$user->roles()->detach();
		else
			$user->roles()->sync($roles);
		
		return redirect('users');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
