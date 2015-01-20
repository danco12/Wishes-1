<?php
// source: C:\xampp\htdocs\wishes\app/templates/Profile/default.latte

// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('4198670487', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbe8958f2101_content')) { function _lbe8958f2101_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/libraries/jquery-editable/css/jquery-editable.css" type='text/css'>
<div id="friends" class="modal">
	<h4>Friends</h4>
	<hr>
<?php $iterations = 0; foreach ($friends as $f) { ?>
		<div class="row">
			<div class="col s12 m12 l12">
				<a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Profile:", array($f->friend_id)), ENT_COMPAT) ?>
">
					<div class="card-panel teal">
						<span class="white-text"><?php echo Latte\Runtime\Filters::escapeHtml($f->ref("friend_id")->name." ".$f->ref("friend_id")->surname, ENT_NOQUOTES) ?></span>
					</div>
				</a>
			</div>
		</div>
<?php $iterations++; } ?>
	<hr>
	<a href="#" class="waves-effect btn-flat modal-close">Close</a>
</div>
	<div class="row">
		<div class="col s12 m12 l4"<?php echo ' id="' . $_control->getSnippetId('profile') . '"' ?>>
<?php call_user_func(reset($_b->blocks['_profile']), $_b, $template->getParameters()) ?>
		</div>
		<div class="col s12 m12 l8 ">
			<div class="z-depth-2 card-panel">
				<div class="row">
					<div class="col s12">
						<ul class="tabs" id="tabs">
							<li data="date" class="tab col s3 ajax"><a class="sort">datum</a></li>
							<li data="price" class="tab col s3 ajax"><a class="sort">Cena</a></li>
							<li data="abc" class="tab col s3 ajax"><a class="sort">Abeceda</a></li>
						</ul>
					</div>
				</div>
<div id="<?php echo $_control->getSnippetId('wishe') ?>"><?php call_user_func(reset($_b->blocks['_wishe']), $_b, $template->getParameters()) ?>
</div>			</div>
		</div>
		<div id="addWish" class="modal">
			<h4>Add Wish</h4>
			<div class="row">
				<?php Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["addWishForm"], array()) ?>

					<div class="col l6 m12 s12">
						<div class="col s12 input-field">
							<?php if ($_label = $_form["name"]->getLabel()) echo $_label ; echo $_form["name"]->getControl() ?>

						</div>
						<div class="col s12 input-field">
							<?php if ($_label = $_form["link"]->getLabel()) echo $_label ; echo $_form["link"]->getControl() ?>

						</div>
						<div class="col s12" style="margin-bottom: 5px;">
							<?php if ($_label = $_form["image"]->getLabel()) echo $_label  ?>

						</div>
						<div class="col s12 input-field">
							<?php echo $_form["image"]->getControl() ?>

						</div>
						<div class="col s12 input-field" style="margin-top: 35px;">
							<?php echo $_form["send"]->getControl() ?>

						</div>
					</div>
					<img class="col l6 m12 s12" id="preview" style="display: none;">
				<?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ?>

			</div>
			<br>
		</div>
	</div>
<?php
}}

//
// block _profile
//
if (!function_exists($_b->blocks['_profile'][] = '_lb0f25684051__profile')) { function _lb0f25684051__profile($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('profile', FALSE)
?>			<div class="z-depth-2 card-panel">
			    	<div class="row">
			    		<div class="col l12 m12 s12">
			    		<p style="text-align: center;">	
<?php if ($userDetails->profile_image) { ?>
							<img class="responsive-img materialboxed profilePhoto" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>
/images/upload/profile/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($userDetails->profile_image), ENT_COMPAT) ?>.png">
<?php } else { ?>
							<img class="responsive-img materialboxed profilePhoto" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/profile.png">
<?php } ?>
						</p>
						</div>
						<div class="col l12 m12 s12 profileName">
							<h5><?php echo Latte\Runtime\Filters::escapeHtml($userDetails->name." ".$userDetails->surname, ENT_NOQUOTES) ?></h5>
						</div>
						<div class="buttons col l12 m12 s12" >
<?php if ($userDetails->id != $presenter->user->id && !$presenter->isFriend($userDetails->id)) { ?>
							<a class="waves-effect waves-light btn col l12 m12 s12 button-green ajax" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("addFriend!", array('friend_id'=>$userDetails->id)), ENT_COMPAT) ?>
"><span class="mdi-social-person-add"></span><span>&nbsp;Follow</span></a>
<?php } ?>
							<a class="waves-effect waves-light btn col l12 m12 s12 button-green modal-trigger" href="#friends"><span class="mdi-social-people"></span><span>&nbsp;following - <?php echo Latte\Runtime\Filters::escapeHtml($friends->count(), ENT_NOQUOTES) ?></span></a>
						</div>
					</div>
			</div>
<?php
}}

//
// block _wishe
//
if (!function_exists($_b->blocks['_wishe'][] = '_lb68584d699a__wishe')) { function _lb68584d699a__wishe($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('wishe', FALSE)
?>				<script>
					$('.collapsible').collapsible();
					
				</script>
				<div class="row valign-wrapper">
			    	<ul class="collapsible col l12 m12 s12" id="sortable"  >
<?php if ($userDetails->id == $presenter->user->id) { if ($userDetails->id == $presenter->user->id && $wishes) { ?>				    		<li id="addWish" class="ui-state-default ui-state-disabled">
				    			<div class="collapsible-header" style="color: #00770B"><i class="mdi-content-add-box"></i>Add wish</div>
								<div class="collapsible-body">
									<div class="col l12 m12 s12" style="margin-top: 35px;">
										<div class="row">
											<?php Nette\Bridges\FormsLatte\FormMacros::renderFormBegin($form = $_form = $_control["addWishForm"], array()) ?>

												<div class="col l6 m12 s12">
													<div class="col s12 m12 l12 input-field">
														<?php if ($_label = $_form["name"]->getLabel()) echo $_label ; echo $_form["name"]->getControl() ?>

													</div>
													<div class="col s12 m12 l12 input-field" style="margin-top: 15px;">
														<?php if ($_label = $_form["link"]->getLabel()) echo $_label ; echo $_form["link"]->getControl() ?>

													</div>
													<?php echo $_form["image"]->getControl() ?>

													<div class="col s12 input-field" style="margin-top: 30px;">
														<?php echo $_form["send"]->getControl() ?>

													</div>
												</div>
												<img class="col l6 m12 s12 imgUpload" id="preview" style="display: none; cursor: pointer;">
												<div class="col l6 m12 s12 valign-wrapper imgUpload" id="imgUpload" style="cursor: pointer; height: 200px; background: grey">
													Upload Image
												</div>
											<?php Nette\Bridges\FormsLatte\FormMacros::renderFormEnd($_form) ?>

										</div>
									</div>
									<div class="col l12 m12 s12">
										<p style="text-align: center;"></p>
									</div>
								</div>
				   			</li>
<?php } } $iterations = 0; foreach ($wishes as $w) { ?>
								<li class="ui-state-default" id="<?php echo Latte\Runtime\Filters::escapeHtml($w->id, ENT_COMPAT) ?>" >
									<div class="collapsible-header" id="<?php echo Latte\Runtime\Filters::escapeHtml($w->id, ENT_COMPAT) ?>">
										<i class="mdi-action-wallet-giftcard"></i><?php echo Latte\Runtime\Filters::escapeHtml($w->name, ENT_NOQUOTES) ?>
 - <?php echo Latte\Runtime\Filters::escapeHtml($w->price, ENT_NOQUOTES) ?>€
<?php if ($userDetails->id == $presenter->user->id) { ?>
											<a class="ajax" style="color: black" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("deleteWish!", array('delete_id'=>$w->id)), ENT_COMPAT) ?>
">
												<i class="mdi-action-delete" style="float: right"></i>
											</a>
											<i class="mdi-editor-mode-edit editWish" data-target="<?php echo Latte\Runtime\Filters::escapeHtml($w->id, ENT_COMPAT) ?>" style="float: right; margin-right:10px"></i>
<?php } ?>
									</div>
									<div class="collapsible-body" >
											<div>
												<div class="col l12 m12 s12" style="text-align:center; padding-top: 20px;"> 
													<a href="http://<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($w->link), ENT_COMPAT) ?>">
														<?php echo Latte\Runtime\Filters::escapeHtml($w->link, ENT_NOQUOTES) ?>

													</a>
												</div>
												<div class="col l12 m12 s12">
													<p style="text-align: center;">
<?php if ($w->image) { ?>
															<img class="responsive-img" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>
/images/upload/wishes/<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($w->image), ENT_COMPAT) ?>.png">
<?php } else { ?>
															<img class="responsive-img" src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/images/gift.png">
<?php } ?>
													</p>
												</div>
											</div>
																				</div>
								</li>
<?php $iterations++; } ?>
					</ul>
				</div>
				<script>
					$("#frm-addWishForm-image").css("display","none");
			    	$(".imgUpload").click(function(){
			    		$("#frm-addWishForm-image").click();
			    	});
				</script>
<?php
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lbb3bb1a970c_scripts')) { function _lbb3bb1a970c_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;Latte\Macros\BlockMacros::callBlockParent($_b, 'scripts', get_defined_vars()) ?>
<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/libraries/jquery-editable/js/jquery-editable-poshytip.js"></script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#preview').attr('src', e.target.result);
                $('#preview').css("display","block");
                $('#imgUpload').css("display","none");
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function(){
    	document.ontouchmove = function(e){ return true; }
    	/////xeditable start
	    	$.fn.editable.defaults.mode = 'inline';
	    	$.fn.editableform.buttons = '<div class="col l8 m12 s12"><button type="submit" class="btn-floating btn button-green waves-effect waves-light !important editable-submit"><i class="mdi-action-done"></i></button>' + '<button type="button" class="btn-floating btn red waves-effect waves-light !important editable-cancel"><i class="mdi-content-clear"></i></button></div>'; 
	    	$('.xeditable-class').editable({});
    	/////xeditable end
  	
    	$(".tab").on('click',function(event){
    		var x = $(this).attr("data");
    		$("#snippet-wishe").load(this.href+$.now());
    		$.nette.ajax({
	    	    url: this.href,
	    	    async: false,
		    	type: 'GET',
		    	data: {
		    		type: x,
		    		do: '<?php echo 'sortWishes' ?>'
		    	}
		    });	
    	});
    	
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