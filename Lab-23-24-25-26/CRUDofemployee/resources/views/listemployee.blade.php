<!DOCTYPE html>
<html>
<head>
    <title>List employees</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">

        <h1>List employees</h1>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td><a href="employee/detail/{{ $s->id }}">{{ $s->name }}</a></td>
                    <td><a href="employee/edit/{{ $s->id }}" class="btn btn-warning">Edit</a></td>
                    <td><a href="employee/delete/{{ $s->id }}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>


    </div>
</body>
</html>
