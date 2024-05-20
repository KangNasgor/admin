<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.bootstrap5.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.7/js/dataTables.js"></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.7/css/dataTables.dataTables.css">

        
        <script src="https://kit.fontawesome.com/3ab26b6439.js" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function (){
                $('#table').DataTable({
                    responsive : true,
                    "sDom": 'Lfrtlip' ,
                    ordering: true,
                    order: [[0, 'asc']],
                });
            });
        </script>
    </head>
<body class="wrapper">
    <div class="preloader">
        <img alt="AdminLTELogo" height="60" width="60">
    </div>
    <nav class="main-header navbar bg-dark navbar-expand" data-bs-theme="dark">
      <a href="https://google.com" class="navbar-brand">
        <span class="brand-text font-weight-light">AuroraStudio</span>
      </a>  
        <ul class="navbar-nav">
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/dashboard" class="nav-link">Home</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('customers') }}" class="nav-link">Customers</a>
          </li>
          <li class="nav-item dropdown">
            <a href="{{ url('photographers') }}" class="nav-link">Photographers</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('photography_sessions') }}" class="nav-link">Sessions</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('bookings') }}" class="nav-link">Bookings</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/logout" class="nav-link">Logout</a>
          </li>
        </ul>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>
</html>
<style>
  .main-header{
    margin-left: 0 !important;
    padding-left: 30px !important; 
  }
  .preloader{
    justify-content: center;
    align-items: center;
  }
</style>