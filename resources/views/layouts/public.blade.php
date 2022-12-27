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
        <link href="../../resources/template/css/styles.css" rel="stylesheet" />
        
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
                <a class="navbar-brand" href="../">MS 1</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        
                        <li class="nav-item"><a class="nav-link" href="">Documentation</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            
            <div class="container"   >
                <br><br><br><br><br>
                <div class="row" >
                    <div class="col-md-3" style="color:#ccc;">
                        <div>DOCUMENTATION</div>
                        <ul class="navbar-nav ms-auto" >
                            <li class="nav-item"    class="nav-link mepad"  onclick="ToggleMenu('list_compte')" ><a class="nav-link mmenu mepad">+Comptes</a></li>
                                <ul id="list_compte" class="navbar-nav" style="margin-left: 30px;">
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">account_list_all</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">account_list_like</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">account_find</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">account_create</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">account_edit</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">account_edit_full</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">account_delete</a></li>
                                </ul>


                            <li class="nav-item"    class="nav-link mepad"  onclick="ToggleMenu('list_right')"  ><a class="nav-link mmenu mepad">+ Droits</a></li>
                                <ul id="list_right" class="navbar-nav" style="display:none; margin-left: 30px;">
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">rights_user_authorize</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">rights_user_authorize_on</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">rights_user_revoke</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">rights_user_revoke_on</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">rights_group_authorize</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">rights_group_authorize_on</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">rights_group_revoke</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">rights_group_revoke_on</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">rights_user_get</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">rights_group_get</a></li>
                                </ul>
                            
                            
                            <li id="btn_user"       class="nav-item mepad"  onclick="ToggleMenu('list_user')"   ><a class="nav-link  mmenu mepad">+ Client API</a></li>
                                <ul id="list_user" class="navbar-nav " style="display:none; margin-left: 30px;">
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">client_register</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">client_login</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">client_logout</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">client_list_all</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">client_list_like</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">client_find</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">client_edit</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">client_delete</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">client_edit_full</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">client_activate</a></li>
                                    <li class="nav-item lopad">
                                        <a class="nav-link lopad submenu" href="../doc/1">client_deactivate</a></li>
                                </ul>


                            <li id="btn_group"      class="nav-item mepad"  onclick="ToggleMenu('list_group')"  ><a class="nav-link mmenu mepad">+ Groupes</a></li>
                            <ul id="list_group"  class="navbar-nav " style="display:none; margin-left: 30px;">
                                <li class="nav-item lopad">
                                    <a class="nav-link lopad submenu" href="../doc/1">Group_List_All</a></li>
                                <li class="nav-item lopad">
                                    <a class="nav-link lopad submenu" href="../doc/1">Group_List_Like</a></li>
                                <li class="nav-item lopad">
                                    <a class="nav-link lopad submenu" href="../doc/1">Group_Find</a></li>
                                <li class="nav-item lopad">
                                    <a class="nav-link lopad submenu" href="../doc/1">Group_Create</a></li>
                                <li class="nav-item lopad">
                                    <a class="nav-link lopad submenu" href="../doc/1">Group_Edit</a></li>
                                <li class="nav-item lopad">
                                    <a class="nav-link lopad submenu" href="../doc/1">Group_Delete</a></li>
                                <li class="nav-item lopad">
                                    <a class="nav-link lopad submenu" href="../doc/1">Group_Deactivate</a></li>
                                <li class="nav-item lopad">
                                    <a class="nav-link lopad submenu" href="../doc/1">Group_Activate</a></li>
                                <li class="nav-item lopad">
                                    <a class="nav-link lopad submenu" href="../doc/1">Group_Add_User</a></li>
                                <li class="nav-item lopad">
                                    <a class="nav-link lopad submenu" href="../doc/1">Group_Revoke_User</a></li>
                            </ul>


                                    
    
                        </ul>





                    </div>
                    <div style="background-color: #fff;" class="col-md-9">
                        <main class="py-2">
                            @yield('content')
                        </main>
                    </div>

                </div>
                
            </div>
            
            
        </header>
        
        
        
        
        
        

        <!-- Contact-->
        <section class="contact-section bg-black">
            <div class="container px-4 px-lg-5">
                
                
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50">
            <div class="container px-4 px-lg-5">Copyright &copy; HOLOGRAM IDENTIFICATION SERVICES 2022</div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../../resources/template/js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        
        <script type="text/javascript">

            function ToggleMenu($field){ 
                CloseAll();
                var stat = document.getElementById($field).style.display;        
                if(stat == "none"){
                    document.getElementById($field).style.display = "";
                }else{
                    document.getElementById($field).style.display = "none";
                } 
            }

            function CloseAll(){ 
                
                try{ document.getElementById("list_user").style.display = "none"; }catch(e){ }
                try{ document.getElementById("list_group").style.display = "none"; }catch(e){ }
                try{ document.getElementById("list_right").style.display = "none"; }catch(e){ }
                try{ document.getElementById("list_compte").style.display = "none"; }catch(e){ }
            }


        </script>
    </body>
</html>
