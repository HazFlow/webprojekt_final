@extends('layouts.template')
@section('title','My Watchlist')
@section('content')

	<section class="section section-lg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="display-3">
					<span id="search-title">My Watchlist</span>
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
	        	@forelse($watchlists as $watchlist)
	        		<?php $series = \DB::table('series')->where('id',$watchlist->serie_id)->first(); if ($series->total_raters != 0) {
									$total = $series->total_stars / $series->total_raters;
									$total = round($total,2);
								} else
									$total = 0;
							?>
		          	<div class="col-lg-4" style="margin-bottom: 30px;">
						<div class="card bg-neutral shadow border-0">
			              <img src="{{ asset('uploads/thumbnail/'.$series->thumbnail) }}" class="card-img-top" id="sere-img">
			              <blockquote class="card-blockquote">
							<div id="sere-desc">
				                <h5>
				                	{{ $series->title }}
				                	<small style="float: right;">
				                		({{ $total }} <i class="fa fa-star" style="color: #FFC100;"></i>)
				                	</small>
				                </h5>
				                <?php $text = substr($series->description, 0, 100); ?>
				                <small>{{ $text }}...</small><br><br>
			              	</div>
			                <div class="row">
			                	<div class="col-md-6">
			                		<a href="{{ url('/series',$series->series_slug) }}" title="Read More">READ MORE ></a>
			                	</div>
			                	<div class="col-md-6">
			                		<form action="{{ url('/user/watchlist',$series->id) }}" method="POST" onsubmit="return loadingBtn(this)">
									@csrf
									@method('DELETE')
									<input type="hidden" name="series_id" value="{{ $series->id }}">
									<div id="loading-btn">
										<button type="form" class="btn btn-sm btn-default" style="float: right; background-color: #fff; border-color: #fff; color: #000"><i class="fa fa-times"></i> Remove</button>
									</div>
								</form>
			                	</div>
			                </div>
			              </blockquote>
			            </div>
		          	</div>
		        @empty
		        	<div class="col-lg-12">
		        		<p class="text-center">
		        			Watchlist is empty.
		        		</p>
		        	</div>
	          	@endforelse
	        </div><br>
	        <div class="row">
	        	<div class="col-md-12">
					@if($watchlists)
						<hr>
						{{ $watchlists->links() }}
					@endif
	        	</div>
	        </div>
	      </div>
	    </section>
	</div>

@endsection