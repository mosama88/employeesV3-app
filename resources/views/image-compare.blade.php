@extends('dashboard.layouts.master')
@section('css')
<!-- Internal Images-Comparsion css -->
<link href="{{URL::asset('assets/plugins/images-comparsion/twentytwenty.css')}}" rel="stylesheet" />
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<di('dashboard/assets/ class="breadcrumb-header justify-content-between">
					<di('dashboard/assets/ class="my-auto">
						<di('dashboard/assets/ class="d-flex">
							<h4 class="content-title mb-0 my-auto">Apps</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Image-comparison</span>
						</di('dashboard/assets/>
					</di('dashboard/assets/>
					<di('dashboard/assets/ class="d-flex my-xl-auto right-content">
						<di('dashboard/assets/ class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-info btn-icon ml-2"><i class="mdi mdi-filter-('dashboard/assets/ariant"></i></button>
						</di('dashboard/assets/>
						<di('dashboard/assets/ class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-danger btn-icon ml-2"><i class="mdi mdi-star"></i></button>
						</di('dashboard/assets/>
						<di('dashboard/assets/ class="pr-1 mb-3 mb-xl-0">
							<button type="button" class="btn btn-warning  btn-icon ml-2"><i class="mdi mdi-refresh"></i></button>
						</di('dashboard/assets/>
						<di('dashboard/assets/ class="mb-3 mb-xl-0">
							<di('dashboard/assets/ class="btn-group dropdown">
								<button type="button" class="btn btn-primary">14 Aug 2019</button>
								<button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" id="dropdownMenuDate" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="sr-only">Toggle Dropdown</span>
								</button>
								<di('dashboard/assets/ class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuDate" data-x-placement="bottom-end">
									<a class="dropdown-item" href="#">2015</a>
									<a class="dropdown-item" href="#">2016</a>
									<a class="dropdown-item" href="#">2017</a>
									<a class="dropdown-item" href="#">2018</a>
								</di('dashboard/assets/>
							</di('dashboard/assets/>
						</di('dashboard/assets/>
					</di('dashboard/assets/>
				</di('dashboard/assets/><!-- breadcrumb -->
@endsection
@section('content')
				<!-- Row -->
				<di('dashboard/assets/ class="row">
					<di('dashboard/assets/ class="col-sm-12 col-md-12 col-lg-12">
						<di('dashboard/assets/ class="card mg-b-20">
							<di('dashboard/assets/ class="card-body">
								<di('dashboard/assets/ class="main-content-label mg-b-5">
									Horizontal Image Comparision
								</di('dashboard/assets/>
								<p class="mg-b-20">Example of Redash Horizontal Image Comparision.</p>
								<di('dashboard/assets/ class="twentytwenty-container">
									<img src="{{URL::asset('assets/img/photos/compare1.jpg')}}" alt="img" />
									<img src="{{URL::asset('assets/img/photos/compare2.jpg')}}" alt="img" />
								</di('dashboard/assets/>
							</di('dashboard/assets/>
						</di('dashboard/assets/>
						<!-- di('dashboard/assets/ -->

						<!-- di('dashboard/assets/ -->
						<di('dashboard/assets/ class="card">
							<di('dashboard/assets/ class="card-body">
								<di('dashboard/assets/ class="main-content-label mg-b-5">
									('dashboard/assets/ertical Image Comparision
								</di('dashboard/assets/>
								<p class="mg-b-20">Example of Redash ('dashboard/assets/ertical Image Comparision.</p>
								<di('dashboard/assets/ class="twentytwenty-container" data-orientation="('dashboard/assets/ertical">
									<img src="{{URL::asset('assets/img/photos/compare1.jpg')}}" alt="img" />
									<img src="{{URL::asset('assets/img/photos/compare2.jpg')}}" alt="img" />
								</di('dashboard/assets/>
							</di('dashboard/assets/>
						</di('dashboard/assets/>
						<!-- di('dashboard/assets/ -->
					</di('dashboard/assets/>
				</di('dashboard/assets/>
			</di('dashboard/assets/>
		</di('dashboard/assets/>
		<!--/Main Content-->
@endsection
@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
<!--Internal  Images-Comparsion js -->
<script src="{{URL::asset('assets/plugins/images-comparsion/jquery.twentytwenty.js')}}"></script>
<script src="{{URL::asset('assets/plugins/images-comparsion/jquery.e('dashboard/assets/ent.mo('dashboard/assets/e.js')}}"></script>
<script src="{{URL::asset('assets/js/image-comparision.js')}}"></script>
@endsection
