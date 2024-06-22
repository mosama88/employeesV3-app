@extends('dashboard.layouts.master')
@section('title', 'عرض أجازات الموظف')
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
                <h4 class="content-title mb-0 my-auto">
                    عرض أجازات
                    @php
                        $employeeNames = $vacations
                            ->flatMap(function ($vacation) {
                                return $vacation->vacationEmployee->pluck('name');
                            })
                            ->unique()
                            ->implode(', ');
                    @endphp
                    {{ $employeeNames }}
                </h4>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('dashboard.messages_alert')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between my-4">
                        @php
                            if ($type == 'satisfying') {
                                echo 'مرضى';
                            } elseif ($type == 'emergency') {
                                echo 'عارضه';
                            } elseif ($type == 'regular') {
                                echo 'إعتيادى';
                            } elseif ($type == 'Annual') {
                                echo 'سنوى';
                            } elseif ($type == 'mission') {
                                echo 'مأمورية';
                            }
                        @endphp
                        @if ($type)
                            <h4 class="main-content-label mg-b-5">{{ $type }}</h4>
                        @else
                            @php
                                $employeeNames = $vacations
                                    ->flatMap(function ($vacation) {
                                        return $vacation->vacationEmployee->pluck('name');
                                    })
                                    ->unique()
                                    ->implode(', ');
                            @endphp
                            <h4 class="main-content-label mg-b-5">{{ $employeeNames }}</h4>
                        @endif
                    </div>


                    <div class="table-responsive">
                        <table id="vacationTable" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">أسم الموظف</th>
                                    <th class="border-bottom-0">نوع الأجازه</th>
                                    <th class="border-bottom-0">من</th>
                                    <th class="border-bottom-0">إلى</th>
                                    <th class="border-bottom-0">عدد الايام</th>
                                    <th class="border-bottom-0">ملاحظات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($vacations) == 0)
                                    <tr>
                                        <td colspan="9" class="text-center">لا توجد بيانات فى عملية البحث</td>
                                    </tr>
                                @else
                                    @foreach ($vacations as $vacation)
                                        <tr id="vacationRow{{ $loop->iteration }}">
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>
                                                @foreach ($vacation->vacationEmployee as $employee)
                                                    {{ $employee->name }}
                                                @endforeach
                                            </td>
                                            <td>{{ $vacation->typeVaction() }}</td>
                                            <td>{{ $vacation->start }}</td>
                                            <td>{{ $vacation->to }}</td>
                                            <td>{{ $vacation->calculateTotalDaysExcludingFridays() }}</td>
                                            <td>{{ $vacation->notes }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
    </div>
    </div><!-- bd -->
    </div>
    </div>

    <div class="main-navbar-backdrop"></div>

@endsection
@section('js')
@endsection
