<!-- HEADER -->
<header id="header">
	<!-- Mobile Button -->
	<button id="mobileMenuBtn"></button>
	<!-- Logo -->
	<span class="logo pull-left">
	<img src='<?php echo base_url('assets/admin/images/logo.png')?>' alt="admin panel" height="35" />
	</span>	
	<nav>
		<!-- OPTIONS LIST -->
		<ul class="nav pull-right">
			<!-- USER OPTIONS -->
			<li class="dropdown pull-left">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<img class="user-avatar" alt="" src='<?php echo base_url('assets/admin/images/noavatar.jpg')?>' height="34" /> 
				<span class="user-name">
				<span class="hidden-xs">
				John Doe <i class="fa fa-angle-down"></i>
				</span>
				</span>
				</a>
				<ul class="dropdown-menu hold-on-click">
					<li>
						<!-- my calendar -->
						<a href="calendar.html"><i class="fa fa-calendar"></i> Calendar</a>
					</li>
					<li>
						<!-- my inbox -->
						<a href="#"><i class="fa fa-envelope"></i> Inbox
						<span class="pull-right label label-default">0</span>
						</a>
					</li>
					<li>
						<!-- settings -->
						<a href="page-user-profile.html"><i class="fa fa-cogs"></i> Settings</a>
					</li>
					<li class="divider"></li>
					<li>
						<!-- lockscreen -->
						<a href="page-lock.html"><i class="fa fa-lock"></i> Lock Screen</a>
					</li>
					<li>
						<!-- logout -->
						<a href="<?php echo base_url('Login/logout')?>"><i class="fa fa-power-off"></i> Log Out</a>
					</li>
				</ul>
			</li>
			<!-- /USER OPTIONS -->
		</ul>
		<!-- /OPTIONS LIST -->
	</nav>
</header>
<!-- /HEADER -->