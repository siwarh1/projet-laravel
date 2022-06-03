<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Student;
use App\Branch;
use Session;

class StudentsController extends Controller
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
        $branches = Branch::paginate();

        $students = Student::orderBy('created_at', 'desc')->get();
        return view('student.index')->withStudents($students)->withBranches($branches);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        return view('student.create');
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
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'birthday' => 'date',
            'branch_id' => 'required'
        ));

        $student = new Student();
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->birthday = date('Y-m-d', strtotime(str_replace('-', '/', $request->birthday)));
        $student->branch_id = $request->branch_id;



        if ($student->save()) {
            Session::flash('success', 'Student was successfully saved.');
        }
        return redirect()->route('student.index');
    }
     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('student.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branches = Branch::all();

        $student = Student::find($id);
        return view('student.edit')->withStudent($student)->withBranches($branches);
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
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'birthday' => 'date',
            'branch_id' => 'required'
        ));

        $student = Student::find($id);
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->birthday = date('Y-m-d', strtotime(str_replace('-', '/', $request->birthday)));
        $student->branch_id = $request->branch_id;

        if ($student->save()) {
            Session::flash('success', 'Student was successfully saved.');
        }
        return redirect()->route('student.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        if ($student->delete()) {
            Session::flash('success', 'Student was successfully deleted.');
        }
        return redirect()->route('student.index');
    }
}
