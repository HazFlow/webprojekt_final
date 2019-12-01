<section class="section section-lg" style="padding: 5px; margin-top: -90px;">
	<div class="container">
		<div class="row">
			@forelse($series as $series)
			<div class="col-lg-4" style="margin-bottom: 30px;">
				<div class="card bg-neutral shadow border-0">
					<img src="{{ asset('uploads/thumbnail/'.$series->thumbnail) }}" class="card-img-top" id="sere-img">
					<blockquote class="card-blockquote">
						<?php
							if ($series->total_raters != 0) {
								$total = $series->total_stars / $series->total_raters;
								$total = round($total,2);
							} else
								$total = 0;
						?>
						<div id="sere-desc">
							<h5>{{ $series->title }}</h5>
							<?php $text = substr($series->description, 0, 100); ?>
							<small>{{ $text }}...</small><br><br>
						</div>
						<div class="row">
							<div class="col-md-6">
								<a href="{{ url('/series',$series->series_slug) }}" title="Read More">READ MORE ></a>
							</div>
							<div class="col-md-6">
								<div style="float: right;">
									(<i class="fa fa-star" style="color: #FFC100;"></i> {{ $total }})
								</div>
							</div>
						</div>
					</blockquote>
				</div>
			</div>
			@empty
			<p class="text-center">No record found.</p>
			@endforelse
		</div>
	</div>
</section>