<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/mocku1.png') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background-image: url('{{ asset('img/Teks paragraf Anda.png') }}'); font-family: 'Poppins ', sans-serif;">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card o-hidden rounded shadow-lg my-5">
                    <div class="card-body p-0">

                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h6 text-black font-weight-bold">Welcome to</h1>
                                        <h1 class="h3 text-gray-900 mb-4 font-weight-bold">Kantin Digital</h1>
                                    </div>
                                    <form method="post" action="{{ route('auth') }}"
                                        class="login100-form validate-form">
                                        @csrf
                                        <span class="login100-form-title p-b-43">
                                        </span>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $item)
                                                        <li>{{ $item }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                        @if (Session::get('success'))
                                            <div class="alert alert-success alert-dismissible fade show">
                                                <ul>
                                                    <li>{{ Session::get('success') }}</li>
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="form-group mb-3">
                                            <input type="text" class="form-control" id="email" name="email"
                                                value="{{ old('email') }}" placeholder="Email">
                                        </div>
                                        <div class="form-group mb-3">
                                            <input type="password" class="form-control" id="password" name="password"
                                                placeholder="Password">
                                        </div>
                                        <button type="submit" class="btn btn-primary col-12">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center mt-2" style="font-size: 14px;">
                                        belum punya akun? <a href="{{ route('register') }}" class="small">Registrasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>

</html>
