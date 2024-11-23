<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OtpController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\DriverDashboardController;
use App\Http\Controllers\StaffDashboardController;
use App\Http\Controllers\VehiclesController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\VehicleTypeController;
use App\Http\Controllers\DriverManagementController;
use App\Http\Controllers\CustomerManagementController;
use App\Http\Controllers\ReservationsManagementController;

Route::get('/otp/verify/{user_id}', [OtpController::class, 'showVerifyForm'])->name('otp.verify');
Route::post('/otp/verify', [OtpController::class, 'verify'])->name('otp.verify.submit');

Route::get('register', [RegisterController::class, 'indexRegister'])->name('register.index');
Route::get('register/driver', [RegisterController::class, 'showDriverRegisterForm'])->name('register.driver');
Route::get('register/customer', [RegisterController::class, 'showCustomerRegisterForm'])->name('register.customer');
Route::post('register/customer', [RegisterController::class, 'registerCustomer'])->name('register.customerform');
Route::post('register/driver', [RegisterController::class, 'registerDriver'])->name('register.driverform');

//Route::get('register/driver', [RegisterController::class, 'showDriverRegisterForm'])->name('register.driver');
//Route::post('register/driver', [RegisterController::class, 'registerDriver']);
Route::get('admin-login', [LoginController::class, 'showAdminLogin'])->name('adminlogin.index');
Route::post('admin-login', [LoginController::class, 'login'])->name('adminlogin.login');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login.index');
Route::post('login', [LoginController::class, 'login'])->name('login.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/vehicle-models/{type_id}', [VehiclesController::class, 'getModelsByType'])->name('vehicle.models');


// booking taxi in the front page
Route::post('booking-frontpage', [BookingController::class, 'frontBooking'])->name('booking.frontpage');
Route::post('booking-checkuser', [BookingController::class, 'frontCheckUser'])->name('booking.checkuser');
Route::post('booking-loginuser', [BookingController::class, 'frontLoginUser'])->name('booking.loginuser');
Route::post('booking-check-booking', [BookingController::class, 'frontCheckBooking'])->name('booking.checkbooking');
Route::get('check-current-booking', [BookingController::class, 'checkCurrentBooking'])->name('booking.checkcurrentbooking');
Route::get('booking-update-price-distance', [BookingController::class, 'updatePriceDistance'])->name('booking.updatepricedistance');
Route::get('booking-get-route', [BookingController::class, 'frontGetRoute'])->name('booking.getroute');
Route::post('booking-cancel', [BookingController::class, 'bookingCancel'])->name('booking.cancel');
Route::get('booking-check-nearby-customers', [BookingController::class, 'checkNearByCustomers'])->name('booking.checknearbycustomers');
Route::post('accept-booking-driver', [BookingController::class, 'acceptBookingDriver'])->name('booking.acceptbookingdriver');
Route::post('end-booking-driver', [BookingController::class, 'endBookingDriver'])->name('booking.endbookingdriver');
Route::get('cechk-accepted-driver', [BookingController::class, 'checkAcceptedDriver'])->name('booking.checkaccepteddriver');
Route::get('cechk-trip-status', [BookingController::class, 'checkTripStatus'])->name('booking.checktripstatus');
Route::get('payment-complete', [BookingController::class, 'completePayment'])->name('booking.paymentcomplete');

// Protect routes by role-based middleware

Route::middleware(['auth', 'role:admin'])->prefix('admin/dashboard')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile', [AdminDashboardController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/booking', [AdminDashboardController::class, 'adminBooking'])->name('admin.booking');


    // Vehicle Types Management Routes
    Route::get('/vehicle-types', [VehicleTypeController::class, 'index'])->name('vehicle-types.index');
    Route::post('/vehicle-types', [VehicleTypeController::class, 'store'])->name('vehicle-types.store');
    Route::put('/vehicle-types/{id}', [VehicleTypeController::class, 'update'])->name('vehicle-types.update');
    Route::delete('/vehicle-types/{id}', [VehicleTypeController::class, 'destroy'])->name('vehicle-types.destroy');
    Route::post('/vehicle-types/{id}/toggle-status', [VehicleTypeController::class, 'toggleStatus'])->name('vehicle-types.toggle-status');

    // Driver Management Routes
    Route::get('/drivers', [DriverManagementController::class, 'index'])->name('drivers.index');
    Route::post('/drivers', [DriverManagementController::class, 'store'])->name('drivers.store');
    Route::put('/drivers/{id}', [DriverManagementController::class, 'update'])->name('drivers.update');
    Route::delete('/drivers/{id}', [DriverManagementController::class, 'destroy'])->name('drivers.destroy');
    Route::post('/drivers/{id}/toggle-status', [DriverManagementController::class, 'toggleStatus'])->name('drivers.toggle-status');

    // Customer Management Routes
    Route::get('/customers', [CustomerManagementController::class, 'index'])->name('customers.index');
    Route::post('/customers', [CustomerManagementController::class, 'store'])->name('customers.store');
    Route::put('/customers/{id}', [CustomerManagementController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}', [CustomerManagementController::class, 'destroy'])->name('customers.destroy');
    Route::post('/customers/{id}/toggle-status', [CustomerManagementController::class, 'toggleStatus'])->name('customers.toggle-status');

    // Reservations Management Routes
    Route::get('/reservations', [ReservationsManagementController::class, 'index'])->name('reservations.index');
    Route::post('/admin/reservations', [AdminDashboardController::class, 'storeReservation'])->name('admin.reservations.store');
    Route::put('/admin/reservations/{id}', [AdminDashboardController::class, 'updateReservation'])->name('admin.reservations.update');
    Route::delete('/admin/reservations/{id}', [AdminDashboardController::class, 'destroyReservation'])->name('admin.reservations.destroy');
    Route::post('/admin/reservations/{id}/toggle-status', [AdminDashboardController::class, 'toggleReservationStatus'])->name('admin.reservations.toggle-status');
});

Route::middleware(['auth', 'role:customer'])->prefix('customer/dashboard')->group(function () {
    Route::get('/', [CustomerDashboardController::class, 'index'])->name('customer.dashboard');
    Route::get('/profile', [CustomerDashboardController::class, 'customerProfile'])->name('customer.profile');
    Route::get('/booking', [CustomerDashboardController::class, 'customerBooking'])->name('customer.booking');
    Route::get('/cancel-booking', [CustomerDashboardController::class, 'customerCancelBooking'])->name('customer.cancelbooking');
    Route::post('/cancel-booking-form', [CustomerDashboardController::class, 'customerCancelBookingForm'])->name('customer.cancelbookingform');
    Route::get('/payment-history', [CustomerDashboardController::class, 'customerPaymentHistory'])->name('customer.paymenthistory');
    Route::post('/update-profile', [CustomerDashboardController::class, 'customerUpdateProfile'])->name('customer.updateprofile');
    Route::post('/update-password', [CustomerDashboardController::class, 'customerUpdatePassword'])->name('customer.updatepassword');
    Route::get('/fetch-booking', [CustomerDashboardController::class, 'fetchCustomerBooking'])->name('customer.fetchcustomerbooking');
    Route::get('/fetch-payment-history', [CustomerDashboardController::class, 'fetchPaymentHistory'])->name('customer.fetchpaymenthistory');
    Route::get('/fetch-cancel-booking', [CustomerDashboardController::class, 'fetchCancelBooking'])->name('customer.fetchcancelbooking');
    Route::get('/fetch-pending-booking', [CustomerDashboardController::class, 'fetchPedingBooking'])->name('customer.fetchpendingbooking');
});

Route::middleware(['auth', 'role:driver'])->prefix('driver/dashboard')->group(function () {
    Route::get('/', [DriverDashboardController::class, 'index'])->name('driver.dashboard');
    Route::get('/profile', [DriverDashboardController::class, 'driverProfile'])->name('driver.profile');
    Route::get('/booking', [DriverDashboardController::class, 'driverBooking'])->name('driver.booking');
    Route::get('/cancel-booking', [DriverDashboardController::class, 'driverCancelBooking'])->name('driver.cancelbooking');
    Route::post('/cancel-booking-form', [DriverDashboardController::class, 'driverCancelBookingForm'])->name('driver.cancelbookingform');
    Route::get('/payment-history', [DriverDashboardController::class, 'driverPaymentHistory'])->name('driver.paymenthistory');
    Route::post('/update-profile', [DriverDashboardController::class, 'driverUpdateProfile'])->name('driver.updateprofile');
    Route::post('/update-password', [DriverDashboardController::class, 'driverUpdatePassword'])->name('driver.updatepassword');
    Route::get('/taxis', [DriverDashboardController::class, 'driverTaxis'])->name('driver.taxis');
    Route::get('/fetch-taxis', [DriverDashboardController::class, 'fetchdriverTaxis'])->name('driver.fetchtaxis');
    Route::post('/add-taxi', [DriverDashboardController::class, 'addDriverTaxi'])->name('driver.addtaxi');
    Route::get('/active-taxis', [DriverDashboardController::class, 'activedriverTaxis'])->name('driver.activetaxi');
    Route::get('/fetch-booking', [DriverDashboardController::class, 'fetchDriverBooking'])->name('driver.fetchdriverbooking');
    Route::get('/fetch-payment-history', [DriverDashboardController::class, 'fetchPaymentHistory'])->name('driver.fetchpaymenthistory');
    Route::get('/fetch-cancel-booking', [DriverDashboardController::class, 'fetchCancelBooking'])->name('driver.fetchcancelbooking');
    Route::get('/fetch-pending-booking', [DriverDashboardController::class, 'fetchPedingBooking'])->name('driver.fetchdriverpendingbooking');
});

Route::middleware(['auth', 'role:staff'])->prefix('staff/dashboard')->group(function () {
    Route::get('/', [StaffDashboardController::class, 'index'])->name('staff.dashboard');
    Route::get('/profile', [StaffDashboardController::class, 'staffProfile'])->name('staff.profile');
    Route::get('/booking', [StaffDashboardController::class, 'staffBooking'])->name('staff.booking');
});

