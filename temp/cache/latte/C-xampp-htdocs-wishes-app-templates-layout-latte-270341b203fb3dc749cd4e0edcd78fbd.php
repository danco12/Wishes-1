<?php
// source: C:\xampp\htdocs\wishes\app/templates/@layout.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3948364151', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb664c775687_head')) { function _lb664c775687_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lbb0f80c5571_scripts')) { function _lbb0f80c5571_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>		<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/jquery-2.1.0.js" language="JavaScript" type="text/javascript"></script>
				<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/nette.ajax.js"></script>
		<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/netteForms.js"></script>
		<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/redactor.min.js"></script>
		<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/jquery-ui.js"></script>
		<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/libraries/materialize/js/materialize.js"></script>

		<script>
			$(document).ready(function(){
				$.nette.init();
				$('.datepicker').pickadate({
					format: 'd.m.yyyy',
					focused: false
				});
				$(".dropdown-button").dropdown({hover: false, constrain_width: false});
				$('select').material_select();
				$('.modal-trigger').leanModal();
				$('.materialboxed').materialbox();
				$(".button-collapse").sideNav();
				$('.collapsible').collapsible();
				$('ul.tabs').tabs();
			});
			
		</script>
<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb974670ee5d_content')) { function _lb974670ee5d_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<title><?php if (isset($_b->blocks["title"])) { ob_start(); Latte\Macros\BlockMacros::callBlock($_b, 'title', $template->getParameters()); echo $template->striptags(ob_get_clean()) ?>
 | <?php } ?>WISHES</title>
		<link rel="shortcut icon" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon.ico">
		<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/flags.css" type='text/css'>
		<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/libraries/materialize/css/materialize.css" type='text/css'>
		<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/style.css">
		<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars())  ?>

	</head>
<?php call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>
	<body class="grey lighten-3">
		<nav>
			<div class="nav-wrapper" style="text-transform: capitalize">
				<a class="brand-logo" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
"><img class="col-md-2 logo" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/logo.png"></a>
<?php if ($user->isLoggedIn()) { ?>				<ul class="right side-nav" id="nav-mobile">
					<li>
						<a class="waves-effect waves-light" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
">
							<?php echo Latte\Runtime\Filters::escapeHtml($template->translate("messages.layout.home"), ENT_NOQUOTES) ?>

						</a>
					</li>
					<li>
						<a class="waves-effect waves-light" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Profile:", array($user->id)), ENT_COMPAT) ?>
">
							<?php echo Latte\Runtime\Filters::escapeHtml($template->translate("messages.layout.wishlist"), ENT_NOQUOTES) ?>

						</a>
					</li>
					<li>
						<a class="waves-effect waves-light" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Settings:"), ENT_COMPAT) ?>
">
							<?php echo Latte\Runtime\Filters::escapeHtml($template->translate("messages.layout.settings"), ENT_NOQUOTES) ?>

						</a>
					</li>
					<li>
						<a class="waves-effect waves-light" class=" valign-wrapper" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:out"), ENT_COMPAT) ?>
">
							<?php echo Latte\Runtime\Filters::escapeHtml($template->translate("messages.layout.logout"), ENT_NOQUOTES) ?>

						</a>
					</li>
				</ul>
<?php } if ($user->isLoggedIn()) { ?>				<a class="button-collapse" href="#" data-activates="nav-mobile"><i class="mdi-navigation-menu"></i></a>
<?php } ?>
			</div>
		</nav>
				<div class="row">
			<section id="flashes">
				<div class="container">
<?php $iterations = 0; foreach ($flashes as $flash) { ?>					<div class="<?php echo Latte\Runtime\Filters::escapeHtml($flash->type, ENT_COMPAT) ?>" style="text-align: center">
<?php if ($flash->message != null) { ?>						<script>
							toast(<?php echo Latte\Runtime\Filters::escapeJs($flash->message) ?>,40000);
						</script>
<?php } ?>
					</div>
<?php $iterations++; } ?>
				</div>
			</section>
		</div>
		<div class="container">
		    <div class="section">
				<div class="row" style="margin-top: 50px;">
					<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars())  ?>

				</div>
			</div>
		</div>
	</body>
</html>
