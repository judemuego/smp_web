<?php

namespace App\Http\Controllers;

use App\Faqs;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Faqs::orderBy('id', 'desc')->get();
        return view('backend.pages.website.faqs', compact('questions'));
    }

    public function index_i()
    {
      return Faqs::get();
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
        $faq = $request->validate([
            'question' => ['required', 'max:250'],
            'answer' => ['required'],
        ]);

        Faqs::create($request->all());

        return redirect()->back()->with('success','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function show(Faqs $faqs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $questions = Faqs::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('questions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Faqs::find($id)->update($request->all());
        return redirect()->back()->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faq_destroy = Faqs::find($id);
        $faq_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
