<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Role::count() == 0) {
            // Reset cached roles and permissions
            app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

            $arrayOfPermissionNames =
            [
                'create user',
                'read user',
                'update user',
                'delete user',

                'create role',
                'read role',
                'update role',
                'delete role',

                'create air passengers traffic',
                'read air passengers traffic',
                'update air passengers traffic',
                'delete air passengers traffic',

                'create air transport data',
                'read air transport data',
                'update air transport data',
                'delete air transport data',

                'create freight road transport data',
                'read freight road transport data',
                'update freight road transport data',
                'delete freight road transport data',

                'create maritime academy',
                'read maritime academy',
                'update maritime academy',
                'delete maritime academy',

                'create maritime administration',
                'read maritime administration',
                'update maritime administration',
                'delete maritime administration',

                'create maritime transport',
                'read maritime transport',
                'update maritime transport',
                'delete maritime transport',

                'create passenger road transport data',
                'read passenger road transport data',
                'update passenger road transport data',
                'delete passenger road transport data',

                'create railway passenger',
                'read railway passenger',
                'update railway passenger',
                'delete railway passenger',

                'create railway rolling stock',
                'read railway rolling stock',
                'update railway rolling stock',
                'delete railway rolling stock',

                'create railway safety',
                'read railway safety',
                'update railway safety',
                'delete railway safety',

                'create train punctuality',
                'read train punctuality',
                'update train punctuality',
                'delete train punctuality',

                'create vehicle importation',
                'read vehicle importation',
                'update vehicle importation',
                'delete vehicle importation',

            ];
            $permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
                return ['name' => $permission, 'guard_name' => 'web'];
            });

            Permission::insert($permissions->toArray());

            // create roles and assign created permissions

            $super_admin_role = Role::create(['name' => 'super-admin']);
            $super_admin_role->givePermissionTo(Permission::all());

            $data_viewer_role = Role::create(['name' => 'data-viewer']);

            $mda_admin_role = Role::create(['name' => 'mda-admin']);
        }
    }
}
