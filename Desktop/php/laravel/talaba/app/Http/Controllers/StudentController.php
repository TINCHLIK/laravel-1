<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Student;
use App\Models\Profession;
use App\Models\StudentTag;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;
use App\Http\Requests\SaveStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students=Student::paginate(20);
        // dd($students);
        return view('students.index', ['students'=>$students]);

        // $tag=Tag::find(1);
        // dd($tag->students);

        // $student=Student::find(2);
        // dd($student->tags);

        // $profession=Profession::find(1);
        // dd($profession->students);

        // $student=Student::find(1);
        // dd($student->profession);

        // $profession=Profession::find(1);
        // $students=Student::where('profession_id', $profession->id)->get();
        // dd($students->);

        // $students= Student::orderByDesc('created_at')->paginate(20);
        // return view('students.index',[
        //     'students' => $students
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $professions=Profession::all();
        $student = new Student();
        $tags=Tag::all();

        return view('students.create',[
            'student'=>$student,
            'professions'=>$professions,
            'tags'=>$tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'ism'=>'required|string',
            'fam'=>'required|string',
            'yosh'=>'required',
            'jins'=>'required',
            'profession_id'=>'',
            'tags'=>'',
            // 'phone'=>['required', 'numeric', new PhoneNumber]
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $student = Student::create($data);

        $student->tags()->attach($tags);
        // foreach ($tags as $tag) {
        //     StudentTag::firstOrCreate([
        //         'tag_id'=>$tag,
        //         'student_id'=>$student->id,
        //     ]);
        // }
        return redirect()->route('student.index');

        // $student = new Student;
        // $student->ism = $data['ism'];
        // $student->fam = $data['fam'];
        // $student->yosh = $data['yosh'];
        // $student->jins = $data['jins'];
        // // $student->phone = $data['phone'];
        // $student->save();
        // return redirect()->route('student.index');

        // Student::create($this->validatedData());
        // return redirect()->route('student.index');
    }

        // public function store(SaveStudentRequest $request)
        // {
        //     Student::create($request->validated());

        //     return redirect()->route('student.index');
        // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        // $student = Student::findOrFail($id);
        return view('students.show', [
            'student' => $student,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $professions=Profession::all();
        $tags = Tag::all();

        return view('students.edit',[
            'student'=>$student,
            'professions'=>$professions,
            'tags'=>$tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $data = $request->validate([
            'ism'=>'required',
            'fam'=>'required',
            'yosh'=>'required',
            'jins'=>'required',
            'profession_id'=>'',
            'tags'=>'',
            // 'phone'=>['required', 'numeric', new PhoneNumber]
        ]);
        $tags = $data['tags'];
        unset($data['tags']);

        $student->update($data);
        $student->tags()->sync($tags);

        // $student->update($this->validatedData());

        return redirect()->route('student.index');
    }

        // public function update(SaveStudentRequest $request, Student $student)
        // {
        //     $student->update($request->validated());

        //     return redirect()->route('student.index');
        // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index');
    }

    // public function validatedData()
    // {
    //     return request()->validate([
    //         'ism'=>'required',
    //         'fam'=>'required',
    //         'yosh'=>'required',
    //         'jins'=>'required',
    //         // 'phone'=>['required', 'numeric', new PhoneNumber]
    //     ]);
    // }
}
