@extends('layouts.admin')

@section('title')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0 text-dark">Pesanan</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Tambah Pesanan</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

        <section class="content">
            <div class="container">
                <!-- TAMBAHKAN ENCTYPE="" KETIKA MENGIRIMKAN FILE PADA FORM -->
                <form action="#" id="donation_form" >
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tambah pesanan</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="donor_name" class="form-control" id="donor_name">
                                        <p class="text-danger">{{ $errors->first('donor_name') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="user_id">User</label>
                                        
                                        <!-- DATA KATEGORI DIGUNAKAN DISINI, SEHINGGA SETIAP PRODUK USER BISA MEMILIH KATEGORINYA -->
                                        <select name="user_id" class="form-control">
                                            <option value="">Pilih</option>
                                            @foreach ($user as $row)
                                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                        <p class="text-danger">{{ $errors->first('user_id') }}</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Catatan (Opsional)</label>
                                        <textarea name="note" cols="30" rows="3" class="form-control" id="note"></textarea>
                                        <p class="text-danger">{{ $errors->first('note') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">E-Mail</label>
                                        <input type="email" name="donor_email" class="form-control" id="donor_email">
                                        <p class="text-danger">{{ $errors->first('donor_email') }}</p>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Jenis Product</label>
                                        <select name="donation_type" class="form-control" id="donation_type">
                                        <option value="medis_kesehatan">Website</option>
                                        <option value="kemanusiaan">Desain Grafis</option>
                                        <option value="bencana_alam">Video Grafis</option>
                                        <option value="rumah_ibadah">Social Media </option>
                                        <option value="beasiswa_pendidikan">SEO</option>
                                        <option value="sarana_infrastruktur">Sarana & Infrastruktur</option>
                        
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Harga</label>
                                        <input type="number" name="amount" class="form-control" id="amount">
                                        <p class="text-danger">{{ $errors->first('amount') }}</p>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Kirim</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                            

                    </div>   
                </form>
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
    <script>
        $("#donation_form").submit(function(event) {
            event.preventDefault();
            $.post("/api/donation", {
                _method: 'POST',
                _token: '{{ csrf_token() }}',
                donor_name: $('input#donor_name').val(),
                donor_email: $('input#donor_email').val(),
                donation_type: $('select#donation_type').val(),
                amount: $('input#amount').val(),
                note: $('textarea#note').val(),
            },
            function (data, status) {
                console.log(data);
                snap.pay(data.snap_token, {
                    // Optional
                    onSuccess: function (result) {
                        console.log(JSON.stringify(result, null, 2));
                        location.replace('/');
                    },
                    // Optional
                    onPending: function (result) {
                        console.log(JSON.stringify(result, null, 2));
                        location.replace('/');
                    },
                    // Optional
                    onError: function (result) {
                        console.log(JSON.stringify(result, null, 2));
                        location.replace('/');
                    }
                });
                return false;
            });
        })
    </script>


@endsection
