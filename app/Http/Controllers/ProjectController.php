<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\StoreProjectRequest;
use App\Http\Requests\Project\UpdateProjectRequest;
use App\Http\Resources\ProjectPhotoResource;
use App\Models\Project;
use Illuminate\Http\Request;;

use App\Http\Resources\ProjectResource;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Traits\UploadFileTrait;
use App\Models\ProjectPhoto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    use ApiResponseTrait, UploadFileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        $data = ProjectResource::collection($projects);
        return $this->customeResponse($data, 'Projects Retrieved Successfully', 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        try {
            DB::beginTransaction();

            $project = Project::create([
                'title' => $request->title,
                'description' => $request->description,
                'github_link' => $request->github_link,
                'demo_link' => $request->demo_link,
                'date' => $request->date,
            ]);

            $path = $this->UploadFile($request, 'projects', 'photo', 'public');
            $projectPhoto = new ProjectPhoto([
                'project_id' => $project->id,
                'photo' => $path,
            ]);
            $projectPhoto->save();

            DB::commit();

            return $this->customeResponse(new ProjectResource($project), 'Project Created Successfully', 201);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return $this->customeResponse(null, 'Failed To Create Project', 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $data['project'] = new ProjectResource($project);
        $data['photos'] = ProjectPhotoResource::collection($project->project_photos);
        return $this->customeResponse($data, 'Done!', 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        try {
            DB::beginTransaction();

            $project->update([
                'title' => $request->title,
                'description' => $request->description,
                'github_link' => $request->github_link,
                'demo_link' => $request->demo_link,
                'date' => $request->date,
            ]);

            if ($request->hasFile('photo')) {
                $path = $this->UploadFile($request, 'projects', 'photo', 'public');
                $projectPhoto = new ProjectPhoto([
                    'project_id' => $project->id,
                    'photo' => $path,
                ]);
                $projectPhoto->save();
            }

            DB::commit();

            return $this->customeResponse(new ProjectResource($project), 'Project Updated Successfully', 200);
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error($th);
            return response()->json(['message' => 'Something Error !'], 500);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return $this->customeResponse(null, 'project deleted successfully', 200);
    }
}
