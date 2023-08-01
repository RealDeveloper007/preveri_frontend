<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/', 'Frontend\MainController@index')->name('home')->middleware('lscache:max-age=300;public');
Route::get('/signup', 'Frontend\MainController@signup')->name('signup');
Route::get('/podjetja', 'Frontend\MainController@companyList')->name('podjetja');
Route::get('/podjetja/{slug}', 'Frontend\MainController@singleCompany')->name('podjetja/{slug}');
Route::get('/dobra-zaposlitev', 'Frontend\MainController@topComapnies')->name('dobra-zaposlitev');
Route::get('/novice', 'Frontend\MainController@newsList')->name('novice');
Route::get('/novice/{slug}', 'Frontend\MainController@singleNews')->name('novice/{slug}');
Route::get('/o-nas', 'Frontend\MainController@aboutUS')->name('o-nas');
Route::get('/pogoji-uporabe', 'Frontend\MainController@terms')->name('pogoji-uporabe');
Route::get('/politika-zasebnosti', 'Frontend\MainController@privacy')->name('politika-zasebnosti');
Route::get('/piskotki', 'Frontend\MainController@cookies')->name('piskotki');
Route::post('/comment-submit', 'Frontend\MainController@commentSubmit')->name('commentSubmit');

// ajax
Route::post('/add_newsletter_data', 'Frontend\MainController@add_newsletter_data')->name('add_newsletter_data');
Route::post('/find_company', 'Frontend\MainController@find_company')->name('find_company');
Route::post('/filter_company', 'Frontend\MainController@filter_company')->name('filter_company');
Route::get('/find_companies', 'Frontend\MainController@companyNames')->name('find.companies');
Route::get('/find_regions', 'Frontend\MainController@regionNames')->name('find.regions');
Route::get('/find_categories', 'Frontend\MainController@categoryNames')->name('find.categories');
Route::get('/all_companies', 'Frontend\MainController@all_companies')->name('all_companies');
Route::get('/top_companies', 'Frontend\MainController@top_companies')->name('top_companies');
Route::post('/search_company', 'Frontend\MainController@search_company')->name('search_company');
Route::get('/company_comments', 'Frontend\MainController@company_comments')->name('company_comments');
Route::get('/autocompleteajax', 'Frontend\MainController@autocompleteajax')->name('autocompleteajax');

Auth::routes(['register' => false]);
Route::get('/sitemap_generate', [App\Http\Controllers\SitemapXmlController::class, 'index']);
Route::get('/feed', [App\Http\Controllers\SitemapXmlController::class, 'feed']);
Route::get('/news_generate', [App\Http\Controllers\SitemapXmlController::class, 'news']);

Route::group(['middleware' => ['auth']], function () {

    Route::get('/home', 'HomeController@dashboard')->name('home_new');
    Route::get('/contact_us', 'HomeController@contact')->name('contact_us');
    Route::get('/setting', 'HomeController@setting')->name('setting');
    Route::post('/setting-update', 'HomeController@settingUpdate')->name('setting.update');
    Route::post('/comment-update/{id}', 'HomeController@commentUpdate')->name('comment.update');
    Route::delete('/contact/delete/{id}', 'HomeController@contactDstroy')->name('contact.delete');

    Route::resource('home-page-section', 'HomeController');
    Route::resource('regions', 'RegionController');
    Route::resource('news', 'NewsController');
    Route::resource('company', 'CompanyController');

    Route::get('inactive_company_import', 'CompanyController@inactive_company_import')->name('company.inactive_company_import');
    Route::post('inactive_companies', 'CompanyController@inactiveCompany')->name('company.inactiveCompany');
    Route::post('comment_action', 'CompanyController@commentAction')->name('comment.action');
    Route::post('picture_action', 'CompanyController@pictureAction')->name('picture.action');
    Route::post('/news/upload', 'NewsController@upload')->name('news.upload');

    Route::resource('users', 'UserController');

    Route::get('profile-details', 'ProfileController@edit')->name('profile');
    Route::post('profile-update', 'ProfileController@update')->name('profile-update');

    Route::get('change-password', 'ProfileController@changePassword')->name('change-password');
    Route::post('update-password', 'ProfileController@updatePassword')->name('update-password');
    
    Route::get('/database-backup', 'HomeController@DatabaseBackup')->name('database-backup');

});
