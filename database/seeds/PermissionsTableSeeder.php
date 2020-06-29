<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'category_create',
            ],
            [
                'id'    => '18',
                'title' => 'category_edit',
            ],
            [
                'id'    => '19',
                'title' => 'category_show',
            ],
            [
                'id'    => '20',
                'title' => 'category_delete',
            ],
            [
                'id'    => '21',
                'title' => 'category_access',
            ],
            [
                'id'    => '22',
                'title' => 'setting_create',
            ],
            [
                'id'    => '23',
                'title' => 'setting_edit',
            ],
            [
                'id'    => '24',
                'title' => 'setting_show',
            ],
            [
                'id'    => '25',
                'title' => 'setting_delete',
            ],
            [
                'id'    => '26',
                'title' => 'setting_access',
            ],
            [
                'id'    => '27',
                'title' => 'page_create',
            ],
            [
                'id'    => '28',
                'title' => 'page_edit',
            ],
            [
                'id'    => '29',
                'title' => 'page_show',
            ],
            [
                'id'    => '30',
                'title' => 'page_delete',
            ],
            [
                'id'    => '31',
                'title' => 'page_access',
            ],
            [
                'id'    => '32',
                'title' => 'option_access',
            ],
            [
                'id'    => '33',
                'title' => 'post_access',
            ],
            [
                'id'    => '34',
                'title' => 'media_library_create',
            ],
            [
                'id'    => '35',
                'title' => 'media_library_edit',
            ],
            [
                'id'    => '36',
                'title' => 'media_library_show',
            ],
            [
                'id'    => '37',
                'title' => 'media_library_delete',
            ],
            [
                'id'    => '38',
                'title' => 'media_library_access',
            ],
            [
                'id'    => '39',
                'title' => 'tag_create',
            ],
            [
                'id'    => '40',
                'title' => 'tag_edit',
            ],
            [
                'id'    => '41',
                'title' => 'tag_show',
            ],
            [
                'id'    => '42',
                'title' => 'tag_delete',
            ],
            [
                'id'    => '43',
                'title' => 'tag_access',
            ],
            [
                'id'    => '44',
                'title' => 'article_create',
            ],
            [
                'id'    => '45',
                'title' => 'article_edit',
            ],
            [
                'id'    => '46',
                'title' => 'article_show',
            ],
            [
                'id'    => '47',
                'title' => 'article_delete',
            ],
            [
                'id'    => '48',
                'title' => 'article_access',
            ],
            [
                'id'    => '49',
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
