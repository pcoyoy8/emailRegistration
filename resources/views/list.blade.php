<html lang="en">
<head>
    <title>Registered emails</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
</head>

<body>
<div class="row">
    <div class="col-md-2">
{{--        Go back button--}}
        <a href="{!! route('home') !!}">
            <button type="button" class="btn btn-danger">
                Go back
            </button>
        </a>
    </div>
    <div class="col-md-8">
        <div class="row">
{{--            Select country form--}}
            <form id="form" name="form" method="POST" action="{!! route('list') !!}">
                @csrf
                <div class="form-group center-div">
                    <label for="country">Select a country:</label>
                    <select class="form-control" id="country" name="country">
                        <option value="">All</option>
                        @foreach($countries as $record)
                            <option
                                value="{!! $record->id !!}"
                                {!! $country == $record->id ? 'selected' : '' !!}
                            >
                                {!! $record->name !!}
                            </option>
                            @endforeach
                    </select>
                </div>
            </form>
        </div>

{{--        Table with the email addresses--}}
        <table id="table" class="table display nowrap" style="width:100%">
            <thead>
            <tr>
                <th>No.</th>
                <th>Email</th>
                <th>Country</th>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $i => $record)
                <tr>
                    <td>{!! $i+1 !!}</td>
                    <td>{!! $record->email !!}</td>
                    <td>{!! $record->country->name !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-2"></div>
</div>
</body>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>

<script type="text/javascript">
    // Table format and export options
    $(document).ready(function() {
        $('#table').DataTable( {
            dom: 'Bflrtip',
            buttons: [
                'copyHtml5',
                {
                    extend: 'excelHtml5',
                    title: 'records',
                },
                {
                    extend: 'csvHtml5',
                    title: 'records',
                },
                {
                    extend: 'pdfHtml5',
                    title: 'records',
                },
            ]
        });
    });

    // Apply the country filter
    $('#country').change(function() {
        $("#form").submit();
    });
</script>
</html>
