<?php
// source: C:\xampp\htdocs\wishes\app/templates/Sign/in.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('3029812144', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbc01a5bbcbf_content')) { function _lbc01a5bbcbf_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><br><br>
<?php Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["signInForm"], array()) ?>

		<div class="row">
			<div class="input-field col s12 m6 l6" style="padding-right: 0px;">
				<?php if ($_label = $_form["username"]->getLabel()) echo $_label ; echo $_form["username"]->getControl() ?>


			</div>
			<div class="input-field col s12 m6 l6" style="padding-right: 0px;">
				<?php if ($_label = $_form["password"]->getLabel()) echo $_label ; echo $_form["password"]->getControl() ?>

			</div>
		</div>
		<br>

		<div class="row">
			<div class="col s6 m6 l4">
				<a><?php echo Latte\Runtime\Filters::escapeHtml($template->translate("messages.sign.forgotpass"), ENT_NOQUOTES) ?></a><br>
				<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:up"), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($template->translate("messages.sign.registration"), ENT_NOQUOTES) ?></a>
			</div>
			<div class="col s6 m6 l4 offset-l4 waves-input-wrapper">
				<a class="btn button-green col l12 waves-effect waves-light" id="submit"><?php echo Latte\Runtime\Filters::escapeHtml($template->translate("messages.sign.signin"), ENT_NOQUOTES) ?></a>
				<?php echo $_form["send"]->getControl() ?>

			</div>
		</div>
<?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ?>

<br><br><br>
<blockquote><i>
	tu bude nejaky naozaj bezvyznamny text, ktory nikto nebude citat pretoze bude maximalne bezvyznamny a ten kto ho bude citat, tomu sa cudujem!<br>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas dapibus placerat molestie. Aliquam vel tellus at massa ullamcorper elementum a in nunc. Maecenas quis quam in orci feugiat porttitor auctor id lorem. Curabitur consequat mollis aliquam. Vivamus fermentum, velit eu semper fringilla, urna purus porttitor lectus, sed volutpat augue justo quis tortor. Nullam vehicula libero ac arcu lobortis rhoncus. Quisque malesuada mi sed nisl ultricies, sit amet luctus est tincidunt. Vestibulum molestie mi et velit accumsan, quis aliquet metus sodales. Donec aliquet justo arcu, nec porta ante venenatis quis. Vestibulum nec risus nec ex tempus tristique non non risus. Vestibulum faucibus fringilla eros at maximus. Fusce eu libero eu lectus euismod tincidunt.
</i></blockquote>
<?php
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lbe3c49b7e68_scripts')) { function _lbe3c49b7e68_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;Latte\Macros\BlockMacros::callBlockParent($_b, 'scripts', get_defined_vars()) ?>
<script>
$(document).ready(function(){
	$("#submit").click(function(){
		$("#frm-signInForm-send").click();
	})
	$("#frm-signInForm-send").css("display", "none");
	$("#frm-signInForm").attr('autocomplete', 'off');
	 $('#frm-signInForm-username').val(' ');
});
</script>

<?php
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
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars()) ; 