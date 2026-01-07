<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrganizationInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = OrganizationInfo::latest()->paginate(10);
        return view('admin.organizations.index', compact('organizations'));
    }

    public function create()
    {
        return view('admin.organizations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'             => 'required|string|max:255',
            'slogan'           => 'nullable|string|max:255',
            'about'            => 'nullable|string',
            'mission'          => 'nullable|string',
            'vision'           => 'nullable|string',
            'values'           => 'nullable|string',
            'objectives'       => 'nullable|string',
            'email'            => 'nullable|email',
            'phone'            => 'nullable|string',
            'physical_address' => 'nullable|string',
            'social_media'     => 'nullable|array',
            'logo'             => 'nullable|image|max:2048',
            'documents.*'      => 'nullable|file|max:5120',
        ]);

        $organization = OrganizationInfo::create($data);

        /* ================= LOGO ================= */
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')
                ->store('organizations/logos', 'public');

            $organization->media()->create([
                'file_path' => $path,
                'file_type' => 'image',
                'mime_type' => $request->file('logo')->getMimeType(),
                'title'     => 'Organization Logo',
            ]);
        }

        /* ================= DOCUMENTS ================= */
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('organizations/documents', 'public');

                $organization->media()->create([
                    'file_path' => $path,
                    'file_type' => 'document',
                    'mime_type' => $file->getMimeType(),
                    'title'     => $file->getClientOriginalName(),
                ]);
            }
        }

        return redirect()
            ->route('admin.organization.index')
            ->with('success', 'Organization created successfully.');
    }

    public function edit(OrganizationInfo $organization)
    {
        $organization->load('media');
        return view('admin.organizations.edit', compact('organization'));
    }

    public function update(Request $request, OrganizationInfo $organization)
    {
        $data = $request->validate([
            'name'             => 'required|string|max:255',
            'slogan'           => 'nullable|string|max:255',
            'about'            => 'nullable|string',
            'mission'          => 'nullable|string',
            'vision'           => 'nullable|string',
            'values'           => 'nullable|string',
            'objectives'       => 'nullable|string',
            'email'            => 'nullable|email',
            'phone'            => 'nullable|string',
            'physical_address' => 'nullable|string',
            'social_media'     => 'nullable|array',
            'logo'             => 'nullable|image|max:2048',
            'documents.*'      => 'nullable|file|max:5120',
        ]);

        $organization->update($data);

        /* ================= UPDATE LOGO ================= */
        if ($request->hasFile('logo')) {
            foreach ($organization->logos as $logo) {
                Storage::disk('public')->delete($logo->file_path);
                $logo->delete();
            }

            $path = $request->file('logo')
                ->store('organizations/logos', 'public');

            $organization->media()->create([
                'file_path' => $path,
                'file_type' => 'image',
                'mime_type' => $request->file('logo')->getMimeType(),
                'title'     => 'Organization Logo',
            ]);
        }

        /* ================= ADD NEW DOCUMENTS ================= */
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                $path = $file->store('organizations/documents', 'public');

                $organization->media()->create([
                    'file_path' => $path,
                    'file_type' => 'document',
                    'mime_type' => $file->getMimeType(),
                    'title'     => $file->getClientOriginalName(),
                ]);
            }
        }

        return redirect()
            ->route('admin.organization.index')
            ->with('success', 'Organization updated successfully.');
    }

    public function destroy(OrganizationInfo $organization)
    {
        foreach ($organization->media as $media) {
            Storage::disk('public')->delete($media->file_path);
        }

        $organization->media()->delete();
        $organization->delete();

        return redirect()
            ->route('admin.organization.index')
            ->with('success', 'Organization deleted successfully.');
    }
}
