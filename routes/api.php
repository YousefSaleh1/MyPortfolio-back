<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\HeroController;
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
///////////////////////////////// Project Requests //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::get('/projects', [ProjectController::class, 'index']);
Route::get('/project/{project}', [ProjectController::class, 'show']);
Route::middleware(['api'])->group(function () {
    Route::post('/projects-create', [ProjectController::class, 'store']);
    Route::post('/projects/{project}/update', [ProjectController::class, 'update']);
    Route::delete('/projects/{project}/delete', [ProjectController::class, 'destroy']);
});

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////// End Project Requests ////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// Contact Requests //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::post('/concats-create', [ContactController::class, 'store']);
Route::middleware(['api'])->group(function () {
    Route::get('/concats', [ContactController::class, 'index']);
    Route::get('/concats/{concat}', [ContactController::class, 'show']);
    Route::delete('/concats/{concat}/delete', [ContactController::class, 'destroy']);
});

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////// End Contact Requests ////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////// Education Requests ////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::get('/educations', [EducationController::class, 'index']);
Route::middleware(['api'])->group(function () {
    Route::post('/educations-create', [EducationController::class, 'store']);
    Route::post('/educations/{education}/update', [EducationController::class, 'update']);
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
Route::post('/hero/{hero}/update', [HeroController::class, 'update'])->middleware('api');

/////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// End Hero Requests ////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////// Skill Requests //////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////

Route::get('/skills', [SkillController::class, 'index']);
Route::middleware(['api'])->group(function () {
    Route::post('/skills-create', [SkillController::class, 'store']);
    Route::get('/skills/{skill}', [SkillController::class, 'show']);
    Route::post('/skills/{skill}/update', [SkillController::class, 'update']);
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
    Route::post('/skill-items/{skillItem}/update', [SkillItemController::class, 'update']);
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
    Route::post('/trainings/{training}/update', [TrainingController::class, 'update']);
    Route::delete('/trainings/{training}/delete', [TrainingController::class, 'destroy']);
});




Route::get('/project-photos', [ProjectPhotoController::class, 'index']);
Route::get('/project-photos/{projectPhoto}', [ProjectPhotoController::class, 'show']);
Route::middleware(['api'])->group(function () {
    Route::post('/project-photo', [ProjectPhotoController::class, 'store']);
Route::post('/project-photos/{projectPhoto}', [ProjectPhotoController::class, 'update']);
Route::delete('/project-photos/{projectPhoto}', [ProjectPhotoController::class, 'destroy']);
});

/////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////// End Training Requests //////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////
