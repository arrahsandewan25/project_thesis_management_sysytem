<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeacherManagementController extends Controller
{
    public function index()
    {
        //
        $teachers = User::where('user_type', 'Teacher')->get();
        return view('backend.pages.teacher.index', compact('teachers'));
    }

    public function store(Request $request)
    {
        //
        // return response()->json($request->all());
        $project_topic_id = json_encode($request->project_topic);
        // remove the double quotes
        $project_topic_id = str_replace('"', '', $project_topic_id);

        $teacher = new User();
        $teacher->user_type = 'Teacher';
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->email = $request->email;
        $teacher->password = bcrypt($request->password);
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->project_topic_id = $project_topic_id;
        $teacher->department = $request->department;
        $teacher->designation = $request->designation;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/'), $image_name);
            $teacher->image = $image_name;
        }

        $teacher->save();

        notify()->success('Teacher Added Successfully');
        return redirect()->back();
    }

    public function show(string $id)
    {
        //
        $teacher = User::find($id);
        return view('backend.pages.teacher.show', compact('teacher'));
    }

    public function update(Request $request, string $id)
    {
        //
        $project_topic_id = json_encode($request->project_topic);
        // remove the double quotes
        $project_topic_id = str_replace('"', '', $project_topic_id);

        $teacher = User::find($id);
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->email = $request->email;
        $teacher->phone = $request->phone;
        $teacher->department = $request->department;
        $teacher->designation = $request->designation;
        $teacher->project_topic_id = $project_topic_id;
        $teacher->address = $request->address;

        if ($request->hasFile('image')) {
            if ($request->old_image) {
                @unlink('uploads/' . $request->old_image);
            }
            $image = $request->file('image');
            $new_image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/', $new_image_name);
            $teacher->image = $new_image_name;
        }

        $teacher->save();
        notify()->success('Teacher Updated Successfully');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        //
        $teacher = User::find($id);
        if ($teacher->image) {
            @unlink('uploads/' . $teacher->image);
        }
        $teacher->delete();
        notify()->success('Teacher Deleted Successfully');
        return redirect()->back();
    }
}
