               
       
<html>
	<head>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
		<style>
            .people-list  li {
                padding: 10px 15px;
                list-style: none;
                border-radius: 3px
            }

            .people-list  li:hover {
                background: #efefef;
                cursor: pointer
            }
            .people-list .about {
                float: left;
                padding-left: 8px
            }
                        
            .poeple-list img {
                width: 45px;
                border-radius: 50%
            }

            .poeple-list img {
                float: left;
                border-radius: 50%
            }
        </style>

		
	</head>
	<body>
       
            
                    <div class="card-header">
                        <h3 class="card-title">
                        <i class="fas fa-globe mr-1"></i>
                        Customer
                        </h3>
                    </div>
               
                    @foreach($users as $user)
                    <div class ="poeple-list">
                    <li class="clearfix" onclick="setRoom({{ $user->id }})">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="avatar">
                        <div class="about">
                            <div class="name">{{ $user->name }}</div>
                            <div class="status">{{ $user->email }}</div>                                            
                        </div>
                    </div>
                    </div>
                    @endforeach
                
            
        
	</body>
</html>