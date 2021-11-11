<?php

namespace App\Http\Controllers;

use App\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sales::orderBy('id')->get();
        return view('backend.pages.website.sales', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_i()
    {
      return Sales::get();
    }

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
        $sales = $request->validate([
            'name' => ['required', 'max:250'],
            'position' => ['required'],
            'contact_no' => ['required','max:250'],
            'facebook_url' => ['required','max:250'],
            'twitter_url' => ['required','max:250'],
            'instagram_url' => ['required','max:250'],
            'email' => ['required','max:250'],
            'picture' => ['required']
        ]);

        $file = $request->picture->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);

        $imageName = $filename.time().'.'.$request->picture->extension();  
        $picture = $request->picture->move(public_path('images/salesteam'), $imageName);

        $requestData = $request->all();
        $requestData['picture'] = $imageName;
        
        Sales::create($requestData);

        return redirect()->back()->with('success','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sales = Sales::where('id', $id)->orderBy('id')->firstOrFail();
        return response()->json(compact('sales'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sales = $request->validate([
            'name' => ['required', 'max:250'],
            'position' => ['required'],
            'contact_no' => ['required','max:250'],
            'facebook_url' => ['required','max:250'],
            'twitter_url' => ['required','max:250'],
            'instagram_url' => ['required','max:250'],
            'email' => ['required','max:250'],
            'picture' => ['required']
        ]);

        if($request->picture == null) {
            Sales::find($id)->update($request->all());
        } else {
            $file = $request->picture->getClientOriginalName();
            $filename = pathinfo($file, PATHINFO_FILENAME);
    
            $imageName = $filename.time().'.'.$request->picture->extension();  
            $picture = $request->picture->move(public_path('images/salesteam'), $imageName);
    
            $requestData = $request->all();
            $requestData['picture'] = $imageName;
            
            Sales::find($id)->update($requestData);
        }
        return redirect()->back()->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sales_destroy = Sales::find($id);
        $sales_destroy->delete();
        return redirect()->back()->with('success','Successfully Deleted!');
    }
}
