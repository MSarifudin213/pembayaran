<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
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
</body>

</html>