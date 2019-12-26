<?php

namespace App\Http\Controllers;

use App\Group;
use App\Student;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    } 

    public function index()
    {
        return view('groups/index', [
            'groups' => Group::all()->sortBy("number")
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups/create', [
            'students'=>Student::all()->sortBy('name')
        ]);
    }

    public function validateData($data) {
        return $this->validate($data, [
            'number' => 'required|min:3|max:30',
            'speciality' => ['required','max:100'],
            'student_id' => ['required',Rule::exists('students', 'id')]
        ], [
            'speciality.required' => 'Спеціальність має бути заповнено!',
            'speciality.max' => 'Довжина не має перевищувати 100 символів!',
            'number.required' => 'Номер групи не може бути порожнім!',
            'number.min' => 'Номер групи має бути не менше 3 символів!',
            'number.max' => 'Номер групи має бути не більше 30 символів!',
            'student_id.required' => 'Оберіть студента',
            'student_id.exists' => 'Ви обрали неіснуючого студента'
        ]);
    }


    public function store(Request $request)
    {
        if (Auth::user() && Auth::user()->can('update', Group::class)) {
            $data = $this->validateData($request);
            \App\Group::create($data);
            return redirect('/groups');
        }    
    }


    public function show(\App\Group $group)
    {
        if (Auth::user() && Auth::user()->can('update', Group::class)) {
            return view('groups/show', [
                'group' => $group
            ]);
        } else {
            return redirect('groups/');
        }    
        
    }


    public function edit(Group $group)
    {
        if (Auth::user() && Auth::user()->can('update', Group::class)) {
            return view('groups/edit', [
                'group' => $group,
                'students'=>$group->students->sortBy('name')
            ]);
        } else {
            return redirect('groups/');
        }        
    }


    public function update(Group $group)
    {
        $data = $this->validateData(\request());

        $group->number = $data['number'];
        $group->speciality = $data['speciality'];

        $student = Student::find($data['student_id']);
        $group->student()->associate($student);

        $group->save();

        return redirect('/groups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
    }
}
