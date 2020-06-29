<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'avatar'                   => 'Avatar',
            'avatar_helper'            => '',
            'bio'                      => 'Bio',
            'bio_helper'               => '',
            'first_name'               => 'First Name',
            'first_name_helper'        => '',
            'last_name'                => 'Last Name',
            'last_name_helper'         => '',
            'website'                  => 'Website',
            'website_helper'           => '',
            'cover_picture'            => 'Cover Picture',
            'cover_picture_helper'     => '',
            'articles'                 => 'Articles',
            'articles_helper'          => '',
            'api_token'                => 'Api Token',
            'api_token_helper'         => '',
        ],
    ],
    'category'       => [
        'title'          => 'Categories',
        'title_singular' => 'Category',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'cat_picture'        => 'Cat Picture',
            'cat_picture_helper' => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'slug'               => 'Slug',
            'slug_helper'        => '',
            'description'        => 'Description',
            'description_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'setting'        => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => '',
            'app_name'                  => 'App Name',
            'app_name_helper'           => '',
            'app_description'           => 'App Description',
            'app_description_helper'    => '',
            'app_keywords'              => 'App Keywords',
            'app_keywords_helper'       => '',
            'app_author'                => 'App Author',
            'app_author_helper'         => '',
            'app_author_link'           => 'App Author Link',
            'app_author_link_helper'    => '',
            'app_logo'                  => 'App Logo',
            'app_logo_helper'           => '',
            'app_favicon'               => 'App Favicon',
            'app_favicon_helper'        => '',
            'created_at'                => 'Created at',
            'created_at_helper'         => '',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => '',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => '',
            'users_can_register'        => 'Users Can Register',
            'users_can_register_helper' => '',
            'admin_email'               => 'Admin Email',
            'admin_email_helper'        => '',
            'posts_per_page'            => 'Posts Per Page',
            'posts_per_page_helper'     => '',
            'default_role'              => 'Default Role',
            'default_role_helper'       => '',
        ],
    ],
    'page'           => [
        'title'          => 'Pages',
        'title_singular' => 'Page',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'title'                 => 'Title',
            'title_helper'          => '',
            'content'               => 'Content',
            'content_helper'        => '',
            'visibility'            => 'Visibility',
            'visibility_helper'     => '',
            'slug'                  => 'Slug',
            'slug_helper'           => '',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => '',
            'allow_comments'        => 'Allow Comments',
            'allow_comments_helper' => '',
            'content_body'          => 'Content Body',
            'content_body_helper'   => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
        ],
    ],
    'option'         => [
        'title'          => 'Options',
        'title_singular' => 'Option',
    ],
    'post'           => [
        'title'          => 'Posts',
        'title_singular' => 'Post',
    ],
    'mediaLibrary'   => [
        'title'          => 'Media Library',
        'title_singular' => 'Media Library',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
            'name'                   => 'Name',
            'name_helper'            => '',
            'title_attribute'        => 'Title Attribute',
            'title_attribute_helper' => '',
            'picture'                => 'Picture',
            'picture_helper'         => '',
            'user'                   => 'User',
            'user_helper'            => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => '',
        ],
    ],
    'tag'            => [
        'title'          => 'Tags',
        'title_singular' => 'Tag',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'description'        => 'Description',
            'description_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'article'        => [
        'title'          => 'Posts',
        'title_singular' => 'Post',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'title'                 => 'Title',
            'title_helper'          => '',
            'content'               => 'Content',
            'content_helper'        => '',
            'featured_image'        => 'Featured Image',
            'featured_image_helper' => '',
            'categories'            => 'Categories',
            'categories_helper'     => '',
            'tags'                  => 'Tags',
            'tags_helper'           => '',
            'excerpt'               => 'Excerpt',
            'excerpt_helper'        => '',
            'status'                => 'Status',
            'status_helper'         => '',
            'visibility'            => 'Visibility',
            'visibility_helper'     => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
        ],
    ],
];
