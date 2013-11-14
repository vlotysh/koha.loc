<!DOCTYPE html>
<html lang="<?php echo substr(I18n::$lang, 0, 2); ?>">
<meta charset="utf-8">
<meta name="description" content="<?= $description; ?>">
<meta name="author" content="<?= $author; ?>">
<head>
<? foreach ($styles as $style) : ?>
	<link rel="stylesheet" href="<?= url::base(); ?>media/css/<?= $style; ?>.css" />
<? endforeach; ?>


<title><?php echo $title.' | '.$site_name; ?></title>
</head>

<body >
    <div class="wrapper">
<header>

 <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
         <a class="brand" href="<?= url::site(); ?>">Site</a>
          <div class="nav-collapse">
            <ul class="nav">
              <li class="<?= $welcom_class_link_menu; ?>"><a href="<?= url::site(); ?>"><?php echo __('Home')?></a></li>
              <li class="<?= $about_class_link_menu; ?>" ><a href="<?= url::site('about'); ?>" ><?php echo __('About')?></a></li>
              <li class="<?= $contact_class_link_menu; ?>"><a href="<?= url::site('contact'); ?>"><?php echo __('Contact')?></a></li>
              <li class="<?= $why_class_link_menu; ?>"><a href="<?= url::site('why_site'); ?>"><?php echo __('Why use Site?')?></a></li>
              <li class="<?php if (Auth::instance()->logged_in('admin')) echo $admin_class_link_menu; else echo $profile_class_link_menu; ?>">
              <a href="<?php if (Auth::instance()->logged_in('admin')) echo url::site('profile/admin'); else echo url::site('profile/private'); ?>">
              <?php if (Auth::instance()->logged_in('admin')) echo __('Admin'); if (Auth::instance()->logged_in('participant')) echo __('Profile'); ?></a></li>
              
            </ul>
              <ul class="nav" style="float:right">
	<?php foreach(Kohana::$config->load('ko32example.language') as $lg) { ?>
                  <li class="<?php if ($lg==I18n::lang()) echo 'active'; ?>"><?php echo HTML::anchor('/' . $lg, __($lg)); ?></li>
	<?php } ?>
	</ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>   
    
<?= View::factory('common/header')->render(); ?>
</header>		
		 <div class="container">
                  <p>  
                   <a href="<?php if ((Auth::instance()->logged_in('admin'))and($page_name)) echo url::site("page/edit/{$page_name}"); ?>">
                   <?php if ((Auth::instance()->logged_in('admin'))and($page_name)) echo __('Edit Page')?>
                   </a>
                   </p>
		   <?= $content; ?>
                  </div><!-- /container -->
                 
   <div class="push"><!--//--></div>
 </div>
  
<? foreach ($scripts as $script) : ?>
	<script src="<?= url::base(); ?>media/js/<?= $script; ?>.js" /></script>
<? endforeach; ?>    
    
<footer class="container">
<?= View::factory('common/footer')->render(); ?>
</footer>
                 
</body>

</html>