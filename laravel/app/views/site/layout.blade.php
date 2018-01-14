@include ('partials.head')
<div class="wrapper">

  <!-- Main Header -->
@include ('partials.header')
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        @include ('partials.search')
        @include ('partials.sidebar')
      </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Site de recette
        <small>Par Céline Bertaud</small>
      </h1>
     </section>

    <!-- Main content -->
    <section class="content container-fluid">
    <div class="container">

       @yield('main')
        
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  @include('partials.footer')

</div>
<!-- ./wrapper -->

@include ('partials.end')