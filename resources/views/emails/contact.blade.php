<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
</head>
<body>

    <p>
        <strong>Hello Admin</strong>
    </p>
    <p>
        {{$messages['name']}} with email address {{$messages['email']}} sent the following message
        <br/><br/> {{ $messages['description'] }}
    </p>
    
    <p>
        Thanks
        <br/><br/>
        Best Regards
    </p>

	<footer>
		Copyright &copy; {{date('Y')}} <a target="_blank" href="{{url('/')}}">BeMo</a> | All rights Reserved 
	</footer>

	<style type="text/css">
		body {
		  	background: #f0f0f0;
		  	font-family: 'Poppins', sans-serif;
		  	color:#4e4e4e;
		  	height: 100%;
		  	padding-top: 15px;
		  	padding-bottom: 15px;
		}
		p{
			font-size: 14px;
		}
		a{
			text-decoration: none;
		}
		.btn-primary {
		  	background: #c41c3d;
		  	color: #fff;
		  	border-radius: 4px;
		  	border:none;
            margin-top: 10px;
            padding: 0.9rem;
		}

		footer{
			margin-top: 20px; font-size: 14px;
		}

		footer a{
			text-transform: uppercase;
			color: #5bc475;
			text-decoration: none;
		}
	</style>
</body>
</html>