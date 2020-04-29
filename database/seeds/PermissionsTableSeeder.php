<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'         => '1',
                'title'      => 'user_management_access',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '2',
                'title'      => 'permission_create',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '3',
                'title'      => 'permission_edit',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '4',
                'title'      => 'permission_show',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '5',
                'title'      => 'permission_delete',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '6',
                'title'      => 'permission_access',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '7',
                'title'      => 'role_create',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '8',
                'title'      => 'role_edit',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '9',
                'title'      => 'role_show',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '10',
                'title'      => 'role_delete',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '11',
                'title'      => 'role_access',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '12',
                'title'      => 'user_create',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '13',
                'title'      => 'user_edit',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '14',
                'title'      => 'user_show',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '15',
                'title'      => 'user_delete',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '16',
                'title'      => 'user_access',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '17',
                'title'      => 'announcement_create',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '18',
                'title'      => 'announcement_edit',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '19',
                'title'      => 'announcement_show',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '20',
                'title'      => 'announcement_delete',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '21',
                'title'      => 'announcement_access',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '22',
                'title'      => 'minute_create',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '23',
                'title'      => 'minute_edit',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '24',
                'title'      => 'minute_show',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '25',
                'title'      => 'minute_delete',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '26',
                'title'      => 'minute_access',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],

            [
                'id'         => '27',
                'title'      => 'verify_create',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '28',
                'title'      => 'verify_edit',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '29',
                'title'      => 'verify_show',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '30',
                'title'      => 'verify_delete',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '31',
                'title'      => 'verify_access',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],

            [
                'id'         => '32',
                'title'      => 'movement_create',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '33',
                'title'      => 'movement_edit',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '34',
                'title'      => 'movement_show',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '35',
                'title'      => 'movement_delete',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '36',
                'title'      => 'movement_access',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '37',
                'title'      => 'profile_edit',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ],
            [
                'id'         => '38',
                'title'      => 'profile_access',
                'created_at' => '2020-04-15 19:14:42',
                'updated_at' => '2020-04-15 19:14:42',
            ]
        ];

        Permission::insert($permissions);
    }
}
