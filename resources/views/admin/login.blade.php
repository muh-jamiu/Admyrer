@extends("layouts.app")

@section('title')
Admin Login | Admyrer
@endsection

@section("content")

<div class="admin_login">
    <div class="form">
        <h4 class="text-center fw-bold">Admin Login</h4>
        <form action="/admin-login" method="POST" class="mt-2">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session("msg"))
                <div class="alert alert-danger text-center">
                    <ul>
                        <li>{{session("msg")}}</li>
                    </ul>
                </div>
            @endif

            <label for="">Admin Username</label>
            <input required name="username" type="text" placeholder="Enter username">
            <label for="">Password</label>
            <input required name="password" type="password" placeholder="Enter password">
            <button class="btn btn-success mb-3 mt-3 px-5">Login</button>
        </form>
    </div>

</div>

@endsection