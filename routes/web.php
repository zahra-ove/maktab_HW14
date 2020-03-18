<?php



/*  shows wishlist page   */
Route::get('/wishlist', function () {
    return view('wishlist');
});


/*  shows checkout page   */
Route::get('/checkout', function () {
    return view('checkout');
});


/*  shows category page   */
Route::get('/category', function () {
    return view('category');
});


/*  shows cart page   */
Route::get('/cart', function () {
    return view('cart');
});


/*  shows compare page   */
Route::get('/compare', function () {
    return view('compare');
});

/*  shows search page   */
Route::get('/search', function () {
    return view('search');
});


/*  shows about us page   */
Route::get('/about-us', function () {
    return view('about-us');
});

/*  shows contact us page   */
Route::get('/contact-us', function () {
    return view('contact-us');
});


/*  shows sitemap page   */
Route::get('/sitemap', function () {
    return view('sitemap');
});


/*  shows faq  page   */
Route::get('/faq', function () {
    return view('faq');
});

/*  shows sitemap  page   */
Route::get('/sitemap', function () {
    return view('sitemap');
});


/*  shows privatePolicy  page   */
Route::get('/privatePolicy', function () {
    return view('privatePolicy');
});

//==================== New Routes ==================================//

//authentication routes
Auth::routes();


//========= Route for admin and admin panle ===========
// Route::get('/admin', 'Admin\AdminsController@index')->name('admin');
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('CheckRole')->group(function () {
    Route::get('', 'AdminsController@index')->name('mainPage');
    Route::resource('users', 'UsersController');
    Route::resource('products', 'ProductsController');
    Route::resource('categories', 'CategoriesController');
    Route::resource('articles', 'ArticlesController');
    Route::resource('comments', 'CommentsController');
    Route::resource('slides', 'SlidersController');
    Route::resource('tags', 'TagsController');
});


//========= Route for User =================
// Route::resource('users', 'User\UsersController')->except(['store', 'destroy', 'edit', 'update']);
Route::resource('users/comment', 'User\CommentsController');
Route::get('/profile', 'UserController@index')->name('profile');
Route::get('/tag/{id}/products', 'Frontend\FrontController@tagRelatedProduct')->name('tag.products');

//show main page via frontcontroller
Route::get('/', 'Frontend\FrontController@showMainPage');
Route::get('/index', 'Frontend\FrontController@showMainPage');
//show sigle product page
Route::get('/product/{id}','Frontend\FrontController@showProduct')->name('product');

