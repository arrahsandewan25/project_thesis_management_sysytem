<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamManagementController extends Controller
{
    public function index()
    {
        $teams = Team::with('member1', 'member2')->get();
        $students = User::with('team_member1', 'team_member2')->where('user_type', 'Student')->get();
        if (auth()->user()->user_type != 'Student') {
            $teams = Team::with('member1', 'member2')->where('status', 1)->get();
        }
        // return response()->json($students);
        return view('backend.pages.team.index', compact('teams', 'students'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $team = new Team();
        $team->name = $request->name;
        $team->member_1 = auth()->user()->id;
        $team->member_2 = $request->member2;
        $team->save();


        notify()->success('Team Created Successfully');
        return redirect()->back();
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    public function request()
    {
        $teams = Team::where('member_2', auth()->user()->id)
            ->where('status', 0)
            ->get();
        return view('backend.pages.team.request', compact('teams'));
    }

    public function requestAccept(string $id)
    {
        $team = Team::find($id);
        $team->status = 1;
        $team->save();

        //update user table
        $user = User::find(auth()->user()->id);
        $user->is_member = 1;
        $user->save();

        //update other user table
        $user = User::find($team->member_1);
        $user->is_member = 1;
        $user->save();

        //delete all other request
        $teams = Team::where('member_2', auth()->user()->id)->where('id', '!=', $id)->get();
        foreach ($teams as $team) {
            $team->delete();
        }

        notify()->success('Team Request Accepted Successfully');
        return redirect('team-management');
    }

    public function requestReject(string $id)
    {
        $team = Team::find($id);
        $team->delete();

        notify()->success('Team Request Rejected Successfully');
        return redirect('team-management');
    }
}
