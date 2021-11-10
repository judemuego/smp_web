<?php

namespace App\Http\Controllers;

use App\Projects;
use App\ProjectCategories;
use Illuminate\Http\Request;
use Auth;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::orderBy('id')->get();
        $projectcategories = ProjectCategories::orderBy('id')->get();
        return view('backend.pages.website.projects', compact('projects','projectcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = $request->validate([
            'project_name' => ['required', 'max:250'],
            'description' => ['required'],
            'location' => ['max:250'],
            'client' => ['max:250'],
            'design_architect' => ['max:250'],
            'scope' => ['max:250'],
            'completed_date' => ['max:250'],
            'size' => ['max:250'],
            'category' => ['max:250']

        ]);

        Projects::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function show(Projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects = Projects::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Projects::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project_destroy = Projects::find($id);
        $project_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
