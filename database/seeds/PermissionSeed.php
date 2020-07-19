<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'project_access',],
            ['id' => 18, 'title' => 'project_create',],
            ['id' => 19, 'title' => 'project_edit',],
            ['id' => 20, 'title' => 'project_view',],
            ['id' => 21, 'title' => 'project_delete',],
            ['id' => 22, 'title' => 'language_access',],
            ['id' => 23, 'title' => 'language_create',],
            ['id' => 24, 'title' => 'language_edit',],
            ['id' => 25, 'title' => 'language_view',],
            ['id' => 26, 'title' => 'language_delete',],
            ['id' => 27, 'title' => 'context_access',],
            ['id' => 28, 'title' => 'context_create',],
            ['id' => 29, 'title' => 'context_edit',],
            ['id' => 30, 'title' => 'context_view',],
            ['id' => 31, 'title' => 'context_delete',],
            ['id' => 32, 'title' => 'string_access',],
            ['id' => 33, 'title' => 'string_create',],
            ['id' => 34, 'title' => 'string_edit',],
            ['id' => 35, 'title' => 'string_view',],
            ['id' => 36, 'title' => 'string_delete',],
            ['id' => 37, 'title' => 'translation_access',],
            ['id' => 38, 'title' => 'translation_create',],
            ['id' => 39, 'title' => 'translation_edit',],
            ['id' => 40, 'title' => 'translation_view',],
            ['id' => 41, 'title' => 'translation_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
