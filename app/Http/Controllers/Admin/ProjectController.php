<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

//use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$projects= Project::all();
        $projects = Project::paginate(5);
       // dd($projects)  
        return view("admin.projects.index",compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $form_data = $request->all();
        $form_data = $request->validated();
        $form_data['slug'] = Project::generateSlug($form_data['title']);
        if($request->hasFile('image')){
            //dd($request->file('image'));
            $img_path =Storage::put('image', $request->image);
            //dd($img_path);
            $form_data['image'] = $img_path;
        }

        $newPost = Project::create($form_data);
        return redirect()->route('admin.projects.show', $newPost->slug);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        
        return view("admin.projects.show",compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view("admin.projects.edit",compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $form_data = $request->all();
        if ($project->title !== $form_data['title']) {
            $form_data['slug'] = Project::generateSlug($form_data['title']);
        }
        // DB::enableQueryLog();
        $project->update($form_data); //query da eseguire
        // $query = DB::getQueryLog();
        // dd($query);
        return redirect()->route("admin.projects.show", $project->slug);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', $project->title . 'succesfull delected ');

    }
}
