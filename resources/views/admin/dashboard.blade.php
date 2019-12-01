@extends('layouts.admin-dashboard')
@section('title','Dashboard')
@section('content')
<div class="content">
	<div class="container-fluid">
		@if(session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
		@endif
		<div class="row">
			<div class="col-md-8">
				<div class="card">
					<div class="header">
						<h4 class="title">
							Series
							<span style="float: right;">{{ $series }}</span>
						</h4><br>
					</div>
				</div>
				<br>
				<div class="card">
					<div class="header">
						<h4 class="title">
							Users
							<span style="float: right;">{{ $users }}</span>
						</h4><br>
					</div>
				</div>
				<br>
				<div class="card">
					<div class="header">
						<h4 class="title">
							Reviews
							<span style="float: right;">{{ $reviews }}</span>
						</h4><br>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<div class="header">
						<h4 class="title">My Account</h4><br><hr>
					</div>
					<div class="content">
						<form action="{{ route('admin.profile') }}" method="POST" onsubmit="return loadingBtn(this)">
							@csrf
							<input type="hidden" name="admin_id" value="{{ $admin->id }}">
							<div class="form-group">
								<label>Name</label>
								<small> *</small>
								<input type="text" name="name" value="{{ $admin->name }}" class="form-control border-input" required>
							</div>
							<div class="form-group">
								<label>Username</label>
								<small> *</small>
								<input type="text" name="username" value="{{ $admin->username }}" class="form-control border-input" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<small> *</small>
								<input type="text" name="password" value="{{ $admin->my_password }}" class="form-control border-input" required>
							</div>
							<div class="form-group">
								<div id="loading-btn">
									<button type="submit" class="btn btn-block">Update Credentials</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection