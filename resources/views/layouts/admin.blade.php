<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @section('css')
    @show
  </head>
  <body >
    <div id="app">
      <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container-fluid">
          <a class="navbar-brand col-md-4" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" class="img-fluid col-md-4" alt="popsmart">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
              @else
                <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                    </form>
                  </div>
                </li>
              @endguest
            </ul>
          </div>
        </div>
      </nav>
      <div class="main-content">
      <div class="row">
        <div class="col-1">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-page-tab" data-toggle="pill" href="#v-pills-page" role="tab" aria-controls="v-pills-page" aria-selected="true">页面</a>
            <a class="nav-link" id="v-pills-product-tab" data-toggle="pill" href="#v-pills-product" role="tab" aria-controls="v-pills-product" aria-selected="false">产品</a>
            <a class="nav-link" id="v-pills-case-tab" data-toggle="pill" href="#v-pills-case" role="tab" aria-controls="v-pills-case" aria-selected="false">案例</a>
            <a class="nav-link" id="v-pills-recruit-tab" data-toggle="pill" href="#v-pills-recruit" role="tab" aria-controls="v-pills-recruit" aria-selected="false">招聘</a>
            <a class="nav-link" id="v-pills-user-tab" data-toggle="pill" href="#v-pills-user" role="tab" aria-controls="v-pills-user" aria-selected="false">用户</a>
            <a class="nav-link" id="v-pills-setting-tab" data-toggle="pill" href="#v-pills-setting" role="tab" aria-controls="v-pills-setting" aria-selected="false">配置</a>
            <a class="nav-link" id="v-pills-trash-tab" data-toggle="pill" href="#v-pills-trash" role="tab" aria-controls="v-pills-trash" aria-selected="false">回收站</a>
          </div>
        </div>
        <div class="col-11">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-page" role="tabpanel" aria-labelledby="v-pills-page-tab">页面</div>
            <div class="tab-pane fade" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab">产品</div>
            <div class="tab-pane fade" id="v-pills-case" role="tabpanel" aria-labelledby="v-pills-case-tab">案例</div>
            <div class="tab-pane fade" id="v-pills-recruit" role="tabpanel" aria-labelledby="v-pills-recruit-tab">招聘</div>
            <div class="tab-pane fade" id="v-pills-user" role="tabpanel" aria-labelledby="v-pills-user-tab">用户</div>
            <div class="tab-pane fade" id="v-pills-setting" role="tabpanel" aria-labelledby="v-pills-setting-tab">配置</div>
            <div class="tab-pane fade" id="v-pills-trash" role="tabpanel" aria-labelledby="v-pills-trash-tab">回收站</div>
          </div>
        </div>
      </div>
    </div>
      </div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Large Modal</h4>
            </div>
            <div class="modal-body">
                This is a dashboard layout for Bootstrap 4. This is an example of the Modal component which you can use to show content. Any content can be placed inside the modal and it can use the Bootstrap grid classes.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary-outline" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>
</div>
    <!--scripts loaded here-->
    
{{--     
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js"></script>
    
    <script src="js/scripts.js"></script> --}}

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
  </body>
</html>