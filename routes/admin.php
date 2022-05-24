<?php

use Illuminate\Support\Facades\Route;


################################## Begin Admin Routes ##################################

//Route::get('admin/login', 'Admin\AdminController@login')->name('login');

Route::get('ddd',function () {

    return bcrypt("ali");

} );
Route::group(['namespace' => 'Admin'], function () {

    Route::group(['middleware' => 'guest:admin'], function () {
        Route::get('login', 'AdminController@getLogin')->name('adminLogin');
        Route::post('login', 'AdminController@postLogin')->name('adminLogin');
        Route::get('forgot-password', 'AdminController@getMail')->name('getForgotPassword');
        Route::post('forgot-password', 'AdminController@sendMail')->name('postForgotPassword');
        Route::get('reset-password/{token}', 'AdminController@createPassword')->name('getResetPassword');
        Route::post('reset-password', 'AdminController@storePassword')->name('postResetPassword');
    });
    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('adminDashboard');
        Route::get('logout', 'AdminController@logout')->name('adminLogout');
        Route::get('settings', 'AdminController@settings')->name('adminSettings');
        Route::post('settings', 'AdminController@updatePassword')->name('adminSettings');


        Route::get('chats', 'ChatsController@index')->name('Chats.admin');

        ########## Begin Category Route (Admin) ##########
        Route::get('add-category', 'CategoryController@create')->name('add.category');
        Route::post('add-category', 'CategoryController@store')->name('store.new.category');
        Route::get('view-categories', 'CategoryController@index')->name('view.category');
        Route::get('edit-category/{id}', 'CategoryController@edit')->name('edit.category');
        Route::post('update-category/{id}', 'CategoryController@update')->name('update.category');
        Route::post('delete-category', 'CategoryController@delete')->name('delete.category');
        Route::get('show-sub-categories/{id}', 'CategoryController@show')->name('show.categorySubCategory');
        ########## End Category Route (Admin) ##########


        ########## Begin Sub-Category Route (Admin) ##########
        Route::get('add-sub-category', 'SubCategoryController@create')->name('add.subCategory');
        Route::post('add-sub-category', 'SubCategoryController@store')->name('store.new.subCategory');
        Route::get('view-sub-categories', 'SubCategoryController@index')->name('view.subCategory');
        Route::get('edit-sub-category/{id}', 'SubCategoryController@edit')->name('edit.subCategory');
        Route::post('update-sub-category/{id}', 'SubCategoryController@update')->name('update.subCategory');
        Route::post('delete-sub-category', 'SubCategoryController@delete')->name('delete.subCategory');
        Route::get('show-subCategory-products/{id}', 'SubCategoryController@show')->name('show.subCategoryProduct');
        ########## End Sub-Category Route (Admin) ##########


        ########## Begin Product Route (Admin) ##########
        Route::get('add-product', 'ProductController@create')->name('add.product');
        Route::post('add-product', 'ProductController@store')->name('store.new.product');
        Route::get('view-products', 'ProductController@index')->name('view.products');
        Route::get('edit-products/{id}', 'ProductController@edit')->name('edit.product');
        Route::get('image-products/{id}', 'ProductController@addImages')->name('image.product');
        Route::post('image-products', 'ProductController@saveProductImagesInDirectory')->name('save.image.product');
        Route::post('image-products-db', 'ProductController@saveProductImagesDb')->name('save.image.product.Db');
        Route::post('delete-image-in-file', 'ProductController@removeImageInDirectory')->name('removeImg');
        Route::post('delete-image-in-file-db', 'ProductController@removeImageDb')->name('remove.Img');
        Route::post('update-products/{id}', 'ProductController@update')->name('update.product');
        Route::get('delete-product/{id}', 'ProductController@delete')->name('delete.products');
        Route::get('show-product/{id}', 'ProductController@show')->name('show.product');
        Route::post('show-subCategory-p', 'ProductController@show_SubCategory')->name('show.subCategory');

        ########## End product Route (Admin) ##########


        ########## Begin Attribute Route (Admin) ##########
        Route::get('add-attribute', 'AttributeController@create')->name('add.attribute');
        Route::post('store-attribute', 'AttributeController@store')->name('store.new.attribute');
        Route::get('view-attribute', 'AttributeController@index')->name('view.attribute');
        Route::get('edit-attribute/{id}', 'AttributeController@edit')->name('edit.attribute');
        Route::post('update-attribute/{id}', 'AttributeController@update')->name('update.attribute');
        Route::get('delete-attribute/{id}', 'AttributeController@delete')->name('delete.attribute');
        ########## End Attribute Route (Admin) ##########

        ########## Begin Products Attribute Route (Admin) ##########
        Route::get('add-product-attribute/{id}', 'ProductController@createAttribute')->name('add.products.attribute');
        Route::post('store-product-attribute', 'ProductController@storeAttribute')->name('store.new.products.attribute');
        Route::get('edit-product-attribute/{id}', 'ProductController@editAttribute')->name('edit.products.attribute');
        Route::post('update-product-attribute/{id}/{id2}', 'ProductController@updateAttribute')->name('update.products.attribute');
        Route::get('delete-product-attribute/{id}', 'ProductController@deleteAttribute')->name('delete.products.attribute');
        Route::get('show-attributes/{id}', 'ProductController@showAttributes')->name('show.products.attribute');
        ########## End Products Attribute Route (Admin) ##########


        ########## Begin Brand Route (Admin) ##########
        Route::get('add-brand', 'BrandsController@create')->name('add.brand');
        Route::post('add-brand', 'BrandsController@store')->name('store.new.brand');
        Route::get('view-brands', 'BrandsController@index')->name('view.brands');
        Route::get('edit-brand/{id}', 'BrandsController@edit')->name('edit.brand');
        Route::post('update-brands/{id}', 'BrandsController@update')->name('update.brand');
        Route::get('delete-brand/{id}', 'BrandsController@delete')->name('delete.brand');
        Route::get('show-brand_products/{id}', 'BrandsController@show')->name('show.brandProduct');
        ########## End Brand Route (Admin) ##########


        ########## Begin Coupon Route (Admin) ##########
        Route::get('coupon', 'CouponController@index')->name('show.coupon');
        Route::post('store/coupon', 'CouponController@storeCoupon')->name('store.coupon');
        Route::get('delete/coupon/{id}', 'CouponController@deleteCoupon')->name('delete.coupon');
        Route::get('edit/coupon/{id}', 'CouponController@editCoupon')->name('edit.coupon');
        Route::post('update/coupon/{id}', 'CouponController@updateCoupon')->name('update.coupon');;
        ########## End Coupon Route (Admin) ##########

        ########## Begin Users Route (Admin) ##########
        Route::get('normal-users', 'UsersController@ShowNormalUser')->name('show.normal.users');
        Route::get('Admins', 'UsersController@ShowAdmin')->name('show.all.admin');
        Route::post('normal-users', 'UsersController@addAdmain')->name('user.to.admin');
        ########## End Users Route (Admin) ##########


        ########## Begin slider Route (Admin) ##########
        Route::get('add-images-slider', 'SliderController@create')->name('add.slider');
        Route::post('save-images-slider', 'SliderController@saveImagesDb')->name('save.image.slider.Db');
        Route::post('add-images-slider', 'SliderController@saveImagesInDirectory')->name('save.image.slider');
        Route::post('delete-image-file', 'SliderController@removeImageInDirectory')->name('removeImg.slider');
        ########## End slider Route (Admin) ##########

        ########## Begin chat Route (Admin) ##########
        Route::get('/chat', 'ChatsController@index')->name('show.messages.admin');
        Route::post('chat-messages-get', 'ChatsController@getMessages')->name('get.message.admin');
        Route::post('chat-messages', 'ChatsController@sendMessage')->name('send.message.admin');
        Route::post('check-messages-admin', 'ChatsController@check1')->name('new_messages_check.admin');
        ########## End chat Route (Admin) ##########

        ########## Site Settings Route (Admin) ##########
        Route::get('site/settings', 'SettingsController@siteSettings')->name('site.settings');
        Route::post('update/site/settings', 'SettingsController@updateAll')->name('update.site.settings');
        ########## End Site Settings (Admin) ##########

        ########## Customers Orders Route (Admin) ##########
        Route::get('orders', 'AdminController@showAllOrders')->name('show.all.orders');
        Route::get('show.order/{id}', 'AdminController@showOrder')->name('show.order');
        ########## End Customers Orders (Admin) ##########

        ########## Begin Questionnaire Route (Admin) ##########
        Route::get('view-questionnaires', 'QuestionnaireController@index')->name('view.questionnaires');
        Route::post('delete-questionnaire', 'QuestionnaireController@delete')->name('delete.questionnaire');
        Route::get('show-questionnaire/{id}', 'QuestionnaireController@show')->name('show.questionnaire');
        ########## End Questionnaire Route (Admin) ##########

        ########## Begin Complaint Route (Admin) ##########
        Route::get('view-complaints', 'ComplaintController@index')->name('view.complaints');
        Route::post('delete-complaint', 'ComplaintController@delete')->name('delete.complaint');
        Route::get('show-complaint/{id}', 'ComplaintController@show')->name('show.complaint');
        ########## End Complaint Route (Admin) ##########

    });
});
################################## End Admin Routes ##################################



