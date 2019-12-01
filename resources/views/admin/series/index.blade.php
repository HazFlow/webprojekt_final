@extends('layouts.admin-dashboard')
@section('title','Series')
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
								All Series
								<a href="{{ route('series.create') }}" class="btn" style="float: right;">Add Series</a>
							</h4><br>
						</div>
						<div class="content table-responsive table-full-width">
							<table class="table">
								<thead>
									<tr><th>S.No</th>
									<th>Title</th>
									<th>Duration</th>
									<th>Stars</th>
									<th>Date</th>
									<th>Details</th>
								</tr></thead>
								<tbody>
									<?php $sno = 1; ?>
									@forelse($series as $obj)
										<tr>
											<td>{{ $sno++ }}</td>
											<td>{{ $obj->title }}</td>
											<td>{{ $obj->duration }}</td>
											<td>{{ $obj->total_stars }}</td>
											<td>
												<?php $date = \Carbon\Carbon::make($obj->created_at); ?>
												{{ $date->toFormattedDateString() }}
											</td>
											<td>
												<a href="{{ url('/admin/series',$obj->series_slug) }}" class="btn">View</a>
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
										<td colspan="6">
											@if($series)
											{{ $series->links() }}
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