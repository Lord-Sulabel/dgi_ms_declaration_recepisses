<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <link rel="icon" type="image/x-icon" href="../../resources/template/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../resources/template/css/styles.css" rel="stylesheet" />
        
        <!-- Navigation-->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <style>
            .submenu{font-size:0.75em; cursor: pointer;}
            .mmenu{font-size:0.9em; cursor: pointer;}
            .lopad{padding:0px;}
            .mepad{padding:2px;}
        </style>
    </head>
    <body id="page-top">
        
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="../">Home</a>
                
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            
            <div class="container"   >
                <br><br><br><br><br>
                <div class="row" >
                    <div class="col-md-3" style="color:#ccc; background-color:#000; opacity:0.7; border-radius:10px; padding:10px; ">
                        <div>DOCUMENTATION</div>
                        <ul class="navbar-nav ms-auto" >
                            <li class="nav-item"    class="nav-link mepad"  ><a class="nav-link mmenu mepad">Rapports</a></li>
                                <ul class="navbar-nav" style="margin-left: 30px;">
                                    
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../public/contribuables_assujettis_tva?annee=2021&"
                                        >Contribuables Assujettis TVA</a></li>
                                </ul>




                                    
    
                        </ul>





                    </div>
                    <div  class="col-md-9">
                        <div style="background-color: #fff;">
                            <main class="py-2">
                                @yield('content')
                            </main>
                        </div>
                    </div>

                </div>
                
            </div>
            
            
        </header>
        
        
        
        
        
        

        
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50">
            <div class="container px-4 px-lg-5">Copyright &copy; 2022</div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        
        
        <script type="text/javascript">

            


        </script>
    </body>
</html>
