<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Enums\UserRoles;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Spatie\Permission\Models\Permission;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = User::role('Agent')->get();
        return view('admin.agents', [ 'agents' => $agents ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $validated = $request->validated();

        $validated['slug'] = Str::slug($validated['name']);

        User::create($validated)->assignRole(UserRoles::AGENT->value);

        return back()->with('message', 'New agent added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $agent)
    {
        return view('admin.agent-show', [ 'agent' => $agent]);
    }

    public function givePermission(Request $request, User $agent)
    {
       $validated = $request->validate(['permission' => 'required']);
       if($agent->hasPermissionTo($request->permission))
       {
            return back()->with('status', 'Permission already exist!');
       }
       $agent->givePermissionTo($validated);
       return back()->with('message', 'New permission given!');
    }

    public function destroyPermission(User $agent, Permission $permission)
    {
        $agent->revokePermissionTo($permission);
        return back()->with('status', 'Permission deleted!');
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
