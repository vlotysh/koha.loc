<!-- <div id="logo">
	<img src="<?= url::base(); ?>media/images/logo.jpg" alt="<?= $site_name; ?>" />
</div>
<p id="tagline">
	<em>Because it's all about you!</em>
</p> -->
<div class="container">
<br><br><br>
<!--<p>Что-то после меню
<br>Может лого?</p>-->

<p id="account">

<?php if (Auth::instance()->logged_in() 
	&& $user = Auth::instance()->get_user()) : ?>
	Logged in as <b><?php echo $user->username; ?></b>.  <?php echo HTML::anchor('logout', __('Logout')); ?>

<?php else: ?>

	<?php echo HTML::anchor('login', __('Login')); ?> | <?php echo HTML::anchor('signup', __('Signup')); ?>

<?php endif; ?>

</p>
</div>