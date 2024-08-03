@extends('dashboard.layouts.master')
@section('title', 'الموظفين')
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('dashboard/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('dashboard/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('dashboard/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">الموظفين</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ جدول
                    الموظفين</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">جدول الموظفين</h4>
                        @can('أضافة موظف')
                            <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20">
                                <a class="btn btn-outline-primary btn-block" href="{{ route('dashboard.employees.create') }}">
                                    <i class="fas fa-plus-square"></i>
                                    أضافة موظف
                                </a>
                            </div>
                        @endcan
                    </div>

                </div>
                {{-- Success Message --}}
                <div id="successMessage" class="col-10 alert alert-solid-success d-none my-2 mb-2 mx-auto" role="alert">
                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                        <span aria-hidden="true">×</span></button>
                    <strong>Well done!</strong> تم حذف الموظف بنجاح
                </div>



                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">الصورة</th>
                                    <th class="border-bottom-0">أسم الموظف</th>
                                    <th class="border-bottom-0">الهاتف</th>
                                    <th class="border-bottom-0">تاريخ التعيين</th>
                                    <th class="border-bottom-0">سنوات الخدمه</th>
                                    <th class="border-bottom-0">الدرجه</th>
                                    <th class="border-bottom-0">المحافظة</th>
                                    <th class="border-bottom-0">الراحة الاسبوعية</th>
                                    <th class="border-bottom-0">العمليات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td class="text-center">
                                            @if ($employee->image)
                                                <img class="img-thumbnail rounded me-2" alt="200x200"
                                                    style="width: 50px; height:50px"
                                                    src="{{ asset('dashboard/assets/images/uploads/employees/' . $employee->image->filename) }}"
                                                    data-holder-rendered="true">
                                            @else
                                                <img class="img-thumbnail rounded me-2" alt="200x200"
                                                    style="width: 50px; height:50px"
                                                    src="{{ asset('dashboard/assets/img/employees-default.png') }}"
                                                    data-holder-rendered="true">
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('dashboard.employees.show',$employee->id) }}">{{ $employee->name }}</a>

                                        </td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->hiring_date }}</td>
                                        <td>{{ $employee->years_service }}</td>
                                        <td>{{ $employee->jobgrade->name }}</td>
                                        <td>{{ $employee->address->city }}</td>
                                        <td>
                                            @foreach ($employee->employeeAppointments as $appointment)
                                                {{ $appointment->name }}
                                            @endforeach


                                        </td>
                                        <td>
                                            @can('عرض الموظفين')
                                                {{-- Show --}}
                                                <a class="btn btn-outline-primary btn-sm"
                                                    href="{{ route('dashboard.employees.show', $employee->id) }}"><i
                                                        class="fas fa-eye"></i></a>
                                            @endcan
                                            @can('تعديل الموظف')
                                                {{-- Edit --}}
                                                <a class="btn btn-outline-info btn-sm"
                                                    href="{{ route('dashboard.employees.edit', $employee->id) }}"><i
                                                        class="fas fa-edit"></i></a>
                                            @endcan
                                            @can('حذف الموظف')
                                                {{-- Delete --}}
                                                <a class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                                    data-toggle="modal" href="#delete{{ $employee->id }}">
                                                    <i class="fas fa-trash-alt"></i></a>
                                            @endcan
                                        </td>
                                        @include('dashboard.employees.delete')
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')


    <!-- Internal Data tables -->
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('dashboard/assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('dashboard/assets/js/table-data.js') }}"></script>
@endsection
