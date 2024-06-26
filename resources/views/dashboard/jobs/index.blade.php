@extends('dashboard.layouts.master')
@section('title', 'المسمى الوظيفى')
@section('css')
    <!---Internal Owl Carousel css-->
    <link href="{{URL::asset('dashboard/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <!---Internal  Multislider css-->
    <link href="{{URL::asset('dashboard/assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
    <!--- Select2 css -->
    <link href="{{URL::asset('dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">المسمى الوظيفى</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ جدول الوظيفه</span>
            </div>
        </div>
    </div>

    <!--div-->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <h4 class="card-title mg-b-0">جدول الوظيفه</h4>
                    @can('أضافة المسمى الوظيفى')
                    <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20">
                        <a class="modal-effect btn btn-outline-primary btn-block" data-effect="effect-super-scaled" data-toggle="modal" href="#modaldemo8">أضافة وظيفه</a>
                    </div>
                    @include('dashboard.jobgrades.add')
                </div>
                @endcan
            </div>
            {{-- Success Message --}}
            <div id="successMessage" class="col-10 alert alert-solid-success d-none my-2 mb-2 mx-auto" role="alert">
                <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                    <span aria-hidden="true">×</span></button>
                <strong>Well done!</strong> تم حذف الوظيفه بنجاح
            </div>



            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped mg-b-0 text-md-nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>اسم الدرجه الوظيفية</th>
                            <th>العمليات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($jobs as $job)
                            <tr id="JobgradeRow{{ $job->id }}">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $job->name }}</td>
                                <td>
                                    @can('تعديل المسمى الوظيفى')
                                    {{-- Edit --}}
                                    <a class="modal-effect btn btn-outline-info btn-sm" data-effect="effect-scale"
                                       data-toggle="modal" href="#edit{{ $job->id }}"><i
                                            class="fas fa-edit"></i></a>
                                    @include('dashboard.jobs.edit')
                                    @endcan
                                        @can('حذف المسمى الوظيفى')
                                    {{-- Delete --}}
                                    <a class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale"
                                       data-toggle="modal" href="#delete{{ $job->id }}">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                        @endcan
                                    <!-- End Modal effects-->
                                    <div class="modal" id="delete{{ $job->id }}">
                                        <!-- Modal content -->
                                    </div>


                                </td>
                                @include('dashboard.jobs.delete')
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

    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();




        // Add
        function addJobGrade() {
            let form = document.getElementById('addJobGradeForm');
            let formData = new FormData(form);
            let actionUrl = "{{ route('dashboard.jobs.store') }}";

            fetch(actionUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Hide the add modal after successful addition
                        $('#modaldemo8').modal('hide');

                        // Reset the form
                        form.reset();

                        // Show the success message
                        let successMessage = $('#successMessage');
                        successMessage.text('تم أضافة المسمى الوظيفى بنجاح');
                        successMessage.removeClass('d-none');

                        // Reload the page after 3 seconds to show the new job grade
                        setTimeout(() => {
                            location.reload();
                        }, 2000); // Adjust the duration as needed
                    } else {
                        console.error('Error adding jobs: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while adding the jobs.');
                });
        }



        // Delete
        function deleteJobgrade(jobgradeId) {
            let form = document.getElementById('deleteJobgradeForm' + jobgradeId);
            let formData = new FormData(form);
            let actionUrl = "{{ route('dashboard.jobs.destroy', '') }}/" + jobgradeId;

            fetch(actionUrl, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                },
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Hide the delete modal after successful deletion
                        $('#delete' + jobgradeId).modal('hide');

                        // Remove the deleted holiday row from the table
                        $('#JobgradeRow' + jobgradeId).remove();

                        // Show the success message
                        let successMessage = $('#successMessage');
                        successMessage.removeClass('d-none');

                        // Hide the success message slowly after 3 seconds
                        setTimeout(() => {
                            successMessage.fadeOut('slow', function() {
                                successMessage.addClass('d-none')
                                    .show(); // Ensure it is hidden and reset for next time
                            });
                        }, 3000); // Adjust the duration as needed
                    } else {
                        console.error('Error deleting Jobs: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while deleting the Jobs.');
                });
        }
    </script>
@endsection

