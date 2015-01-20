<?php
// source: C:\xampp\htdocs\wishes\app/templates/Settings/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('4465747313', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb31fb757494_content')) { function _lb31fb757494_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="col s12 m12 l12 settings">
<?php Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["settingsForm"], array()) ?>

<div class="z-depth-2 card-panel" style="padding-top: 50px !important">
	<div class="row">
		<div class="row">
			<div class="col l6 m12 s12">
				<div class="col s12 m12 l12 input-field margin-top-15">
					<?php if ($_label = $_form["name"]->getLabel()) echo $_label ; echo $_form["name"]->getControl() ?>

				</div>
				<div class="col s12 m12 l12 input-field margin-top-15">
					<?php if ($_label = $_form["surname"]->getLabel()) echo $_label ; echo $_form["surname"]->getControl() ?>

				</div>
				<div class="col l12 m12 s12 margin-top-15">
					<?php if ($_label = $_form["state"]->getLabel()) echo $_label ; echo $_form["state"]->getControl() ?>

				</div>
				<div class="col l12 m12 s12 margin-top-15">
					<?php if ($_label = $_form["sex"]->getLabel()) echo $_label ; echo $_form["sex"]->getControl() ?>

				</div>
				
				<div class="col s12 m12 l12 margin-top-15">
					<?php if ($_label = $_form["date"]->getLabel()) echo $_label ; echo $_form["date"]->getControl() ?>

				</div>
							</div>
			<div class="col l6 m12 s12">
				<div class="col s12 m12 l12"><b><?php if ($_label = $_form["image"]->getLabel()) echo $_label  ?></b></div>
				<div class="col s12 m12 l12  input-field" style="margin-top: 15px;"><?php echo $_form["image"]->getControl() ?></div>
				<div class="col s12 m12 l12">
<?php $url = "images/upload/profile/".$image.".png" ?>
					<img style="margin-top: 25px;" id="preview" class="responsive-img materialboxed" width="400" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>
/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($url), ENT_COMPAT) ?>">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col s12 m4 l4 offset-l4 offset-m4"  style="margin-top: 30px;">
				<?php echo $_form["send"]->getControl() ?>

			</div>
		</div>
	</div>
	<br>
</div>
<?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ?>

</div>
<?php
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lba03b8f43ba_scripts')) { function _lba03b8f43ba_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;Latte\Macros\BlockMacros::callBlockParent($_b, 'scripts', get_defined_vars()) ?>
<script type="text/javascript">

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
                $('#preview').css("display","block");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function(){
		if(<?php echo Latte\Runtime\Filters::escapeJs($image) ?> == "")
			$('#preview').css("display","none");
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
?>

<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars()) ; 