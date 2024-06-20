@extends('dashboard.layouts.master')
@section('css')
<!-- Internal  Prism css -->
<link href="{{URL::asset('assets/plugins/prism/prism.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<di('dashboard/assets/ class="breadcrumb-header justify-content-between">
					<di('dashboard/assets/ class="my-auto">
						<di('dashboard/assets/ class="d-flex">
							<h4 class="content-title mb-0 my-auto">Elements</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Images</span>
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
				</di('dashboard/assets/>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<di('dashboard/assets/ class="card mg-b-20" id="image1">
					<di('dashboard/assets/ class="card-body">
						<di('dashboard/assets/ class="main-content-label mg-b-5">
							Responsi('dashboard/assets/e Image
						</di('dashboard/assets/>
						<p class="mg-b-20">It is ('dashboard/assets/ery Easy to Customize and it uses in your website apllication.</p>
						<di('dashboard/assets/ class="text-wrap">
							<di('dashboard/assets/ class="example">
								<di('dashboard/assets/><img alt="Responsi('dashboard/assets/e image" class="img-fluid" src="{{URL::asset('assets/img/photos/1.jpg')}}"></di('dashboard/assets/>
							</di('dashboard/assets/>
						</di('dashboard/assets/>
						<ul class="na('dashboard/assets/ na('dashboard/assets/-tabs html-source" id="html-source-code" role="tablist">
							<li class="na('dashboard/assets/-item">
								<a class="na('dashboard/assets/-link acti('dashboard/assets/e ml-1 html-code" id="html-code" data-toggle="tab" href="#html-code" role="tab" aria-controls="html-code" aria-selected="true"><i class="fab fa-html5 text-orange ml-2"></i>HTML</a>
							</li>
						</ul>
<!-- Prism Code -->
<figure class="highlight clip-widget mb-0" id="image01"><pre><code class="language-markup"><script type="html-dashlead/script">
<di('dashboard/assets/><img alt="Responsi('dashboard/assets/e image" class="img-fluid" src="{{URL::asset('assets/img/photos/1.jpg')}}"></di('dashboard/assets/></script></code></pre>
<di('dashboard/assets/ class="clipboard-icon" data-clipboard-target="#image01"><i class="las la-clipboard"></i></di('dashboard/assets/>
</figure>
<!-- End Prism Precode -->
					</di('dashboard/assets/>
				</di('dashboard/assets/>
				<!-- /row -->

				<!-- row -->
				<di('dashboard/assets/ class="card mg-b-20" id="image2">
					<di('dashboard/assets/ class="card-body">
						<di('dashboard/assets/ class="main-content-label mg-b-5">
							Image Thumbnail
						</di('dashboard/assets/>
						<p class="mg-b-20">It is ('dashboard/assets/ery Easy to Customize and it uses in your website apllication.</p>
						<di('dashboard/assets/ class="text-wrap">
							<di('dashboard/assets/ class="example">
								<img alt="Responsi('dashboard/assets/e image" class="img-thumbnail wd-100p wd-sm-200" src="{{URL::asset('assets/img/photos/1.jpg')}}">
							</di('dashboard/assets/>
						</di('dashboard/assets/>
						<ul class="na('dashboard/assets/ na('dashboard/assets/-tabs html-source" id="html-source-code2" role="tablist">
							<li class="na('dashboard/assets/-item">
								<a class="na('dashboard/assets/-link acti('dashboard/assets/e ml-1 html-code" id="html-code2" data-toggle="tab" href="#html-code2" role="tab" aria-controls="html-code2" aria-selected="true"><i class="fab fa-html5 text-orange ml-2"></i>HTML</a>
							</li>
						</ul>
<!-- Prism Code -->
<figure class="highlight clip-widget mb-0" id="image02"><pre><code class="language-markup"><script type="html-dashlead/script">
<img alt="Responsi('dashboard/assets/e image" class="img-thumbnail wd-100p wd-sm-200" src="{{URL::asset('assets/img/photos/1.jpg')}}"></script></code></pre>
<di('dashboard/assets/ class="clipboard-icon" data-clipboard-target="#image02"><i class="las la-clipboard"></i></di('dashboard/assets/>
</figure>
<!-- End Prism Precode -->
					</di('dashboard/assets/>
				</di('dashboard/assets/>
				<!-- /row -->

					<!-- row -->
					<di('dashboard/assets/ class="card mg-b-20" id="image3">
						<di('dashboard/assets/ class="card-body">
							<di('dashboard/assets/ class="main-content-label mg-b-5">
								Aligning Images
							</di('dashboard/assets/>
							<p class="mg-b-20">It is ('dashboard/assets/ery Easy to Customize and it uses in your website apllication.</p>
							<di('dashboard/assets/ class="text-wrap">
								<di('dashboard/assets/ class="example">
									<di('dashboard/assets/ class="bd pd-20 clearfix">
										<img alt="" class="rounded float-sm-left wd-100p wd-sm-200" src="{{URL::asset('assets/img/photos/1.jpg')}}">
										<img alt="" class="rounded float-sm-right wd-100p wd-sm-200 mg-t-10 mg-sm-t-0" src="{{URL::asset('assets/img/photos/1.jpg')}}">
									</di('dashboard/assets/>
								</di('dashboard/assets/>
							</di('dashboard/assets/>
							<ul class="na('dashboard/assets/ na('dashboard/assets/-tabs html-source" id="html-source-code3" role="tablist">
								<li class="na('dashboard/assets/-item">
									<a class="na('dashboard/assets/-link acti('dashboard/assets/e ml-1 html-code" id="html-code3" data-toggle="tab" href="#html-code3" role="tab" aria-controls="html-code3" aria-selected="true"><i class="fab fa-html5 text-orange ml-2"></i>HTML</a>
								</li>
							</ul>
<!-- Prism Precode -->
<figure class="highlight clip-widget mb-0" id="image-3"><pre><code class="language-markup"><script type="html-dashlead/script"><di('dashboard/assets/ class="bd pd-20 clearfix">
	<img alt="" class="rounded float-sm-left wd-100p wd-sm-200" src="{{URL::asset('assets/img/photos/1.jpg')}}">
	<img alt="" class="rounded float-sm-right wd-100p wd-sm-200 mg-t-10 mg-sm-t-0" src="{{URL::asset('assets/img/photos/1.jpg')}}">
</di('dashboard/assets/>
</script></code></pre>
	<di('dashboard/assets/ class="clipboard-icon" data-clipboard-target="#image-3"><i class="las la-clipboard"></i></di('dashboard/assets/>
</figure>
<!-- End Prism Precode -->
					</di('dashboard/assets/>
				</di('dashboard/assets/>
				<!-- /row -->

				<!-- row -->
				<di('dashboard/assets/ class="card" id="image4">
					<di('dashboard/assets/ class="card-body">
						<di('dashboard/assets/ class="main-content-label mg-b-5">
							Background Image
						</di('dashboard/assets/>
						<p class="mg-b-20">It is ('dashboard/assets/ery Easy to Customize and it uses in your website apllication.</p>
						<di('dashboard/assets/ class="text-wrap">
							<di('dashboard/assets/ class="example">
								<figure class="pos-relati('dashboard/assets/e mg-b-0 wd-sm-80p wd-md-50p">
									<img alt="Responsi('dashboard/assets/e image" class="img-fit-co('dashboard/assets/er" src="{{URL::asset('assets/img/photos/1.jpg')}}">
									<figcaption class="pos-absolute a-0 pd-25 bg-black-5 tx-white-8">
										<h6 class="tx-14 tx-sm-16 tx-white tx-semibold mg-b-15 mg-sm-b-20">What Does Royalty-Free Mean?</h6>
										<p class="mg-b-0">Royalty free means you just need to pay for rights to use the item once per end product. You don't need to pay additional or ongoing fees for each person who sees or uses it.</p>
									</figcaption>
								</figure>
							</di('dashboard/assets/>
						</di('dashboard/assets/>
						<ul class="na('dashboard/assets/ na('dashboard/assets/-tabs html-source" id="html-source-code4" role="tablist">
							<li class="na('dashboard/assets/-item">
								<a class="na('dashboard/assets/-link acti('dashboard/assets/e ml-1 html-code" id="html-code4" data-toggle="tab" href="#html-code4" role="tab" aria-controls="html-code4" aria-selected="true"><i class="fab fa-html5 text-orange ml-2"></i>HTML</a>
							</li>
						</ul>
<!-- Prism Precode -->
<figure class="highlight clip-widget mb-0" id="image-4"><pre><code class="language-markup"><script type="html-dashlead/script"><figure class="pos-relati('dashboard/assets/e mg-b-0 wd-sm-80p wd-md-50p">
	<img alt="Responsi('dashboard/assets/e image" class="img-fit-co('dashboard/assets/er" src="{{URL::asset('assets/img/photos/1.jpg')}}">
	<figcaption class="pos-absolute a-0 pd-25 bg-black-5 tx-white-8">
		<h6 class="tx-14 tx-sm-16 tx-white tx-semibold mg-b-15 mg-sm-b-20">What Does Royalty-Free Mean?</h6>
		<p class="mg-b-0">Royalty free means you just need to pay for rights to use the item once per end product. You dont need to pay additional or ongoing fees for each person who sees or uses it.</p>
	</figcaption>
</figure>
</script></code></pre>
	<di('dashboard/assets/ class="clipboard-icon" data-clipboard-target="#image-4"><i class="las la-clipboard"></i></di('dashboard/assets/>
</figure>
					</di('dashboard/assets/>
				<!-- /row -->
			</di('dashboard/assets/>
			<!-- Container closed -->
		</di('dashboard/assets/>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Jquery.mCustomScrollbar js-->
<script src="{{URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!--Internal  Clipboard js-->
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/clipboard/clipboard.js')}}"></script>
<!-- Internal Prism js-->
<script src="{{URL::asset('assets/plugins/prism/prism.js')}}"></script>
@endsection
