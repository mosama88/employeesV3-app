@extends('dashboard.layouts.master')
@section('title', 'تعديل بيانات مستخدم')
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
                <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل بيانات مستخدم</span>
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
                    {{--                    @include('dashboard.messages_alert')--}}
                    <h4 class="card-title mb-1 text-center">تعديل الصلاحيات <span class="text-danger">{{$role->name}}</span></h4>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <div class="card-body pt-0">

                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('dashboard.roles.index') }}"> رجوع</a>
                    </div>



    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.roles.update', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>أسم الصلاحية:</strong>
                    <input type="text" value="{{ $role->name }}" name="name" class="form-control"
                           placeholder="Name" readonly>
                </div>
            </div>
            <div class="col-xs-12 mb-3 mx-5">
                <div class="form-group">
                    <strong>الصلاحيات:</strong>
                    <br />
                    @foreach ($permission as $value)
                        <label>
                            <input type="checkbox" @if (in_array($value->id, $rolePermissions)) checked @endif name="permission[]"
                                   value="{{ $value->id }}" class="name">
                            {{ $value->name }}</label>
                        <br />
                    @endforeach
                </div>
            </div>

        </div>
        <div class="col-xs-12 mb-3 text-center">
            <button type="submit" class="btn btn-primary">تأكيد البيانات</button>
        </div>
    </form>

                </div>
            </div>
        </div>


    </div>
    </div>
@endsection

@section('scripts')
    @section('js')
        <script src="{{asset('dashboard/assets/plugins/treeview/treeview.js')}}"></script>

    @endsection

