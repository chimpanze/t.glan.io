<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'Administrator (kann andere Benutzer erstellen)',],
            ['id' => 2, 'title' => 'Einfacher Benutzer',],

        ];

        foreach ($items as $item) {
            \App\Role::create($item);
        }
    }
}
