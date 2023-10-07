<!DOCTYPE html>
<html>
<head>
    <title>Detail Student</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">

        <h1>Detail Student</h1>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

        <div class="row">
            <div class="alert alert-success text-end">
                <a href="/students" class="btn btn-primary">Back</a>
            </div>
        </div>

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>enrollment</th>
                    <th>sem</th>
                    <th>branch</th>
                    <th>email</th>
                    <th>phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $student->id }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->enrollment }}</td>
                    <td>{{ $student->sem }}</td>
                    <td>{{ $student->branch }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->phone->phone }}</td>
                </tr>
            </tbody>
        </table>


    </div>
</body>
</html>
