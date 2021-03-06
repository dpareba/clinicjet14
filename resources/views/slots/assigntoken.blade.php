@extends('layouts.master')
@section('title')
| Assign Token
@stop
@section('pageheading')
Assign Token		
@stop
@section('subpageheading')
Assign Token to Patients
@stop
@section('content')
<div class="row">
	<div class="col-md-12">
		<!-- Widget: user widget style 1 -->
		<div class="box box-widget widget-user-2">
			<!-- Add the bg color to the header using any of the bg-* classes -->
			<div class="widget-user-header bg-primary">
				<div class="widget-user-image">
					<img class="img-circle" src="/avatar/docs/default.jpg" alt="User Avatar">
				</div>
				<!-- /.widget-user-image -->
				<h3 class="widget-user-username">{{$patient->name}} {{$patient->midname}} {{$patient->surname}}</h3>
				<h5 class="widget-user-desc"><span class="badge bg-gray">Created On: {{$patient->created_at->format('D, d F Y')}}</span> {{-- | <span class="badge bg-gray">Created By: DR. {{$user->name}}</span> --}} | 
					@if ($patient->isapproxage)
					<span class="badge bg-gray">Approximate Patient Age: {{$patient->approxage}} Years</span>
					@else
					@if ($patient->dob != "1900-01-01 00:00:00")
					<span class="badge bg-gray">Patient Age: {{$patient->dob->diff(Carbon::now())->format('%y Years, %m Months and %d Days')}}</span>
					@else
					<span class="badge bg-gray">Patient Age: Date of Birth Not Provided</span>
					@endif 
					@endif
					
					{{-- @if ($patient->dob != "1900-01-01 00:00:00")
					<span class="badge bg-gray">Patient Age: {{$patient->dob->diff(Carbon::now())->format('%y Years, %m Months and %d Days')}}</span>
					@else
					<span class="badge bg-gray">Patient Age: Date of Birth Not Provided</span>
					@endif --}} </h5>
				</div>
			</div>
			<!-- /.widget-user -->
			<h2 class="page-header">Assign Token</h2>
		</div>
	</div>
	{{-- .row --}}
	
	<div class="row">
		<div class="col-md-12">
			<div class="box box-solid box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Assign Token</h3>
					<div class="box-tools pull-right">

					</div>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<form action="" method="POST">
						{{csrf_field()}}
						<div class="row">
							<div class="col-md-4 col-xs-12">
								<div class="form-group {{ $errors->has('user')?'has-error':''}}">
									<label class="control-label" for="user">Select Doctor</label>
									<select style="text-align: center;" required="" name="user" id="user" class="form-control">
										<option value="" selected=""></option>
										@foreach ($users as $u)
										<option value="{{$u->id}}" >{{$u->name}}</option>
										@endforeach
									</select>

									<span class="help-block">{{$errors->first('user')}}</span>
								</div>
							</div>

							<div class="col-md-4 col-xs-12">
								<div class="form-group">
									<label>Date:</label>

									<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										<input type="text" class="form-control pull-right" id="datepicker">
									</div>
									<!-- /.input group -->
								</div>
							</div>
						</div>
						{{-- .row --}}
						<div class="row">

						</div>
						{{-- .row --}}
					</form>
				</div>
				{{-- .box-body --}}
			</div>
			{{-- .box --}}
		</div>
	</div>
	
	
	{{-- .row --}}
	@endsection

	@section('scripts')
	<script>
		$(function(){
				//Date picker
				$('#datepicker').datepicker({
					autoclose: true,
					format: "dd/mm/yyyy",
					startDate: new Date(),
					todayHighlight: true

				});
			});
		</script>
		@endsection