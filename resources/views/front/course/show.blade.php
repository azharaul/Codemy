@extends('layout.front')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Sidebar Materi (Kiri) -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
                <div class="card-header bg-white py-3">
                    <h5 class="fw-bold mb-0">Daftar Materi</h5>
                </div>
                <div class="list-group list-group-flush">
                    @forelse($course->lessons as $lesson)
                        <a href="?lesson={{ $lesson->id }}" class="list-group-item list-group-item-action d-flex align-items-center gap-3 py-3 {{ request('lesson') == $lesson->id ? 'bg-light fw-bold text-primary border-start border-primary border-4' : '' }}">
                            <div class="bg-primary bg-opacity-10 text-primary rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                                <i class="fas fa-play fa-sm"></i>
                            </div>
                            <div>
                                <small class="text-uppercase text-muted" style="font-size: 0.7rem;">Modul {{ $loop->iteration }}</small>
                                <div class="mb-0">{{ $lesson->name }}</div>
                            </div>
                        </a>
                    @empty
                        <div class="p-4 text-center text-muted">Belum ada materi.</div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Video Player (Kanan) -->
        <div class="col-lg-8">
            <div class="card shadow rounded-4 overflow-hidden mb-4">
                <!-- Logic untuk menampilkan video yang dipilih -->
                @php
                    $currentLessonId = request('lesson');
                    $currentLesson = $course->lessons->firstWhere('id', $currentLessonId) ?? $course->lessons->first();
                @endphp

                @if($currentLesson)
                    <div class="ratio ratio-16x9 bg-dark">
                        <!-- Disini kita pakai iframe untuk YouTube, atau video tag untuk local -->
                        <!-- Contoh support YouTube Embed -->
                        <iframe src="https://www.youtube.com/embed/{{ $currentLesson->video_id ?? 'dQw4w9WgXcQ' }}" title="YouTube video player" allowfullscreen></iframe>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <h2 class="fw-bold fs-3">{{ $currentLesson->name }}</h2>
                        </div>
                        <p class="text-muted">{{ $currentLesson->description ?? 'Tidak ada deskripsi untuk materi ini.' }}</p>
                    </div>
                @else
                    <div class="ratio ratio-16x9 bg-secondary d-flex align-items-center justify-content-center text-white">
                        <div class="text-center">
                            <i class="fas fa-video-slash fa-3x mb-3 text-white-50"></i>
                            <h4>Materi tidak ditemukan</h4>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Author Info -->
            <div class="card border-0 shadow-sm rounded-4 p-4">
                <div class="d-flex align-items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name={{ $course->teacher->name }}&background=random" class="rounded-circle" width="50" height="50">
                    <div>
                        <h6 class="fw-bold mb-0">{{ $course->teacher->name }}</h6>
                        <small class="text-muted">{{ $course->teacher->occupation ?? 'Instructor' }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection