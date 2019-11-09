@extends('layouts.admin-dashboard')
@section('title','Update Genre')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Update Genre</h4><br><hr>
					</div>
					<div class="content">
						<form action="{{ url('/admin/genre',$genre->id) }}" method="POST" onsubmit="return loadingBtn(this)">
							@csrf
							@method('PUT')
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Title</label>
										<small> *</small>
										<input type="text" name="genre_title" class="form-control border-input" value="{{ $genre->genre_title }}" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Description</label>
										<textarea name="genre_description" class="form-control border-input">{{ $genre->genre_description }}</textarea>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="loading-btn">
										<button type="submit" class="btn">Update Genre</button>
									</div>
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