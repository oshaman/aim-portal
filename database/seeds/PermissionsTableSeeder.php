<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert(
            [
                ['name'=>'ADMIN_USERS'],
                ['name'=>'VIEW_ADMIN'],
                ['name'=>'EDIT_USERS'],
                ['name'=>'DATA_APPROVAL'],
                ['name'=>'EDIT_PERMISSIONS'],
                ['name'=>'UPDATE_CATEGORIES'],
                ['name'=>'UPDATE_TAGS'],
            ]
        );
    }
}
