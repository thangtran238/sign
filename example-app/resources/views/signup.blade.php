<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-TYwnAeJz0MhjKdPo9Xee0/bOGAFeKjJF7opvyrZXpYwOogjK6PKrD7VvE9+Qkp8V" crossorigin="anonymous">


    <title>Sign Up</title>
</head>

<body>
    <form method="POST" action="/signup">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}" autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">{{ __('E-Mail Address') }}</label>
            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}"  autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password"  autocomplete="new-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  
                autocomplete="new-password">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
    </form>

    <div>
        @if (isset($user))
            <p>{{ $user['name'] }}</p>
            <p>{{ $user['email'] }}</p>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JbsLTcNn/8jN1FUB2djVaZc+y9XjKRXhLct0pB+RPFhJeyOM0YrvNU0qoh3pdQxM" crossorigin="anonymous">
    </script>

</body>

</html>
