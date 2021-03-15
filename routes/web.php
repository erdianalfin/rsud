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

// Login
Route::get('auth/login', 'AuthController@login')->name('login');
Route::post('auth/login/post', 'AuthController@postLogin');
Route::get('auth/logout', 'AuthController@logout');

// Register
Route::get('auth/register', 'AuthController@register');
Route::post('auth/register/post', 'AuthController@postRegister');
Route::get('auth/verification/{token}/{email}/{type}', 'AuthController@verification');

// Home
Route::get('/', 'Frontend\HomeController@index');

// patient
Route::get('/patient', 'Frontend\PatientController@index');
Route::get('/patient/create', 'Frontend\PatientController@create');
Route::get('/patient/show/{patientAcces}', 'Frontend\PatientController@show');
Route::post('/patient/store', 'Frontend\PatientController@store');
Route::get('/patient/register', 'Frontend\PatientController@register');
Route::post('/patient/register/store', 'Frontend\PatientController@postRegister');
Route::get('/patient/register/insurances/{no}', 'Frontend\PatientController@insurances');
Route::post('/patient/register/insurances/{patient}', 'Frontend\PatientController@postInsurances');
Route::get('/patient/delete/{patientAcces}', 'Frontend\PatientController@delete');

// doctor schedule
Route::get('/doctor/schedule/{slug}', 'Frontend\ScheduleController@index');
Route::post('/doctor/schedule/booking/store/{schedule}', 'Frontend\ScheduleController@store');

Route::group(['middleware' => 'auth'], function () {
	
	Route::get('/patient/booking', 'Frontend\PatientController@booking');
	Route::get('/booking/confirm/{booking}', 'Frontend\PatientController@confirm');

	// Booking
	Route::post('/doctor/schedule/booking/{poliklinik}', 'Frontend\HomeController@booking');

	// Dashboard
	Route::get('backend', 'Backend\DashboardController@index');
	
	// Profile
	Route::get('user/account/profile', 'Backend\AccountController@profile');
	Route::patch('user/account/profile/update', 'Backend\AccountController@updateProfile');

	// profile frontend
	Route::get('user/profile/edit', 'Frontend\AccountController@editProfile');
	Route::patch('user/profile/update', 'Frontend\AccountController@updateProfile');
	
	// password
	Route::get('user/account/password', 'Backend\AccountController@password');
	Route::patch('user/account/password/update', 'Backend\AccountController@updatePassword');
	
	// password
	Route::get('user/password', 'Frontend\AccountController@password');
	Route::patch('user/password/update', 'Frontend\AccountController@updatePassword');
	
	// drug
	Route::get('backend/drugs', 'Backend\DrugController@index');
	Route::get('backend/drug/create', 'Backend\DrugController@create');
	Route::post('backend/drug/store', 'Backend\DrugController@store');
	Route::get('backend/drug/{drug}/edit', 'Backend\DrugController@edit');
	Route::patch('backend/drug/{drug}', 'Backend\DrugController@update');
	Route::get('backend/drug/delete/{drug}', 'Backend\DrugController@destroy');

	// booking
	Route::get('backend/bookings', 'Backend\BookingScheduleController@index');
	Route::get('backend/booking/process', 'Backend\BookingScheduleController@process');
	Route::get('backend/booking/create', 'Backend\BookingScheduleController@create');
	Route::get('backend/booking/get/{poliklinik}', 'Backend\BookingScheduleController@get');
	Route::post('backend/booking/store', 'Backend\BookingScheduleController@store');
	Route::get('backend/booking/{booking}/edit', 'Backend\BookingScheduleController@edit');
	Route::patch('backend/booking/{booking}', 'Backend\BookingScheduleController@update');
	Route::get('backend/booking/delete/{booking}', 'Backend\BookingScheduleController@destroy');
	Route::get('backend/booking/show/{booking}', 'Backend\BookingScheduleController@show');
	Route::post('backend/booking/store/insurance', 'Backend\BookingScheduleController@insurance');
	Route::patch('backend/booking/insurance/{insurance}', 'Backend\BookingScheduleController@insurance_edit');
	
	// outpatient
	Route::get('backend/outpatients', 'Backend\OutPatientController@index');
	Route::get('backend/outpatient/create', 'Backend\OutPatientController@create');
	Route::post('backend/outpatient/store/{booking}', 'Backend\OutPatientController@store');
	Route::get('backend/outpatient/{outpatient}/edit', 'Backend\OutPatientController@edit');
	Route::patch('backend/outpatient/{outpatient}', 'Backend\OutPatientController@update');
	Route::get('backend/outpatient/delete/{outpatient}', 'Backend\OutPatientController@destroy');
	Route::get('backend/outpatient/get/{poliklinik}', 'Backend\OutPatientController@get');
	Route::get('backend/outpatient/show/{booking}', 'Backend\OutPatientController@show');
	Route::get('backend/outpatient/read/{outpatient}', 'Backend\OutPatientController@read');
	Route::get('backend/outpatient/pdf/{outpatient}', 'Backend\OutPatientController@pdf');
	
	// hospitalizations
	Route::get('backend/hospitalizations', 'Backend\HospitalizationController@index');
	Route::get('backend/hospitalization/create/{health}', 'Backend\HospitalizationController@create');
	Route::post('backend/hospitalization/store/{health}', 'Backend\HospitalizationController@store');
	Route::get('backend/hospitalization/{hospital}/edit', 'Backend\HospitalizationController@edit');
	Route::patch('backend/hospitalization/{hospital}', 'Backend\HospitalizationController@update');
	Route::get('backend/hospitalization/get/{level}', 'Backend\HospitalizationController@get');
	Route::get('backend/hospitalization/delete/{hospital}', 'Backend\HospitalizationController@destroy');
	Route::get('backend/hospitalization/show/{hospital}', 'Backend\HospitalizationController@show');
	Route::get('backend/hospitalization/pdf_show/{hospital}', 'Backend\HospitalizationController@pdf_show');
	Route::get('backend/hospitalization/gohome/{hospital}', 'Backend\HospitalizationController@gohome');
	Route::get('backend/hospitalization/read/{health}', 'Backend\HospitalizationController@read');
	Route::get('backend/hospitalization/pdf_read/{health}', 'Backend\HospitalizationController@pdf_read');

	// awareness
	Route::get('backend/awareness', 'Backend\AwarenessController@index');
	
	// choose drug
	Route::get('backend/choose/drugs/{health}', 'Backend\ChooseDrugController@index');
	Route::post('backend/choose/drug/store/{health}', 'Backend\ChooseDrugController@store');
	Route::get('backend/choose/drug/delete/{choose}', 'Backend\ChooseDrugController@destroy');
	Route::get('backend/choose/drug/success/{choose}', 'Backend\ChooseDrugController@success');
	Route::get('backend/choose/drug/recipe/{choose}', 'Backend\ChooseDrugController@recipe');

	// drug type
	Route::get('backend/drug/types', 'Backend\DrugTypeController@index');
	Route::get('backend/drug/type/create', 'Backend\DrugTypeController@create');
	Route::post('backend/drug/type/store', 'Backend\DrugTypeController@store');
	Route::get('backend/drug/type/{drugType}/edit', 'Backend\DrugTypeController@edit');
	Route::patch('backend/drug/type/{drugType}', 'Backend\DrugTypeController@update');
	Route::get('backend/drug/type/delete/{drugType}', 'Backend\DrugTypeController@destroy');


	// living
	Route::get('backend/livings', 'Backend\LivingController@index');
	Route::get('backend/living/create', 'Backend\LivingController@create');
	Route::post('backend/living/store', 'Backend\LivingController@store');
	Route::get('backend/living/{living}/edit', 'Backend\LivingController@edit');
	Route::patch('backend/living/{living}', 'Backend\LivingController@update');
	Route::get('backend/living/delete/{living}', 'Backend\LivingController@destroy');

	// level
	Route::get('backend/living/levels', 'Backend\LevelController@index');
	Route::get('backend/living/level/create', 'Backend\LevelController@create');
	Route::post('backend/living/level/store', 'Backend\LevelController@store');
	Route::get('backend/living/level/{level}/edit', 'Backend\LevelController@edit');
	Route::patch('backend/living/level/{level}', 'Backend\LevelController@update');
	Route::get('backend/living/level/delete/{level}', 'Backend\LevelController@destroy');

	// level
	Route::get('backend/living/buildings', 'Backend\BuildingController@index');
	Route::get('backend/living/building/create', 'Backend\BuildingController@create');
	Route::post('backend/living/building/store', 'Backend\BuildingController@store');
	Route::get('backend/living/building/{building}/edit', 'Backend\BuildingController@edit');
	Route::patch('backend/living/building/{building}', 'Backend\BuildingController@update');
	Route::get('backend/living/building/delete/{building}', 'Backend\BuildingController@destroy');

	// departement
	Route::get('backend/departements', 'Backend\DepartementController@index');
	Route::get('backend/departement/create', 'Backend\DepartementController@create');
	Route::post('backend/departement/store', 'Backend\DepartementController@store');
	Route::get('backend/departement/{departement}/edit', 'Backend\DepartementController@edit');
	Route::patch('backend/departement/{departement}', 'Backend\DepartementController@update');
	Route::get('backend/departement/delete/{departement}', 'Backend\DepartementController@destroy');

	
	// patient
	Route::get('backend/patients', 'Backend\PatientsController@index');
	Route::get('backend/patient/get/{province}', 'Backend\PatientsController@get');
	Route::get('backend/patient/create', 'Backend\PatientsController@create');
	Route::post('backend/patient/store', 'Backend\PatientsController@store');
	Route::get('backend/patient/{patient}/edit', 'Backend\PatientsController@edit');
	Route::patch('backend/patient/{patient}', 'Backend\PatientsController@update');
	Route::get('backend/patient/delete/{patient}', 'Backend\PatientsController@destroy');
	Route::get('backend/patient/show/{patient}', 'Backend\PatientsController@show');
	
	
	// patient
	Route::get('backend/patient/familys', 'Backend\FamilyPatientController@index');
	Route::get('backend/patient/family/create', 'Backend\FamilyPatientController@create');
	Route::post('backend/patient/family/store', 'Backend\FamilyPatientController@store');
	Route::get('backend/patient/family/{family}/edit', 'Backend\FamilyPatientController@edit');
	Route::patch('backend/patient/family/{family}', 'Backend\FamilyPatientController@update');
	Route::get('backend/patient/family/delete/{family}', 'Backend\FamilyPatientController@destroy');
	Route::get('backend/patient/family/show/{family}', 'Backend\FamilyPatientController@show');
	
	// users
	Route::get('backend/users', 'Backend\UserController@index');
	Route::get('backend/user/create', 'Backend\UserController@create');
	Route::post('backend/user/store', 'Backend\UserController@store');
	Route::get('backend/user/{user}/edit', 'Backend\UserController@edit');
	Route::patch('backend/user/{user}', 'Backend\UserController@update');
	Route::get('backend/user/delete/{user}', 'Backend\UserController@destroy');

	// access
	Route::get('backend/access', 'Backend\AccessController@index');
	Route::get('backend/access/create', 'Backend\AccessController@create');
	Route::post('backend/access/store', 'Backend\AccessController@store');
	Route::get('backend/access/{access}/edit', 'Backend\AccessController@edit');
	Route::patch('backend/access/{access}', 'Backend\AccessController@update');
	Route::get('backend/access/delete/{access}', 'Backend\AccessController@destroy');
	
	// guarantees
	Route::get('backend/guarantees', 'Backend\GuaranteeController@index');
	Route::get('backend/guarantee/create', 'Backend\GuaranteeController@create');
	Route::post('backend/guarantee/store', 'Backend\GuaranteeController@store');
	Route::get('backend/guarantee/{guarantee}/edit', 'Backend\GuaranteeController@edit');
	Route::patch('backend/guarantee/{guarantee}', 'Backend\GuaranteeController@update');
	Route::get('backend/guarantee/delete/{guarantee}', 'Backend\GuaranteeController@destroy');
	

	// doctor
	Route::get('backend/doctors', 'Backend\DoctorController@index');
	Route::get('backend/doctor/create', 'Backend\DoctorController@create');
	Route::post('backend/doctor/store', 'Backend\DoctorController@store');
	Route::get('backend/doctor/{doctor}/edit', 'Backend\DoctorController@edit');
	Route::patch('backend/doctor/{doctor}', 'Backend\DoctorController@update');
	Route::get('backend/doctor/delete/{doctor}', 'Backend\DoctorController@destroy');
	Route::post('backend/doctor/access/store', 'Backend\DoctorAccessController@store');

	// specialists
	Route::get('backend/doctor/specialists', 'Backend\SpecialistController@index');
	Route::get('backend/doctor/specialist/create', 'Backend\SpecialistController@create');
	Route::post('backend/doctor/specialist/store', 'Backend\SpecialistController@store');
	Route::get('backend/doctor/specialist/{specialist}/edit', 'Backend\SpecialistController@edit');
	Route::patch('backend/doctor/specialist/{specialist}', 'Backend\SpecialistController@update');
	Route::get('backend/doctor/specialist/delete/{specialist}', 'Backend\SpecialistController@destroy');

	// employees
	Route::get('backend/employees', 'Backend\EmployeeController@index');
	Route::get('backend/employee/create', 'Backend\EmployeeController@create');
	Route::post('backend/employee/store', 'Backend\EmployeeController@store');
	Route::get('backend/employee/{employee}/edit', 'Backend\EmployeeController@edit');
	Route::patch('backend/employee/{employee}', 'Backend\EmployeeController@update');
	Route::get('backend/employee/delete/{employee}', 'Backend\EmployeeController@destroy');

	// positions
	Route::get('backend/employees/positions', 'Backend\PositionController@index');
	Route::get('backend/employees/position/create', 'Backend\PositionController@create');
	Route::post('backend/employees/position/store', 'Backend\PositionController@store');
	Route::get('backend/employees/position/{position}/edit', 'Backend\PositionController@edit');
	Route::patch('backend/employees/position/{position}', 'Backend\PositionController@update');
	Route::get('backend/employees/position/delete/{position}', 'Backend\PositionController@destroy');

	
	// schedules
	Route::get('backend/schedules', 'Backend\ScheduleController@index');
	Route::get('backend/schedule/create', 'Backend\ScheduleController@create');
	Route::post('backend/schedule/store', 'Backend\ScheduleController@store');
	Route::get('backend/schedule/{schedule}/edit', 'Backend\ScheduleController@edit');
	Route::patch('backend/schedule/{schedule}', 'Backend\ScheduleController@update');
	Route::get('backend/schedule/delete/{schedule}', 'Backend\ScheduleController@destroy');
	
	// polikliniks
	Route::get('backend/schedule/polikliniks', 'Backend\PoliklinikController@index');
	Route::get('backend/schedule/poliklinik/create', 'Backend\PoliklinikController@create');
	Route::post('backend/schedule/poliklinik/store', 'Backend\PoliklinikController@store');
	Route::get('backend/schedule/poliklinik/{poliklinik}/edit', 'Backend\PoliklinikController@edit');
	Route::patch('backend/schedule/poliklinik/{poliklinik}', 'Backend\PoliklinikController@update');
	Route::get('backend/schedule/poliklinik/delete/{poliklinik}', 'Backend\PoliklinikController@destroy');
	
	
});
