<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Captcha In Laravel</title>
    <link rel="stylesheet" href="https://maxcdn.boostrapcdn.com./bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Login</div>
            <div class="panel-body">
                <form action="{{route('myCaptchaPost')}}" method="post" role="form" class="form.form-horizontal">
                    {{csrf_field()}}


                    <div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
                        <label for="email" class="col-md-4 control-label">E-mail Address</label>
                        <div class="col-md-6">
                            <input id="email" type="text" class="form-control" name="email" value="{{old('email')}}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{$error->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{$errors->has('password') ? ' has-error' : ''}}">
                        <label for="password" class="col-md-4 control-label">Password</label>
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{$error->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group{{$errors->('captcha') ? '' }}">
                        <label for="password" class="col-md-4 control-label">Captcha</label>
                        <div class="col-md-6">
                            <div class="captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-success btn-refresh"><i class="fa fa-refresh"></i></button>
                            </div>
                            <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                            @if ($errors->has('captcha'))
                                <span class="help-block">
                                    <strong>{{$errors->first('captcha') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">

                            </button>
                        </div>
                    </div>




                </form>

            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(".btn-refresh").click(function(){
        $.ajax({
            type:'GET',
            url:'/refresh_captcha',
            success:function(data){
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
</html>
