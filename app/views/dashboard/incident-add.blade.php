@extends('layout.dashboard')

@section('content')
	<div class="header">
		<i class="fa fa-dashboard"></i> {{ Lang::get('cachet.dashboard.incident-add') }}
	</div>
	<div class="row">
		<div class="col-md-12">
			<h3>Create an Incident</h3>

			@if($incident = Session::get('incident'))
			<div class='alert alert-{{ $incident->isValid() ? "success" : "danger" }}'>
				@if($incident->isValid())
				<strong>Awesome.</strong> Incident added.
				@else
				<strong>Whoops.</strong> Something went wrong with the incident.
				@endif
			</div>
			@endif

			{{ Form::open(['name' => 'IncidentForm', 'class' => 'form-vertical', 'role' => 'form']) }}
				<fieldset>
					<div class='form-group'>
						<label for='incident-name'>Incident Name</label>
						<input type='text' class='form-control' name='incident[name]' id='incident-name' required />
					</div>
					<div class='form-group'>
						<label for='incident-name'>Incident Status</label><br />
						<label class='radio-inline'>
							<input type='radio' name='incident[status]' value='1' /> {{ Lang::get('cachet.incident.status')[1] }}
						</label>
						<label class='radio-inline'>
							<input type='radio' name='incident[status]' value='2' /> {{ Lang::get('cachet.incident.status')[2] }}
						</label>
						<label class='radio-inline'>
							<input type='radio' name='incident[status]' value='3' /> {{ Lang::get('cachet.incident.status')[3] }}
						</label>
						<label class='radio-inline'>
							<input type='radio' name='incident[status]' value='4' /> {{ Lang::get('cachet.incident.status')[4] }}
						</label>
					</div>
					<div class='form-group'>
						<label>Message</label>
						<textarea name='incident[message]' class='form-control' rows='5'></textarea>
					</div>
				</fieldset>

				<input type='hidden' name='incident[user_id]' value='{{ Auth::user()->id }}' />
				<button type="submit" class="btn btn-primary">Submit</button>
			{{ Form::close() }}
		</div>
	</div>
@stop
