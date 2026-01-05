@extends('layout.admin')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kelola Kategori</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Kategori
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            @if($categories->isEmpty())
                <div class="text-center py-5">
                    <i class="fas fa-tags fa-3x text-muted mb-3 opacity-50"></i>
                    <h5 class="fw-bold text-muted">Belum ada kategori</h5>
                    <p class="text-muted mb-4">Silakan buat kategori baru untuk mengelompokkan kursus.</p>
                    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm rounded-pill px-4">
                        <i class="fas fa-plus me-1"></i> Buat Kategori Baru
                    </a>
                </div>
            @else
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="border-0 py-3 ps-4" width="5%">#</th>
                                <th class="border-0 py-3" width="40%">NAMA KATEGORI</th>
                                <th class="border-0 py-3" width="30%">SLUG</th>
                                <th class="border-0 py-3 pe-4 text-end" width="25%">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $key => $category)
                                <tr>
                                    <td class="ps-4 fw-bold text-muted">{{ $key + 1 }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="bg-warning bg-opacity-10 text-warning rounded p-2 me-3">
                                                <i class="fas fa-tag"></i>
                                            </div>
                                            <span class="fw-bold text-dark">{{ $category->name }}</span>
                                        </div>
                                    </td>
                                    <td><code class="text-primary bg-light px-2 py-1 rounded">{{ $category->slug }}</code></td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group">
                                            <a href="{{ route('categories.edit', $category->id) }}"
                                                class="btn btn-sm btn-light text-warning shadow-sm me-2" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                                class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
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