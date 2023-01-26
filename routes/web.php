<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AuthorController;
use App\Http\Controllers\CompanyCategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\IntercambioController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\savedJobController;
use App\Http\Controllers\ScholarshipController;
use Illuminate\Support\Facades\Route;

//public routes
Route::get('/', [PostController::class, 'index'])->name('post.index');

Route::get('/job/{job}', [PostController::class, 'show'])->name('post.show');
Route::get('employer/{employer}', [AuthorController::class, 'employer'])->name('account.employer');

//bolsas de studo
Route::get('/bolsas', [ScholarshipController::class, 'index'])->name('scholarship.index');
Route::get('/bolsas/{job}', [ScholarshipController::class, 'show'])->name('scholarship.show');

//Intercambios
Route::get('/intercambios', [IntercambioController::class, 'index'])->name('intercambio.index');
Route::get('/intercambios/{intercambio}', [IntercambioController::class, 'show'])->name('intercambios.show');

//Eventos
Route::get('/eventos', [EventController::class, 'index'])->name('events.index');
Route::get('/eventos/{evento}', [EventController::class, 'show'])->name('events.show');

//return vue page
Route::get('/search', [JobController::class, 'index'])->name('job.index');

//auth routes
Route::middleware('auth')->prefix('account')->group(function () {
  //every auth routes AccountController
  Route::get('logout', [AccountController::class, 'logout'])->name('account.logout');
  Route::get('overview', [AccountController::class, 'index'])->name('account.index');
  Route::get('deactivate', [AccountController::class, 'deactivateView'])->name('account.deactivate');
  Route::get('change-password', [AccountController::class, 'changePasswordView'])->name('account.changePassword');
  Route::delete('delete', [AccountController::class, 'deleteAccount'])->name('account.delete');
  Route::put('change-password', [AccountController::class, 'changePassword'])->name('account.changePassword');
  //savedJobs
  Route::get('my-saved-jobs', [savedJobController::class, 'index'])->name('savedJob.index');
  Route::get('my-saved-jobs/{id}', [savedJobController::class, 'store'])->name('savedJob.store');
  Route::delete('my-saved-jobs/{id}', [savedJobController::class, 'destroy'])->name('savedJob.destroy');
  //applyjobs
  Route::get('apply-job', [AccountController::class, 'applyJobView'])->name('account.applyJob');
  Route::post('apply-job', [AccountController::class, 'applyJob'])->name('account.applyJob');

  //Admin Role Routes
  Route::group(['middleware' => ['role:admin']], function () {
    Route::get('dashboard', [AdminController::class, 'dashboard'])->name('account.dashboard');
    Route::get('view-all-users', [AdminController::class, 'viewAllUsers'])->name('account.viewAllUsers');
    Route::delete('view-all-users', [AdminController::class, 'destroyUser'])->name('account.destroyUser');

    Route::get('category/{category}/edit', [CompanyCategoryController::class, 'edit'])->name('category.edit');
    Route::post('category', [CompanyCategoryController::class, 'store'])->name('category.store');
    Route::put('category/{id}', [CompanyCategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{id}', [CompanyCategoryController::class, 'destroy'])->name('category.destroy');
  });

  //Author Role Routes
  Route::group(['middleware' => ['role:author']], function () {
    Route::get('author-section', [AuthorController::class, 'authorSection'])->name('account.authorSection');

    Route::get('job-application/{id}', [JobApplicationController::class, 'show'])->name('jobApplication.show');
    Route::delete('job-application', [JobApplicationController::class, 'destroy'])->name('jobApplication.destroy');
    Route::get('job-application', [JobApplicationController::class, 'index'])->name('jobApplication.index');

    Route::get('post/create', [PostController::class, 'create'])->name('post.create');
    Route::post('post', [PostController::class, 'store'])->name('post.store');
    Route::get('post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('post/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('post/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    Route::get('scholarships/create', [ScholarshipController::class, 'create'])->name('scholarships.create');
    Route::post('scholarships', [ScholarshipController::class, 'store'])->name('scholarships.store');
    Route::get('scholarships/{scholarship}/edit', [ScholarshipController::class, 'edit'])->name('scholarships.edit');
    Route::post('scholarships/{scholarship}', [ScholarshipController::class, 'update'])->name('scholarships.update');
    Route::delete('scholarships/{scholarship}', [ScholarshipController::class, 'destroy'])->name('scholarships.destroy');

    Route::get('intercambios/create', [IntercambioController::class, 'create'])->name('intercambios.create');
    Route::post('intercambios', [IntercambioController::class, 'store'])->name('intercambios.store');
    Route::get('intercambios/{intercambio}/edit', [IntercambioController::class, 'edit'])->name('intercambios.edit');
    Route::post('intercambios/{intercambio}', [IntercambioController::class, 'update'])->name('intercambios.update');
    Route::delete('intercambios/{intercambio}', [IntercambioController::class, 'destroy'])->name('intercambios.destroy');

    Route::get('eventos/create', [EventController::class, 'create'])->name('events.create');
    Route::post('eventos', [EventController::class, 'store'])->name('events.store');
    Route::get('eventos/{evento}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::post('eventos/{evento}', [EventController::class, 'update'])->name('events.update');
    Route::delete('eventos/{evento}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::get('company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::put('company/{id}', [CompanyController::class, 'update'])->name('company.update');
    Route::post('company', [CompanyController::class, 'store'])->name('company.store');
    Route::get('company/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::delete('company', [CompanyController::class, 'destroy'])->name('company.destroy');
  });

  //User Role routes
  Route::group(['middleware' => ['role:user']], function () {
    Route::get('become-employer', [AccountController::class, 'becomeEmployerView'])->name('account.becomeEmployer');
    Route::post('become-employer', [AccountController::class, 'becomeEmployer'])->name('account.becomeEmployer');
  });
});
