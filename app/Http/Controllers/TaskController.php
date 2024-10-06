<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Task;


class TaskController extends Controller
{
    public function store(Project $project)
    {

        $data = request()->validate([
            'body' => 'required'
        ]);

        $data['project_id'] = $project->id;

        Task::Create($data);
        return back();
    }
}
