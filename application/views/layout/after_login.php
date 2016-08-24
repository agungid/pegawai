<nav class="navbar navbar-default navbar-static-top">
    <!-- <div class="container"> -->
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="<?php echo base_url() ?>dosen">
               <img src="<?php echo base_url() ?>asset/img/icon.png" title='Pendaftaran Wisuda Online' style='width:45px; position: absolute; margin-top: -12px;' alt='Sistem Wisuda'>
               <!-- <span class="hidden-xs" style="margin-left: 55px;">Pendaftaran Wisuda Online</span> -->
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left side of navbar -->
            <ul class="nav navbar-nav navbar-left" style="margin-left:50px">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        Master Data <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a onclick='alert("Fitur ini masih belum bisa digunakan")' href="javascript:;"><i class="fa fa-university"></i> Agama</a></li>
                    </ul>
                </li>
                <!--<li class="border-menu"><a href="<?php echo base_url()?>dosen"><i class="fa fa-user"></i> Data Dosen</a></li>-->
            </ul>
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right" style="margin-right: 6px;">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        <?php echo $this->auth->user(); ?> <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="<?php echo base_url()?>dashboard/logout"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    <!-- </div> -->
</nav>