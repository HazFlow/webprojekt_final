@extends('layouts.template')
@section('title','Login')
@section('content')

	<section class="section section-lg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="display-3">
					<span id="search-title">Login</span>
					</h2>
					<hr>
				</div>
			</div>
		</div>
	</section>
	<div id="search-result">
		<section class="section section-lg" style="padding: 5px; margin-top: -90px;">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-5">
					    @if($errors->any())
					        <div class="card bg-secondary shadow border-0">
					            <div class="card-header bg-white">
					                <h4>Error</h4>
					            </div>
					            <div class="card-body ">
					                @foreach($errors->all() as $error)
					                    <li>{{ $error }}</li>
					                @endforeach
					            </div>
					        </div><br>
					    @endif
						<form action="{{ route('login') }}" method="POST" onsubmit="return loadingBtn(this)">
							@csrf
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-user"></i></span>
									</div>
									<input class="form-control" name="username" placeholder="Username" type="text" required>
								</div>
								@error('username')
									<span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
		                    </div>
							<div class="form-group mb-3">
								<div class="input-group input-group-alternative">
									<div class="input-group-prepend">
										<span class="input-group-text"><i class="fa fa-key"></i></span>
									</div>
									<input class="form-control" name="password" placeholder="Password" type="password" required>
								</div>
								@error('password')
									<span class="invalid-feedback" role="alert">
		                                <strong>{{ $message }}</strong>
		                            </span>
		                        @enderror
		                    </div>
		                    <div id="loading-btn">
		                    	<button type="submit" class="btn btn-md btn-default" style="background-color: #222222;">Login</button>
		                    </div>
						</form>
						<br><hr>
						<center>New to Series? <a href="{{ route('create.account') }}" title="Create Account">Create Account</a></center>
					</div>
				</div>
			</div>
		</section>
	</div>

@endsection