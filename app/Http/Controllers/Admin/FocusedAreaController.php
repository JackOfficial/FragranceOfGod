<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FocusedArea;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FocusedAreaController extends Controller
{
    public function index()
    {
        $focusAreas = FocusedArea::latest()->paginate(15);
        return view('admin.focused-areas.index', compact('focusAreas'));
    }

    public function create()
    {
        return view('admin.focused-areas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'required|string|max:255',
            'description'  => 'nullable|string',
            'icon'         => 'nullable|string|max:255',
            'is_published' => 'boolean',
        ]);

        $data['slug'] = Str::slug($data['title']);

        FocusedArea::create($data);

        return redirect()
            ->route('admin.focused-areas.index')
            ->with('success', 'Focused Area created successfully.');
    }

public function edit($id)
{
    $focusedArea = FocusedArea::findOrFail($id);
    return view('admin.focused-areas.edit', compact('focusedArea'));
}

    public function update(Request $request, FocusedArea $focusedArea)
    {
        $data = $request->validate([
            'title'        => 'required|string|max:255',
            'excerpt'      => 'required|string|max:255',
            'description'  => 'nullable|string',
            'icon'         => 'nullable|string|max:255',
            'is_published' => 'boolean',
        ]);

        if ($focusedArea->title !== $data['title']) {
            $data['slug'] = Str::slug($data['title']);
        }

        $focusedArea->update($data);

        return redirect()
            ->route('admin.focused-areas.index')
            ->with('success', 'Focused Area updated successfully.');
    }

    public function destroy(FocusedArea $focusedArea)
    {
        $focusedArea->delete();

        return redirect()
            ->route('admin.focused-areas.index')
            ->with('success', 'Focused Area deleted.');
    }
}
