<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests;

class UniversitiesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::orderBy('created_at', 'desc')->get();
        return view('university.index')->withUniversities($universities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'description' => 'max:500',
        ));

        $university = new University();
        $university->name = $request->name;
        $university->description = $request->description;

        if ($university->save()) {
            Session::flash('success', 'University was successfully saved.');
        }
        return redirect()->route('university.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $university = University::find($id);
        return view('university.edit')->withUniversity($university);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required|max:255',
            'description' => 'max:500',
        ));

        $university = University::find($id);
        $university->name = $request->name;
        $university->description = $request->description;

        if ($university->save()) {
            Session::flash('success', 'University was successfully saved.');
        }
        return redirect()->route('university.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $university = University::find($id);
        if ($university->delete()) {
            Session::flash('success', 'University was successfully deleted.');
        }
        return redirect()->route('university.index');
    }
}
