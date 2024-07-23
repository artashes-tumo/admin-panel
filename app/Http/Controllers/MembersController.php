<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\MemberCreateRequest;

class MembersController extends Controller
{
    public function index()
    {
        $members = Member::orderBy('id', 'DESC')->get();

        return view("members.index", compact("members"));  
    }

    public function create() 
    {
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
        return view("members.edit");
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
 }


