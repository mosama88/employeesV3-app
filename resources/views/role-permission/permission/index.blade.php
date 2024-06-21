@extends('dashboard.layouts.master')
@section('title', 'الأذونات')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الأذونات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ جدول الأذونات</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('dashboard.messages_alert')
    <div class="container mt-5">
        <a href="{{ url('roles') }}" class="btn btn-primary mx-1">الصلاحيات</a>
        <a href="{{ url('permissions') }}" class="btn btn-info mx-1">الأذونات</a>
        <a href="{{ url('users') }}" class="btn btn-warning mx-1">المستخدمين</a>
    </div>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                <div class="card mt-3">
                    <div class="card-header">
                        <h4>الأذونات
                            @can('create permission')
                                <a href="{{ url('permissions/create') }}" class="btn btn-primary float-end">أضافة أذونات جديده</a>
                            @endcan
                        </h4>
                    </div>
                    <div class="card-body">

                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الأسم</th>
                                <th width="40%">العمليات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->id }}</td>
                                    <td>{{ $permission->name }}</td>
                                    <td>
                                        @can('update permission')
                                            <a href="{{ url('permissions/'.$permission->id.'/edit') }}" class="btn btn-success">تعديل</a>
                                        @endcan

                                        @can('delete permission')
                                            <a href="{{ url('permissions/'.$permission->id.'/delete') }}" class="btn btn-danger mx-2">حذف</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


    @endsection

    @section('js')
        <!-- Internal Data tables -->
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/jszip.min.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
        <!--Internal  Datatable js -->
        <script src="{{URL::asset('dashboard/assets/js/table-data.js')}}"></script>
@endsection
