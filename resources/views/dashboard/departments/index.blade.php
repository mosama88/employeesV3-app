@extends('dashboard.layouts.master')
@section('title', 'النيابات / الأدارات')
@section('css')
    <!---Internal Owl Carousel css-->
    <link href="{{URL::asset('dashboard/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{URL::asset('dashboard/assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{URL::asset('dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
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
                <h4 class="content-title mb-0 my-auto">النيابات / الأدارات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ جدول النيابات / الأدارات</span>
            </div>
        </div>
    </div>

    <!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">جدول النيابات / الأدارات</h4>

                    <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-super-scaled" data-toggle="modal" href="#modaldemo8">أضافة نيابة / أدارة</a>
                    </div>
                    @include('dashboard.departments.add')
                </div>

            </div>
            {{-- Success Message --}}
            <div id="successMessage" class="col-10 alert alert-solid-success d-none my-2 mb-2 mx-auto" role="alert">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">×</span></button>
                <strong>Well done!</strong> تم حذف النيابات / الأدارات بنجاح
            </div>



            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="example1">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الدرجه الوظيفية</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($departments as $department)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $department->branch }}</td>
                                <td>
                                    {{-- Edit --}}
                                    <a class="modal-effect btn btn-outline-info btn-sm" data-effect="effect-scale"
                                       data-toggle="modal" href="#edit{{ $department->id }}"><i
                                            class="fas fa-edit"></i></a>
                                    @include('dashboard.departments.edit')

                                    {{-- Delete --}}
                                    <a class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                       data-toggle="modal" href="#delete{{ $department->id }}">
                                        <i class="fas fa-trash-alt"></i></a>
                                </td>
                                @include('dashboard.departments.delete')
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- bd -->
            </div><!-- bd -->
        </div><!-- bd -->
    </div>


    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">

    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('dashboard/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Select2 js-->
    <script src="{{URL::asset('dashboard/assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Internal Modal js-->
    <script src="{{URL::asset('dashboard/assets/js/modal.js')}}"></script>

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

