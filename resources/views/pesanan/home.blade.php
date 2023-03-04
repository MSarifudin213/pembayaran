@extends('layouts.admin')

@section('title')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Dashboard</title>
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
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
    <!-- /.content-header -->

    <!-- Main content -->
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
            
          {{-- mulai --}}
          <div class="container">
            <div class="content container-fluid bootstrap snippets bootdey">
                  <div class="row row-broken">
                    <div class="col-sm-3 col-xs-12">
                      <div class="col-inside-lg decor-default chat" style="overflow: hidden; outline: none;" tabindex="5000">
                        <div class="chat-users">
                          <h6>Online</h6>
                          <div class="card w-100">
                            @foreach($chats as $chat)
                            @if($chat->sender_id == 1)
                            <div class="d-flex flex-row p-2">
                                <div class="mr-2 p-3" style="background:#f5f5f5; border-radius: 25px;">
                                    @if($chat->type==1)
                                    <img width="100px" src="{{ url('storage/' . $chat->url_file) }}" />
                                    @endif
                            @if($chat->type==2)
                                    <img width="100px" src="data:image/png;base64,{{ $chat->image_base64 }}" />
                                    @endif
                                    <p class="text-muted">{{ $chat->message }}</p>
                                </div>
                            </div>
                            @else
                            <div class="d-flex flex-row-reverse p-2">
                                <div class="chat ml-2 p-3" style="background:#b7dbff; border-radius: 25px;">
                                    @if($chat->type==1)
                                    <img width="100px" src="{{ url('storage/' . $chat->url_file) }}" />
                                    @endif
                            @if($chat->type==2)
                                    <img width="100px" src="data:image/png;base64,{{ $chat->image_base64 }}" />
                                    @endif
                                    <p>{{ $chat->message }}</p>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    <div class="col-sm-9 col-xs-12 chat" style="overflow: hidden; outline: none;" tabindex="5001">
                      <div class="col-inside-lg decor-default">
                        <div class="chat-body">
                          <h6>Mini Chat</h6>
                          <div class="answer left">
                            <div class="avatar">
                              <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                              <div class="status offline"></div>
                            </div>
                            <div class="name">Alexander Herthic</div>
                            <div class="text">
                              Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adiping elit
                            </div>
                            <div class="time">5 min ago</div>
                          </div>
                          <div class="answer right">
                            <div class="avatar">
                              <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
                              <div class="status offline"></div>
                            </div>
                            <div class="name">Alexander Herthic</div>
                            <div class="text">
                              Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adiping elit
                            </div>
                            <div class="time">5 min ago</div>
                          </div>
                          <div class="answer left">
                            <div class="avatar">
                              <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                              <div class="status online"></div>
                            </div>
                            <div class="name">Alexander Herthic</div>
                            <div class="text">
                              ...
                            </div>
                            <div class="time">5 min ago</div>
                          </div>
                          <div class="answer right">
                            <div class="avatar">
                              <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
                              <div class="status busy"></div>
                            </div>
                            <div class="name">Alexander Herthic</div>
                            <div class="text">
                              It is a long established fact that a reader will be. Thanks Mate!
                            </div>
                            <div class="time">5 min ago</div>
                          </div>
                          <div class="answer right">
                            <div class="avatar">
                              <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                              <div class="status off"></div>
                            </div>
                            <div class="name">Alexander Herthic</div>
                            <div class="text">
                              It is a long established fact that a reader will be. Thanks Mate!
                            </div>
                            <div class="time">5 min ago</div>
                          </div>
                          <div class="answer left">
                            <div class="avatar">
                              <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
                              <div class="status offline"></div>
                            </div>
                            <div class="name">Alexander Herthic</div>
                            <div class="text">
                              Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adiping elit
                            </div>
                            <div class="time">5 min ago</div>
                          </div>
                          <div class="answer right">
                            <div class="avatar">
                              <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                              <div class="status offline"></div>
                            </div>
                            <div class="name">Alexander Herthic</div>
                            <div class="text">
                              Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adipisicing elit Lorem ipsum dolor amet, consectetur adiping elit
                            </div>
                            <div class="time">5 min ago</div>
                          </div>
                          <div class="answer left">
                            <div class="avatar">
                              <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
                              <div class="status online"></div>
                            </div>
                            <div class="name">Alexander Herthic</div>
                            <div class="text">
                              ...
                            </div>
                            <div class="time">5 min ago</div>
                          </div>
                          <div class="answer right">
                            <div class="avatar">
                              <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="User name">
                              <div class="status busy"></div>
                            </div>
                            <div class="name">Alexander Herthic</div>
                            <div class="text">
                              It is a long established fact that a reader will be. Thanks Mate!
                            </div>
                            <div class="time">5 min ago</div>
                          </div>
                          <div class="answer right">
                            <div class="avatar">
                              <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="User name">
                              <div class="status off"></div>
                            </div>
                            <div class="name">Alexander Herthic</div>
                            <div class="text">
                              It is a long established fact that a reader will be. Thanks Mate!
                            </div>
                            <div class="time">5 min ago</div>
                          </div>
                          <div class="answer-add">
                            <input placeholder="Write a message">
                            <span class="answer-btn answer-btn-1"></span>
                            <span class="answer-btn answer-btn-2"></span>
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
  <!-- /.content-wrapper -->
  
@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.6.8-fix/jquery.nicescroll.min.js"></script>
<script src="{{asset('js/style.js')}}">
@endsection
