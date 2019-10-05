@extends('layouts.template')
@section('title',$series->title)
@section('content')

		<?php
			if ($series->total_raters != 0) {
				$total = $series->total_stars / $series->total_raters;
				$total = round($total,2);
			} else
				$total = 0;
		?>
	<section class="section section-lg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="display-3">
					<span id="search-title">
						<a href="{{ url('/series',$series->series_slug) }}" style="color: #32325D;">{{ $series->title }}</a> - ({{ $total }} <i class="fa fa-star" style="color: #FFC100;"></i>)
					</span>
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
					@forelse($reviews as $review)
					<div class="col-lg-4" style="margin-bottom: 30px;">
						<div class="card bg-neutral shadow border-0">
							<blockquote class="card-blockquote">
								<div id="rev-sere">
									<h5>
										{{ $review->user->name }}
										<small style="float: right;">
											{{ $review->stars }} <i class="fa fa-star" style="color: #FFC100;"></i>
										</small>
									</h5>
									<small>{{ $review->review }}</small><br><br>
								</div><hr>
								<div class="row">
									<div class="col-md-12">
										<center>
											<button type="button" class="btn btn-sm text-center" data-toggle="modal" data-target="#modal-read" onclick="readMore('{{ $review->user->name }}','{{ $review->review }}','{{ $review->stars }}')">Read More</button>
										</center>
									</div>
								</div>
							</blockquote>
						</div>
					</div>
					@empty
						<div class="col-md-12">
							<p class="text-center">
								No reviews available.
							</p>
						</div>
					@endforelse
				</div><br>
				<div class="row">
					<div class="col-md-12"><hr>
						{{ $reviews->links() }}
					</div>
				</div>
			</div>
		</section>
		<!-- Modal -->
		<div class="modal fade" id="modal-read" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
			<div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
				<div class="modal-content bg-gradient-danger">
					<div class="modal-header">
						<h6 class="modal-title" id="modal-title-notification"></h6>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="py-3 text-center">
							<p id="review-desc"></p>
							<span><span id="review-stars"></span> <i class="fa fa-star" style="color: #FFC100;"></i></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection