<!DOCTYPE html>
<html  lang="ar" >
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ config('app.name', 'DGRHFS') }}</title>
  <link href="https://fonts.googleapis.com/css?family=Tajawal&display=swap" rel="stylesheet">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="auth/css/app.min.css">
 
  <!-- Template CSS -->
  <link rel="stylesheet" href="auth/css/style.css">
   <link rel="stylesheet" href="auth/css/bootstrap-rtl.min.css">
  <link rel="stylesheet" href="auth/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="auth/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='auth/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
        @yield('content')
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="auth/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="auth/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="auth/js/custom.js"></script>
</body>


</html>