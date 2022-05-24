<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', 'Customer\CustomerController@getlogin')->name('get_login');
Route::post('login', 'Customer\CustomerController@Login')->name('Login');
Route::get('register1', 'Customer\CustomerController@create')->name('registerCustomer');
Route::post('register1', 'Customer\CustomerController@store')->name('sign.up');
Route::get('complete-info/{id}', 'Customer\CustomerController@getInfo')->name('info');
Route::post('complete-info/{id}', 'Customer\CustomerController@storeInfo')->name('store.info');

Route::get('note', 'Customer\SystemNotificationController@veiwed')->name('newNot');
Route::post('check', 'Customer\SystemNotificationController@check')->name('check');
Route::post('wanted', 'Customer\SystemNotificationController@storeWanted')->name('is.wanted');
Route::post('delete-wanted', 'Customer\SystemNotificationController@Unfollow')->name('unfollow');

Route::group(['middleware' => "auth"], function () { // Routes requires  login


    Route::group(['namespace' => 'Front'], function () {


        ########## Wishlist Route ##########
        Route::get('wish-list', 'WishlistController@showWishList')->name('show.wish.list');
        Route::post('store/wish-list', 'WishlistController@addWishlist')->name('add.wishlist');
        Route::post('delete/wish-list/{id}', 'WishlistController@deleteWishlist')->name('delete.wishlist');

        ########## ShoppingCart Route ##########
        Route::get('shopping-cart', 'CartController@showShoppingCart')->name('show.shopping.cart');
        Route::post('store/shopping-cart', 'CartController@storeShoppingCart')->name('add.shopping.cart');
        Route::post('update/shopping-cart', 'CartController@updateShoppingCart')->name('update.shopping.cart');
        Route::post('delete/shopping-cart/{id}', 'CartController@deleteShoppingCart')->name('delete.shopping.cart');

        ########## Checkout Route ##########
        Route::get('checkout/{grand_total}', 'CartController@checkout')->name('checkout');

        ########## Order Route ##########
        Route::get('my-orders', 'OrderController@showOrders')->name('orders');
        Route::post('add/order', 'OrderController@store')->name('add.order');

        ####### Review Routes ##########
        Route::post('/add-review', 'ReviewController@addReview')->name('add.review');

        ########## Coupon Routes ##########
        Route::post('apply/coupon', 'CartController@coupon')->name('apply.coupon');
        Route::get('delete/coupon', 'CartController@couponDelete')->name('remove.coupon');

        ########## Payment Routes ##########
        Route::get('payment/page', 'CartController@PaymentPage')->name('payment.step');

        ########## Questions Route ##########
        Route::get('questionnaire', 'FrontController@getQuestionnaire') -> name('questionnaire');
        Route::post('questionnaire', 'FrontController@storeQuestionnaire') -> name('store.questionnaire');

        ########## Complaints Route ##########
        Route::get('complaints', 'FrontController@getComplaint') -> name('complaint');
        Route::post('complaints', 'FrontController@storeComplaint') -> name('store.complaint');

        ########## Followed Things Route ##########
        Route::get('follow', 'FrontController@follow') -> name('follow');
    });

    ########## Profile Route ##########
    Route::group(['namespace' => 'Customer'], function () {

        Route::get('logout', 'CustomerController@logout')->name('Logout');
        Route::get('/my-account', 'CustomerController@personalPage')->name('personal.page');
        Route::get('/my-points', 'CustomerController@userPoints')->name('user.points');
        Route::post('/update/profile', 'CustomerController@updateProfileInfo')->name('update.user.profile');
        Route::post('update/profile-image', 'CustomerController@updateProfileImage')->name('update.user.image');
        Route::post('update/profile-address', 'CustomerController@updateAddress')->name('update.user.address');

    });

    Route::get('/chat', 'ChatsController@index')->name('show.messages');
    Route::get('chat-messages', 'ChatsController@getMessages')->name('get.message');
    Route::post('chat-messages', 'ChatsController@sendMessage')->name('send.message');
    Route::post('check-messages', 'ChatsController@check')->name('new_messages_check');

    ########## Payment Routes ##########
    Route::post('payment/process', 'PaymentController@Payment')->name('payment.process');
    Route::post('stripe/charge', 'PaymentController@stripeCharge')->name('stripe.charge');

});

################################## Begin Front Routes ##################################
Route::group(['namespace' => 'Front'], function () {


    Route::get('/', 'FrontController@index')->name('main_page');


    ########## Begin Additional Pages Route (Front) ##########
    Route::get('/sasha-about-us', 'FrontController@showAboutUs')->name('show.about.us');
    Route::get('/frequently-asked-questions', 'FrontController@faq')->name('show.FAQ');
    Route::get('/clients-services', 'FrontController@clientServices')->name('show.client.services');
    Route::get('/privacy-policies', 'FrontController@privacyPolicies')->name('show.privacy.policies');
    Route::get('/shipping-policies', 'FrontController@shippingPolicies')->name('show.shipping.policies');
    Route::get('/return-&-refund-policies', 'FrontController@returnPolicies')->name('show.return.policies');
    Route::get('/payment-policies', 'FrontController@paymentPolicies')->name('show.payment.policies');
    ########## End Additional Pages Route (Front) ##########

    ########## Begin Settings Route (Front) ##########
    Route::get('/settings', 'FrontController@settings')->name('settings');
    Route::get('/settings-notification', 'FrontController@settingsNotification')->name('settings.notification');
    ########## End Settings Route (Front) ##########

    ########## Begin History Route ##########
    Route::get('view-history', 'HistoryController@index')->name('view.history');
    Route::post('store-history', 'HistoryController@store')->name('store.history');
    Route::get('/delete-search-record', 'HistoryController@deleteRecord')->name('delete.record');
    Route::get('/delete-all-record', 'HistoryController@deleteAllRecord')->name('delete.all.record');
    ########## Begin History Route ##########


	########## Begin Product Related Route (Front) ##########
    Route::get('/preview-product/{id}', 'ProductController@previewProduct')->name('preview.product');
    ########## End Product Related Route (Front) ##########

    ########## Begin Search & Filtering ######################3333
    Route::get('product-Search/{id}', 'ProductController@showSearchResults')->name('show.products.Search');
    Route::get('filter-search-results','ProductController@filterSearchResults')->name('filter.search');

    Route::get('all-products/{id}', 'ProductController@showProductSubCategory')->name('show.products.subCategory');
    Route::get('filter-all-products','ProductController@filterProductSubCategory')->name('filter.products');

    Route::get('brand-products/{id}', 'ProductController@showProductsBrand')->name('show.products.brand');
    Route::get('filter-brand-products','ProductController@filterBrandResults')->name('filter.brands');
    ########## End Search & Filtering ######################




});
################################## End Front Routes ##################################

