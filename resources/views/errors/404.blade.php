<!DOCTYPE html>
<html>
    <head>
        <title>PAGE NOT FOUND</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
		<link href="{!! asset('css/bootstrap.min.css') !!}" rel="stylesheet">
        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 20px;
            }
            .img{
            	margin-bottom:40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Oops! Page is Not Found.</div>
                <img class="text-center img" src="{!!asset('media/not allowed.jpg')!!}" width="150"></img>
                <hr>
                <br>
                <a href="{!!url('/')!!}" class="btn btn-lg btn-danger"><span class="fa fa-long-arrow-left"></span> Back to Home</a>
            </div>
        </div>
    </body>
</html>




