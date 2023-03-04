@extends('layouts.admin')

@section('title')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Pesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pesanan</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Pesanan List</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container">
            <div class="row">
                <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST PRODUCT  -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Pesanan</h4>
                        </div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="float-left">
                                <a href="{{ route('donation.create') }}" class="btn btn-primary">Tambah</a>
                            </div>
                            <!-- BUAT FORM UNTUK PENCARIAN, METHODNYA ADALAH GET -->
                             <form action="{{ route('donation.index') }}" method="get">
                                <div class="input-group mb-3 col-md-3 float-right">
                                    <input type="text" name="a" class="form-control" placeholder="Cari..." value="{{ request()->a }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">Cari</button>
                                    </div>
                                </div>
                            </form> 

                            <div class="table-responsive">
                                <table class="table table-striped" id="list">
                                    <tr>
                                        <th>ID</th>
                                        <th>Donor Name</th>
                                        <th>Amount</th>
                                        <th>Donation Type</th>
                                        <th>Status</th>
                                        <th style="text-align: center;"></th>
                                    </tr>
                                    @foreach ($donations as $donation)
                                    <tr>
                                        <td><code>{{ $donation->id }}</code></td>
                                        <td>{{ $donation->donor_name }}</td>
                                        <td>Rp. {{ number_format($donation->amount) }},-</td>
                                        <td>{{ ucwords(str_replace('_', ' ', $donation->donation_type)) }}</td>
                                        <td>{{ ucfirst($donation->status) }}</td>
                                        <td>
                                            {{-- <!-- FORM UNTUK MENGHAPUS DATA PRODUK -->   {{ route('orders.destroy', $donation->id) }} --}}
                                            <form onsubmit="return confirm('Yakin Hapus Pesanan ?')" action="{{ route('donation.destroy', $donation->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('donation.show', $donation->id) }}" class="btn btn-info btn-sm">Detail</a>
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>
                                        <td style="text-align: center;">
                                            @if ($donation->status == 'pending')
                                            <button class="btn btn-success btn-sm" onclick="snap.pay('{{ $donation->snap_token }}')">Complete Payment</button>
                                            @endif
                                        </td>
                            
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6">{{ $donations->links() }}</td>
                                    </tr>
                        
                                </table>
                            </div>
                            <!-- FUNGSI INI AKAN SECARA OTOMATIS MEN-GENERATE TOMBOL PAGINATION  -->
                            {{-- {!! $order->links() !!} --}}
                        </div>
                    </div>
                </div>
                <!-- BAGIAN INI AKAN MENG-HANDLE TABLE LIST CATEGORY  -->
            </div>
        </div>
    </section>
  </div>

@endsection

@section('js')
<script src="https://code.jquery.com/jquery-3.4.1.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js">
</script>
  <script src="{{
    !config('services.midtrans.isProduction') ? 'https://app.sandbox.midtrans.com/snap/snap.js' : 'https://app.midtrans.com/snap/snap.js' }}"
    data-client-key="{{ config('services.midtrans.clientKey')}}">
</script>
  <!-- /.content-wrapper -->
@endsection




