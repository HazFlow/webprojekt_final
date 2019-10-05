@extends('layouts.template')
@section('title',$series->title)
@section('content')

	<section class="section section-lg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="display-3">
					<span id="search-title">{{ $series->title }}</span>
					</h2>
					<hr>
				</div>
			</div>
		</div>
	</section>
	<div id="search-result">
		<?php
			if ($series->total_raters != 0) {
				$total = $series->total_stars / $series->total_raters;
				$total = round($total,2);
			} else
				$total = 0;
			$added = \DB::table('watchlists')->where('serie_id', $series->id)->where('user_id', Auth::id())->first();
		?>
		<section class="section section-lg" style="margin-top: -90px;">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<center>
						<img src="{{ asset('uploads/thumbnail/'.$series->thumbnail) }}" alt="{{ $series->title }}" style="height: 480px; width: 850px;">
						<div class="card bg-neutral shadow border-0">
							<blockquote class="card-blockquote">
								<h3>
								{{ $series->title }}
								<small>({{ $total }} <i class="fa fa-star" style="color: #FFC100;"></i>)</small>
								</h3>
								@if($added)
								<form action="{{ url('/user/watchlist',$series->id) }}" method="POST" onsubmit="return loadingBtn(this)">
									@csrf
									@method('DELETE')
									<input type="hidden" name="series_id" value="{{ $series->id }}">
									<div id="loading-btn">
										<button type="form" class="btn btn-md btn-default" style="float: right; background-color: #808098; border-color: #808098;"><i class="fa fa-music"></i> Added</button>
									</div>
								</form>
								@else
								<form action="{{ url('/user/watchlist') }}" method="POST" onsubmit="return loadingBtn(this)">
									@csrf
									<input type="hidden" name="series_id" value="{{ $series->id }}">
									<div id="loading-btn">
										<button type="form" class="btn btn-md btn-default" style="float: right; background-color: #808098; border-color: #808098;">+ Watchlist</button>
									</div>
								</form>
								@endif
								<?php $reviewed = \DB::table('reviews')->where('serie_id', $series->id)->where('user_id', Auth::id())->first(); ?>
								@if($reviewed)
								<button type="button" class="btn btn-md btn-default" style="float: right; background-color: #808098; border-color: #808098; margin-right: 5px;">
								<i class="fa fa-star"></i> {{ $reviewed->stars }}
								</button>
								@else
								<button type="button" class="btn btn-md btn-default" style="float: right; background-color: #808098; border-color: #808098; margin-right: 5px;" data-toggle="modal" data-target="#modal-review" onclick="seriesId('{{ $series->id }}')">Review</button>
								@endif
							</blockquote>
						</div>
						</center>
					</div>
				</div>
			</div>
		</section>
		<section class="section section-lg" style="margin-top: -100px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="display-3 text-center">{{ $series->title }}</h2><br>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<table class="table">
							<thead>
								<tr>
									<th>Genre</th>
									<td>{{ $series->genre->genre_title }}</td>
								</tr>
								<tr>
									<th>Title</th>
									<td>{{ $series->title }}</td>
								</tr>
								<tr>
									<th>Description</th>
									<td>{{ $series->description }}</td>
								</tr>
								<tr>
									<th>Duration</th>
									<td>{{ $series->duration }}</td>
								</tr>
								<tr>
									<th>Provider</th>
									<td>{{ $series->provider }}</td>
								</tr>
								<tr>
									<th>Stars</th>
									<td>{{ $series->total_stars }} <i class="fa fa-star" style="color: #FFC100;"></i></td>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</section>
		<section class="section section-lg" style="margin-top: -100px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<h2 class="display-3">
						Reviews
						</h2>
						<hr>
					</div>
				</div>
				<div class="row">
					@foreach($series->reviews()->orderBy('created_at','desc')->limit(4)->get() as $review)
					<div class="col-lg-4">
						<div class="card bg-neutral shadow border-0">
							<blockquote class="card-blockquote">
								<div id="rev-sere">
									<h5>{{ $review->user->name }}</h5>
									<small>{{ $review->review }}</small><br><br>
								</div>
								<div class="row">
									<div class="col-md-6">
										<small>
										<?php $date = \Carbon\Carbon::make($review->created_at); ?>
										{{ $date->toFormattedDateString() }}
										</small>
									</div>
									<div class="col-md-6">
										<div style="float: right;">
											<i class="fa fa-star" style="color: #FFC100;"></i> {{ $review->stars }}
										</div>
									</div>
								</div>
							</blockquote>
						</div>
					</div>
					@endforeach
				</div><br>
				@if($series->reviews()->count() > 0)
					<div class="row">
						<div class="col-md-5">
							<hr>
						</div>
						<div class="col-md-2 text-center">
							<h5><a href="{{ url('/reviews',$series->series_slug) }}" style="color: #7E7E99;">All Reviews</a></h5>
						</div>
						<div class="col-md-5">
							<hr>
						</div>
					</div>
				@else
					<p class="text-center">No review found.</p>
				@endif
			</div>
		</section>
	</div>

@endsection