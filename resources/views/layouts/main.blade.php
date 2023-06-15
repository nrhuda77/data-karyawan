<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>DATA</title>

  <!-- General CSS Files -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href={{asset("template/assets/modules/bootstrap/css/bootstrap.min.css")}}>
  <link rel="stylesheet" href={{asset("template/assets/modules/fontawesome/css/all.min.css")}}>
  <link rel="icon" type="image/x-icon" href={{asset("../log/assets/img/favicon/favicon.ico")}} />
  <!-- CSS Libraries -->
  <link rel="stylesheet" href={{asset("template/assets/modules/jqvmap/dist/jqvmap.min.css")}}>
  <link rel="stylesheet" href={{asset("template/assets/modules/summernote/summernote-bs4.css")}}>
  <link rel="stylesheet" href={{asset("template/assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css")}}>
  <link rel="stylesheet" href={{asset("template/assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css")}}>

  <!-- Template CSS -->
  <link rel="stylesheet" href={{asset("template/assets/css/style.css")}}>
  <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet"/>
  <link rel="stylesheet" href={{asset("template/assets/css/components.css")}}>
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      @include('layouts.navbar')
      <div class="main-sidebar sidebar-style-2">
    @include('layouts.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
       
          
           
           @yield('container')
          </div>
      

      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> 
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src={{asset("template/assets/modules/jquery.min.js")}}></script>
  <script src={{asset("template/assets/modules/popper.js")}}></script>
  <script src={{asset("template/assets/modules/tooltip.js")}}></script>
  <script src={{asset("template/assets/modules/bootstrap/js/bootstrap.min.js")}}></script>
  <script src={{asset("template/assets/modules/nicescroll/jquery.nicescroll.min.js")}}></script>
  <script src={{asset("template/assets/modules/moment.min.js")}}></script>
  <script src={{asset("template/assets/js/stisla.js")}}></script>
  
  <!-- JS Libraies -->
  <script src={{asset("template/assets/modules/jquery.sparkline.min.js")}}></script>
  <script src={{asset("template/assets/modules/chart.min.js")}}></script>
  <script src={{asset("template/assets/modules/owlcarousel2/dist/owl.carousel.min.js")}}></script>
  <script src={{asset("template/assets/modules/summernote/summernote-bs4.js")}}></script>
  <script src={{asset("template/assets/modules/chocolat/dist/js/jquery.chocolat.min.js")}}></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- Page Specific JS File -->
  <script src={{asset("template/assets/js/page/index.js")}}></script>
  
  <!-- Template JS File -->
  <script src={{asset("template/assets/js/scripts.js")}}></script>
  <script src={{asset("template/assets/js/custom.js")}}></script>

  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <!-- End custom js for this page-->
</body>
</html>