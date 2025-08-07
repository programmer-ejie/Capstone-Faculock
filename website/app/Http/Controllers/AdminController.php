<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Schedule; 

class AdminController extends Controller
{
    public function liveCamera()
    {
        $files = Storage::disk('public')->files('user_pictures');
        $latestFile = collect($files)
            ->filter(fn($file) => Str::endsWith($file, '.jpg'))
            ->sortByDesc(fn($file) => Storage::disk('public')->lastModified($file))
            ->first();

        $latestUrl = $latestFile ? Storage::url($latestFile) : null;

        return view('admin.livecamera', ['latestImageUrl' => $latestUrl]);
    }

    public function getLatestUserImage()
    {
        $files = \Storage::disk('public')->files('user_pictures');
        $latestFile = collect($files)
            ->filter(fn($file) => \Str::endsWith($file, '.jpg'))
            ->sortByDesc(fn($file) => \Storage::disk('public')->lastModified($file))
            ->first();

        $latestUrl = $latestFile ? \Storage::url($latestFile) : null;
        return response()->json(['url' => $latestUrl]);
    }

    function manageSchedules(){
            $schedules = Schedule::paginate(5);
            return view('admin.schedules', compact('schedules'));
    }

    public function storeSchedule(Request $request)
    {
        $validated = $request->validate([
            'course_code' => 'required|string',
            'course_number' => 'required|string',
            'units' => 'required|integer',
            'faculty_teacher' => 'required|string',
            'subject_name' => 'required|string',
            'size' => 'required|integer',
            'schedule' => 'required|string',
            'department' => 'required|string',
            'college' => 'required|string',
        ]);

        Schedule::create($validated);

        return redirect()->route('admin.schedules')->with('success', 'Schedule added successfully!');
    }

    public function updateSchedule(Request $request, $id)
    {
        $validated = $request->validate([
            'course_code' => 'required|string',
            'course_number' => 'required|string',
            'units' => 'required|integer',
            'faculty_teacher' => 'required|string',
            'subject_name' => 'required|string',
            'size' => 'required|integer',
            'schedule' => 'required|string',
            'department' => 'required|string',
            'college' => 'required|string',
        ]);

        $schedule = Schedule::findOrFail($id);
        $schedule->update($validated);

        return redirect()->route('admin.schedules')->with('success', 'Schedule updated successfully!');
    }

    public function deleteSchedule($id)
    {
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();

        return redirect()->route('admin.schedules')->with('success', 'Schedule deleted successfully!');
    }



}
