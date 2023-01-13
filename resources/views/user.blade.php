@extends('templates.sidebar')

@section('container')
<!-- Page Heading -->
<h1 class="h3 mb-5 text-gray-800">Users</h1>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive">
            <a class="btn btn-success mb-5 rounded-pill" data-toggle="modal" data-target="#tambahModal"><i class="fa fa-plus"></i> Tambah User</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Dibuat</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><a class="{{ $user->status == 1 ? "btn btn-success" : "btn btn-danger" }} disabled" href="">{{ $user->status == 1 ? "Aktif" : "Non Aktif" }}</a></td>
                        <td>
                            <a class="btn btn-warning btn-circle btn-feedback" data-toggle="modal" data-target="#feedbackModal"  data-id="{{ $user->id }}"><i class="fa fa-book"></i></a>
                            <a class="btn btn-success btn-circle btn-edit" data-toggle="modal" data-target="#editModal" data-id="{{ $user->id }}" data-name="{{ $user->name }}" data-email="{{ $user->email }}" data-status="{{ $user->status }}" data-role="{{ $user->role }}"><i class="fa fa-pen"></i></a>
                            <a class="btn btn-danger btn-circle btn-delete" data-id="{{ $user->id }}"><i class="fa fa-trash"></i></a>
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
                        <h5 class="modal-title" id="exampleModalLabel">Hapus User</h5>
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

<form method="post" action="user">
    @csrf
    <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="name" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="1">Aktif</option>
                                <option value="0">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </div>
            </div>
    </div>
</form>

<form method="post" id="form_edit">
    @csrf
    @method('put')
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control name" name="name" placeholder="Nama" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control email" name="email" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control role" required>
                                <option value="">-- Pilih Role --</option>
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control status" required>
                                <option value="">-- Pilih Status --</option>
                                <option value="1">Aktif</option>
                                <option value="0">Non Aktif</option>
                            </select>
                        </div>
                        <br>
                        <small><b>Abaikan jika tidak ingin mengubah password : </b></small>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control password" name="password" placeholder="Password">
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

<form method="post">
    @csrf
    <div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lihat Saran</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body" id="data-feedback">

                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
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
            const name = $(this).data('name');
            const email = $(this).data('email');
            const status = $(this).data('status');
            const role = $(this).data('role');
            console.log(role);
            $('.id').val(id);
            $('.name').val(name);
            $('.email').val(email);
            $('.status').val(status);
            $('.role').val(role);
            $('#editModal').modal('show');
            $('#form_edit').attr('action', `user/${id}`);
        });

        $('.btn-view').on('click', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');
            const email = $(this).data('email');
            const status = $(this).data('status');
            const role = $(this).data('role');
            $('.id').val(id);
            $('.name').val(name);
            $('.email').val(email);
            $('.status').val(status);
            $('.role').val(role);
            $('#viewModal').modal('show');
        });


        $('.btn-delete').on('click', function() {
            const id = $(this).data('id');
            $('.id').val(id);
            $('#deleteModal').modal('show');
            $('#form_delete').attr('action', `user/${id}`);
        });

        $('.btn-feedback').on('click', function() {
            const id = $(this).data('id');
            $('.id').val(id);

            $.ajax({
                type: 'POST',
                url: `user_feedback`,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                Cache: false,
                dataType: "json",
                data: 'user_id=' + id,
                success: function(resp) {
                    if(resp.length == 0){
                        $('#data-feedback').append(
                            `<center><p>Tidak ada saran</p></center>`
                        );
                    }else{
                        let count = 0;
                        resp.forEach(element => {
                            $('#data-feedback').append(
                            `<div class="form-group">
                                    <label>Saran ${++count}</label>
                                    <textarea class="form-control" readonly>${element.content}</textarea>
                                </div>`
                            );
                        });
                    }

                }
            });
            $('#feedbackModal').modal('show');
        });

        $('#feedbackModal').on('hidden.bs.modal', function () {
            $('#data-feedback').empty()
        })
    </script>
@endsection
