<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = array(
                        array( 'role' => 'superadmin', 'description' => ''),
                        array( 'role' => 'admin', 'description' => ''),
                        array( 'role' => 'auther', 'description' => ''),
                        array( 'role' => 'editor', 'description' => ''),
                        array( 'role' => 'subscriber', 'description' => ''),
        );
        foreach ( $roles as $key => $value ){

            DB::table('roles')->insert([
                'role'          => $value['role'],
                'description'   => $value['description'],
            ]);

        }
    }
}
