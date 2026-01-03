<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Course;

class LessonController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courseId = request()->query('course_id');
        $course = $courseId ? Course::find($courseId) : null;
        return view('admin.lessons.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'video_url' => 'nullable|url|max:1000',
            'course_id' => 'required|exists:courses,id',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = \Str::slug($data['name']);
        }

        Lesson::create($data);

        return redirect()->route('courses.show', $data['course_id'])->with('success', 'Materi berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('admin.lessons.show', compact('lesson'));
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

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'video_url' => 'nullable|url|max:1000',
        ]);

        $lesson->update($data);

        return redirect()->route('courses.show', $lesson->course_id)->with('success', 'Materi berhasil diupdate.');
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
