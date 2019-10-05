@extends('layouts.admin-dashboard')
@section('title','Genre')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">
							Genre Details
							<a href="{{ url('/admin/genre/'.$genre->id.'/edit') }}" class="btn" style="float: right;">Edit</a>
						</h4>
						<br><hr>
					</div>
					<div class="content">
						<div class="row">
							<div class="col-md-12">
								<table class="table">
									<thead>
										<tr>
											<th>Genre</th>
											<td>{{ $genre->genre_title }}</td>
										</tr>
										<tr>
											<th>Description</th>
											<td>{{ $genre->genre_description }}</td>
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