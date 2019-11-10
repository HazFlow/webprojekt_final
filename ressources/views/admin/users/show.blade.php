@extends('layouts.admin-dashboard')
@section('title','User Details')
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">User Details</h4><br><hr>
					</div>
					<div class="content">
						<div class="row">
							<div class="col-md-12">
								<table class="table">
									<thead>
										<tr>
											<th>Name:</th>
											<td>{{ $user->name }}</td>
										</tr>
										<tr>
											<th>Username:</th>
											<td>{{ $user->username }}</td>
										</tr>
										<tr>
											<th>Email:</th>
											<td>{{ $user->email }}</td>
										</tr>
										<tr>
											<th>Joined:</th>
											<td>
												<?php $date = \Carbon\Carbon::make($user->created_at) ?>
												{{ $date->toFormattedDateString() }}
											</td>
										</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection