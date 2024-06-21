@extends('dashboard.layouts.master')
@section('title', 'أضافة مستخدم')
@section('css')

    <!-- Internal Select2 css -->
    <link href="{{URL::asset('dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{URL::asset('dashboard/assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{URL::asset('dashboard/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{URL::asset('dashboard/assets/plugins/sumoselect/sumoselect-rtl.css')}}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{URL::asset('dashboard/assets/plugins/telephoneinput/telephoneinput-rtl.css')}}">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المستخدمين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ أضافة مستخدم</span>
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
                    <h4 class="card-title mb-1 text-center">أدخل بيانات المستخدم</h4>
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
                    <form id="employeeForm" action="{{ route('dashboard.users.store') }}" method="POST">
                        @csrf

                        {{-- Success Message --}}
                        <div id="successMessage" class="alert alert-success d-none" role="alert">
                            تم أضافة بيانات المستخدم بنجاح <a href="{{ route('dashboard.users.index') }}" class="alert-link">أضغط هنا لمشاهدة الأضافة</a>
                        </div>

                        <div class="row">
                            {{-- Name Input --}}
                            <div class="form-group col-6">
                                <label for="name">أسم المستخدم</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="أدخل الأسم">
                                <div id="name-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            {{-- Email Input --}}
                            <div class="form-group col-6">
                                <label for="email">البريد الالكترونى</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email" placeholder="أدخل البريد الالكترونى">
                                <div id="email-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            {{-- Password Input --}}
                            <div class="form-group col-6">
                                <label for="password">كلمة المرور</label>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password" placeholder="أدخل كلمة المرور">
                                <div id="password-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            {{-- Confirmation Password Input --}}
                            <div class="form-group col-6">
                                <label for="confirm-password">تأكيد كلمة المرور</label>
                                <input type="password" name="confirm-password" value="{{ old('confirm-password') }}" class="form-control" id="confirm-password" placeholder="أدخل تأكيد كلمة المرور">
                                <div id="confirm-password-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            {{-- Roles Input --}}
                            <div class="form-group col-6">
                                <label for="roles">صلاحية المستخدم</label>
                                <select class="form-control multiple" multiple name="roles[]">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
                                <div id="roles-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            {{-- Status Input --}}
                            <div class="form-group col-6">
                                <label for="status">حالة المستخدم</label>
                                <select name="status" value="{{ old('status') }}" class="form-control select2">
                                    <option disabled selected>افتح قائمة التحديد</option>
                                    <option value="مفعل">مفعل</option>
                                    <option value="غير مفعل">غير مفعل</option>
                                </select>
                                <div id="status-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>

                        {{-- Submit Buttons --}}
                        <div class="row row-xs wd-xl-80p my-3">
                            <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
                                <button type="submit" class="btn btn-success btn-with-icon btn-block">
                                    <i class="typcn typcn-edit"></i> تأكيد البيانات
                                </button>
                            </div>
                            <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
                                <a href="{{ route('dashboard.users.index') }}" class="btn btn-info btn-with-icon btn-block">
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

@section('scripts')
    @section('js')
        <!--Internal  Datepicker js -->
        <script src="{{URL::asset('dashboard/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
        <!--Internal  jquery.maskedinput js -->
        <script src="{{URL::asset('dashboard/assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
        <!--Internal  spectrum-colorpicker js -->
        <script src="{{URL::asset('dashboard/assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
        <!-- Internal Select2.min js -->
        <script src="{{URL::asset('dashboard/assets/plugins/select2/js/select2.min.js')}}"></script>
        <!--Internal Ion.rangeSlider.min js -->
        <script src="{{URL::asset('dashboard/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
        <!--Internal  jquery-simple-datetimepicker js -->
        <script src="{{URL::asset('dashboard/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
        <!-- Ionicons js -->
        <script src="{{URL::asset('dashboard/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
        <!--Internal  pickerjs js -->
        <script src="{{URL::asset('dashboard/assets/plugins/pickerjs/picker.min.js')}}"></script>
        <!-- Internal form-elements js -->
        <script src="{{URL::asset('dashboard/assets/js/form-elements.js')}}"></script>

        <!--Internal Fileuploads js-->
        <script src="{{URL::asset('dashboard/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
        <!--Internal Fancy uploader js-->
        <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
        <!--Internal  Form-elements js-->
        <script src="{{URL::asset('dashboard/assets/js/advanced-form-elements.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/js/select2.js')}}"></script>
        <!--Internal Sumoselect js-->
        <script src="{{URL::asset('dashboard/assets/plugins/sumoselect/jquery.sumoselect.js')}}"></script>
        <!-- Internal TelephoneInput js-->
        <script src="{{URL::asset('dashboard/assets/plugins/telephoneinput/telephoneinput.js')}}"></script>
        <script src="{{URL::asset('dashboard/assets/plugins/telephoneinput/inttelephoneinput.js')}}"></script>

    <script src="{{ asset('dashboard/assets/js/projects/add-users.js') }}"></script>
@endsection
