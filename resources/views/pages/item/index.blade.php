@extends('layouts.master')

@section('title', 'Item')
@section('content')
    <div class="row breadcrumbs-top">
        <div class="col-12">
            <h5 class="content-header-title float-left pr-1 mb-0">Item</h5>
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb p-0 mb-0">
                    <li class="breadcrumb-item pl-1"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active">Item
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <div class="content-body">
        <section id="table-success">
            <div class="card mt-2">
                <div class="card-header">
                    <div class="col-12">
                        <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">Daftar Item</h5>
                        </div>
                        <div class="text-right col-md-6">
                            <button class="btn btn-primary btn-sm" id="btn_add" >Tambah</button>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0" id="t_item">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Item</th>
                            <th>Dibuat Pada</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
    <form id="form_add">
        <div class="modal fade text-left" id="modal_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Kelas </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Kode: </label>
                        <div class="form-group">
                            <input type="text" minlength="2" required placeholder="Kode" id="kode" name="kode" class="form-control">
                        </div>
                        <label>Nama: </label>
                        <div class="form-group">
                            <input type="text" minlength="2" required placeholder="Nama Item" id="nama_item" name="nama_item" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        @csrf
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" id="btn_save" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Simpan</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="form_edit">
        <div class="modal fade text-left" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Edit Item </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="bx bx-x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <label>Kode: </label>
                        <div class="form-group">
                            <input type="text" minlength="2" required placeholder="Kode" id="edit_kode" name="kode" class="form-control">
                        </div>
                        <label>Nama: </label>
                        <div class="form-group">
                            <input type="text" minlength="2" required placeholder="Nama Item" id="edit_nama_item" name="nama_item" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="edit_id">
                        @csrf
                        @method('PUT')
                        <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" id="btn_update" class="btn btn-primary ml-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Update</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form id="form_delete" class="d-none">
        <input type="hidden" name="id" id="delete_id">
        @csrf
        @method('DELETE')
    </form>

@endsection

@section('scripts')

    <script src="/src/item.js"></script>
@endsection
