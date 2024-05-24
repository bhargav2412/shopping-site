@extends('frontend.main_master')

@section('main_content')
    <div class="body-content">
        <div class="container">
            <div class="row">
                @include('frontend.common.user_sidebar')
                <div class="col-md-2">

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h3 class="text-center"><span class="text-danger">Hii...</span><strong>{{ Auth::user()->name }}
                            </strong>Welcome To
                            Shopping Site</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
