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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
/*
|--------------------------------------------------------------------------
| admin routes
|--------------------------------------------------------------------------
*/
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::prefix('admin')->middleware('auth:admin')->group(function(){
    // Registrar usuario vendedor
    Route::get('/register-user', 'Auth\RegisterController@showRegistrationForm')->name('register.user');

    // Registro de actividad
    Route::get('/activity-log', 'AdminController@admin_activity_log')->name('admin.activity.log');
    Route::get('/activity-log/all', 'AdminController@admin_activity_log_all')->name('admin.activity.log.all');
    Route::get('/activity-log/user/{id}', 'AdminController@admin_activity_log_user')->name('admin.activity.log.user');
    Route::get('/activity-log/admin/{id}', 'AdminController@admin_activity_log_admin')->name('admin.activity.log.admin');

    // Rutas Polizas
    Route::get('/index-policies', 'PoliciesController@index_admin')->name('index.policies');
    Route::get('/index-policy/{id}', 'PoliciesController@show_admin')->name('policy.price.view');
    Route::get('/admin-exportpdf/{id}', 'PoliciesController@admin_exportpdf')->name('admin.policy.export.pdf');
    Route::get('/edit-policy/{id}', 'PoliciesController@admin_edit')->name('admin.edit.policy');
    Route::put('/edit-policy/{id}', 'PoliciesController@admin_update')->name('admin.update.policy');
    Route::put('/renew-policy/{id}', 'PoliciesController@admin_renew')->name('admin.renew.policy');
    Route::get('/register-policy', 'PoliciesController@create_admin')->name('register.policy');
    Route::post('/register-policy', 'PoliciesController@store_admin')->name('register.policy.submit');
    Route::get('/register-policy/search', 'PoliciesController@search')->name('policy.search.vehicle');
    Route::get('/register-policy/price-view', 'PoliciesController@price_view')->name('policy.price.view');
    Route::delete('/delete-policy/{id}', 'PoliciesController@admin_destroy')->name('delete.user');

    // Rutas Usuarios
    Route::get('/index-users', 'AdminController@index_users')->name('index.users');
    Route::get('/index-user/{id}', 'AdminController@show_user')->name('index.show.user');
    Route::get('/edit-user/{id}', 'AdminController@edit')->name('admin.edit.user');
    Route::get('/edit-user/password/{id}', 'AdminController@edit_password')->name('admin.edit.user.password');
    Route::put('/edit-user/password/{id}', 'AdminController@update_password')->name('admin.edit.user.password.submit');
    Route::put('/edit-user/{id}', 'AdminController@update')->name('admin.update.user');
    Route::delete('/delete-user/{id}', 'AdminController@destroy')->name('admin.delete.user');

    // Rutas Usuarios administradores
    Route::get('/index-admins', 'AdminController@index_users_admins')->name('index.users.admins');
    Route::get('/index-admin/{id}', 'AdminController@show_admin')->name('index.show.admins');
    Route::get('/edit-admin/{id}', 'AdminController@edit_admin')->name('admin.edit.admin');
    Route::put('/edit-admin/{id}', 'AdminController@update_admin')->name('admin.update.admin');
    Route::delete('/delete-admin/{id}', 'AdminController@destroy_admin')->name('admin.delete.admin');
    // Cambiar contraseña administrador
    Route::get('/change-password/{id}', 'AdminController@admin_edit_password')->name('admin.change.password');
    Route::put('/change-password/{id}', 'AdminController@admin_update_password')->name('admin.change.password.submit');
    // Registrar administrador
    Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');

    // Rutas precios 
    Route::get('/index-prices', 'PricesController@index_admin')->name('index.prices');
    Route::get('/index-price/{id}', 'PricesController@show_admin')->name('index.show.price');
    Route::get('/edit-price/{id}', 'PricesController@admin_edit')->name('admin.edit.price');
    Route::put('/edit-price/{id}', 'PricesController@admin_update')->name('admin.update.price');
    Route::get('/register-price', 'PricesController@create')->name('register.price');
    Route::post('/register-price', 'PricesController@store')->name('register.price.submit');
    Route::delete('/delete-price/{id}', 'PricesController@destroy')->name('delete.price');
    
    // Rutas Oficinas
    Route::get('/index-offices', 'OfficesController@index')->name('index.offices');
    Route::get('/register-office', 'OfficesController@create')->name('register.office');
    Route::post('/register-office', 'OfficesController@store')->name('register.office.submit');
    Route::get('/register-office/search-municipio', 'OfficesController@search_municipio')->name('office.search.municipio');
    Route::get('/edit-office/{id}', 'OfficesController@admin_edit')->name('admin.edit.office');
    Route::put('/edit-office/{id}', 'OfficesController@admin_update')->name('admin.update.office');
    Route::get('/register-office/search-parroquia', 'OfficesController@search_parroquia')->name('office.search.parroquia');
    Route::delete('/delete-office/{id}', 'OfficesController@destroy')->name('delete.office');    


    // Rutas Vehiculos
    Route::get('/index-vehicles', 'VehicleController@index_admin')->name('index.vehicles');
    Route::get('/register-vehicle', 'VehicleController@create_admin')->name('register.vehicle');
    Route::post('/register-vehicle', 'VehicleController@store_admin')->name('register.vehicle.submit');
    Route::get('/edit-vehicle/{id}', 'VehicleController@admin_edit')->name('admin.edit.vehicle');
    Route::put('/edit-vehicle/{id}', 'VehicleController@admin_update')->name('admin.update.vehicle');
    Route::delete('/delete-vehicle/{id}', 'VehicleController@destroy')->name('delete.vehicle');

    //Rutas Pagos
    Route::get('/index-payments', 'PaymentsController@index_admin')->name('index.payments');  
    Route::get('/index-payment/{id}', 'PaymentsController@show_admin')->name('index.show.payment');  
    Route::post('/register-payment/{id}', 'PaymentsController@store_admin')->name('register.payment.submit');
    Route::put('/update-payment/{id}', 'PaymentsController@update')->name('payment.bill');

    // Ruta dashboard admin
    Route::get('/', 'AdminController@index')->name('admin');
});

/*
|--------------------------------------------------------------------------
| user routes
|--------------------------------------------------------------------------
*/
Route::prefix('user')->middleware('auth')->group(function(){
    // Rutas Vehiculos  
	Route::get('/index-vehicles', 'VehicleController@index')->name('user.index.vehicles');
	Route::get('/register-vehicle', 'VehicleController@create')->name('user.register.vehicle');
	Route::post('/register-vehicle', 'VehicleController@store')->name('user.register.vehicle.submit');

    //Rutas Polizas
    Route::get('/index-policies', 'PoliciesController@index')->name('user.index.policies');
    Route::get('/index-policy/{id}', 'PoliciesController@show')->name('user.show.policy');
    Route::get('/user-exportpdf/{id}', 'PoliciesController@admin_exportpdf')->name('user.policy.export.pdf');
    Route::get('/register-policy', 'PoliciesController@create')->name('user.register.policy');
    Route::post('/register-policy', 'PoliciesController@store')->name('user.register.policy.submit');
    Route::put('/renew-policy/{id}', 'PoliciesController@renew')->name('user.renew.policy');    

    //Rutas Precios
    Route::get('/index-prices', 'PricesController@index')->name('user.index.prices');
    Route::get('/index-price/{id}', 'PricesController@show')->name('user.index.show.price');

    //Rutas Pagos
    Route::get('/index-payments', 'PaymentsController@index')->name('user.index.payments');

    //Rutas Cambiar contraseña
    Route::get('/change-password/{id}', 'ChangeUsersPassword@edit_password')->name('user.change.password');
    Route::put('/change-password/{id}', 'ChangeUsersPassword@update_password')->name('user.change.password.submit');

    //Rutas Registro de Actividad
    Route::get('/activity-log/{id}', 'DashboardController@activity_log')->name('user.activity.log');

});

//Consultas AJAX
Route::get('/register-policy/search', 'PoliciesController@search')->name('policy.search.vehicle');
Route::get('/register-policy/price-view', 'PoliciesController@price_view')->name('policy.price.view');


Auth::routes();