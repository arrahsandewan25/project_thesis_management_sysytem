<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class StudentManagementController extends Controller
{
    public function index()
    {
        //
        $students = User::where('user_type', 'Student')->get();
        return view('backend.pages.student.index', compact('students'));
    }

    public function store(Request $request)
    {
        //
        $student = new User();
        $student->user_type = 'Student';
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->password = bcrypt($request->password);
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->dob = $request->dob;
        $student->department = $request->department;
        $student->roll_no = $request->roll_no;
        $student->registration_no = $request->registration_no;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/'), $image_name);
            $student->image = $image_name;
        }

        $student->save();

        notify()->success('Student Added Successfully');
        return redirect()->back();
    }

    public function show(string $id)
    {
        //
        $student = User::find($id);
        return view('backend.pages.student.show', compact('student'));
    }

    public function update(Request $request, string $id)
    {
        //
        $student = User::find($id);
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        $student->dob = $request->dob;
        $student->department = $request->department;
        $student->roll_no = $request->roll_no;
        $student->registration_no = $request->registration_no;

        if ($request->hasFile('image')) {
            if ($student->image) {
                @unlink(public_path('uploads/' . $student->image));
            }
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/'), $image_name);
            $student->image = $image_name;
        }

        $student->save();

        notify()->success('Student Updated Successfully');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        //
        $student = User::find($id);
        if ($student->image) {
            @unlink(public_path('uploads/' . $student->image));
        }
        $student->delete();

        notify()->success('Student Deleted Successfully');
        return redirect()->back();
    }
}
