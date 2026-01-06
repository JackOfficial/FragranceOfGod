<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $volunteers = Volunteer::latest()->paginate(15);
        return view('admin.volunteers.index', compact('volunteers'));
    }

    /**
     * Show the form for creating a new resource.
     * (Optional – usually volunteers are submitted from frontend)
     */
    public function create()
    {
        return view('admin.volunteers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'required|string|max:30',
            'opportunity' => 'required|string|max:255',
            'message'     => 'nullable|string',
            'status'      => 'required|in:pending,approved,rejected',
        ]);

        Volunteer::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'opportunity' => $request->opportunity,
            'message'     => $request->message,
            'status'      => $request->status,
        ]);

        return redirect()
            ->route('admin.volunteers.index')
            ->with('success', 'Volunteer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        return view('admin.volunteers.show', compact('volunteer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        return view('admin.volunteers.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $volunteer = Volunteer::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'required|string|max:30',
            'opportunity' => 'required|string|max:255',
            'message'     => 'nullable|string',
            'status'      => 'required|in:pending,approved,rejected',
        ]);

        $volunteer->update([
            'name'        => $request->name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'opportunity' => $request->opportunity,
            'message'     => $request->message,
            'status'      => $request->status,
        ]);

        return redirect()
            ->route('admin.volunteers.index')
            ->with('success', 'Volunteer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $volunteer = Volunteer::findOrFail($id);
        $volunteer->delete();

        return back()->with('success', 'Volunteer deleted successfully.');
    }
}
