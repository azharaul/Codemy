@extends('layout/admin')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Kategori</h1>
            <hr>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $kategori)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $kategori->name }}</td>
                            <td>{{ $kategori->slug }}</td>
                            <td>
                                <a href="" class="btn btn-warning sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection