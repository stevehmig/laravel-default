<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class RoleRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$id = ($this->roles ?: 'NULL');
		
		return [
			'permission' => 'required|unique:roles,permission,' . $id,
			'name' => 'required|min:2|max:25|unique:roles,name,' . $id,
		];
	}

}
