<body>
	<div class="navbar">
	  <div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="<?=base_url();?>">QuoteApp</a>
	    </div>
      <ul class="nav navbar-nav navbar-right">

				<li>
					<a href="<?=base_url();?>index.php/quote/create">Create</a>
				</li>

				<li><a href="<?=base_url();?>index.php/login">Login</a></li>

        <li class="dropdown">
          <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown
            <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">My Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Logout</a></li>
          </ul>
        </li>

      </ul>
	  </div>
	</div>
