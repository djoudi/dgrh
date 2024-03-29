@include('dgrh.layouts.header')
@include('dgrh.layouts.aside')

<div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="javascript:;">وزارة الداخلية والجماعات المحلية والتهيئة العمرانية
</a>   -
<span>المديرية العامة للموارد البشريو والتكوين والقوانين الأساسية</span>    
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link text-bold text-dark" href="{{ url('/logout') }}">
                <i class="material-icons text-danger">exit_to_app</i> تسجيل الخروج
              </a>
            </li>
            <!-- your navbar here -->
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="content">
      <div class="container-fluid">
       @yield('content')
      </div>
    </div>
    @include('dgrh.layouts.footer')
