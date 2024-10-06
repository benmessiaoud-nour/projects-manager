<?php

namespace App\Http\Controllers;

use App\Models\project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = auth()->user()->projects;
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = $request->validate([
           'name' => 'required',
           'description' => 'required'
       ]);

       $data['user_id'] = auth()->id();

       project::create($data);

       return redirect('/projects');
    }

    /**
     * Display the specified resource.
     */
    public function show(project $project)
    {
      return view('projects.show' , compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, project $project)
    {
        $project->update(['status'=>request('status')]);
        return redirect('/projects/'.$project->id);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project $project)
    {
        //
    }
}
