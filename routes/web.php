<?php

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
//     return redirect("/");
// });

Route::get('/', function () {
    return redirect('/home');
});

Route::group(array('prefix' => 'admin'), function()
{

    Route::get("/","Admin\HomeController@index")->name("home");
    Route::get("/no-access","Admin\HomeController@noAccess");
    
    Route::get("photo-category/{id}/restore", "Admin\PhotoCategoryController@restore")->name("photo-category.restore");
    Route::get("photo-category/{id}/delete", "Admin\PhotoCategoryController@destroy")->name("photo-category.delete");
    Route::get("photo-category/trash", "Admin\PhotoCategoryController@trash")->name("photo-category.trash");
    Route::resource("photo-category","Admin\PhotoCategoryController");

    Route::get("event/{id}/restore", "Admin\EventController@restore")->name("event.restore");
    Route::get("event/{id}/delete", "Admin\EventController@destroy")->name("event.delete");
    Route::get("event/trash", "Admin\EventController@trash")->name("event.trash");
    Route::resource("event","Admin\EventController");

    Route::get("restaurant-menu/{id}/restore", "Admin\RestaurantMenuController@restore")->name("restaurant-menu.restore");
    Route::get("restaurant-menu/{id}/delete", "Admin\RestaurantMenuController@destroy")->name("restaurant-menu.delete");
    Route::get("restaurant-menu/trash", "Admin\RestaurantMenuController@trash")->name("restaurant-menu.trash");
    Route::resource("restaurant-menu","Admin\RestaurantMenuController");

    Route::get("restaurant-table/{id}/restore", "Admin\RestaurantTableController@restore")->name("restaurant-table.restore");
    Route::get("restaurant-table/{id}/delete", "Admin\RestaurantTableController@destroy")->name("restaurant-table.delete");
    Route::get("restaurant-table/trash", "Admin\RestaurantTableController@trash")->name("restaurant-table.trash");
    Route::resource("restaurant-table","Admin\RestaurantTableController");

    Route::get("restaurant-time/{id}/restore", "Admin\RestaurantTimeController@restore")->name("restaurant-time.restore");
    Route::get("restaurant-time/{id}/delete", "Admin\RestaurantTimeController@destroy")->name("restaurant-time.delete");
    Route::get("restaurant-time/trash", "Admin\RestaurantTimeController@trash")->name("restaurant-time.trash");
    Route::resource("restaurant-time","Admin\RestaurantTimeController");

    Route::get("room/{id}/restore", "Admin\RoomController@restore")->name("room.restore");
    Route::get("room/{id}/delete", "Admin\RoomController@destroy")->name("room.delete");
    Route::get("room/trash", "Admin\RoomController@trash")->name("room.trash");
    Route::resource("room","Admin\RoomController");

    Route::get("room-type/{id}/restore", "Admin\RoomTypeController@restore")->name("room-type.restore");
    Route::get("room-type/{id}/delete", "Admin\RoomTypeController@destroy")->name("room-type.delete");
    Route::get("room-type/trash", "Admin\RoomTypeController@trash")->name("room-type.trash");
    Route::resource("room-type","Admin\RoomTypeController");

    Route::get("reservation/{id}/restore", "Admin\ReservationController@restore")->name("reservation.restore");
    Route::get("reservation/{id}/delete", "Admin\ReservationController@destroy")->name("reservation.delete");
    Route::get("reservation/trash", "Admin\ReservationController@trash")->name("reservation.trash");
    Route::resource("reservation","Admin\ReservationController");

    Route::get("client/{id}/restore", "Admin\ClientController@restore")->name("client.restore");
    Route::get("client/{id}/delete", "Admin\ClientController@destroy")->name("client.delete");
    Route::get("client/trash", "Admin\ClientController@trash")->name("client.trash");
    Route::resource("client","Admin\ClientController");

    Route::get("message/{id}/restore", "Admin\MessageController@restore")->name("message.restore");
    Route::get("message/{id}/delete", "Admin\MessageController@destroy")->name("message.delete");
    Route::get("message/{id}/reply", "Admin\MessageController@reply")->name("message.reply");
    Route::post("message/{id}/reply", "Admin\MessageController@sendReply")->name("message.sendReply");
    Route::get("message/trash", "Admin\MessageController@trash")->name("message.trash");
    Route::resource("message","Admin\MessageController");

    Route::get("photo/{id}/restore", "Admin\PhotoController@restore")->name("photo.restore");
    Route::get("photo/{id}/delete", "Admin\PhotoController@destroy")->name("photo.delete");
    Route::get("photo/trash", "Admin\PhotoController@trash")->name("photo.trash");
    Route::get("photo/browse", "Admin\PhotoController@browse")->name("photo.browse");
    Route::resource("photo","Admin\PhotoController");

    Route::get("video/{id}/restore", "Admin\VideoController@restore")->name("video.restore");
    Route::get("video/{id}/delete", "Admin\VideoController@destroy")->name("video.delete");
    Route::get("video/trash", "Admin\VideoController@trash")->name("video.trash");
    Route::get("video/{id}/published", "Admin\VideoController@published")->name("video.published");
    Route::resource("video","Admin\VideoController");

    Route::get("video-category/{id}/restore", "Admin\VideoCategoryController@restore")->name("video-category.restore");
    Route::get("video-category/{id}/delete", "Admin\VideoCategoryController@destroy")->name("video-category.delete");
    Route::get("video-category/trash", "Admin\VideoCategoryController@trash")->name("video-category.trash");
    Route::get("video-category/{id}/published", "Admin\VideoCategoryController@published")->name("video-category.published");
    Route::resource("video-category","Admin\VideoCategoryController");

    Route::get("users/{id}/restore", "Admin\UserController@restore")->name("users.restore");
    Route::get("users/{id}/delete", "Admin\UserController@destroy")->name("users.delete");
    Route::get("users/{id}/links", "Admin\UserController@links")->name("users.links");
    Route::post("users/{id}/links", "Admin\UserController@saveLinks")->name("users.post.links");
    Route::get("users/trash", "Admin\UserController@trash")->name("users.trash");
    
    Route::get("slider/{id}/restore", "Admin\SliderController@restore")->name("slider.restore");
    Route::get("slider/{id}/delete", "Admin\SliderController@destroy")->name("slider.delete");
    Route::get("slider/trash", "Admin\SliderController@trash")->name("slider.trash");
    Route::resource("slider","Admin\SliderController");
    
    
    Route::get("staticpage/{id}/restore", "Admin\StaticPageController@restore")->name("staticpage.restore");
    Route::get("staticpage/{id}/delete", "Admin\StaticPageController@destroy")->name("staticpage.delete");
    Route::get("staticpage/trash", "Admin\StaticPageController@trash")->name("staticpage.trash");
    Route::resource("staticpage","Admin\StaticPageController");
    
    Route::resource("users","Admin\UserController");
});

Auth::routes();
//for home page
Route::get('/home', 'Client\ClientController@index')->name('home');

Route::group(array('prefix' => 'client'), function()
{
Route::get('photos', 'Client\ClientController@photos')->name('home.photos');
Route::get('videos', 'Client\ClientController@videos')->name('home.videos');
Route::get('page/{id}', 'Client\ClientController@page')->name('home.page');
Route::get('photo/{id}', 'Client\ClientController@photo')->name('home.photo');
Route::get('video/{id}', 'Client\ClientController@video')->name('home.video');
Route::get('login', 'Client\ClientController@login')->name('home.login');
Route::get('register', 'Client\ClientController@register')->name('home.register');
Route::get('room', 'Client\ClientController@room')->name('home.room');
Route::get('restaurant', 'Client\ClientController@restaurant')->name('home.restaurant');
Route::get('contact', 'Client\ClientController@contact')->name('home.contact');
Route::get('event', 'Client\ClientController@event')->name('home.event');
Route::get('about', 'Client\ClientController@about')->name('home.about');
Route::post('contact-store', 'Client\ClientController@message')->name('message.store');
Route::get('gallery', 'Client\ClientController@gallery')->name('home.gallery');
Route::get('room-detail/{id}', 'Client\ClientController@roomDetail')->name('home.roomDetail');
Route::get('room-checkavaliability', 'Client\ReservationController@check')->name('home.roomCheck');
Route::get('room-reservation/reservation-cancel/{id}', 'Client\ReservationController@reservationCancellation')->name('home.reservationCancellation');
Route::get('room-reservation/{id}', 'Client\ReservationController@reservation')->name('home.reservation');
//Route::get('room-reservation/reservation-details', 'Client\ReservationController@reservationDetails')->name('home.reservationDetails');
});


