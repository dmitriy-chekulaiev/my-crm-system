<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Profile;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{


    public function index()
    {
        $projects = Auth::user()->projects;
        return view('projects.index', compact('projects'));
    }



    public function create()
    {
        $clients = Auth::user()->clients;
        return view('projects.create', compact('clients'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'client' => 'nullable|integer',
            'description' => 'nullable|string',
            'estimation' => 'nullable|integer',
        ]);
        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'client_id' => $request->client,
            'user_id' => auth()->user()->id,
            'estimation' => $request->estimation,
            'time_spent' => 0,
        ]);
        if ($project) {
            Session::flash('success', __('Project has been created'));
            return redirect('/projects');
        }
    }



    public function show(Project $project)
    {
        $this->authorize('view', $project);

        $users = $project->users;
        return view('projects.show', compact('project', 'users'));
    }


    public function edit(Project $project)
    {
        $this->authorize('view', $project);
        $clients = Auth::user()->clients;
        return view('projects.edit', compact('project', 'clients'));
    }


    public function update(Request $request, Project $project)
    {

        $request->validate([
            'name' => 'required|string',
            'client' => 'required|integer',
            'description' => 'nullable|string',
            'estimation' => 'nullable|integer',
            'time_spent' => 'nullable|integer',
            'status' => 'required',
        ]);

        $project->name = $request->name;
        $project->client_id = $request->client;
        $project->description = $request->description;
        $project->estimation = $request->estimation;
        $project->time_spent = $request->time_spent;
        $project->status = $request->status;

        if ($project->save()) {
            Session::flash('seccess', __('Project updated'));
            return redirect('/projects/' . $project->id);
        }
    }


    public function destroy(Project $project)
    {
        if (Project::destroy($project->id)) {
            return redirect()->back();
        }
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
