<?php

namespace App\Http\Controllers;

use App\Group;
use App\Student;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    private $group;
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->group = Group::find($request->route('grpid'));
        view()->share(
            'group_filter_id', $request->route('grpid')
        );
    }

    public function index($grp) {
        if ($this->group) {           
            $students = $this->group->students->sortBy("name");
        } else {
            $students = \App\Student::all()->sortBy("name");
        }      

        return view('students/index', [
            'students' => $students,
            'pageTitle' => 'Студенти',
            'groups' => Group::all()->sortBy('name'),    
        ]);
    }

    public function create($grp) {
        return view('students/create', [
            'groups' => Group::all()->sortBy('number')
        ]);
    }

    public function store($grp) {
        $data = $this->validateData(request());
        \App\Student::create([
            'name' => $data['stud-name'],
            'group_id' => $data['stud-group'],
        ]);
        return redirect('/group/'.$grp.'/students');
    }

    public function edit($grp, \App\Student $student) {
        return view('students/edit', [
            'student' => $student,
            'groups' => Group::all()->sortBy('number')
        ]);
    }

    public function update($grp, \App\Student $student) {
        $data = $this->validateData(\request());

        $student->name = $data['stud-name'];
        $student->group()->associate(Group::find($data['stud-group']));
        $student->save();

        return redirect('/group/'.$grp.'/students');
    }

    public function validateData($data) {
        return $this->validate($data, [
            'stud-name' => ['required','min:1','max:100'],
            'stud-group' => ['required', Rule::exists('groups', 'id')],
        ], [
            'stud-name.required' => 'Прізвище студента має бути заповнено!',
            'stud-name.max' => 'Довжина не має перевищувати 100 символів!',
            'stud-group.required' => 'Номер групи не може бути порожнім!',
            'stud-group.exists' => 'Ви обрали неіснуючу групу!'
        ]);
    }

    public function destroy($grp, \App\Student $student) {
        $student->delete();
    }

    public function show($grp, \App\Student $student) {
        return view('/students/show', [
            'student' => $student
        ]);
    }

    public function getList() {
        return \App\Student::all();
    }
}
