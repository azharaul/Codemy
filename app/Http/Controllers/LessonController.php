<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;


class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courseId = request()->query('course_id');
        $course = Course::findOrFail($courseId);
        return view('admin.lessons.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'video_url' => 'required|url',
            'course_id' => 'required',
        ]);
        Lesson::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'video_url' => $request->video_url,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('courses.show', $request->course_id)->with('success', 'Materi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('admin.lessons.edit', compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $lesson = Lesson::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'video_url' => 'required|url',
        ]);

        $lesson->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'video_url' => $request->video_url,
        ]);

        return redirect()->route('courses.show', $lesson->course_id)->with('success', 'Materi berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lesson = Lesson::findOrFail($id);

        $courseId = $lesson->course_id;

        $lesson->delete();

        return redirect()->route('courses.show', $courseId)->with('success', 'Materi berhasil dihapus.');
    }
}
