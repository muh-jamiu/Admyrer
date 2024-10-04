@extends('layouts.dashlayout')

@php
    $users = $data['users'] ?? [];
    $all = App\Models\User::all();
@endphp

@section('title')
    Manage Users | Admyrer
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
                        <h3>Manage Users</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Users</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Vertical Layout -->

                    <div class="">
                        <p class="text-muted mb-1">Showing 10 out of {{count($all)}} users.</p>
                    </div>
                    <div class="mb-3">
                        {{ $users->links() }}
                    </div>

                    <div class="mb-5" style="border: 1px solid rgb(219, 219, 219)">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-dark fw-bold">Firstname</th>
                                    <th class="text-dark fw-bold">Lastname</th>
                                    <th class="text-dark fw-bold">Email</th>
                                    <th class="text-dark fw-bold">Phone</th>
                                    <th class="text-dark fw-bold">Gender</th>
                                    <th class="text-dark fw-bold">Country</th>
                                    <th class="text-dark fw-bold">State</th>
                                    <th class="text-dark fw-bold">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{$item->first_name}}</td>
                                    <td>{{$item->last_name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->phone_number}}</td>
                                    <td>{{$item->gender}}</td>
                                    <td>{{$item->country}}</td>
                                    <td>{{$item->state}}</td>
                                    <td>
                                        @if ($item->is_block)
                                        <div class="dropdown dropstart">
                                            <button type="button" class="btn btn-danger" data-bs-toggle="dropdown">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu dropstart">
                                                <li>
                                                    <h5 class="dropdown-header">Actions</h5>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                    </hr>
                                                </li>
                                                <li onclick="deleteUser(`{{$item->id}}`)"><a class="dropdown-item mb-3" href="#">Delete User</a></li>
                                                <li onclick="blockUser(`{{$item->id}}`)"><a class="dropdown-item mb-3" href="#">Unblock User</a></li> 
                                            </ul>
                                        </div>                                        
                                        @endif
                                        @if (!$item->is_block)
                                        <div class="dropdown dropstart">
                                            <button type="button" class="btn btn-primary" data-bs-toggle="dropdown">
                                                Action
                                            </button>
                                            <ul class="dropdown-menu dropstart">
                                                <li>
                                                    <h5 class="dropdown-header">Actions</h5>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                    </hr>
                                                </li>
                                                <li onclick="deleteUser(`{{$item->id}}`)"><a class="dropdown-item mb-3" href="#">Delete User</a></li>
                                                <li onclick="blockUser(`{{$item->id}}`)"><a class="dropdown-item mb-3" href="#">Block User</a></li> 
                                            </ul>
                                        </div>                                        
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>

                    <div class="mb-5">
                        {{ $users->links() }}
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
                text: "Deleting this user will erase the user data!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    postDeleteUser(id)
                }
            });
        }

        function postDeleteUser(id){
            axios.post("/delete_user", {
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

        function blockUser(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "Blocking this user will restrict the user from logging in!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, block it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    postBlockUser(id)
                }
            });
        }

        function postBlockUser(id){
            axios.post("/block_user", {
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
