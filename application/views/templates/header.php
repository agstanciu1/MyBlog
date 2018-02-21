<!DOCTYPE html>
<html>
<head>
	<title>MyBlog</title>
	<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
	<script src="http://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-fixed-top">
   <div class="container-fluid">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?php echo base_url(); ?>">MyBlog</a>
	</div>
	<div class="collapse navbar-collapse" id="navbarColor02">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>">Home</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>about">About</a></li>
			<li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>articles">Blog</a></li>
      <?php if($this->session->userdata('logged_in')) : ?>
        <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>categories">Categories</a></li>
      <?php endif; ?>
		</ul>
		<ul class="navbar-nav navbar-right">

			<li class="nav-item dropdown">
    			<a onclick="myFunction()" class="nav-link dropdown-toggle btn btn-info my-2 my-sm-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions</a>
    			<div id="myDropdown" class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 40px, 0px); top: 0px; left: 0px; will-change: transform;">
              <?php if(!$this->session->userdata('logged_in')) : ?>
               <a class="dropdown-item" href="<?php echo base_url(); ?>users/login">Login</a>
              <a class="dropdown-item" href="<?php echo base_url(); ?>users/register">Register</a>
            <?php endif; ?>
             <?php if($this->session->userdata('logged_in')) : ?>
              <a class="dropdown-item" href="<?php echo base_url(); ?>articles/create">Create Article</a>
      				<a class="dropdown-item" href="<?php echo base_url(); ?>categories/create">Create Category</a>
               <a class="dropdown-item" href="<?php echo base_url(); ?>users/logout">Logout</a>
               <?php endif; ?>
    			


<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropdown-toggle')) {

    var dropdowns = document.getElementsByClassName("dropdown-menu");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

    			</div>
  			</li>
    	</ul>
	</div>
   </div>
</nav>

<div class="container">
</br>
<?php if($this->session->flashdata('user_registered')): ?>
  <?php echo '<p class="alert alert-info">'.$this->session->flashdata('user_registered').'</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('article_created')): ?>
  <?php echo '<p class="alert alert-info">'.$this->session->flashdata('article_created').'</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('article_updated')): ?>
  <?php echo '<p class="alert alert-info">'.$this->session->flashdata('article_updated').'</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('category_created')): ?>
  <?php echo '<p class="alert alert-info">'.$this->session->flashdata('category_created').'</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('article_deteled')): ?>
  <?php echo '<p class="alert alert-info">'.$this->session->flashdata('article_deleted').'</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('login_failed')): ?>
  <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('user_loggedin')): ?>
  <?php echo '<p class="alert alert-info">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('user_loggedout')): ?>
  <?php echo '<p class="alert alert-info">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('category_deleted')): ?>
  <?php echo '<p class="alert alert-info">'.$this->session->flashdata('category_deleted').'</p>'; ?>
<?php endif; ?>