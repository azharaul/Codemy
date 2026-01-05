@extends('layout.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola Kursus</h1>
        <a href="{{ route('courses.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Kursus
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            @if($courses->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-graduation-cap fa-3x text-muted mb-3 opacity-50"></i>
                    <h5 class="fw-bold text-muted">Belum ada kursus</h5>
                    <p class="text-muted mb-4">Mulai bagikan pengetahuan dengan membuat kursus pertama.</p>
                    <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm rounded-pill px-4">
                        <i class="fas fa-plus me-1"></i> Buat Kursus Baru
                    </a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 py-3 ps-4" width="5%">#</th>
                                <th class="border-0 py-3" width="35%">KURSUS & DESKRIPSI</th>
                                <th class="border-0 py-3" width="20%">PENGAJAR</th>
                                <th class="border-0 py-3" width="15%">KATEGORI</th>
                                <th class="border-0 py-3" width="10%">STATUS</th>
                                <th class="border-0 py-3 pe-4 text-end" width="15%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($courses as $key => $course)
                                <tr>
                                    <td class="ps-4 fw-bold text-muted">{{ $key + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @if($course->thumbnail)
                                                <img src="{{ $course->thumbnail }}" alt="" class="rounded me-3 border" width="60"
                                                    height="40" style="object-fit: cover;">
                                            @else
                                                <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center text-muted border"
                                                    style="width: 60px; height: 40px;">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            @endif
                                            <div>
                                                <h6 class="mb-0 fw-bold text-dark">{{ $course->name }}</h6>
                                                <small class="text-muted">{{ Str::limit($course->about, 50) }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-info bg-opacity-10 text-info rounded-circle d-flex align-items-center justify-content-center me-2"
                                                style="width: 32px; height: 32px;">
                                                <i class="fas fa-user-tie fa-xs"></i>
                                            </div>
                                            <span class="small fw-semibold">{{ $course->teacher->name ?? 'Tanpa Guru' }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-light text-dark border fw-normal px-2 py-1">
                                            {{ $course->category->name ?? 'Uncategorized' }}
                                        </span>
                                    </td>
                                    <td>
                                        <span class="badge bg-success bg-opacity-10 text-success px-2 py-1">Active</span>
                                    </td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group">
                                            <a href="{{ route('courses.show', $course->id) }}"
                                                class="btn btn-sm btn-light text-primary shadow-sm me-1"
                                                title="Lihat Detail & Materi">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('courses.edit', $course->id) }}"
                                                class="btn btn-sm btn-light text-warning shadow-sm me-1" title="Edit Kursus">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus kursus ini beserta seluruh materinya?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-light text-danger shadow-sm"
                                                    title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection