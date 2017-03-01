<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Blog | Login</title>
        <link rel="stylesheet" href="css/reset.css">
        <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
        <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
        <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
        <link rel="stylesheet" href="{{URL::to('public/admin/css/style.css')}}">
    </head>
    <body>
        <div class="container">
            <div class="info">
                <h3>Login</h3>
            </div>
        </div>
        <div class="form">
            <div class="thumbnail">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/>
            </div>

            <h4 style="color:green">
                <?php
                $message = Session::get('message');
                if ($message) {
                    echo $message;
                    Session::put('message', null);
                }
                ?>
            </h4>
            <h4 style="color:red">
                <?php
                $exception = Session::get('exception');
                if ($exception) {
                    echo $exception;
                    Session::put('exception', null);
                }
                ?>
            </h4>
            {!! Form::open(['url' => '/admin_login_check.aspx','method'=>'post']) !!}
            <input type="text" name="email_address" placeholder="email address"/>
            <input type="password" name="password" placeholder="password"/>
            <button type="submit">login</button>
            {!! Form::close() !!}
        </div>

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="{{URL::to('public/admin/js/index.js')}}"></script>
    </body>
</html>
