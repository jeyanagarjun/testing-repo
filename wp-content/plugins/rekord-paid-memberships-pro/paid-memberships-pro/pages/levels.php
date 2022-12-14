<?php 
global $wpdb, $pmpro_msg, $pmpro_msgt, $current_user;

$pmpro_levels = pmpro_getAllLevels(false, true);
$pmpro_level_order = pmpro_getOption('level_order');

if(!empty($pmpro_level_order))
{
	$order = explode(',',$pmpro_level_order);

	//reorder array
	$reordered_levels = array();
	foreach($order as $level_id) {
		foreach($pmpro_levels as $key=>$level) {
			if($level_id == $level->id)
				$reordered_levels[] = $pmpro_levels[$key];
		}
	}

	$pmpro_levels = $reordered_levels;
}

$pmpro_levels = apply_filters("pmpro_levels_array", $pmpro_levels);

if($pmpro_msg)
{
?>
<div class="pmpro_message <?php echo $pmpro_msgt?>"><?php echo $pmpro_msg?></div>
<?php
}
?>
<div class="row my-3">
	<?php	
	$count = 0;
	foreach($pmpro_levels as $level)
	{
	  if(isset($current_user->membership_level->ID))
		  $current_level = ($current_user->membership_level->ID == $level->id);
	  else
		  $current_level = false;
	?>
	<div class="col-md-4">
		<div class="card p-5 <?php if($current_level == $level) { ?> active<?php } ?>">
		<div class="s-24 text-center"><?php echo $level->name; ?></div>
		<div class="s-24 my-3 text-center text-primary "><?php echo  pmpro_formatPrice( $level->initial_payment ); ?> /<?php echo $level->cycle_period; ?></div>
	
		<div class="my-4">	<?php echo $level->description ;?></div>
		<?php 
				if(pmpro_isLevelFree($level))
					$cost_text = "<strong>" . __("Free", 'paid-memberships-pro' ) . "</strong>";
				else
					$cost_text = pmpro_getLevelCost($level, true, true); 
				$expiration_text = pmpro_getLevelExpiration($level);
				if(!empty($cost_text) && !empty($expiration_text))
					echo  $cost_text  . "" . $expiration_text;
				elseif(!empty($cost_text))
					echo  $cost_text ; 
				elseif(!empty($expiration_text))
					echo $expiration_text;
			?>

			<div class="mt-5">
			<?php if(empty($current_user->membership_level->ID)) { ?>
			<a class="btn btn-primary btn-lg btn-block" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php _e('Select', 'paid-memberships-pro' );?></a>
		<?php } elseif ( !$current_level ) { ?>                	
			<a class="btn btn-primary btn-lg btn-block" href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php _e('Select', 'paid-memberships-pro' );?></a>
		<?php } elseif($current_level) { ?>      
			
			<?php
				//if it's a one-time-payment level, offer a link to renew				
				if( pmpro_isLevelExpiringSoon( $current_user->membership_level) && $current_user->membership_level->allow_signups ) {
					?>
						<a class="pmpro_btn pmpro_btn-select " href="<?php echo pmpro_url("checkout", "?level=" . $level->id, "https")?>"><?php _e('Renew', 'paid-memberships-pro' );?></a>
					<?php
				} else {
					?>
						<a class="pmpro_btn disabled" href="<?php echo pmpro_url("account")?>"><?php _e('Your&nbsp;Level', 'paid-memberships-pro' );?></a>
					<?php
				}
			?>
			
		<?php } ?>
			</div>
		</div>
	</div>

	<?php
	}
	?>
</div>
<p class="pmpro_actions_nav">
	<?php if(!empty($current_user->membership_level->ID)) { ?>
		<a href="<?php echo pmpro_url("account")?>" id="pmpro_levels-return-account"><?php _e('&larr; Return to Your Account', 'paid-memberships-pro' );?></a>
	<?php } else { ?>
		<a href="<?php echo home_url()?>" id="pmpro_levels-return-home"><?php _e('&larr; Return to Home', 'paid-memberships-pro' );?></a>
	<?php } ?>
</p> <!-- end pmpro_actions_nav -->
