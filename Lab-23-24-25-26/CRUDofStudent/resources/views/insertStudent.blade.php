<!DOCTYPE html>
<html>
<head>
    <title>Add/Edit New Student</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">

        <h1>Add/Edit New Student</h1>

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

        <form method="POST" action="{{ url('student/create') }}">

            {{ csrf_field() }}

            @if (isset($student))
                @method('PUT')
                <input type="hidden" name="id" value="{{$student->id}}">
            @endif

            <div class="mb-3">
                <label class="form-label" for="inputName">Name:</label>
                <input
                    type="text"
                    name="name"
                    id="inputName"
                    @if (isset($student))
                        value="{{ $student->name }}"
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
                <label class="form-label" for="inputEnrollment">Enrollment:</label>
                <input
                    type="number"
                    name="enrollment"
                    id="inputEnrollment"
                    @if (isset($student))
                        value="{{ $student->enrollment }}"
                    @else
                        value="{{ old('enrollment') }}"
                    @endif
                    class="form-control @error('enrollment') is-invalid @enderror"
                    placeholder="Enrollment">

                <!-- Way 2: Display Error Message -->
                @error('enrollment')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="inputSem">Sem:</label>
                <input
                    type="number"
                    name="sem"
                    id="inputSem"
                    @if (isset($student))
                        value="{{ $student->sem }}"
                    @else
                        value="{{ old('sem') }}"
                    @endif
                    class="form-control @error('sem') is-invalid @enderror"
                    placeholder="Sem">

                <!-- Way 2: Display Error Message -->
                @error('sem')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="inputBranch">Branch:</label>
                <input
                    type="text"
                    name="branch"
                    id="inputBranch"
                    @if (isset($student))
                        value="{{ $student->branch }}"
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
            @if (!isset($student))
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
                    @if (isset($student))
                        value="{{ $student->email }}"
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
