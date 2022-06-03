<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class Homecontroller extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $student=Student::paginate();
        $data=[ 'title' => 'etudiant',
                'description' => 'Liste des etudiant',
                'heading' => config('app.name'),
                'student' => $student
        ];
    return view('Home.index',$data);
    }
}
