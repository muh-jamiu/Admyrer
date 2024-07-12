@extends('layouts.dashlayout')

@php
    $users = $data['users'] ?? [];
    $avatars = $data['avatars'] ?? [];
    use Carbon\Carbon;
@endphp

@section('title')
    Manage Assets | Admyrer
@endsection

@section('dashboard')
    <!-- Layout wrapper -->
    <div class="layout-wrapper">

        <!-- Content body -->
        <div class="content-body">
            <!-- Content -->
            <div class="content ">
                <div class="container-fluid">
                    <div>
                        <h3>Manage Assets</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Assets</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Vertical Layout -->
                    {{-- <div class="d-flex flex-wrap">
                        @foreach ($avatars as $item)
                            @php
                                $imageExtensions = ['image'];
                                $videoExtensions = ['video'];
                                $imagePattern = implode('|', $imageExtensions);
                                $videoPattern = implode('|', $videoExtensions);
                            @endphp
                            <div class="m_photos mb-4">
                                <div class="d-flex">
                                    <img src="{{ $item->avatar }}" alt="" class="img_1 mt-0">
                                    <div class="name mx-2">
                                        <p class="text-muted ft">{{ $item->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                @if (preg_match("/\b($imagePattern)\b/i", $item->avatar))
                                    <img src="{{ $item->avatar }}" alt="" class="img_2">
                                @else
                                    <div class="col-sm-6">
                                        <video width="240" height="250" controls>
                                            <source src="{{ $item->avatar }}" type="">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @endif

                                <button onclick="deleteAvatar(`{{ $item->id }}`)"
                                    class="btn text-danger mt-3 ">Delete</button>
                            </div>
                        @endforeach

                        @foreach ($users as $item)
                            @if ($item->avatar)
                                <div class="m_photos mb-4">
                                    <div class="d-flex">
                                        <img src="{{ $item->avatar }}" alt="" class="img_1 mt-1">
                                        <div class="name mx-2">
                                            <p class="mb-0 text-capitalize">{{ $item->first_name }} {{ $item->last_name }}
                                            </p>
                                            <p class="text-muted">{{ $item->created_at->diffForHumans() }}</p>
                                        </div>
                                    </div>
                                    <img src="{{ $item->avatar }}" alt="" class="img_2">

                                    <button onclick="deleteUser(`{{ $item->id }}`)"
                                        class="btn text-danger mt-3 ">Delete</button>
                                </div>
                            @endif
                        @endforeach
                    </div> --}}

                    <p class="text-muted">Total Asset: {{intval(count($avatars) ) + intval(count($users))}}</p>

                    <div class="mb-5" style="border: 1px solid rgb(219, 219, 219)">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-dark fw-bold">Full name</th>
                                    <th class="text-dark fw-bold">Image</th>
                                    <th class="text-dark fw-bold">Date</th>
                                    <th class="text-dark fw-bold">Type</th>
                                    <th class="text-dark fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($avatars as $key => $item)
                                    @php
                                        $imageExtensions = ['image'];
                                        $videoExtensions = ['video'];
                                        $imagePattern = implode('|', $imageExtensions);
                                        $videoPattern = implode('|', $videoExtensions);
                                        $users_ =  App\Models\User::where("id", $item->userId)->get();
                                        // dd($users_);
                                    @endphp

                                    @if (preg_match("/\b($imagePattern)\b/i", $item->avatar))
                                        <tr>
                                            <td>{{$users_[0]->first_name}} {{$users_[0]->last_name}}</td>
                                            <td> <img src="{{ $item->avatar }}" alt="" class="img_1"></td>
                                            <td>
                                                <p class="text-muted">{{ $item->created_at->diffForHumans() }}</p>
                                            </td>
                                            <td>Image</td>
                                            <td><button onclick="deleteAvatar(`{{ $item->id }}`)" class="btn btn-danger">Delete</button></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td>{{$users_[0]->first_name}} {{$users_[0]->last_name}}</td>
                                            <td>
                                                <video width="30" height="30" controls>
                                                    <source src="{{ $item->avatar }}" type="">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </td>

                                            <td>
                                                <p class="text-muted">{{ $item->created_at->diffForHumans() }}</p>
                                            </td>
                                            <td>Video</td>
                                            <td><button onclick="deleteAvatar(`{{ $item->id }}`)" class="btn btn-danger">Delete</button></td>
                                        </tr>
                                    @endif
                                @endforeach

                                @foreach ($users as $item)
                                    @if ($item->avatar)
                                        <tr>
                                            <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                            <td> <img src="{{ $item->avatar }}" alt="" class="img_1"></td>
                                            <td>
                                                <p class="text-muted">{{ $item->created_at->diffForHumans() }}</p>
                                            </td>
                                            <td>Image</td>
                                            <td><button onclick="deleteUser(`{{ $item->id }}`)" class="btn btn-danger">Delete</button></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- #END# Vertical Layout -->
                    <script></script>
                </div>
                <!-- ./ Content -->

            </div>
            <!-- ./ Content body -->
        </div>
        <!-- ./ Content wrapper -->
    </div>


    </body>

    </html>
@endsection

@push('javascript')
    <script>
        function deleteUser(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "Deleting this image will erase the image forever!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    postDeleteUser(id);
                }
            });
        }

        function postDeleteUser(id) {
            axios.post("/delete_avatar", {
                    id: id
                })
                .then(res => {
                    console.log(res)
                    location.reload()
                })
                .catch(err => {
                    console.log(err)
                })

        }

        function deleteAvatar(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "Deleting this image will erase the image forever!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    postDeleteAvatar(id);
                }
            });
        }

        function postDeleteAvatar(id) {
            axios.post("/delete_avatar_real", {
                    id: id
                })
                .then(res => {
                    console.log(res)
                    location.reload()
                })
                .catch(err => {
                    console.log(err)
                })

        }
    </script>
@endpush
