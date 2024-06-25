@extends('dashboard.layouts.master')
@section('title', 'طلب أجازه')
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
                <h4 class="content-title mb-0 my-auto">الأجازات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ طلب أجازه</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('dashboard.messages_alert')

    <div class="row row-sm">
        <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12">
            <div class="card  box-shadow-0 ">
                <div class="card-header">
                    <h4 class="card-title mb-1 text-center">طلب أجازه</h4>
                </div>
                <div class="card-body pt-0">
                    <form id="vacationForm" action="{{ route('dashboard.vacations.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <!-- Success Message -->
                        <div id="successMessage" class="alert alert-success d-none" role="alert">
                            تم أضافة أجازة الموظف بنجاح <a href="{{ route('dashboard.vacations.index') }}"
                                class="alert-link">أضغط هنا لمشاهدة الأضافة</a>
                        </div>

                        <div class="row">
                            {{-- Employee Input --}}
                            <div class="form-group col-6">
                                <label for="employeeSelect">أختر الموظف</label>
                                <select name="employee_id" id="employeeSelect"
                                    class="form-control select2 @error('employee_id') is-invalid @enderror">
                                    <option disabled selected>افتح قائمة التحديد</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                                <div id="employee_id-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            {{-- Type Of Vacation Input --}}
                            <div class="form-group col-6" id="type_field">
                                <label for="typeSelect">نوع الأجازه</label>
                                <select name="type" id="typeSelect"
                                    class="form-control select2 @error('type') is-invalid @enderror">
                                    <option value="" selected disabled> -- افتح قائمة التحديد --</option>
                                    <option value="satisfying">مرضى</option>
                                    <option value="emergency">عارضه</option>
                                    <option value="regular">إعتيادى</option>
                                    <option value="Annual">سنوى</option>
                                    <option value="mission">مأمورية</option>
                                </select>
                                <div id="type-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Internal And External Input --}}
                            <div class="form-group col-6" id="int_ext_field">
                                <label for="intExtSelect">داخلية / خارجيه</label>
                                <select name="int_ext" id="intExtSelect"
                                    class="form-control select @error('int_ext') is-invalid @enderror">
                                    <option disabled selected>افتح قائمة التحديد</option>
                                    <option value="internal">نيابات</option>
                                    <option value="external">جهه خارجيه</option>
                                </select>
                                <div id="int_ext-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            {{-- Department Input --}}
                            <div class="form-group col-6" id="department_field">
                                <label for="departmentSelect">النيابات</label>
                                <select name="department_id" id="departmentSelect" class="form-control select">
                                    <option disabled selected>افتح قائمة التحديد</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->branch }}</option>
                                    @endforeach
                                </select>
                                <div id="department_id-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Acting Employee Input --}}
                            <div class="form-group col-6" id="acting_employee_field">
                                <label for="actingEmployeeSelect">القائم بأعماله</label>
                                <select name="acting_employee_id" id="actingEmployeeSelect"
                                    class="form-control select @error('acting_employee_id') is-invalid @enderror">
                                    <option disabled selected>افتح قائمة التحديد</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                                <div id="acting_employee_id-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Start Input --}}
                            <div class="form-group col-6">
                                <label for="startInput">من يوم</label>
                                <input name="start" id="startInput"
                                    class="form-control @error('start') is-invalid @enderror" type="date">
                                <div id="start-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                            <div class="form-group col-6">
                                <label for="toInput">إلى يوم</label>
                                <input name="to" id="toInput"
                                    class="form-control @error('to') is-invalid @enderror" type="date">
                                <div id="to-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>

                        <div class="row">
                            {{-- Notes Input --}}
                            <div class="form-group col-12">
                                <label for="notesTextarea">ملاحظات</label>
                                <textarea name="notes" id="notesTextarea" class="form-control" placeholder="أدخل ملاحظاتك" rows="3"></textarea>
                                <div id="notes-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>


                        <div class="row">
                            {{-- Image Inputs --}}
                            <div class="form-group col-12">
                                <label for="example-text-input" class="col-form-label">المرفقات</label>
                                <p class="text-danger">* صيغة المرفق docx, doc, pdf, png, jpg, jpeg </p>

                                <input type="file" name="photo" class="dropify" data-default-file="{{URL::asset('dashboard/assets/img/photos/1.jpg')}}" data-height="200"  />
                                <div id="photo-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>



                        {{-- Submit --}}
                        <div class="row row-xs wd-xl-80p">
                            <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
                                <button type="submit" class="btn btn-success btn-with-icon btn-block">
                                    <i class="typcn typcn-edit"></i> تأكيد البيانات
                                </button>
                            </div>
                            <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0">
                                <a href="{{ route('dashboard.vacations.index') }}"
                                    class="btn btn-info btn-with-icon btn-block">
                                    <i class="typcn typcn-arrow-back-outline"></i> رجوع
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection



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

                <script src="{{ URL::asset('dashboard/assets/js/projects/add-vacation.js') }}"></script>



@endsection
