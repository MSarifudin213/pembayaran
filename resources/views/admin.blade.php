@extends('layouts.admin')

@section('title')
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pesanan</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
      </div><!-- /.container-fluid -->
  </div>
<section class="content">
  <div class="container">
    <!-- Small boxes (Stat box) -->
      <div class="col-lg-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-globe mr-1"></i>
                  Aktivitas Toko
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                  <div class="row">
                      <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-info">
                            <div class="inner">
                              {{-- <h4>Rp {{ number_format($orders[0]->turnover) }}</h4> --}}
              
                              <p>Keseluruhan Omset</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-success">
                            <div class="inner">
                              {{-- <h4>{{ $customers->count() }}</h4> --}}
              
                              <p>Customer</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-warning">
                            <div class="inner">
                              {{-- <h4>{{ $categories->count() }}</h4> --}}
              
                              <p>Kategori Produk</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-pricetag"></i>
                            </div>
                          </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                          <!-- small box -->
                          <div class="small-box bg-danger">
                            <div class="inner">
                              {{-- <h4>{{ $products->count() }}</h4> --}}
              
                              <p>Produk</p>
                            </div>
                            <div class="icon">
                              <i class="ion ion-bag"></i>
                            </div>
                          </div>
                        </div>
                        <!-- ./col -->
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                          <div class="inner">
                            {{-- <h4>{{ $orders[0]->newOrder }}</h4> --}}
            
                            <p>Orderan Baru</p>
                          </div>
                          <div class="icon">
                              <i class="ion ion-stats-bars"></i>
                          </div>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                          <div class="inner">
                            {{-- <h4>{{ $orders[0]->processOrder }}</h4> --}}
            
                            <p>Order sedang diproses</p>
                          </div>
                          <div class="icon">
                              <i class="ion ion-bag"></i>
                          </div>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                          <div class="inner">
                            {{-- <h4>{{ $orders[0]->shipping }}</h4> --}}
            
                            <p>Orderan dikirim</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                        </div>
                      </div>
                      <!-- ./col -->
                      <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                          <div class="inner">
                            {{-- <h4>{{ $orders[0]->completeOrder }}</h4> --}}
            
                            <p>Orderan Selesai</p>
                          </div>
                          <div class="icon">
                            <i class="ion ion-bag"></i>
                          </div>
                        </div>
                      </div>
                      <!-- ./col -->
                  </div>

              </div>
          </div>
      </div>
  
    <div class="row">
      {{-- chat list --}}
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <div class="row">
              <div class="table table-striped">
                <div class="inner">
               
                  <div id="plist" class="people-list" style="min-height: 500px"></div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
          {{-- Chat Room --}}
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <div class="row">
              <div class="table table-striped">
                
                  <div class="chat" id="room" style="min-height: 500px">
                    <div class="text-center">
                      <p>Buka Pesan</p>
                    </div>
                </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 </section>
</div>

@endsection

@section('js')
<script type="text/javascript">
  const interval = setInterval(function() {
    $.get('{{ url("admin/people/list") }}', (data, status) => {
      $('#plist').html(data);
    });
  }, 1000);
</script>
<script type="text/javascript">
  function setRoom(userId) {
    localStorage.setItem("room", userId);
    //$('#room').html("Loading...");
    $.get('{{ url("admin/people/room") }}' + '/' + userId, (data, status) => {
      $('#room').html(data);
    });
  }
</script>

<script>
  var checkM = setInterval(function() {
    var user_id_check = localStorage.getItem('user_id');
    var count = localStorage.getItem('count')
    var url = '{{ url("api/check") }}' + '/' + user_id_check + '/' + count

    if (user_id_check != 'false') {
      $.ajax({
        type: 'GET',
        url: url,
        success: function(data) {
          if (data.new_message) {
            setRoom(user_id_check);
          }
          //console.log(data)
        }
      });
    }

  }, 2000);
</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
<script src="{{asset('js/style.js')}}">



@endsection