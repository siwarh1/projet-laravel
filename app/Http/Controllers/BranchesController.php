<?php

namespace App\Http\Controllers;

use App\Faculty;
use App\Branch;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests;

class BranchesController extends Controller
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
        $faculties = Faculty::paginate();

        $branches = Branch::orderBy('created_at', 'desc')->get();
        return view('branch.index')->withBranches($branches)->withFaculties($faculties);
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
            'faculty_id' => 'required'
        ));

        $branch = new Branch();
        $branch->name = $request->name;
        $branch->faculty_id = $request->faculty_id;

        if ($branch->save()) {
            Session::flash('success', 'Branch was successfully saved.');
        }
        return redirect()->route('branch.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faculties = Faculty::all();

        $branch = Branch::find($id);
        return view('branch.edit')->withBranch($branch)->withFaculties($faculties);
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
            'faculty_id' => 'required'
        ));

        $branch = Branch::find($id);
        $branch->name = $request->name;
        $branch->faculty_id = $request->faculty_id;

        if ($branch->save()) {
            Session::flash('success', 'Branch was successfully saved.');
        }
        return redirect()->route('branch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::find($id);
        if ($branch->delete()) {
            Session::flash('success', 'Branch was successfully deleted.');
        }
        return redirect()->route('branch.index');
    }
}
