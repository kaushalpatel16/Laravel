<!DOCTYPE html>
<html>
<head>
    <title>Add/Edit New employee</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">

        <h1>Add/Edit New employee</h1>

        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

        <!-- Way 1: Display All Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('employee/create') }}">

            {{ csrf_field() }}

            @if (isset($employee))
                @method('PUT')
                <input type="hidden" name="id" value="{{$employee->id}}">
            @endif

            <div class="mb-3">
                <label class="form-label" for="inputName">Name:</label>
                <input
                    type="text"
                    name="name"
                    id="inputName"
                    @if (isset($employee))
                        value="{{ $employee->name }}"
                    @else
                        value="{{ old('name') }}"
                    @endif
                    class="form-control @error('name') is-invalid @enderror"
                    placeholder="Name">

                <!-- Way 2: Display Error Message -->
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="inputBranch">Branch:</label>
                <input
                    type="text"
                    name="branch"
                    id="inputBranch"
                    @if (isset($employee))
                        value="{{ $employee->branch }}"
                    @else
                        value="{{ old('branch') }}"
                    @endif
                    class="form-control @error('branch') is-invalid @enderror"
                    placeholder="Branch">

                <!-- Way 2: Display Error Message -->
                @error('branch')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            @if (!isset($employee))
            <div class="mb-3">
                <label class="form-label" for="inputPassword">Password:</label>
                <input
                    type="password"
                    name="password"
                    id="inputPassword"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password">

                <!-- Way 3: Display Error Message -->
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            @endif

            <div class="mb-3">
                <label class="form-label" for="inputEmail">Email:</label>
                <input
                    type="text"
                    name="email"
                    id="inputEmail"
                    @if (isset($employee))
                        value="{{ $employee->email }}"
                    @else
                        value="{{ old('email') }}"
                    @endif
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Email">

                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @endif
            </div>

            <div class="mb-3">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
