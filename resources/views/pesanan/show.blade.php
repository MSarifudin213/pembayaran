@extends('layouts.admin')

@section('title')
    <title>Daftar Pesanan</title>
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Detail Pesanan</h1>
            </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Detail Pesanan</li>
          </ol>
                
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container">
            <div class="row">
                <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST PRODUCT  -->
                {{-- <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Pesanan</h4>
                        </div>
                        <div class="card-body">
                            <ul>
                            <li>Nama</li>
                            <ol>{{$order->nama}}</ol>
                            <li>Produk</li>
                            <ol>{{$order->product_id}}</ol>
                            <li>Email</li>
                            <ol>{{$order->email}}</ol>
                            <li>No Telepon</li>
                            <ol>{{$order->no_telp}}</ol>
                            <li>Deskripsi</li>
                            <ol>{{$order->keterangan}}</ol>
                            <li>Status</li>
                            <ol>{{$order->status}}</ol>
                            </ul>
                            <!-- FUNGSI INI AKAN SECARA OTOMATIS MEN-GENERATE TOMBOL PAGINATION  -->
                            
                        </div>
                    </div>
                </div> --}}
                 <!-- Main content -->
  <div class="row">
    <div class="col-lg-8">
      <!-- Details -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="mb-3 d-flex justify-content-between">
            <div>
              <span class="me-3">{{$donation->created_at}}</span><br>
              <span class="me-3">ID -1612{{$donation->id}}</span>
              <span class="badge rounded-pill bg-info">{{$donation->donation_type}}</span>
            </div>
            <div class="d-flex">
              {{-- <button class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i class="bi bi-download"></i> <span class="text">Pesanan</span></button>
              <div class="dropdown">
                <button class="btn btn-link p-0 text-muted" type="button" data-bs-toggle="dropdown">
                  <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li><a class="dropdown-item" href="#"><i class="bi bi-pencil"></i> Edit</a></li>
                  <li><a class="dropdown-item" href="#"><i class="bi bi-printer"></i> Print</a></li>
                </ul>
              </div> --}}
            </div>
          </div>
          <table class="table table-borderless">

            <tfoot>
              <tr>
                <td colspan="2"><strong>Nama</strong></td>
                <td class="text-end">{{$donation->donor_name}}</td>
              </tr>
              <tr>
                <td colspan="2"><strong>Email</strong></td>
                <td class="text-end">{{$donation->donor_email}}</td>
              </tr>
              {{-- <tr>
                <td colspan="2"><strong>No Telepon</strong></td>
                <td class="text-danger text-end">{{$order->no_telp}}</td>
              </tr> --}}
            </tfoot>
          </table>
        </div>
      </div>
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-6">
              <h3 class="h6"><strong> Status Pembayaran</strong></h3>
              Total: Rp{{number_format($donation->amount)}} <span class="badge bg-success rounded-pill">{{$donation->status}}</span></p>
            </div>
            {{-- <div class="col-lg-6">
              <h3 class="h6">Alamat Pemesan</h3>
              <address>
                <strong>John Doe</strong><br>
                1355 Market St, Suite 900<br>
                San Francisco, CA 94103<br> 
              </address>
            </div>--}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-12">
        <div class="card mb-8">
            <div class="card-body">
              <h3 class="h6"><Strong>Keterangan</Strong></h3>
              <p>{{!! $donation->note !!}}</p>
            </div>
          </div>
          <div class="card mb-4">
            <!-- Shipping information -->
            
                <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
            </div>
        </div>
    </section>
    
    <!-- /.content
       

@endsection