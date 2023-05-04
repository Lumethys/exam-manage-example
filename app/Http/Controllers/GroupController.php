<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateGroupRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $group = Group::where('managing_user_id', Auth::id())->firstOrFail();
        $group->load('members');

        return view('users.group', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGroupRequest $request, string $id)
    {
        Group::find($id)->update($request->validated());

        return redirect()->back();
    }
}
