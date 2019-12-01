@extends('layouts.admin-dashboard')
@section('title','Series')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">
							{{ $series->title }} - Series
							<form action="{{ url('/admin/series/'.$series->id) }}" method="POST" onsubmit="return loadingBtn(this)">
								@csrf
								@method('DELETE')
								<div id="loading-btn">
									<button type="submit" class="btn" style="float: right;">Delete</button>
								</div>
							</form>
							<a href="{{ url('/admin/series/'.$series->series_slug.'/edit') }}" class="btn" style="float: right;">Edit</a>
						</h4>
						<br><hr>
					</div>
					<div class="content">
						<div class="row">
							<div class="col-md-12">
								<table class="table">
									<thead>
										<tr>
											<th>Genre:</th>
											<td>{{ $series->genre->genre_title }}</td>
										</tr>
										<tr>
											<th>Title:</th>
											<td>{{ $series->title }}</td>
										</tr>
										<tr>
											<th>Description:</th>
											<td>{{ $series->description }}</td>
										</tr>
										<tr>
											<th>Duration:</th>
											<td>{{ $series->duration }}</td>
										</tr>
										<tr>
											<th>Provider:</th>
											<td>{{ $series->provider }}</td>
										</tr>
										<tr>
											<th>Rating:</th>
											<td></td>
										</tr>
										<tr>
											<th>Thumbnail:</th>
											<td>
												<img src="{{ asset('uploads/thumbnail/'.$series->thumbnail) }}" alt="Thumbnail" width="300px" height="200px">
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