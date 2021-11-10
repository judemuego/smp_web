<?php

namespace App\Http\Controllers;

use App\ProjectCategories;
use Illuminate\Http\Request;

class ProjectCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectcategories = ProjectCategories::orderBy('id', 'desc')->get();
        return view('backend.pages.website.projectcategories', compact('projectcategories'));
    }

    public function index_i()
    {
      return ProjectCategories::get();
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
        $projectcategory = $request->validate([
            'name' => ['required', 'max:250'],
            'description' => ['required', 'max:250'],
        ]);

        ProjectCategories::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectCategories  $projectCategories
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectCategories $projectCategories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectCategories  $projectCategories
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projectcategories = ProjectCategories::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('projectcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectCategories  $projectCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ProjectCategories::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectCategories  $projectCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projectcategory_destroy = ProjectCategories::find($id);
        $projectcategory_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
