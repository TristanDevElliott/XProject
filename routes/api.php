<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::post('users/media', 'UsersApiController@storeMedia')->name('users.storeMedia');
    Route::apiResource('users', 'UsersApiController');

    // Categories
    Route::post('categories/media', 'CategoriesApiController@storeMedia')->name('categories.storeMedia');
    Route::apiResource('categories', 'CategoriesApiController');

    // Settings
    Route::post('settings/media', 'SettingsApiController@storeMedia')->name('settings.storeMedia');
    Route::apiResource('settings', 'SettingsApiController');

    // Pages
    Route::post('pages/media', 'PagesApiController@storeMedia')->name('pages.storeMedia');
    Route::apiResource('pages', 'PagesApiController');

    // Media Libraries
    Route::post('media-libraries/media', 'MediaLibraryApiController@storeMedia')->name('media-libraries.storeMedia');
    Route::apiResource('media-libraries', 'MediaLibraryApiController');

    // Tags
    Route::apiResource('tags', 'TagsApiController');

    // Articles
    Route::post('articles/media', 'ArticlesApiController@storeMedia')->name('articles.storeMedia');
    Route::apiResource('articles', 'ArticlesApiController');
});
