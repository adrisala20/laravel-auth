<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
Use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index()
{
    
    $projects = Project::all();
    //$projects = Project::paginate();
    return response()->json([
        'succes' => true,
        'results'=> $projects
    ]);
}
public function show($slug)
{
    $project = Project::where('slug', $slug)->with('category')->first() ;
    if($project){
        return response()->json([
            'success' => true,
            'results' => $project
        ]);
    }else{
        return response()->json([
            'success'=> false
            ]);
    }

}
}