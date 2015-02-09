<!doctype html>
<html lang="en">
    <head>
        <title>ToDo</title>
        
        <script src="<?php echo base_url('public/js/jquery.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/bootstrap.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/jrdash/dashboard/result.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/jrdash/dashboard/event.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/jrdash/dashboard/template.js'); ?>"></script>
        <script src="<?php echo base_url('public/js/jrdash/dashboard.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.min.css');?>"/>
        <link rel="stylesheet" href="<?php echo base_url('public/css/style.css');?>"/>
        <link rel="icon" type="image/x-icon" href="<?php echo base_url('public/img/favicon.ico'); ?>">
        
        <script type="text/javascript">
        $(function(){
            $("#error").hide();
            $("#success").hide();
        }
                
            );
        </script>
    </head>
    <body>
              
        <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <a href="#" class="navbar-brand glyphicon glyphicon-user">&nbsp; </a>
            <a href="<?php echo base_url('task/logout'); ?>" class="navbar-brand glyphicon glyphicon-off"></a>
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="collapse navbar-collapse navHeaderCollapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="<?php echo base_url('task'); ?>">home</a></li>
                    <li class="dropdown">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">social media <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">twitter</a></li>
                            <li><a href="#">facebook</a></li>
                            <li><a href="#">yahoo</a></li>
                        </ul>
                    </li>
                    <li><a href="#">about</a></li>
                    <li><a href="#contact" data-toggle="modal">contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
        
        
       
    <div class="container">
        <div id="error" class="alert alert-error "></div>
        <div id="success" class="alert alert-success"></div>
         