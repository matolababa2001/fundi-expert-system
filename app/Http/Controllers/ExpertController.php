<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\Skill;
use Illuminate\Support\Facades\Storage;

class ExpertController extends Controller
{
    // List all experts
    public function index()
    {
        $experts = Expert::with('skills')->latest()->paginate(10);
        return view('admin.experts.index', compact('experts'));
    }

    // Show form to create a new expert
    public function create()
    {
        $skills = Skill::all();
        return view('admin.experts.create', compact('skills'));
    }

    // Store new expert data
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'certificate' => 'nullable|mimes:pdf|max:4096',
            'skills'      => 'nullable|array',
        ]);

        $expert = new Expert($request->only('name', 'location'));

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $expert->photo = $request->file('photo')->store('experts/photos', 'public');
        }

        // Handle certificate upload
        if ($request->hasFile('certificate')) {
            $expert->certificate = $request->file('certificate')->store('experts/certificates', 'public');
        }

        $expert->save();

        // Attach skills
        $expert->skills()->attach($request->skills);

        return redirect()->route('experts.index')->with('success', 'Expert created successfully.');
    }

    // Show form to edit expert
    public function edit($id)
    {
        $expert = Expert::with('skills')->findOrFail($id);
        $skills = Skill::all();
        return view('admin.experts.edit', compact('expert', 'skills'));
    }

    // Update expert data
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'location'    => 'required|string|max:255',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'certificate' => 'nullable|mimes:pdf|max:4096',
            'skills'      => 'nullable|array',
        ]);

        $expert = Expert::findOrFail($id);

        $expert->name     = $request->name;
        $expert->location = $request->location;

        // Handle photo replacement
        if ($request->hasFile('photo')) {
            if ($expert->photo) {
                Storage::disk('public')->delete($expert->photo);
            }
            $expert->photo = $request->file('photo')->store('experts/photos', 'public');
        }

        // Handle certificate replacement
        if ($request->hasFile('certificate')) {
            if ($expert->certificate) {
                Storage::disk('public')->delete($expert->certificate);
            }
            $expert->certificate = $request->file('certificate')->store('experts/certificates', 'public');
        }

        $expert->save();

        // Sync skills
        $expert->skills()->sync($request->skills);

        return redirect()->route('experts.index')->with('success', 'Expert updated successfully.');
    }

    // Delete expert
    public function destroy($id)
    {
        $expert = Expert::findOrFail($id);

        // Delete media files
        if ($expert->photo) {
            Storage::disk('public')->delete($expert->photo);
        }

        if ($expert->certificate) {
            Storage::disk('public')->delete($expert->certificate);
        }

        // Detach skills and delete expert
        $expert->skills()->detach();
        $expert->delete();

        return redirect()->route('experts.index')->with('success', 'Expert deleted successfully.');
    }
}
