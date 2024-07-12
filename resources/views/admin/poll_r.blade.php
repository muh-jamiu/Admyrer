@extends('layouts.dashlayout')

@php
    $polls = $data['polls'] ?? [];
@endphp

@section('title')
    Poll Results | Admyrer
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
                        <h3>Poll Results</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#">Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Poll Results</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- Vertical Layout -->
                    <div class="row">
                        <div class="col-lg-8 col-md-8">
                            <div class="card">
                                <div class="card-body">
                                    <h6 class="card-title">Poll Results</h6>
                                    <svg class="mb-3 rounded-circle" enable-background="new 0 0 32 32" height="80"
                                        viewBox="0 0 32 32" width="80" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="m26 32h-20c-3.314 0-6-2.686-6-6v-20c0-3.314 2.686-6 6-6h20c3.314 0 6 2.686 6 6v20c0 3.314-2.686 6-6 6z"
                                            fill="#f5e6fe" />
                                        <path
                                            d="m23.805 22.862-1.693-1.693c.349-.527.555-1.157.555-1.835 0-1.838-1.496-3.333-3.333-3.333s-3.334 1.494-3.334 3.332 1.496 3.333 3.333 3.333c.678 0 1.308-.206 1.835-.555l1.693 1.693c.26.26.682.26.943 0 .262-.26.262-.682.001-.942zm-4.472-1.529c-1.103 0-2-.897-2-2s.897-2 2-2 2 .897 2 2c.001 1.103-.897 2-2 2z"
                                            fill="#d9a4fc" />
                                        <g fill="#be63f9">
                                            <path
                                                d="m15.793 16.3c-.673.78-1.093 1.787-1.12 2.893-.933.133-1.807.14-2.007.14-.48 0-4.667-.047-4.667-1.667v-2.666c0 1.62 4.187 1.667 4.667 1.667.287 0 1.881-.014 3.127-.367z" />
                                            <path
                                                d="m17.333 13.667c0 1.62-4.189 1.667-4.667 1.667s-4.666-.048-4.666-1.667v-2.667c0 1.62 4.189 1.667 4.667 1.667s4.666-.047 4.666-1.667z" />
                                            <path
                                                d="m12.667 11.333c-.478 0-4.667-.047-4.667-1.666s4.189-1.667 4.667-1.667 4.667.047 4.667 1.667-4.19 1.666-4.667 1.666z" />
                                        </g>
                                    </svg>
                                    <p>Here you can check overall poll result that is performed by the user.</p>

                                    <div class="">
                                        @foreach ($polls as  $item)
                                        <hr style="border: 1px solid black"> 
                                            @php
                                                $_poll = App\Models\Userpolls::where("pollId", $item->id)->first();

                                                $options = explode(",",  $item->options);
                                            @endphp
                                            <h4 class="fw-bold">{{$item->title}}</h4>
                                            @foreach ($options as $option)
                                            {{$option}}
                                            <div class="progress d_optiond mb-4">
                                                <div class="progress-bar p-0  text-dark" style="width:{{$item->count}}%">{{$item->count}} %</div>
                                            </div>                                      
                                            @endforeach   
                                            <br>                                                 
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
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
