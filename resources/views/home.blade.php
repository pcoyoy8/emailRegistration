<html lang="en">
<head>
    <title>Email registration</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<div class="row">
    <div class="col-md-2">
{{--        See all the records button--}}
        <a href="{!! route('list') !!}">
            <button type="button" class="btn btn-primary">
                See all the records
            </button>
        </a>
    </div>

    <div class="col-md-8">
{{--        Email form--}}
        <form method="POST" action="{!! route('store') !!}">
            @csrf
            <div class="form-group">
                <label for="email">Insert a valid email address</label>
                <input class="form-control" id="email" name="email" type="email" value="{!! old('email') !!}" required>
            </div>
            <input class="form-control" id="ip" name="ip" type="hidden" readonly>
            <input class="form-control" id="country" name="country" type="hidden" required readonly>
            <button class="btn btn-success" type="submit" value="Submit">Submit</button>
        </form>
{{--        Success message--}}
        @if($message ?? '')
            <div class="alert alert-success">
                {!! $message ?? '' !!}
            </div>
        @endif
    </div>

    <div class="col-md-2">
{{--        Show errors--}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
</body>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    // Get ip and country
    $.getJSON('http://ipinfo.io', function(data){
        $('#ip').val(data.ip);
        $('#country').val(data.country);
    });
</script>
</html>
