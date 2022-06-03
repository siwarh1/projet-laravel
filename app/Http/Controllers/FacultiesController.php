<?php

namespace App\Http\Controllers;

use App\University;
use App\Faculty;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests;

class FacultiesController extends Controller
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
        $universities = University::paginate();

        $faculties = Faculty::orderBy('created_at', 'desc')->get();
        return view('faculty.index')->withFaculties($faculties)->withUniversities($universities);
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
            'university_id' => 'required'
        ));

        $faculty = new Faculty();
        $faculty->name = $request->name;
        $faculty->university_id = $request->university_id;

        if ($faculty->save()) {
            Session::flash('success', 'Faculty was successfully saved.');
        }
        return redirect()->route('faculty.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $universities = University::all();

        $faculty = Faculty::find($id);
        return view('faculty.edit')->withFaculty($faculty)->withUniversities($universities);
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
            'university_id' => 'required'
        ));

        $faculty = Faculty::find($id);
        $faculty->name = $request->name;
        $faculty->university_id = $request->university_id;

        if ($faculty->save()) {
            Session::flash('success', 'Faculty was successfully saved.');
        }
        return redirect()->route('faculty.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::find($id);
        if ($faculty->delete()) {
            Session::flash('success', 'Faculty was successfully deleted.');
        }
        return redirect()->route('faculty.index');
    }
}
