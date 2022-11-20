<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>School Back Office</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<!-- Bootstrap -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<style>
	@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}


#sidebar {

    background: #313a46;
    color: #fff;
    transition: all 0.3s;
}

#sidebar .sidebar-header {
    padding: 20px;
    
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #8391a2;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
}

.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}

.wrapper {
    display: flex;
    align-items: stretch;
}

#sidebar {
    min-width: 250px;
    max-width: 250px;
}

#sidebar.active {
    margin-left: -250px;
}
#sidebar {
    min-width: 250px;
    max-width: 250px;
    min-height: 100vh;
}

a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}

@media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
}

.navbar {
    position: relative;
    border: 1px solid ;
	margin-bottom: 0px;
}
.navbar-header .navbar-brand{
    min-width: 250px;
    max-width: 250px;
	background-color: #313a46;
	border: 1px solid ;
}

.panel{
	width: 100%;
}

</style>
</head> 
<body class="grey lighten-5">
<?php $email = $this->session->userdata('email');?>


<!-- START HEADER -->

<header>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <div class="navbar-brand" href="#"><div class="text-center"><p style="color : #ffff">Hi, <?php $session = $this->session->userdata;
                echo ucfirst($session['name']);
                ?></p></div></div>
    </div>

    
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <ul class="nav navbar-nav navbar-right">
	  <li><a class="grey-text text-darken-1" href="<?php echo base_url('login/logout'); ?>">
	  <span class="glyphicon glyphicon-lock" aria-hidden="true"></span>  Log Out</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</header>
<!-- END HEADER -->
<!-- START MAIN -->
<div id="main">
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        

        <ul class="list-unstyled components">
            
            <li>
                <a href="<?php echo base_url('/schools'); ?>">List</a>
            </li>
            
            <li>
                <a href="<?php echo base_url('/schools/create'); ?>">Add</a>
            </li>
        </ul>
    </nav>
<?php
			echo $content;
			?>
</div>

</div>
<!-- END MAIN -->
<div class="modal modal_sm" id="general_msg_modal"> 
    <div class="modal-content"> 
      <h4 class="modal-title" id="general_msg_modal_title"></h4>
      <div id="general_msg_modal_body">
          
          
      </div><!--/.end-->
    </div>
    <div class="modal-footer"> 
        <a href="javascript:void(0);" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
    </div>
</div>  

</body>
</html>
