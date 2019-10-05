<!DOCTYPE html>
<html>
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link href="{{ asset('assets/img/icon.png') }}" rel="icon" type="image/png">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/argon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/loading.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/loading-btn.css') }}" rel="stylesheet">
    <style>
        .spinner {
            margin: 100px auto 0;
            width: 70px;
            text-align: center;
        }

        .spinner > div {
            width: 18px;
            height: 18px;
            background-color: #333;

            border-radius: 100%;
            display: inline-block;
            -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
            animation: sk-bouncedelay 1.4s infinite ease-in-out both;
        }

        .spinner .bounce1 {
            -webkit-animation-delay: -0.32s;
            animation-delay: -0.32s;
        }

        .spinner .bounce2 {
            -webkit-animation-delay: -0.16s;
            animation-delay: -0.16s;
        }

        @-webkit-keyframes sk-bouncedelay {
            0%, 80%, 100% {
                -webkit-transform: scale(0)
            }
            40% {
                -webkit-transform: scale(1.0)
            }
        }

        @keyframes sk-bouncedelay {
            0%, 80%, 100% {
                -webkit-transform: scale(0);
                transform: scale(0);
            }
            40% {
                -webkit-transform: scale(1.0);
                transform: scale(1.0);
            }
        }
    </style>
  </head>
  <body>
    <header class="header-global">
      <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom" style="background-color: #222222;">
        <div class="container">
          <a class="navbar-brand mr-lg-5" href="{{ url('/') }}">
            <img src="{{ asset('assets/img/logo.png') }}">           
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse collapse" id="navbar_global">
            <div class="navbar-collapse-header">
              <div class="row">
                <div class="col-6 collapse-brand">
                  <a href="{{ url('/') }}">
                    <img src="{{ asset('assets/img/logo.png') }}">
                  </a>
                </div>
                <div class="col-6 collapse-close">
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                  <span></span>
                  <span></span>
                  </button>
                </div>
              </div>
            </div>
            <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/') }}">
                  Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('/all-series') }}">
                  Series
                </a>
              </li>
              <li class="nav-item">
                <div class="form-group mb-0" style="margin-left: 50px;">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Series name..." id="fieldSearch" type="text" style="width: 400px; padding-left: 10px;">
                  </div>
                </div>
              </li>
            </ul>
            <ul class="navbar-nav align-items-lg-center ml-lg-auto">
              @auth
                @if(Auth::user()->user_type == 'Admin')
                  <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                      Dashboard
                    </a>
                  </li>
                @else
                  <li class="nav-item dropdown">
                  <a href="#" class="nav-link" data-toggle="dropdown" role="button">
                    <i class="ni ni-collection d-lg-none"></i>
                    <span class="nav-link-inner--text">My Account</span>
                  </a>
                  <div class="dropdown-menu">
                    <a href="{{ route('user.dashboard') }}" class="dropdown-item">Dashboard</a>
                    <a href="{{ url('/user/watchlist') }}" class="dropdown-item">Watchlist</a>
                    <a href="{{ route('user.logout') }}" class="dropdown-item">Logout</a>
                  </div>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user.logout') }}">
                      <span class="nav-link">Logout</span>
                    </a>
                  </li>
                @endif
              @else
              <li class="nav-item">
                <a href="{{ route('login.account') }}">
                  <span class="nav-link" style="border: 1px solid #fff;">Login</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('create.account') }}">
                  <span class="nav-link" style="border: 1px solid #fff;">Create Account</span>
                </a>
              </li>
              @endauth
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <main><br>
      @yield('content')
      <!-- Modal -->
      <div class="modal fade" id="modal-review" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
          <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Review Series</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="py-3 text-center">
                <form action="{{ url('/user/review') }}" method="POST">
                  @csrf
                  <input type="hidden" name="stars" id="stars" value="">
                  <input type="hidden" name="series_id" id="series_id" value="">
                <div class="form-group">
                  <a class="btn btn-lg" style="background-color: #f1e09be6;"
                  onclick="reviewStars(1)" id="review-stars-1">
                  <i class="fa fa-star"></i>
                  </a>
                  <a class="btn btn-lg" style="background-color: #f1e09be6;"
                  onclick="reviewStars(2)" id="review-stars-2">
                  <i class="fa fa-star"></i>
                  </a>
                  <a class="btn btn-lg" style="background-color: #f1e09be6;"
                  onclick="reviewStars(3)" id="review-stars-3">
                  <i class="fa fa-star"></i>
                  </a>
                  <a class="btn btn-lg" style="background-color: #f1e09be6;"
                  onclick="reviewStars(4)" id="review-stars-4">
                  <i class="fa fa-star"></i>
                  </a>
                  <a class="btn btn-lg" style="background-color: #f1e09be6;"
                  onclick="reviewStars(5)" id="review-stars-5">
                  <i class="fa fa-star"></i>
                  </a>
                </div>
                <div class="form-group">
                  <textarea name="review" id="review" required class="form-control" rows="4" placeholder="Write here . . ."></textarea>                  
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn" style="background-color: #F1D292; color: #000;">Review</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <footer class="footer has-cards">
      <div class="container">
        <input type="hidden" id="input-url" value="{{ URL::to('/search-input') }}">
        <input type="hidden" id="rating-url" value="{{ URL::to('/search-rating') }}">
        <input type="hidden" id="name-url" value="{{ URL::to('/search-name') }}">
        <input type="hidden" id="genre-url" value="{{ URL::to('/search-genre') }}">
        <input type="hidden" id="date-url" value="{{ URL::to('/search-date') }}">
      </div>
    </footer>
    <!-- Core -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/headroom.min.js') }}"></script>
    <script>
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
    </script>
        <script>
        function loadingBtn() {
        document.getElementById('loading-btn').innerHTML = '<button class="btn ld-ext-right running" disabled>Loading <div class="ld ld-ring ld-spin"></div></button>';
        return true;
        }
        </script>
    <script src="{{ asset('assets/js/argon.js') }}"></script>
  </body>
</html>