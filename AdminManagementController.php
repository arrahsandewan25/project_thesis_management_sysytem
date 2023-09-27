<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminManagementController extends Controller
{

    public function index()
    {
        //
        $admins = User::where('user_type', 'Admin')->get();
        return view('backend.pages.admin.index', compact('admins'));
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());

        $admin = new User();
        $admin->user_type = 'Admin';
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = bcrypt($request->password);
        $admin->dob = $request->dob;
        $admin->address = $request->address;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/', $new_image_name);
            $admin->image = $new_image_name;
        }

        $admin->save();
        notify()->success('Admin Added Successfully');
        return redirect()->back();
    }

    public function show(string $id)
    {
        //
        $admin = User::find($id);
        return view('backend.pages.admin.show', compact('admin'));
    }

    public function update(Request $request, string $id)
    {

        $admin = User::find($id);
        $admin->first_name = $request->first_name;
        $admin->last_name = $request->last_name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->dob = $request->dob;
        $admin->address = $request->address;

        if ($request->hasFile('image')) {
            if ($request->old_image) {
                @unlink('uploads/' . $request->old_image);
            }
            $image = $request->file('image');
            $new_image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('uploads/', $new_image_name);
            $admin->image = $new_image_name;
        }

        $admin->save();
        notify()->success('Admin Updated Successfully');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        //
        $admin = User::find($id);

        if ($admin->image) {
            @unlink('uploads/' . $admin->image);
        }
        $admin->delete();
        notify()->success('Admin Deleted Successfully');
        return redirect()->back();
    }
}
