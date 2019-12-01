@extends('layouts.admin-dashboard')
@section('title','Users')
@section('content')

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="header">
							<h4 class="title">Users</h4>
						</div>
						<div class="content table-responsive table-full-width">
							<table class="table">
								<thead>
									<tr>
										<th>S.No</th>
										<th>Name</th>
										<th>Username</th>
										<th>Email</th>
										<th>Details</th>
									</tr>
								</thead>
								<tbody>
									<?php $sno = 1; ?>
									@forelse($users as $user)
										<tr>
											<td>{{ $sno++ }}</td>
											<td>{{ $user->name }}</td>
											<td>{{ $user->username }}</td>
											<td>{{ $user->email }}</td>
											<td>
												<a href="{{ url('/admin/users',$user->id) }}" title="View" class="btn">
													View
												</a>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="5" class="text-center">No record found.</td>
										</tr>
									@endforelse
								</tbody>
								<tfoot>
									<tr>
										<td colspan="5">
											@if($users)
											{{ $users->links() }}
											@endif
										</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection