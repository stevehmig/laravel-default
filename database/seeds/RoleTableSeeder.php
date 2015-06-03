<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class RoleTableSeeder extends Seeder {

	public function run()
	{
		App\Role::create(['permission'=> 0, 'name' => 'DB Admin']);
		App\Role::create(['permission'=> 1, 'name' => 'Admin']);
		App\Role::create(['permission'=> 2, 'name' => 'Consultant']);
		App\Role::create(['permission'=> 3, 'name' => 'Client']);
		App\Role::create(['permission'=> 4, 'name' => 'Developer']);
    App\Role::create(['permission'=> 5, 'name' => 'Public']);

	}

}