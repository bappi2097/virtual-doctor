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


Route::name('landing.')->group(function () {
    Route::get('/', [\App\Http\Controllers\LandingPageController::class, 'home'])->name('home');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* -------------------------------------------------------------------------- */
/*                              Admin Route Start                             */
/* -------------------------------------------------------------------------- */



Route::group(['middleware' => ['auth', 'role:admin', 'ban'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

    Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name('dashboard');

    Route::group(['as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('edit');
        Route::put('/', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('update');
        Route::put('/change-password', [\App\Http\Controllers\Admin\ProfileController::class, 'changePassword'])->name('change-password');
    });

    /* ------------------------- Admin User Route Start ------------------------- */


    Route::group(['as' => 'users.', 'prefix' => 'users'], function () {

        Route::group(['middleware' => ['role:super'], 'as' => 'admin.', 'prefix' => 'admin'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\AdminController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\AdminController::class, 'store'])->name('store');
            Route::post('/ban', [\App\Http\Controllers\Admin\AdminController::class, 'ban'])->name('ban');
            Route::get('/{user}', [\App\Http\Controllers\Admin\AdminController::class, 'show'])->name('show');
            Route::get('/edit/{user}', [\App\Http\Controllers\Admin\AdminController::class, 'edit'])->name('edit');
            Route::put('/{user}', [\App\Http\Controllers\Admin\AdminController::class, 'update'])->name('update');
            Route::put('/change-password/{user}', [\App\Http\Controllers\Admin\AdminController::class, 'changePassword'])->name('change-password');
            Route::delete('/{user}', [\App\Http\Controllers\Admin\AdminController::class, 'destroy'])->name('delete');
        });

        Route::group(['as' => 'doctor.', 'prefix' => 'doctor'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\DoctorController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\DoctorController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\DoctorController::class, 'store'])->name('store');
            Route::post('/ban', [\App\Http\Controllers\Admin\DoctorController::class, 'ban'])->name('ban');
            Route::get('/{user}', [\App\Http\Controllers\Admin\DoctorController::class, 'show'])->name('show');
            Route::get('/edit/{user}', [\App\Http\Controllers\Admin\DoctorController::class, 'edit'])->name('edit');
            Route::put('/{user}', [\App\Http\Controllers\Admin\DoctorController::class, 'update'])->name('update');
            Route::put('/change-password/{user}', [\App\Http\Controllers\Admin\DoctorController::class, 'changePassword'])->name('change-password');
            Route::delete('/{user}', [\App\Http\Controllers\Admin\DoctorController::class, 'destroy'])->name('delete');
            Route::get('/appointment/{user}', [\App\Http\Controllers\Admin\DoctorController::class, 'appointmentIndex'])->name('appointment-index');

            Route::group(['as' => 'doctor-schedule.', 'prefix' => 'doctor-schedule'], function () {
                // doctor schedule ajax
                Route::get('/schedule/{user}', [\App\Http\Controllers\Admin\DoctorScheduleController::class, 'schedule'])->name('schedule');
                Route::get('/edit/{user}', [\App\Http\Controllers\Admin\DoctorScheduleController::class, 'edit'])->name('edit');
                Route::put('/{user}', [\App\Http\Controllers\Admin\DoctorScheduleController::class, 'update'])->name('update');
                Route::delete('/{doctorSchedule}', [\App\Http\Controllers\Admin\DoctorScheduleController::class, 'destroy'])->name('delete');
            });
        });

        Route::group(['as' => 'patient.', 'prefix' => 'patient'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\PatientController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Admin\PatientController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Admin\PatientController::class, 'store'])->name('store');
            Route::post('/ban', [\App\Http\Controllers\Admin\PatientController::class, 'ban'])->name('ban');
            Route::get('/{user}', [\App\Http\Controllers\Admin\PatientController::class, 'show'])->name('show');
            Route::get('/edit/{user}', [\App\Http\Controllers\Admin\PatientController::class, 'edit'])->name('edit');
            Route::put('/{user}', [\App\Http\Controllers\Admin\PatientController::class, 'update'])->name('update');
            Route::put('/change-password/{user}', [\App\Http\Controllers\Admin\PatientController::class, 'changePassword'])->name('change-password');
            Route::delete('/{user}', [\App\Http\Controllers\Admin\PatientController::class, 'destroy'])->name('delete');
            Route::get('/appointment/{user}', [\App\Http\Controllers\Admin\PatientController::class, 'appointmentIndex'])->name('appointment-index');
        });
    });

    Route::group(['as' => 'doctor-category.', 'prefix' => 'doctor-category'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\DoctorCategoryController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\DoctorCategoryController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\DoctorCategoryController::class, 'store'])->name('store');
        Route::get('/{doctorCategory}', [\App\Http\Controllers\Admin\DoctorCategoryController::class, 'show'])->name('show');
        Route::get('/edit/{doctorCategory}', [\App\Http\Controllers\Admin\DoctorCategoryController::class, 'edit'])->name('edit');
        Route::put('/{doctorCategory}', [\App\Http\Controllers\Admin\DoctorCategoryController::class, 'update'])->name('update');
        Route::delete('/{doctorCategory}', [\App\Http\Controllers\Admin\DoctorCategoryController::class, 'destroy'])->name('delete');
        Route::get('/appointment/{doctorCategory}', [\App\Http\Controllers\Admin\DoctorCategoryController::class, 'appointmentIndex'])->name('appointment-index');


        Route::group(['as' => 'doctor.', 'prefix' => 'doctor'], function () {
            Route::get('/{slug}', [\App\Http\Controllers\Admin\DoctorCategoryController::class, 'doctorIndex'])->name('doctor-index');
        });
    });

    Route::group(['as' => 'appointments.', 'prefix' => 'appointments'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\AppointmentController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\AppointmentController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\AppointmentController::class, 'store'])->name('store');
        Route::get('/{appointment}', [\App\Http\Controllers\Admin\AppointmentController::class, 'show'])->name('show');
        Route::get('/edit/{appointment}', [\App\Http\Controllers\Admin\AppointmentController::class, 'edit'])->name('edit');
        Route::put('/{appointment}', [\App\Http\Controllers\Admin\AppointmentController::class, 'update'])->name('update');
        Route::delete('/{appointment}', [\App\Http\Controllers\Admin\AppointmentController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'healths.', 'prefix' => 'healths'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\DailyHealthController::class, 'index'])->name('index');
        Route::get('/patient/{patient}', [\App\Http\Controllers\Admin\DailyHealthController::class, 'single'])->name('single');
        Route::get('/create', [\App\Http\Controllers\Admin\DailyHealthController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\DailyHealthController::class, 'store'])->name('store');
        Route::get('/{dailyHealth}', [\App\Http\Controllers\Admin\DailyHealthController::class, 'show'])->name('show');
        Route::get('/edit/{dailyHealth}', [\App\Http\Controllers\Admin\DailyHealthController::class, 'edit'])->name('edit');
        Route::put('/{dailyHealth}', [\App\Http\Controllers\Admin\DailyHealthController::class, 'update'])->name('update');
        Route::delete('/{dailyHealth}', [\App\Http\Controllers\Admin\DailyHealthController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'reports.', 'prefix' => 'reports'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\ReportController::class, 'index'])->name('index');
        Route::get('/patient/{patient}', [\App\Http\Controllers\Admin\ReportController::class, 'single'])->name('single');
        Route::get('/create', [\App\Http\Controllers\Admin\ReportController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\ReportController::class, 'store'])->name('store');
        Route::get('/{report}', [\App\Http\Controllers\Admin\ReportController::class, 'show'])->name('show');
        Route::get('/edit/{report}', [\App\Http\Controllers\Admin\ReportController::class, 'edit'])->name('edit');
        Route::put('/{report}', [\App\Http\Controllers\Admin\ReportController::class, 'update'])->name('update');
        Route::delete('/{report}', [\App\Http\Controllers\Admin\ReportController::class, 'destroy'])->name('delete');
        Route::get('download-document/{document}', [\App\Http\Controllers\Admin\ReportController::class, 'downloadDocument'])->name('download-document');
    });
    Route::group(['as' => 'documents.', 'prefix' => 'documents'], function () {
        Route::post('/{report}', [\App\Http\Controllers\Admin\DocumentController::class, 'store'])->name('store');
        Route::delete('/{document}', [\App\Http\Controllers\Admin\DocumentController::class, 'destroy'])->name('delete');
    });


    Route::group(['as' => 'prescriptions.', 'prefix' => 'prescriptions'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\PrescriptionController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\PrescriptionController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\PrescriptionController::class, 'store'])->name('store');
        Route::get('/{prescription}', [\App\Http\Controllers\Admin\PrescriptionController::class, 'show'])->name('show');
        Route::get('/edit/{prescription}', [\App\Http\Controllers\Admin\PrescriptionController::class, 'edit'])->name('edit');
        Route::put('/{prescription}', [\App\Http\Controllers\Admin\PrescriptionController::class, 'update'])->name('update');
        Route::delete('/{prescription}', [\App\Http\Controllers\Admin\PrescriptionController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'infos.', 'prefix' => 'infos'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\InfoController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\InfoController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\InfoController::class, 'store'])->name('store');
        Route::get('/{info}', [\App\Http\Controllers\Admin\InfoController::class, 'show'])->name('show');
        Route::get('/edit/{info}', [\App\Http\Controllers\Admin\InfoController::class, 'edit'])->name('edit');
        Route::put('/{info}', [\App\Http\Controllers\Admin\InfoController::class, 'update'])->name('update');
        Route::delete('/{info}', [\App\Http\Controllers\Admin\InfoController::class, 'destroy'])->name('delete');
    });
});

/* -------------------------------------------------------------------------- */
/*                               Admin Route End                              */
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                             Doctor Route Start                             */
/* -------------------------------------------------------------------------- */

Route::group(['middleware' => ['auth', 'role:doctor', 'ban'], 'as' => 'doctor.', 'prefix' => 'doctor'], function () {

    Route::get('/dashboard', [\App\Http\Controllers\Doctor\DashboardController::class, 'dashboard'])->name('dashboard');

    Route::group(['as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::get('/', [\App\Http\Controllers\Doctor\ProfileController::class, 'edit'])->name('edit');
        Route::put('/', [\App\Http\Controllers\Doctor\ProfileController::class, 'update'])->name('update');
        Route::put('/change-password', [\App\Http\Controllers\Doctor\ProfileController::class, 'changePassword'])->name('change-password');
    });


    Route::group(['as' => 'users.', 'prefix' => 'users'], function () {
        Route::group(['as' => 'doctor.', 'prefix' => 'doctor'], function () {
            Route::get('/', [\App\Http\Controllers\Doctor\DoctorController::class, 'index'])->name('index');
            Route::get('/{user}', [\App\Http\Controllers\Doctor\DoctorController::class, 'show'])->name('show');
            Route::get('/appointment/{user}', [\App\Http\Controllers\Doctor\DoctorController::class, 'appointmentIndex'])->name('appointment-index');

            Route::group(['as' => 'doctor-schedule.', 'prefix' => 'doctor-schedule'], function () {
                // doctor schedule ajax
                Route::get('/show/{user}', [\App\Http\Controllers\Doctor\DoctorScheduleController::class, 'show'])->name('show');
                Route::get('/schedule/{user}', [\App\Http\Controllers\Doctor\DoctorScheduleController::class, 'schedule'])->name('schedule');
            });
        });
        Route::group(['as' => 'patient.', 'prefix' => 'patient'], function () {
            Route::get('/', [\App\Http\Controllers\Doctor\PatientController::class, 'index'])->name('index');
            Route::get('/create', [\App\Http\Controllers\Doctor\PatientController::class, 'create'])->name('create');
            Route::post('/', [\App\Http\Controllers\Doctor\PatientController::class, 'store'])->name('store');
            Route::get('/{user}', [\App\Http\Controllers\Doctor\PatientController::class, 'show'])->name('show');
            Route::post('/ban', [\App\Http\Controllers\Doctor\PatientController::class, 'ban'])->name('ban');
            Route::get('/appointment/{user}', [\App\Http\Controllers\Doctor\PatientController::class, 'appointmentIndex'])->name('appointment-index');
            Route::get('/healths/{user}', [\App\Http\Controllers\Doctor\PatientController::class, 'healths'])->name('healths');
            Route::get('/reports/{user}', [\App\Http\Controllers\Doctor\PatientController::class, 'reports'])->name('reports');
            Route::get('/prescriptions/{user}', [\App\Http\Controllers\Doctor\PatientController::class, 'prescriptions'])->name('prescriptions');
        });
    });

    Route::group(['as' => 'doctor-category.', 'prefix' => 'doctor-category'], function () {
        Route::get('/', [\App\Http\Controllers\Doctor\DoctorCategoryController::class, 'index'])->name('index');
        Route::get('/{doctorCategory}', [\App\Http\Controllers\Doctor\DoctorCategoryController::class, 'show'])->name('show');
        Route::get('/appointment/{doctorCategory}', [\App\Http\Controllers\Doctor\DoctorCategoryController::class, 'appointmentIndex'])->name('appointment-index');


        Route::group(['as' => 'doctor.', 'prefix' => 'doctor'], function () {
            Route::get('/{slug}', [\App\Http\Controllers\Doctor\DoctorCategoryController::class, 'doctorIndex'])->name('doctor-index');
        });
    });

    Route::group(['as' => 'appointments.', 'prefix' => 'appointments'], function () {
        Route::get('/', [\App\Http\Controllers\Doctor\AppointmentController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Doctor\AppointmentController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Doctor\AppointmentController::class, 'store'])->name('store');
        Route::get('/{appointment}', [\App\Http\Controllers\Doctor\AppointmentController::class, 'show'])->name('show');
        Route::get('/edit/{appointment}', [\App\Http\Controllers\Doctor\AppointmentController::class, 'edit'])->name('edit');
        Route::put('/{appointment}', [\App\Http\Controllers\Doctor\AppointmentController::class, 'update'])->name('update');
        Route::put('accepted/{appointment}', [\App\Http\Controllers\Doctor\AppointmentController::class, 'accepted'])->name('accepted');
        Route::put('rejected/{appointment}', [\App\Http\Controllers\Doctor\AppointmentController::class, 'rejected'])->name('rejected');
        Route::put('completed/{appointment}', [\App\Http\Controllers\Doctor\AppointmentController::class, 'completed'])->name('completed');
        Route::delete('/{appointment}', [\App\Http\Controllers\Doctor\AppointmentController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'healths.', 'prefix' => 'healths'], function () {
        Route::get('/', [\App\Http\Controllers\Doctor\DailyHealthController::class, 'index'])->name('index');
        Route::get('/patient/{patient}', [\App\Http\Controllers\Doctor\DailyHealthController::class, 'single'])->name('single');
        Route::get('/{dailyHealth}', [\App\Http\Controllers\Doctor\DailyHealthController::class, 'show'])->name('show');
    });

    Route::group(['as' => 'reports.', 'prefix' => 'reports'], function () {
        Route::get('/', [\App\Http\Controllers\Doctor\ReportController::class, 'index'])->name('index');
        Route::get('/patient/{patient}', [\App\Http\Controllers\Doctor\ReportController::class, 'single'])->name('single');
        Route::get('/create', [\App\Http\Controllers\Doctor\ReportController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Doctor\ReportController::class, 'store'])->name('store');
        Route::get('/{report}', [\App\Http\Controllers\Doctor\ReportController::class, 'show'])->name('show');
        Route::get('/edit/{report}', [\App\Http\Controllers\Doctor\ReportController::class, 'edit'])->name('edit');
        Route::put('/{report}', [\App\Http\Controllers\Doctor\ReportController::class, 'update'])->name('update');
        Route::delete('/{report}', [\App\Http\Controllers\Doctor\ReportController::class, 'destroy'])->name('delete');
        Route::get('download-document/{document}', [\App\Http\Controllers\Doctor\ReportController::class, 'downloadDocument'])->name('download-document');
    });
    Route::group(['as' => 'documents.', 'prefix' => 'documents'], function () {
        Route::post('/{report}', [\App\Http\Controllers\Doctor\DocumentController::class, 'store'])->name('store');
        Route::delete('/{document}', [\App\Http\Controllers\Doctor\DocumentController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'prescriptions.', 'prefix' => 'prescriptions'], function () {
        Route::get('/', [\App\Http\Controllers\Doctor\PrescriptionController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Doctor\PrescriptionController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Doctor\PrescriptionController::class, 'store'])->name('store');
        Route::get('/{prescription}', [\App\Http\Controllers\Doctor\PrescriptionController::class, 'show'])->name('show');
        Route::get('/edit/{prescription}', [\App\Http\Controllers\Doctor\PrescriptionController::class, 'edit'])->name('edit');
        Route::put('/{prescription}', [\App\Http\Controllers\Doctor\PrescriptionController::class, 'update'])->name('update');
        Route::delete('/{prescription}', [\App\Http\Controllers\Doctor\PrescriptionController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'infos.', 'prefix' => 'infos'], function () {
        Route::get('/', [\App\Http\Controllers\Doctor\InfoController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Doctor\InfoController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Doctor\InfoController::class, 'store'])->name('store');
        Route::get('/{info}', [\App\Http\Controllers\Doctor\InfoController::class, 'show'])->name('show');
        Route::get('/edit/{info}', [\App\Http\Controllers\Doctor\InfoController::class, 'edit'])->name('edit');
        Route::put('/{info}', [\App\Http\Controllers\Doctor\InfoController::class, 'update'])->name('update');
        Route::delete('/{info}', [\App\Http\Controllers\Doctor\InfoController::class, 'destroy'])->name('delete');
    });
    Route::group(['as' => 'chat.', 'prefix' => 'chat'], function () {
        // Route::get('/', [\App\Http\Controllers\ChatController::class, 'index'])->name('index');
        Route::post('/{appointment}', [\App\Http\Controllers\ChatController::class, 'store'])->name('store');
        Route::delete('/{chat}', [\App\Http\Controllers\ChatController::class, 'destroy'])->name('destroy');
    });
});

/* -------------------------------------------------------------------------- */
/*                              Doctor Route End                              */
/* -------------------------------------------------------------------------- */

/* -------------------------------------------------------------------------- */
/*                          Patient Route Start                               */
/* -------------------------------------------------------------------------- */

Route::group(['middleware' => ['auth', 'role:patient', 'ban'], 'as' => 'patient.', 'prefix' => 'patient'], function () {

    Route::get('/dashboard', [\App\Http\Controllers\Patient\DashboardController::class, 'dashboard'])->name('dashboard');

    Route::group(['as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::get('/', [\App\Http\Controllers\Patient\ProfileController::class, 'edit'])->name('edit');
        Route::put('/', [\App\Http\Controllers\Patient\ProfileController::class, 'update'])->name('update');
        Route::put('/change-password', [\App\Http\Controllers\Patient\ProfileController::class, 'changePassword'])->name('change-password');
    });

    Route::group(['as' => 'users.'], function () {
        Route::group(['as' => 'doctor.', 'prefix' => 'doctor'], function () {
            Route::get('/', [\App\Http\Controllers\Patient\DoctorController::class, 'index'])->name('index');
            Route::get('/{user}', [\App\Http\Controllers\Patient\DoctorController::class, 'show'])->name('show');
            Route::get('/appointment/{user}', [\App\Http\Controllers\Patient\DoctorController::class, 'appointmentIndex'])->name('appointment-index');
            Route::group(['as' => 'doctor-schedule.', 'prefix' => 'doctor-schedule'], function () {
                // doctor schedule ajax
                Route::get('/show/{user}', [\App\Http\Controllers\Patient\DoctorScheduleController::class, 'show'])->name('show');
                Route::get('/schedule/{user}', [\App\Http\Controllers\Patient\DoctorScheduleController::class, 'schedule'])->name('schedule');
            });
        });
    });

    Route::group(['as' => 'doctor-category.', 'prefix' => 'doctor-category'], function () {
        Route::get('/', [\App\Http\Controllers\Patient\DoctorCategoryController::class, 'index'])->name('index');
        Route::get('/{doctorCategory}', [\App\Http\Controllers\Patient\DoctorCategoryController::class, 'show'])->name('show');
        Route::get('/appointment/{doctorCategory}', [\App\Http\Controllers\Patient\DoctorCategoryController::class, 'appointmentIndex'])->name('appointment-index');


        Route::group(['as' => 'doctor.', 'prefix' => 'doctor'], function () {
            Route::get('/{slug}', [\App\Http\Controllers\Patient\DoctorCategoryController::class, 'doctorIndex'])->name('doctor-index');
        });
    });

    Route::group(['as' => 'appointments.', 'prefix' => 'appointments'], function () {
        Route::get('/', [\App\Http\Controllers\Patient\AppointmentController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Patient\AppointmentController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Patient\AppointmentController::class, 'store'])->name('store');
        Route::get('/{appointment}', [\App\Http\Controllers\Patient\AppointmentController::class, 'show'])->name('show');
        Route::get('/edit/{appointment}', [\App\Http\Controllers\Patient\AppointmentController::class, 'edit'])->name('edit');
        Route::put('/{appointment}', [\App\Http\Controllers\Patient\AppointmentController::class, 'update'])->name('update');
        Route::delete('/{appointment}', [\App\Http\Controllers\Patient\AppointmentController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'healths.', 'prefix' => 'healths'], function () {
        Route::get('/', [\App\Http\Controllers\Patient\DailyHealthController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Patient\DailyHealthController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Patient\DailyHealthController::class, 'store'])->name('store');
        Route::get('/{dailyHealth}', [\App\Http\Controllers\Patient\DailyHealthController::class, 'show'])->name('show');
        Route::get('/edit/{dailyHealth}', [\App\Http\Controllers\Patient\DailyHealthController::class, 'edit'])->name('edit');
        Route::put('/{dailyHealth}', [\App\Http\Controllers\Patient\DailyHealthController::class, 'update'])->name('update');
        Route::delete('/{dailyHealth}', [\App\Http\Controllers\Patient\DailyHealthController::class, 'destroy'])->name('delete');
    });

    Route::group(['as' => 'reports.', 'prefix' => 'reports'], function () {
        Route::get('/', [\App\Http\Controllers\Patient\ReportController::class, 'index'])->name('index');
        Route::get('/patient/{patient}', [\App\Http\Controllers\Patient\ReportController::class, 'single'])->name('single');
        Route::get('/create', [\App\Http\Controllers\Patient\ReportController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Patient\ReportController::class, 'store'])->name('store');
        Route::get('/{report}', [\App\Http\Controllers\Patient\ReportController::class, 'show'])->name('show');
        Route::get('/edit/{report}', [\App\Http\Controllers\Patient\ReportController::class, 'edit'])->name('edit');
        Route::put('/{report}', [\App\Http\Controllers\Patient\ReportController::class, 'update'])->name('update');
        Route::delete('/{report}', [\App\Http\Controllers\Patient\ReportController::class, 'destroy'])->name('delete');
        Route::get('download-document/{document}', [\App\Http\Controllers\Patient\ReportController::class, 'downloadDocument'])->name('download-document');
    });
    Route::group(['as' => 'documents.', 'prefix' => 'documents'], function () {
        Route::post('/{report}', [\App\Http\Controllers\Admin\DocumentController::class, 'store'])->name('store');
        Route::delete('/{document}', [\App\Http\Controllers\Admin\DocumentController::class, 'destroy'])->name('delete');
    });


    Route::group(['as' => 'prescriptions.', 'prefix' => 'prescriptions'], function () {
        Route::get('/', [\App\Http\Controllers\Patient\PrescriptionController::class, 'index'])->name('index');
        Route::get('/{prescription}', [\App\Http\Controllers\Patient\PrescriptionController::class, 'show'])->name('show');
    });

    Route::group(['as' => 'infos.', 'prefix' => 'infos'], function () {
        Route::get('/', [\App\Http\Controllers\Patient\InfoController::class, 'index'])->name('index');
        Route::get('/{info}', [\App\Http\Controllers\Patient\InfoController::class, 'show'])->name('show');
    });

    Route::group(['as' => 'chat.', 'prefix' => 'chat'], function () {
        // Route::get('/', [\App\Http\Controllers\ChatController::class, 'index'])->name('index');
        Route::post('/{appointment}', [\App\Http\Controllers\ChatController::class, 'store'])->name('store');
        Route::delete('/{chat}', [\App\Http\Controllers\ChatController::class, 'destroy'])->name('destroy');
    });
});
