@extends('layouts.admin-dashboard')
@section('title','Create Series')
@section('content')

<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="header">
						<h4 class="title">Create Series</h4><br><hr>
					</div>
					<div class="content">
						<form action="{{ url('/admin/series') }}" method="POST" enctype="multipart/form-data" onsubmit="return loadingBtn(this)">
							@csrf
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Select Genre</label>
										<select name="genre_id" class="form-control border-input" required>
											<option value="">--Genre--</option>
											@foreach($genres as $genre)
												<option value="{{ $genre->id }}">{{ $genre->genre_title }}</option>
											@endforeach
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Title</label>
										<input type="text" class="form-control border-input" name="title" placeholder="Series Title" required>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Duration</label>
										<input type="text" class="form-control border-input" placeholder="Series Duration" name="duration" required>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Provider</label>
										<small> * i.e. Netflix.</small>
										<input type="text" name="provider" required class="form-control border-input" placeholder="Seriec Provider">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Description</label>
										<textarea class="form-control border-input" placeholder="Series Description . . ." name="description" required></textarea>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Select Thumbnail</label>
										<small> * 850x450 (Thumbnail size: 170px maximum).</small>
										<input type="file" name="thumbnail" required class="form-control border-input">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="loading-btn">
										<button type="submit" class="btn">Add Series</button>
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