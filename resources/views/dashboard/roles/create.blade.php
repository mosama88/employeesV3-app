@extends('dashboard.layouts.master')
@section('title', 'الصلاحيات')
@section('css')
    <!--Internal  Font Awesome -->
    <link href="{{asset('dashboard/assets/plugins/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <!--Internal  treeview -->
    <link href="{{asset('dashboard/assets/plugins/treeview/treeview-rtl.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الصلاحيات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ أضف صلاحية</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card box-shadow-0">
                <div class="card-header">
                    @include('dashboard.messages_alert')
                    <h4 class="card-title mb-1 text-center">أدخل صلاحية جديده</h4>
                </div>
                <div class="card-body pt-0">
                    <form action="{{ route('dashboard.roles.store') }}" method="POST">
                        @csrf

                        {{-- Success Message --}}
                        <div id="successMessage" class="alert alert-success d-none" role="alert">
                            تم أضافة الصلاحية بنجاح <a href="{{ route('dashboard.roles.index') }}" class="alert-link">أضغط هنا لمشاهدة الأضافة</a>
                        </div>

                        <div class="row">
                            {{-- Name Input --}}
                            <div class="form-group col-6">
                                <label for="name">أسم الصلاحية</label>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                                <div id="name-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>
                        <div class="row">
                            <ul id="tree1">
                                <li><a href="#">أضف صلاحية</a>
                                    <ul>
                                        <li>
                                    @foreach($permission as $permissions)
                                        <label>
                                            <input type="checkbox" name="permission[]" value="{{ $permissions->id }}" class="name">
                                            {{ $permissions->name }}</label>
                                        <br />
                                    @endforeach
                                        </li>
                                    </ul>
                                </li>
                        </div>



                        {{-- Submit Buttons --}}
                        <div class="row row-xs wd-xl-80p my-3">
                            <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
                                <button type="submit" class="btn btn-success btn-with-icon btn-block">
                                    <i class="typcn typcn-edit"></i> تأكيد البيانات
                                </button>
                            </div>
                            <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
                                <a href="{{ route('dashboard.roles.index') }}" class="btn btn-info btn-with-icon btn-block">
                                    <i class="typcn typcn-arrow-back-outline"></i> رجوع
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('dashboard/assets/plugins/treeview/treeview.js')}}"></script>

@endsection
