@extends('layouts.admin-dashboard')
@section('title','Genre')
@section('content')

	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					@if(session('success'))
						<div class="alert alert-success">{{ session('success') }}</div>
					@endif
					<div class="card">
						<div class="header">
							<h4 class="title">
								All Genres
								<a href="{{ route('genre.create') }}" class="btn" style="float: right;">Add Genre</a>
							</h4><br>
						</div>
						<div class="content table-responsive table-full-width">
							<table class="table">
								<thead>
									<tr><th>S.No</th>
									<th>Title</th>
									<th>Details</th>
									<th>Edit</th>
								</tr></thead>
								<tbody>
									<?php $sno = 1; ?>
									@forelse($genres as $obj)
										<tr>
											<td>{{ $sno++ }}</td>
											<td>{{ $obj->genre_title }}</td>
											<td>
												<a href="{{ url('/admin/genre/'.$obj->id) }}" class="btn">View</a>
											</td>
											<td>
												<a href="{{ url('/admin/genre/'.$obj->id.'/edit') }}" class="btn">Edit</a>
											</td>
										</tr>
									@empty
										<tr>
											<td colspan="6" class="text-center">No record found.</td>
										</tr>
									@endforelse
								</tbody>
								<tfoot>
									<tr>
										<td colspan="4">
											@if($genres)
											{{ $genres->links() }}
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