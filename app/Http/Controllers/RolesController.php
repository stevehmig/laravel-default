<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Requests\RoleRequest;

use App\Http\Controllers\Controller;

use App\Role;
use App\User;

class RolesController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
		$this->middleware('dbadmin',['only'=>'destroy']);
		$this->view_data = ['model_name'=>'App\Role',
		                    'title'=>'Role',
							'model'=>'Role',
              'controller_name'=>'RolesController',
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
		$roles = Role::all();
		$this->view_data['content'] = $roles;
		return view('default',$this->view_data);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('default',$this->view_data);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(RoleRequest $request)
	{
		$data = $request->except('user_ids');
    
		$new_role = Role::create($data);
		
		$users = $request->only('user_ids')['user_ids'];
		if (! is_null($users))
		{
			$new_role->users()->sync($users);
		}
/*      Mail::raw('This is the test email content', function($message){
      $message->from($this->user->email)->to('steveh@migcom.com')->subject('test');
    });  */
		return redirect('roles');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$role = Role::findOrFail($id);
		$this->view_data['content'] = $role;
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
		$role = Role::findOrFail($id);
		$this->view_data['content'] = $role;
		return view('default',$this->view_data);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(RoleRequest $request, $id)
	{
		$role = Role::findOrFail($id);
		$data = $request->except('user_ids');
		$role->update($data);
		
		$users = $request->only('user_ids')['user_ids'];
		if (is_null($users))
			$role->users()->detach();
		else
			$role->users()->sync($users);
		
		return redirect('roles');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Role::destroy($id);
		return redirect('roles');
	}

}
