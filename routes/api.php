<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\HeroSliderController;
use App\Http\Controllers\ProjectPhotoController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\SkillItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Auth Requests ////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::post('/login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('api');

/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// End Auth Requests //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// Project Requests //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/project/{project}', [ProjectController::class, 'show']);
Route::middleware(['api'])->group(function () {
    Route::post('/projects-create', [ProjectController::class, 'store']);
    Route::put('/projects/{project}/update', [ProjectController::class, 'update']);
    Route::delete('/projects/{project}/delete', [ProjectController::class, 'destroy']);
});

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////// End Project Requests ////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// ProjectPhoto Requests //////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::middleware(['api'])->group(function () {
    Route::get('/project-photos/{project}', [ProjectPhotoController::class, 'index']);
    Route::get('/project-photos/{projectPhoto}', [ProjectPhotoController::class, 'show']);
    Route::post('/project-photo', [ProjectPhotoController::class, 'store']);
    Route::put('/project-photos/{projectPhoto}', [ProjectPhotoController::class, 'update']);
    Route::delete('/project-photos/{projectPhoto}', [ProjectPhotoController::class, 'destroy']);
});

/////////////////////////////////////////////////////////////////////////////////////
////////////////////////////// End ProjectPhoto Requests ////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// Contact Requests //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::post('/contacts-create', [ContactController::class, 'store']);
Route::middleware(['api'])->group(function () {
    Route::get('/contacts', [ContactController::class, 'index']);
    Route::get('/contacts/{contact}', [ContactController::class, 'show']);
    Route::delete('/contacts/{contact}/delete', [ContactController::class, 'destroy']);
});

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////// End Contact Requests ////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// Education Requests ////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::get('/educations', [EducationController::class, 'index']);
Route::middleware(['api'])->group(function () {
    Route::get('/education/{education}', [EducationController::class, 'show']);
    Route::post('/educations-create', [EducationController::class, 'store']);
    Route::put('/educations/{education}/update', [EducationController::class, 'update']);
    Route::delete('/educations/{education}/delete', [EducationController::class, 'destroy']);
});

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////// End Education Requests //////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////// Hero Requests //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::get('/hero', [HeroController::class, 'show']);
Route::get('/download-cv', [HeroController::class, 'downloadCV']);
Route::post('/hero-update', [HeroController::class, 'update'])->middleware('api');

/////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// End Hero Requests ////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// Hero Slider Requests //////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::middleware(['api'])->group(function () {
    Route::get('/hero-sliders', [HeroSliderController::class, 'index']);
    Route::get('/hero-sliders/{heroSlider}', [HeroSliderController::class, 'show']);
    Route::post('/hero-slider', [HeroSliderController::class, 'store']);
    Route::put('/hero-sliders/{heroSlider}', [HeroSliderController::class, 'update']);
    Route::delete('/hero-sliders/{heroSlider}', [HeroSliderController::class, 'destroy']);
});

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////// End Hero Slider Requests ////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Skill Requests //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::get('/skills', [SkillController::class, 'index']);
Route::middleware(['api'])->group(function () {
    Route::get('/skills/{skill}', [SkillController::class, 'show']);
    Route::post('/skills-create', [SkillController::class, 'store']);
    Route::put('/skills/{skill}/update', [SkillController::class, 'update']);
    Route::delete('/skills/{skill}/delete', [SkillController::class, 'destroy']);
});

/////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// End Skill Requests ////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// Skill Item Requests ///////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::middleware(['api'])->group(function () {
    Route::get('/skill-items', [SkillItemController::class, 'index']);
    Route::post('/skill-items-create', [SkillItemController::class, 'store']);
    Route::get('/skill-items/{skillItem}', [SkillItemController::class, 'show']);
    Route::put('/skill-items/{skillItem}/update', [SkillItemController::class, 'update']);
    Route::delete('/skill-items/{skillItem}/delete', [SkillItemController::class, 'destroy']);
});

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////// End Skill Item Requests /////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// Training Requests ////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::get('/trainings', [TrainingController::class, 'index']);
Route::middleware(['api'])->group(function () {
    Route::post('/trainings-create', [TrainingController::class, 'store']);
    Route::get('/trainings/{training}', [TrainingController::class, 'show']);
    Route::put('/trainings/{training}/update', [TrainingController::class, 'update']);
    Route::delete('/trainings/{training}/delete', [TrainingController::class, 'destroy']);
});

/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// End Training Requests //////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
