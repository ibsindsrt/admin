<!-- Content Header (Page header) -->
<section>
	<?php
	$uri_1 = $this->uri->segment(1); $uri_2 = $this->uri->segment(2); $uri_3 = $this->uri->segment(3); $uri_4 = $this->uri->segment(4);
	$uri_5 = $this->uri->segment(5); $uri_6 = $this->uri->segment(6); $uri_7 = $this->uri->segment(7); $uri_8 = $this->uri->segment(8);
	$b1=NULL;$b2=NULL; $b3=NULL; $b4=NULL; $b5=NULL; $b6=NULL; $b7=NULL; $b8=NULL;$ol=NULL;
	if ($uri_8 != 'Add' && $uri_8 != 'Update' && ($uri_7 == 'Update' || $uri_7 == 'Add')) {$head=$uri_7.' | '.$uri_6;  $b1=$uri_1; $b2=$uri_2; $b3=$uri_3; $b4=$uri_4; $b5=$uri_5; $b6= $uri_6;}
elseif ($uri_8 != NUll && $uri_8 != 'Add' && $uri_8 != 'Update') {$head = $uri_8; $b1=$uri_1; $b2=$uri_2; $b3=$uri_3; $b4=$uri_4; $b5=$uri_5; $b6=$uri_6; $b7=$uri_7;}
	
elseif ($uri_7 != 'Add' && $uri_7 != 'Update' && ($uri_6 == 'Update' || $uri_6 == 'Add')) {$head=$uri_6.' | '.$uri_5; $b1=$uri_1; $b2=$uri_2; $b3=$uri_3; $b4=$uri_4; $b5=$uri_5;}
elseif ($uri_7 != NUll && $uri_7 != 'Add' && $uri_7 != 'Update') {$head = $uri_7; $b1=$uri_1; $b2=$uri_2; $b3=$uri_3; $b4=$uri_4; $b5=$uri_5; $b6=$uri_6;} 

elseif ($uri_6 != 'Add' && $uri_6 != 'Update' && ($uri_5 == 'Update' || $uri_5 == 'Add')) {$head = $uri_5.' | '.$uri_4; $b1=$uri_1; $b2=$uri_2; $b3=$uri_3; $b4 = $uri_4; } 
elseif ($uri_6 != NUll && $uri_6 != 'Add' && $uri_6 != 'Update') {$head = $uri_6; $b1=$uri_1; $b2=$uri_2; $b3=$uri_3; $b4=$uri_4; $b5=$uri_5;} 

elseif ($uri_5 != 'Add' && $uri_5 != 'Update' && ($uri_4 == 'Update' || $uri_4 == 'Add')) {$head=$uri_4.' | '.$uri_3; $b1=$uri_1; $b2=$uri_2; $b3=$uri_3;} 
elseif ($uri_5 != NUll && $uri_5 != 'Add' && $uri_5 != 'Update') {$head = $uri_5; $b1=$uri_1; $b2=$uri_2; $b3=$uri_3; $b4=$uri_4;}

elseif ($uri_4 != 'Add' && $uri_4 != 'Update' && ($uri_3 == 'Update' || $uri_3 == 'Add')) {$head=$uri_3 .' | '.$uri_2; $b1=$uri_1; $b2=$uri_2;}
elseif ($uri_4 != NUll && $uri_4 != 'Add' && $uri_4 != 'Update') {$head = $uri_4; $b1=$uri_1; $b2=$uri_2; $b3=$uri_3;} 

elseif ($uri_3 != 'Add' && $uri_3 != 'Update' && ($uri_2 === 'Update' || $uri_2 == 'Add')) {$head=$uri_2.' | '.$uri_1; $b1=$uri_1;}
elseif ($uri_3 != NUll && $uri_3 != 'Add' && $uri_3 != 'Update') {$head = $uri_3; $b1=$uri_1; $b2=$uri_2;}

elseif ($uri_2 != NUll && $uri_2 != 'Add' && $uri_2 != 'Update') {$head = $uri_2; $b1=$uri_1;} 
else {
	$head = $uri_1;
}
	?>
<header id="page-header">
	<h1><?php echo str_replace('-', ' ', ucfirst($head)); ?></h1>
	
		<ol class="breadcrumb">
			<?php echo '<li><a href="'. site_url('Dashboard').'">Super Admin</a></li>' ?>
			<?php if(isset($b1)) echo '<li><a href="'. site_url($b1.'/').'">' . str_replace('-', ' ', ucfirst($b1)) .  '</a></li>' ?>	
			<?php if(isset($b2)) echo '<li><a href="'. site_url($b1.'/'.$b2.'/').'">' . str_replace('-', ' ', ucfirst($b2)) .  '</a></li>' ?>			
			<?php if(isset($b3)) echo '<li><a href="'. site_url($b1.'/'.$b2.'/'.$b3.'/').'">' . str_replace('-', ' ', ucfirst($b3)) .  '</a></li>' ?>
			<?php if(isset($b4)) echo '<li><a href="'. site_url($b1.'/'.$b2.'/'.$b3.'/'.$b4.'/').'">' . str_replace('-', ' ', ucfirst($b4)) .  '</a></li>' ?>
			<?php if(isset($b5)) echo '<li><a href="'. site_url($b1.'/'.$b2.'/'.$b3.'/'.$b4.'/'.$b5.'/').'">' . str_replace('-', ' ', ucfirst($b5)) .  '</a></li>' ?>
			<?php if(isset($b6)) echo '<li><a href="'. site_url($b1.'/'.$b2.'/'.$b3.'/'.$b4.'/'.$b5.'/'.$b6.'/').'">' . str_replace('-', ' ', ucfirst($b6)) .  '</a></li>' ?>
			<?php if(isset($b7)) echo '<li><a href="'. site_url($b1.'/'.$b2.'/'.$b3.'/'.$b4.'/'.$b5.'/'.$b6.'/'.$b7.'/').'">' . str_replace('-', ' ', ucfirst($b7)) .  '</a></li>' ?>
			<?php if(isset($b8)) echo '<li><a href="'. site_url($b1.'/'.$b2.'/'.$b3.'/'.$b4.'/'.$b5.'/'.$b6.'/'.$b7.'/'.$b8.'/').'">' . str_replace('-', ' ', ucfirst($b8)) .  '</a></li>' ?>					
		</ol>
		
	</header>
</section>