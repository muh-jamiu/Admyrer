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
                    <div class="d-flex flex-wrap">
                        @foreach ($avatars as $item)
                            <div class="m_photos mb-4">
                                <div class="d-flex">
                                    <img src="{{ $item->avatar }}" alt="" class="img_1 mt-0">
                                    <div class="name mx-2">
                                        <p class="text-muted ft">{{ $item->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <img src="{{ $item->avatar }}" alt="" class="img_2">

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
