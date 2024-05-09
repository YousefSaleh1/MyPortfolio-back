<?php

namespace App\Http\Controllers;

use Stringable;
use App\Models\Training;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Traits\UploadFileTrait;
use App\Http\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\TrainingResource;
use App\Http\Requests\Training\StoreTrainingRequest;
use App\Http\Requests\Training\UpdateTrainingRequest;

class TrainingController extends Controller
{
    use ApiResponseTrait, UploadFileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainings = Training::all();
        $data = TrainingResource::collection($trainings);
        return $this->customeResponse($data, 'Done!', 200);
    }



    public function store(StoreTrainingRequest $request)
    {
        try {
            DB::beginTransaction();

            $trainings = Training::create([
                'training_name' => $request->training_name,
                'company_name' => $request->company_name,
                'description' => $request->description,
                'company_link' => $request->company_link,
                'certificate_link' => $request->certificate_link,
                'company_logo' => $request->company_logo,
                'recomendation_letter_link' => $request->recomendation_letter_link,
            ]);

            // $this->UploadFile($request,'training','company_logo','image');

            DB::commit();
            return response()->json([
                'status' => 'success',
                'training' => $trainings,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return response()->json([
                'status' => 'error',
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */


    /**
     * Display the specified resource.
     */
    public function show(Training $training)
    {
        $data = new TrainingResource($training);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingRequest $request, Training $training)
    {
        try {

            DB::beginTransaction();
            $training->update([
                'training_name' => $request->training_name,
                'company_name' => $request->company_name,
                'description' => $request->description,
                'company_link' => $request->company_link,
                'certificate_link' => $request->certificate_link,
                'company_logo' => $request->company_logo,
                'recomendation_letter_link' => $request->recomendation_letter_link,
            ]);

            /*if ($request->hasFile('company_logo')) {
                if ($training->company_logo) {
                    Storage::delete($training->company_logo);
                }
                $path = $request->file('company_logo')->store('image', 'public');
                $training->update(['company_logo' => $path]);
            }
            DB::commit();
            return response()->json([
                'status' => 'success',
                'training' => $training,
            ]);*/
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return response()->json([
                'status' => 'error',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Training $training)
    {
        $training->delete();
        return response()->json(['message' => '{{ Model }} Deleted'], 200);
    }
}
