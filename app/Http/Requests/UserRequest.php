<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

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
		$id = ($this->users ?: 'NULL');
		
		return [
			'name' => 'required|min:2|max:255',
			'email' => 'required|min:2|max:255|unique:users,email,' . $id
		];
	}

}
