<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Sleek Dashboard - Free Bootstrap 4 Admin Dashboard Template and UI Kit. It is very powerful bootstrap admin dashboard, which allows you to build products like admin panels, content management systems and CRMs etc.">
  
    <title >
      @yield('judul')</title>
      <link rel="icon" href="{{asset('assets/img/favicon.ico')}}" />
      
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />
  
    <!-- PLUGINS CSS STYLE -->
    <link href="{{asset('assets/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/nprogress/nprogress.css')}}" rel="stylesheet" />
  
    <!-- No Extra plugin used -->
    <link href='{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css')}}' rel='stylesheet'>
    <link href='{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}' rel='stylesheet'>
    
    
    <link href='{{asset('assets/plugins/toastr/toastr.min.css')}}' rel='stylesheet'>
    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{asset('assets/css/sleek.css')}}" />
  
    <!-- FAVICON -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="shortcut icon" />
  
    <!--
      HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries
    -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{asset('assets/plugins/nprogress/nprogress.js')}}"></script>

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- Properti Pribadi --}}
    <link id="sleek-css" rel="stylesheet" href="{{asset('assets/css/additional.css')}}" />
  </head>

  <body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">
    <script>
      NProgress.configure({ showSpinner: false });
      NProgress.start();
    </script>

    <div id="toaster"></div>

    <!-- ====================================
    ——— WRAPPER
    ===================================== -->
    <div class="wrapper">

      <!-- Github Link -->
      <a href="https://github.com/tafcoder/sleek-dashboard"  target="_blank" class="github-link">
        <svg width="70" height="70" viewBox="0 0 250 250" aria-hidden="true">
          <defs>
            <linearGradient id="grad1" x1="0%" y1="75%" x2="100%" y2="0%">
              <stop offset="0%" style="stop-color:#896def;stop-opacity:1" />
              <stop offset="100%" style="stop-color:#482271;stop-opacity:1" />
            </linearGradient>
          </defs>
          <path d="M 0,0 L115,115 L115,115 L142,142 L250,250 L250,0 Z" fill="url(#grad1)"></path>
        </svg>
        <i class="mdi mdi-github-circle"></i>
      </a>




        <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
          @include('admin.partials.side-bar')


          <!-- ====================================
        ——— PAGE WRAPPER
        ===================================== -->
        <div class="page-wrapper">

          @include('admin.partials.header')
         
          @yield('content')
              
          
        </div>

		  
			
		</div>

 

	

	
    
    
    <!-- Footer -->
    <footer class="footer mt-auto">
      <div class="copyright bg-white">
        <p>
          &copy; <span id="copy-year"></span> Copyright Sleek Dashboard Bootstrap Template by <a class="text-primary"
            href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
        </p>
      </div>
      <script>
        var d = new Date();
        var year = d.getFullYear();
        document.getElementById("copy-year").innerHTML = year;
      </script>
    </footer>

    </div> <!-- End Page Wrapper -->
  </div> <!-- End Wrapper -->


    <!-- <script type="module">
      import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';

      const el = document.createElement('pwa-update');
      document.body.appendChild(el);
    </script> -->

    <!-- Javascript -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/plugins/simplebar/simplebar.min.js')}}"></script>
    <script src='{{asset('assets/plugins/charts/Chart.min.js')}}'></script>
    <script src='{{asset('assets/js/chart.js')}}'></script>
    <script src='{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js')}}'></script>
    <script src='{{asset('assets/plugins/jvectormap/jquery-jvectormap-world-mill.js')}}'></script>
    <script src='{{asset('assets/js/vector-map.js')}}'></script>
    <script src='{{asset('assets/plugins/daterangepicker/moment.min.js')}}'></script>
    <script src='{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}'></script>
    <script src='{{asset('assets/js/date-range.js')}}'></script>
    <script src='{{asset('assets/plugins/toastr/toastr.min.js')}}'></script>
    <script src="{{asset('assets/js/sleek.js')}}"></script>
      <link href="{{asset('assets/options/optionswitch.css')}}" rel="stylesheet">
    <script src="{{asset('assets/options/optionswitcher.js')}}"></script>
</body>
</html>

