<?php

namespace App\Http\Controllers;

use App\Models\project;
use App\Models\task;
use Illuminate\Http\Request;

class Taskcontroller extends Controller
{
    public function store(project $project, task $task){
    $data=    request()->validate([
            'body' => 'required'
    ]);
    $data['project_id']=$project->id;
    task::create($data);
    return back();

     

    }
    public function update(project $project,task $task){
        $task->update(['done' => request()->has('done')]);
        return back();
    }

    public function destroy(project $project,task $task){

        $task->delete();
        return redirect('/projects/'. $project->id);
    }
}
