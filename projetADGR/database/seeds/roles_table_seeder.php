<?php

use Illuminate\Database\Seeder;
use App\Role as Role;
class roles_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(["libelle" => "admin"]);
    }
}
