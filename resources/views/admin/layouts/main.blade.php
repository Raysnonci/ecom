@include('admin.layouts.header')

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    @include('admin.layouts.sidebar')
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        @include('admin.layouts.topbar')
        <!-- Topbar -->

        <!-- Container Fluid-->
        @yield('content')
        <!---Container Fluid-->
      </div>
      <!-- Footer -->
      @include('admin.layouts.footer')
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  @include('admin.layouts.js')
  <x:notify-messages />
        @notifyJs
</body>

</html>