<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;;

use App\Http\Resources\HeroResource;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\UploadFileTrait;
use Illuminate\Support\Facades\Log;

class HeroController extends Controller
{
    use ApiResponseTrait, UploadFileTrait;

    /**
     * Display the specified resource.
     */
    public function show(Hero $hero)
    {
        $data = new HeroResource($hero);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        try {
            //code...
        } catch (\Throwable $th) {
            Log::error($th);
            return response()->json(['message' => 'Something Error !'], 500);
        }
    }

    public function downloadCV()
    {
        $my_cv = Hero::first()->my_cv ;
        $path = storage_path('app\public\\' . $my_cv);
        return response()->download($path);
    }
}
