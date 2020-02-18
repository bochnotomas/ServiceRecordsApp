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

/* view routes */
Route::get('/','PageController@viewLogin')->name('view_login');
Route::post('/login','LoginController@login')->name('login');

Route::group(['middleware'=>'auth'],function (){
	//dashboard
    Route::get('/userMachines/{id}','PageController@viewUserMachines')->name('view_user_dashboard');
    Route::get('/userCards','PageController@viewUserCards')->name('view_user_cards_dashboard');

	/*Login,Logout*/
	Route::get('/logout','LoginController@logout')->name('logout');

	//service inputs
    Route::get('/serviceInputsUser/{id}/{roomid}','PageController@viewServiceInputsUser')->name('view_serviceInputsUser');



	/*Input routes*/
	Route::post('/storeInput/{id}','InputController@storeInput')->name('storeInput');
	Route::get('/deleteInput/{id}', 'InputController@deleteInput')->name('deleteInput');


	//routes only accessible by admins
	Route::group(['middleware'=>'App\Http\Middleware\AdminMiddleware'],function (){
		//dashboard
        Route::get('/adminMachines/{id}','PageController@viewAdminMachines')->name('view_admin_dashboard');
        Route::get('/adminCards','PageController@viewAdminCards')->name('view_admin_cards_dashboard');

		//service inputs
        Route::get('/serviceInputsAdmin/{id}/{roomid}','PageController@viewServiceInputsAdmin')->name('view_serviceInputsAdmin');

		//user management
		Route::get('/userManagment','PageController@viewUserManagment')->name('view_userManagment_dashboard');
		Route::get('/userManagmentEdit/{id}','PageController@viewEditUser')->name('view_UserManagment_edit');
        Route::get('/machineEdit/{id}','PageController@viewMachineEdit')->name('view_machineEdit');
        Route::get('/roomEdit/{id}','PageController@viewRoomEdit')->name('view_roomEdit');

		/*User routes*/
		Route::post('/storeUser','UserController@storeUser')->name('storeUser');
		Route::get('/deleteUser/{id}','UserController@deleteUser')->name('deleteUser');
        Route::post('/editUser/{id}','UserController@updateUser')->name('updateUser');

        /*Room routes*/
        Route::post('/storeRoom','RoomController@storeRoom')->name('storeRoom');
        Route::get('/deleteRoom/{id}','RoomController@deleteRoom')->name('deleteRoom');
        Route::post('/editRoom/{id}','RoomController@updateRoom')->name('updateRoom');

        /*Machine routes*/
		Route::post('/storeMachine/{id}','MachineController@storeMachine')->name('storeMachine');
		Route::get('/deleteMachine/{id}','MachineController@deleteMachine')->name('deleteMachine');
        Route::post('/editMachine/{id}','MachineController@updateMachine')->name('updateMachine');

        /*Action routes*/
        Route::get('/actionManagment/{id}','PageController@viewActions')->name('viewActions');
        Route::post('/storeAction/{id}','ActionController@storeAction')->name('storeAction');
        Route::get('/deleteAction/{id}','ActionController@deleteAction')->name('deleteAction');

        /*Input routes*/
        Route::post('/editInput/{id}','InputController@updateInput')->name('updateInput');
        Route::get('/excelExport/{id}','InputController@export')->name('exportInput');
	});
});




