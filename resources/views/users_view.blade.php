<!doctype html>
<html lang="en">

<head>
    <title>Users View</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Datatable CSS -->
    <link href='//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Bootstrap  CSS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Datatable JS -->
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <div class="container">
        <table class="table table-striped" width='100%' border="1" style='border-collapse: collapse;'>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Gender</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($user as $row)
                <tr>
                    <td>{{$row ->id}}</td>
                    <td>{{$row ->name}}</td>
                    <td>{{$row ->email}}</td>
                    <td>{{$row ->phone}}</td>
                    <td>{{$row ->date}}</td>
                    <td>{{$row ->gender}}</td>
                    <td>{{$row ->image}}</td>
                </tr>
                @endforeach --}}
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Date</th>
                    <th>Gender</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
<a href="{{route('logout')}}" class="btn btn-danger">Logout</a>

</body>
<script>
    $(document).ready(function() {
        $(".table").DataTable({
            'ajax': {
                'url': '{{route("user_data")}}',
                'dataSrc': ''
            }
        });
    });
</script>

</html>
