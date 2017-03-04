<?php

use Illuminate\Database\Seeder;

# Include our User's model
use App\User;

# Include our models for role and permission yo
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		// ADMIN - can create, edit and delete any ads
	    $admin     = Role::create([ 'name' => 'admin' ]);

	    // MODERATOR - can edit any ads
	    $moderator = Role::create([ 'name' => 'moderator' ]);

	    // USER - can create ads, edit own ads, delete own ads
	    $user      = Role::create([ 'name' => 'user' ]);



	    // CREATE OUR PERMISSIONS
		$permissions = [
	        [ 'name' => 'create ads' ],
	        [ 'name' => 'edit any ads' ],
	        [ 'name' => 'edit own ads' ],
	        [ 'name' => 'delete any ads' ],
	        [ 'name' => 'delete own ads' ],
	    ];

		foreach ($permissions as $permission) {
			// Here we create each permission one by one
			// so the created/updated at date is auto set
			// When you do it the other way using Model::insert($array)
			// it doesn't auto set the created/updated at date, the only way
			// around that is to add in a timestamp into the content array for
			// those two fields. But I find this way much easier and cleaner

			// Insert the new permission
		    $create_permissions = Permission::create($permission);
		}

	    // ATTACH PERMISSIONS TO ROLES
	    $admin->givePermissionTo([
	        'edit any ads',
	        'delete any ads',
	    ]);
	    $moderator->givePermissionTo([
	        'edit any ads',
	    ]);
	    $user->givePermissionTo([
	        'create ads',
	        'edit own ads',
	        'delete own ads'
	    ]);


		// Attach permissions and roles to our admin
		User::find(1)->assignRole([ 'user','admin' ]);
    }
}
