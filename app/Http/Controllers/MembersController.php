<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\MemberCreateRequest;
use Auth;

class MembersController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('id', 'DESC')->get();

        return view("members.index", compact("members"));
    }

    public function create()
    {
        if (Auth::user()->role == 'writer') {
            return redirect()->route('member_index');
        }
        return view("members.create");
    }

    public function store(MemberCreateRequest $request)
    {
        $data = $request->validated();
        $data['joined_at'] = Carbon::parse($data['joined_at']);
        Member::create($data);

        return redirect()->route('member_index');
    }

    public function edit($id)
    {
        if (Auth::user()->role == 'writer') {
            return redirect()->route('member_index');
        }
        $member = Member::findOrFail($id);

        return view("members.edit", compact("member"));
    }

    public function update(MemberCreateRequest $request, $id)
    {
        $data = $request->validated();
        $data['joined_at'] = Carbon::parse($data['joined_at']);
        Member::findOrFail($id)->update($data);

        return redirect()->route('member_index');
    }

    public function destroy($id)
    {
        Member::findOrFail($id)->delete();

        return redirect()->route('member_index');
    }
}


