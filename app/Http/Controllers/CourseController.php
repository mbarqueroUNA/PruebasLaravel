<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

//Solo prueba
use Illuminate\Support\Facades\DB;



class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    //Corregir roles estudiantes y profesores
    /*
    
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403);
        }

        return view('courses.create');
    }


    */ 

    public function store(Request $request)
    {
        Course::create($request->all());
        return redirect()->route('courses.index');
    }


    //Solo prueba
    
public function vulnerableSearch(Request $request)
{
    $name = $request->input('name');

    // ❌ SQL INSEGURO A PROPÓSITO
    return DB::select(
        "SELECT * FROM courses WHERE name = '$name'"
        //"SELECT * FROM courses WHERE name = ?",[$name]

    );
    
}




    
}