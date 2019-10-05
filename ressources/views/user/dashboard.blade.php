@extends('layouts.template')
@section('title','Dashboard')
@section('content')

	<section class="section section-lg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="display-3">
					<span id="search-title">My Dashboard</span>
					</h2>
					<hr>
				</div>
			</div>
		</div>
	</section>
	<div id="search-result">
		<section class="section section-lg" style="padding: 5px; margin-top: -90px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						@if(session('success'))
							<div class="alert alert-success">{{ session('success') }}</div>
						@endif
					</div>
				</div>
				<div class="row">
					<div class="col-md-5">
						<div class="card bg-gradient-secondary shadow">
			              	<div class="card-body">
			              		<h3>{{ $user->name }}</h3>
			              		<hr>
			              		<table>
			              			<thead>
			              				<tr>
			              					<th>Username: </th>
			              					<td>{{ $user->username }}</td>
			              				</tr>
			              				<tr>
			              					<th>Email: </th>
			              					<td>{{ $user->email }}</td>
			              				</tr>
			              				<tr>
			              					<th>Password: </th>
			              					<td>{{ $user->my_password }}</td>
			              				</tr>
			              				<tr>
			              					<th>Joined: </th>
			              					<td>
			              						<?php $date = \Carbon\Carbon::make($user->created_at); ?>
			              						{{ $date->toFormattedDateString() }}
			              					</td>
			              				</tr>
			              			</thead>
			              		</table>
			              	</div>
				        </div>
				    </div>
					<div class="col-md-7">
						<div class="card bg-gradient-secondary shadow">
			              	<div class="card-body">
			              		<h3>Update Profile</h3>
			              		<hr>
			              		<form action="{{ route('user.profile') }}" method="POST" onsubmit="return loadingBtn(this)">
			              			@csrf
				              		<div class="form-group">
				              			<label for="">Name</label>
				              			<small> *</small>
				              			<input type="text" name="name" class="form-control" required value="{{ $user->name }}">
				              		</div>
				              		<div class="form-group">
				              			<label for="">Username</label>
				              			<small> *</small>
				              			<input type="text" name="username" class="form-control" required value="{{ $user->username }}">
				              		</div>
				              		<div class="form-group">
				              			<label for="">Email</label>
				              			<small> *</small>
				              			<input type="email" name="email" class="form-control" required value="{{ $user->email }}">
				              		</div>
				              		<div class="form-group">
				              			<label for="">Password</label>
				              			<small> *</small>
				              			<input type="text" name="password" class="form-control" required value="{{ $user->my_password }}">
				              		</div>
				              		<div class="form-group">
				              			<div id="loading-btn">
					              			<button type="submit" class="btn btn-md btn-success">Update Profile</button>
					              		</div>
				              		</div>
				              	</form>
			              	</div>
				        </div>
				    </div>
				</div>
			</div>
		</section>
	</div>

@endsection