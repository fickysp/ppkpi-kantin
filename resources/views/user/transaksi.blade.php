@extends('layouts.user')
@section('content')
<body>
    <div class="container py-5 mt-5">
        <div class="card m-3 shadow">
            <div class="card-body">
                <h2 class="font-weight-bold mb-4" style="color: #303030;">Transaksi Baru</h2>
                <div class="form-group">
                    <form method="post" action="{{ route('transaksi', ['id' => Auth::id()]) }}">
                        @csrf
                        <input type="hidden" name="users_id" value="{{ $user->id }}">
                        <label for="amount">Jumlah:</label>
                        <input class="form-control" type="number" name="amount" placeholder="Masukan nominal" required>
                        <br>
                        <label for="type">Jenis Transaksi:</label>
                        <select class="form-control mb-3" name="type" required>
                            <option value="topup">Top Up</option>
                            <option value="withdraw">Tarik Tunai</option>
                        </select>
                        <div id="liveAlertPlaceholder"></div>
                        <button type="reset" class="btn btn-danger mt-2">Reset</button>
                        <button type="submit" class="btn btn-primary mt-2" id="liveAlertBtn">Konfirmasi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
  @if(session('error'))
  <p style="color: red;">{{ session('error') }}</p>
  @endif
</body>
@endsection
