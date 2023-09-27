<?php

namespace App\Http\Controllers;

use App\Models\ProjectTopic;
use Illuminate\Http\Request;

class ProjectTopicController extends Controller
{
    public function index()
    {
        //
        $projectTopics = ProjectTopic::all();
        return view('backend.pages.project-topic', compact('projectTopics'));
    }

    public function store(Request $request)
    {
        //
        $projectTopic = new ProjectTopic();
        $projectTopic->name = $request->name;
        $projectTopic->description = $request->description;
        $projectTopic->save();

        notify()->success('Project Topic created successfully!');
        return redirect()->back();
    }

    public function update(Request $request, string $id)
    {
        //
        $projectTopic = ProjectTopic::find($id);
        $projectTopic->name = $request->name;
        $projectTopic->description = $request->description;
        $projectTopic->save();

        notify()->success('Project Topic updated successfully!');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        //
        $projectTopic = ProjectTopic::find($id);
        $projectTopic->delete();

        notify()->success('Project Topic deleted successfully!');
        return redirect()->back();
    }
}
