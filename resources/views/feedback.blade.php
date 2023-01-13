@extends('templates.sidebar')

@section('container')
<!-- Page Heading -->
<h1 class="h3 mb-5 text-gray-800">Saran</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <a class="btn btn-success mb-5 rounded-pill" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah Saran</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Saran</th>
                        <th>Dibuat</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedbacks as $feedback)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $feedback->content }}</td>
                        <td>{{ $feedback->created_at }}</td>
                        <td>
                            <a class="btn btn-success btn-circle btn-edit" data-toggle="modal" data-target="#editModal" data-id="{{ $feedback->id }}" data-content="{{ $feedback->content }}"><i class="fa fa-pen"></i></a>
                            <a class="btn btn-danger btn-circle btn-delete" data-id="{{ $feedback->id }}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('modal')
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Saran</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Apa anda yakin?</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form id="form_delete" method="post" class="d-inline">
                            <input type="hidden" name="id" class="id">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-primary">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>

<form method="post" action="feedback">
    @csrf
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Saran</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Saran</label>
                            <textarea type="text" class="form-control" name="content" placeholder="Saran" required></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </div>
            </div>
    </div>
</form>

<form method="post" action="feedback/{{ auth()->user()->id  }}">
    @csrf
    @method('put')
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Saran</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="form-group">
                                <label>Saran</label>
                                <textarea type="text" class="form-control content" name="content" placeholder="Saran" required></textarea>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Edit</button>
                    </div>
                </div>
            </div>
    </div>
</form>

@endsection

@section('script')
    <script>
        $('.btn-edit').on('click', function() {
            const id = $(this).data('id');
            const content = $(this).data('content');
            $('.id').val(id);
            $('.content').val(content);
            $('#editModal').modal('show');
        });

        $('.btn-view').on('click', function() {
            const id = $(this).data('id');
            const content = $(this).data('content');
            $('.id').val(id);
            $('.content').val(content);
            $('#viewModal').modal('show');
        });


        $('.btn-delete').on('click', function() {
            const id = $(this).data('id');
            $('.id').val(id);
            $('#deleteModal').modal('show');
        });
    </script>
@endsection
