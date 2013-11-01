<?php
/**
 * @package     MOOTOMBO!WebOS
 * @subpackage  Templates.AppOS - Theme
 *
 * @copyright   Copyright (C) 1997 - 2013 devXive - research and development. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Defining variables before config load, to prevent errors
$show_menu_text = '';

require_once(__DIR__ . '/config.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />
	<?php
	// Use of Google Font
	if ($this->params->get('googleFont'))
	{
	?>
		<link href='http://fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName');?>' rel='stylesheet' type='text/css' />
		<style type="text/css">
			h1,h2,h3,h4,h5,h6,.site-title{
				font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName'));?>', sans-serif;
			}
		</style>
	<?php
	}
	?>
	<link href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />

	<!--[if lte IE 8]>
		<link rel="stylesheet" href="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/assets/css/appos-ie.css" />
	<![endif]-->

	<!-- AppOS - Theme settings handler -->
	<script src="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/assets/js/appos-extra.js"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/assets/js/html5shiv.js"></script>
		<script src="<?php echo $this->baseurl . '/templates/' . $this->template; ?>/assets/js/respond.src.js"></script>
	<![endif]-->

</head>

<body class="<?php echo
	( $option ? $option . ' ' : '')
	. ($params->get('templateSkin') ? $params->get('templateSkin') : '')
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fixedLayout') ? ' navbar-fixed' : ''); ?>
">

	<div id="siteready-overlay" class="loader-overlay">
		<div class="loader-wrapper">
			<div class="loader"></div>
		</div>
	</div>

	<div class="navbar navbar-default <?php echo ($params->get('fixedLayout') ? ' navbar-fixed-top' : ''); ?>" id="navbar">
		<div class="navbar-container" id="navbar-container">
			<div class="navbar-header pull-left">
				<a href="<?php echo $this->baseurl; ?>" class="navbar-brand">
					<small>
						<i class="fa fa-cloud"></i> <?php echo $logo; ?>
					</small>
				</a><!-- /.navbar-brand -->
			</div><!-- /.navbar-header -->

			<div class="navbar-header pull-right" role="navigation">
				<ul class="nav appos-nav">
					<jdoc:include type="modules" name="mytasks" /><!--.mytasks-->
					<jdoc:include type="modules" name="clientactivities" /><!--.clientactivities-->
					<jdoc:include type="modules" name="mymessages" /><!--.mymessages-->
					<jdoc:include type="modules" name="login" /><!--.login-->
				</ul><!-- /.appos-nav -->
			</div><!-- /.navbar-header -->
		</div><!-- /.container -->
	</div><!-- /.navbar -->

	<div class="main-container" id="main-container">
		<script type="text/javascript">
			try{ace.settings.check('main-container' , 'fixed')}catch(e){}
		</script>

		<div class="main-container-inner">
			<a class="menu-toggler" id="menu-toggler" href="#"><span class="menu-text"></span></a>

			<div class="sidebar <?php echo ($params->get('fixedLayout') ? 'sidebar-fixed' : ''); ?>" id="sidebar">
				<jdoc:include type="modules" name="sidebar-shortcuts" />
				<!-- #sidebar-shortcuts -->

				<!-- #XAP START MODULE -->
					<jdoc:include type="modules" name="sidebar" />
				<!-- #XAP END MODULE -->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="fa fa-angle-double-left" data-icon1="fa fa-angle-double-left" data-icon2="fa fa-angle-double-right"></i>
				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div><!--/.sidebar -->

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<jdoc:include type="modules" name="breadcrumbs" />
					<!--.breadcrumb-->

					<div class="nav-search" id="nav-search">
						<jdoc:include type="modules" name="search" /><!--.search-->
					</div><!--.nav-search -->
				</div><!--.breadcrumbs -->

				<div class="page-content">
					<?php if($show_menu_text == 1) { ?>
						<div class="page-header">
							<h1><?php if($menu_anchor_icon): echo '<i class="' . $menu_anchor_icon . '"></i> '; endif; ?><?php echo $page_title; ?> <small><i class="fa fa-angle-double-right"></i> <?php echo $page_heading; ?></small></h1>
						</div><!--/.page-header -->
					<?php } ?>

					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS HERE -->

								<jdoc:include type="modules" name="main-top" style="xhtml" />
								<jdoc:include type="message" />
								<jdoc:include type="component" />
								<jdoc:include type="modules" name="main-bottom" style="none" />

							<!-- PAGE CONTENT ENDS HERE -->
						</div><!-- /.col -->
					</div><!--/.row -->
				</div><!--/.page-content -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container-inner -->

		<!-- Footer -->
		<hr />
		<footer class="container">
			<div class="">
				<jdoc:include type="modules" name="footer" style="none" />
			</div>

			<div class="" style="text-align: right;">&copy; <?php echo $sitename; ?> <?php echo date('Y');?></div>
		</footer>

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="fa fa-angle-double-up icon-only bigger-110"></i>
		</a>

		<jdoc:include type="modules" name="debug" style="none" />

	</div><!-- /.main-container -->
</body>
</html>