<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
		$this->call(BackUserSeeder::class);
		$this->call(BackRoleSeeder::class);
		$this->call(BackPermissionSeeder::class);
		$this->call(BackRoleUserSeeder::class);
		$this->call(BackPermissionRoleSeeder::class);
    }
}
