@extends('layouts.master')

@section('content')
<div class="page-content">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="page-title mb-0 font-size-18">Dashboard</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Welcome to Test Application</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <!-- Nav tabs -->
                    <ul id="nav-tabs" class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item" id="add-new-user-btn">
                            <a class="nav-link active" data-toggle="tab" href="#adduser" role="tab">
                                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                <span class="d-none d-sm-block">Add new user</span>
                            </a>
                        </li>
                        <li class="nav-item" id="user-list-btn">
                            <a class="nav-link" data-toggle="tab" href="#userlist" role="tab">
                                <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                <span class="d-none d-sm-block">User list</span>
                            </a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-3 text-muted">
                        <div class="" id="adduser" role="tabpanel">
                            @include('layouts.new-user-form')
                        </div>
                        <div class="" id="userlist" role="tabpanel">
                            @include('layouts.user-list-datatable')
                            @include('layouts.edit-user-modal')
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
