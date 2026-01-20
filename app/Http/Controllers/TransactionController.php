<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use App\Models\Course;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('front.checkout', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        DB::transaction(function () use ($request, $course) {
            $user = Auth::user();

            // 1. Buat Transaksi
            Transaction::create([
                'user_id' => $user->id,
                'course_id' => $course->id,
                'total_amount' => $course->price,
                'is_paid' => true,
                'proof' => null,
            ]);

            if (!$course->students()->where('user_id', $user->id)->exists()) {
                $user->courses()->attach($course->id);
            }
        });

        return redirect()->route('front.learning', $course)->with('success', 'Pembayaran berhasil! Selamat belajar.');
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
