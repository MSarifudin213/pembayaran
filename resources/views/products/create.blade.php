@extends('layouts.admin')

@section('title')
    <title>Tambah Produk</title>
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Produk</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Tambah Produk</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <!-- TAMBAHKAN ENCTYPE="" KETIKA MENGIRIMKAN FILE PADA FORM -->
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" >
                @csrf
                
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tambah Produk</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Produk</label>
                                    <input type="text" name="name" class="form-control" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                  
                                    <!-- TAMBAHKAN ID YANG NNTINYA DIGUNAKAN UTK MENGHUBUNGKAN DENGAN CKEDITOR -->
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="1">Publish</option>
                                        <option value="0">Draft</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('status') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Kategori</label>
                                    
                                    <!-- DATA KATEGORI DIGUNAKAN DISINI, SEHINGGA SETIAP PRODUK USER BISA MEMILIH KATEGORINYA -->
                                    <select name="category_id" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($category as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="price">Harga</label>
                                    <input type="number" name="price" class="form-control" required>
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Berat</label>
                                    <input type="number" name="weight" class="form-control" required>
                                    <p class="text-danger">{{ $errors->first('weight') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="image">Foto Produk</label>
                                    <input type="file" name="image" class="form-control" required>
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary float-right">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('js')
    <!-- LOAD CKEDITOR -->
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        //TERAPKAN CKEDITOR PADA TEXTAREA DENGAN ID DESCRIPTION
        CKEDITOR.replace('description');
    </script>
@endsection

 <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST PRODUCT  -->
 <div class="col-md-12">
    <div class="card">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah Produk</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Nama Produk</label>
                            <input type="text" name="donor_name" class="form-control" id="donor_name">
                            <p class="text-danger">{{ $errors->first('donor_name') }}</p>
                        </div>
                        <div class="form-group">
                            <label for="description">note</label>
                          
                            <!-- TAMBAHKAN ID YANG NNTINYA DIGUNAKAN UTK MENGHUBUNGKAN DENGAN CKEDITOR -->
                            <textarea name="note" id="note" class="form-control"></textarea>
                            <p class="text-danger">{{ $errors->first('note') }}</p>
                        </div>
                    </div>
                </div>
            </div>