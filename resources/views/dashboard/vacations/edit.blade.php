@extends('dashboard.layouts.master')
@section('title', 'تعديل طلب أجازه')
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
                <h4 class="content-title mb-0 my-auto">الأجازات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تعديل طلب أجازه</span>
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
                    <h4 class="card-title mb-1 text-center">
                         <div class="d-flex justify-content-between">
                        <h4 class="card-title mx-auto mt-3"><span class="card-category" style="color: #0BA2E0">رقم الاجازه
                            {{ $vacation->name }}</span>
                        </h4>
                    </div></h4>
                </div>
                <div class="card-body pt-0">
                    {{--Photo--}}
                    <div class="row">
                        <div class="col-6">
                            @if ($vacation->image)
                                <img class="img-thumbnail rounded me-2 my-4" alt="200x200"
                                    style="width: 200px; height:200px"
                                    src="{{ asset('dashboard/assets/images/uploads/vacations/' . $vacation->image->filename) }}"
                                    data-holder-rendered="true">
                            @else
                                <img class="img-thumbnail rounded me-2 my-4" alt="200x200"
                                    style="width: 200px; height:200px"
                                    src="{{ asset('dashboard/assets/img/employees-default.png') }}"
                                    data-holder-rendered="true">
                            @endif
                        </div>
                    </div>
                    {{-- Form Edit Vacation --}}
                    <form id="vacationForm" action="{{ route('dashboard.vacations.update', $vacation->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div id="successMessage" class="alert alert-success d-none" role="alert">
                            تم تعديل الموظف بنجاح <a href="{{ route('dashboard.vacations.index') }}" class="alert-link">أضغط
                                هنا لمشاهدة التعديل</a>
                        </div>
                        <input type="hidden" name="id" value="{{ $vacation->id }}">



                        {{-- Employee Inputs --}}
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputaddress">أختر الموظف</label>
                                <select name="employee_id"
                                    class="form-control select2 @error('employee_id') is-invalid @enderror">
                                    <option disabled selected>افتح قائمة التحديد</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            {{ $vacation->vacationEmployee->contains($employee->id) ? 'selected' : '' }}>
                                            {{ $employee->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="employee_id-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            {{-- Type Of Vacation Inputs --}}
                            <div class="form-group col-6">
                                <label for="exampleInputaddress">نوع الأجازة</label>
                                <select name="type"
                                    class="form-control select @error('type') is-invalid @enderror"
                                    id="selectFormgrade">
                                    <option disabled selected>افتح قائمة التحديد</option>
                                    <option value="satisfying"{{ $vacation->type === 'satisfying' ? 'selected' : '' }}>مرضى
                                    </option>
                                    <option value="emergency"{{ $vacation->type === 'emergency' ? 'selected' : '' }}>عارضة
                                    </option>
                                    <option value="regular"{{ $vacation->type === 'regular' ? 'selected' : '' }}>إعتيادى
                                    </option>
                                    <option value="Annual"{{ $vacation->type === 'Annual' ? 'selected' : '' }}>سنوى
                                    </option>
                                    <option value="mission"{{ $vacation->type === 'mission' ? 'selected' : '' }}>مأمورية
                                    </option>
                                </select>
                                @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div id="type-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>

                        {{-- Internal & External Inputs --}}
                        <div class="row">
                            <div class="form-group col-6" id="int_ext_field">
                                <label for="intExtSelect">داخلية / خارجية</label>
                                <select name="int_ext" id="intExtSelect"
                                    class="form-control select @error('int_ext') is-invalid @enderror">
                                    <option disabled selected>افتح قائمة التحديد</option>
                                    <option value="internal" {{ $vacation->int_ext === 'internal' ? 'selected' : '' }}>
                                        داخلية</option>
                                    <option value="external" {{ $vacation->int_ext === 'external' ? 'selected' : '' }}>
                                        خارجية</option>
                                </select>
                                <div id="int_ext-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            {{-- Department Inputs --}}
                            <div class="form-group col-6" id="department_field">
                                <label for="departmentSelect">النيابات</label>
                                <select name="department_id" id="departmentSelect"
                                    class="form-control select @error('department_id') is-invalid @enderror">
                                    <option disabled selected>افتح قائمة التحديد</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ $vacation->department_id === $department->id ? 'selected' : '' }}>
                                            {{ $department->branch }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="department_id-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                        </div>

                        {{-- Acting Employee Inputs --}}
                        <div class="row">
                            <div class="form-group col-6" id="acting_employee_field">
                                <label for="actingEmployeeSelect">القائم بأعماله</label>
                                <select name="acting_employee_id" id="actingEmployeeSelect"
                                    class="form-control select @error('acting_employee_id') is-invalid @enderror">
                                    <option disabled selected>افتح قائمة التحديد</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}"
                                            {{ $vacation->acting_employee_id === $employee->id ? 'selected' : '' }}>
                                            {{ $employee->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="acting_employee_id-error" class="error-message alert alert-danger d-none"></div>
                            </div>
                        </div>

                        {{-- Start Inputs --}}
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputto">من يوم</label>
                                <input class="form-control" name="start" value="{{ $vacation->start }}"
                                    placeholder="MM/DD/YYYY" type="date">
                                <div id="start-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            {{-- To Inputs --}}
                            <div class="form-group col-6">
                                <label for="exampleInputto">إلى يوم</label>
                                <input id="toInput" class="form-control" name="to"
                                    value="{{ $vacation->to }}" placeholder="MM/DD/YYYY" type="date">
                                <div id="to-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                        </div>

                        <div class="row">

                            {{-- Status Inputs --}}
                            <div class="form-group col-6">
                                <label for="status" class="mt-1">حالة الإجازة</label>
                                <select name="status" id="status" class="form-control">
                                    @foreach (['pending' => 'معلق', 'approve' => 'موافق عليه', 'reject' => 'مرفوض'] as $value => $label)
                                        <option value="{{ $value }}"
                                            {{ $vacation->status == $value ? 'selected' : '' }}>{{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                                <div id="status-error" class="error-message alert alert-danger d-none"></div>
                            </div>

                            {{-- Notes Inputs --}}
                            <div class="form-group col-6">
                                <label for="examplenotes">ملاحظات</label>
                                <textarea class="form-control" id="examplenotes" name="notes" placeholder="أدخل ملاحظاتك" rows="3">{{ $vacation->notes }}</textarea>
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
                            <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><button type="submit"
                                    class="btn btn-success btn-with-icon btn-block"><i class="typcn typcn-edit"></i> تأكيد
                                    البيانات</button></div>
                            <div class="col-sm-6 col-md-3 mg-t-10 mg-md-t-0"><a
                                    href="{{ route('dashboard.vacations.index') }}" type="submit"
                                    class="btn btn-info btn-with-icon btn-block"><i
                                        class="typcn typcn-arrow-back-outline"></i> رجوع</a></div>
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

            <script src="{{ URL::asset('dashboard/assets/js/projects/edit-vacation.js') }}"></script>


    @endsection
