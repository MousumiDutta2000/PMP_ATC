<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\VerticalController;
use App\Http\Controllers\HighestEducationValueController;
use App\Http\Controllers\ProjectMemberController;
use App\Http\Controllers\ProjectRoleController;
use App\Http\Controllers\OpportunityStatusController;
use App\Http\Controllers\OpportunityController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\TechnologyController;
use App\Http\Controllers\SprintController;
use App\Http\Controllers\ProjectItemStatusController;
use App\Http\Controllers\ProjectItemController;
use App\Http\Controllers\Auth\MicrosoftController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});


// Route::resource('projects', ProjectsController::class);
// Route::get('projects/create', [ProjectsController::class, 'create'])->name('projects.create');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::group(['prefix' => 'project'], function () {
        Route::get('/', [ProjectsController::class, 'index'])->name('projects.index');
        Route::get('/create', [ProjectsController::class, 'create'])->name('projects.create');
        Route::post('/', [ProjectsController::class, 'store'])->name('projects.store');
        Route::get('/{project}', [ProjectsController::class, 'show'])->name('projects.show');
        Route::get('/{project}/edit', [ProjectsController::class, 'edit'])->name('projects.edit');
        Route::put('/{project}', [ProjectsController::class, 'update'])->name('projects.update');
        Route::get('/{project}/settings', [ProjectsController::class, 'settings'])->name('projects.settings');
        Route::put('/{project}/settings', [ProjectsController::class, 'updateSettings'])->name('projects.updateSettings');    
        Route::delete('/{project}', [ProjectsController::class, 'destroy'])->name('projects.destroy');
    });

    Route::group(['prefix' => 'vertical'], function () {
        Route::get('/', [VerticalController::class, 'index'])->name('verticals.index');
        Route::get('/create', [VerticalController::class, 'create'])->name('verticals.create');
        Route::post('/', [VerticalController::class, 'store'])->name('verticals.store');
        Route::get('/{vertical}', [VerticalController::class, 'show'])->name('verticals.show');
        Route::get('/{vertical}/edit', [VerticalController::class, 'edit'])->name('verticals.edit');
        Route::put('/{vertical}', [VerticalController::class, 'update'])->name('verticals.update');
        Route::delete('/{vertical}', [VerticalController::class, 'destroy'])->name('verticals.destroy');
    });

    Route::resource('highest-education-values', HighestEducationValueController::class);

    Route::resource('project-members', ProjectMemberController::class);

    Route::resource('project-roles', ProjectRoleController::class);

    Route::resource('opportunity_status', OpportunityStatusController::class);
    Route::resource('opportunities', OpportunityController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('profiles', ProfileController::class);
    Route::resource('designations', DesignationController::class);

    Route::resource('technologies', TechnologyController::class);
    Route::resource('sprints', SprintController::class);
    Route::resource('project_item_statuses', ProjectItemStatusController::class);
    Route::resource('project-items', ProjectItemController::class);

    Route::get('/get-profile-email/{id}', 'ProfileController@getProfileEmail');
});

//Microsoft Authentication Route

Route::controller(MicrosoftController::class, '')->group(function () {

    Route::get('auth/microsoft', 'redirectToProvider')->name('auth.microsoft');

    Route::get('auth/microsoft/callback', 'handleProviderCallback');

});

