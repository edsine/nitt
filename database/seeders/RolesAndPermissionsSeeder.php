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

                'create gross domestic product',
                'read gross domestic product',
                'update gross domestic product',
                'delete gross domestic product',

                'create ship container traffic',
                'read ship container traffic',
                'update ship container traffic',
                'delete ship container traffic',

                'create cargo import export',
                'read cargo import export',
                'update cargo import export',
                'delete cargo import export',

                'create ship traffic grt',
                'read ship traffic grt',
                'update ship traffic grt',
                'delete ship traffic grt',

                'create port vehicular traffic',
                'read port vehicular traffic',
                'update port vehicular traffic',
                'delete port vehicular traffic',

                'create road traffic crash',
                'read road traffic crash',
                'update road traffic crash',
                'delete road traffic crash',

                'create fleet operator road traffic crash',
                'read fleet operator road traffic crash',
                'update fleet operator road traffic crash',
                'delete fleet operator road traffic crash',

                'create route road crash',
                'read route road crash',
                'update route road crash',
                'delete route road crash',

                'create vehicle plate production',
                'read vehicle plate production',
                'update vehicle plate production',
                'delete vehicle plate production',

                'create road crash causative factor',
                'read road crash causative factor',
                'update road crash causative factor',
                'delete road crash causative factor',

                'create driver license production',
                'read driver license production',
                'update driver license production',
                'delete driver license production',

                'create driver license issuance',
                'read driver license issuance',
                'update driver license issuance',
                'delete driver license issuance',

                'create driver license renewal',
                'read driver license renewal',
                'update driver license renewal',
                'delete driver license renewal',

                'create traffic offence',
                'read traffic offence',
                'update traffic offence',
                'delete traffic offence',

                'create vehicle license registration',
                'read vehicle license registration',
                'update vehicle license registration',
                'delete vehicle license registration',

                'create license renewal',
                'read license renewal',
                'update license renewal',
                'delete license renewal',

                'create vehicle registration',
                'read vehicle registration',
                'update vehicle registration',
                'delete vehicle registration',

                'create fleet accident',
                'read fleet accident',
                'update fleet accident',
                'delete fleet accident',

                'create driving test record',
                'read driving test record',
                'update driving test record',
                'delete driving test record',

                'create corporation passenger traffic',
                'read corporation passenger traffic',
                'update corporation passenger traffic',
                'delete corporation passenger traffic',

                'create fleet size composition',
                'read fleet size composition',
                'update fleet size composition',
                'delete fleet size composition',

                'create fleet operator brand',
                'read fleet operator brand',
                'update fleet operator brand',
                'delete fleet operator brand',

                'create air mode data',
                'read air mode data',
                'update air mode data',
                'delete air mode data',

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
