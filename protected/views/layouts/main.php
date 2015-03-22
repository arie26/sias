<?php if (empty(Yii::app()->session['role'])){
	$this->redirect(array('/site/login'));?>
	<script type = "text/javascript" >
	   function preventBack(){window.history.forward();}
		setTimeout("preventBack()", 0);
		window.onunload=function(){null};
	</script>
<?php } else {?>


<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from 192.69.216.111/themes/preview/ace/ by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 15 Nov 2013 07:12:21 GMT -->
<head>
		<meta charset="utf-8" />
		<title>SIAS</title>

		<link rel="shortcut icon" type="image/x-icon" href="<?php echo Yii::app()->request->baseUrl; ?>/media/images/favicon.ico" type="image/x-icon">
		
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->

		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/ace-skins.min.css" />

		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/chosen.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/datepicker.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/daterangepicker.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/colorpicker.css" />

		
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/media/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/html5shiv.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>
		<div class="navbar navbar-default" id="navbar">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i><img width="21px" height="21px" src="<?php echo Yii::app()->request->baseUrl; ?>/media/images/lambang.png" alt="Jason's Photo"/></i>
							SIAS | SMA Muhammadiyah 3 Jakarta
						</small>
					</a><!-- /.brand -->
				</div><!-- /.navbar-header -->

				<div class="navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo Yii::app()->request->baseUrl; ?>/media/avatars/avatar2.png" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo Yii::app()->session['nama']; ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li class="divider"></li>
								<li>
									<a href="<?php echo Yii::app()->request->baseUrl; ?>/site/logout">
										<i class="icon-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.ace-nav -->
				</div><!-- /.navbar-header -->
			</div><!-- /.container -->
		</div>

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li class="active">
							<a href="#">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> Dashboard </span>
							</a>
						</li>
						
						<li>
							<?php include "menu/menu.php"; ?>	<!--MENU-->
						</li>
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li>
								<a href="#"><?php 
									if (Yii::app()->getController()->getAction()->controller->id == 'guru'){
										echo 'Administrasi';
									}
								?></a>
							</li>
							<li class="active">
								<?php 
									if (Yii::app()->getController()->getAction()->controller->id == 'guru'){
										echo 'Guru';
									}
								?>
							</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								<?php
								if (Yii::app()->getController()->getAction()->controller->id == 'guru'){
										echo 'Guru';
									}
								?>
								<small>
									<i class="icon-double-angle-right"></i>
									<?php 
									if (Yii::app()->urlManager->parseUrl(Yii::app()->request) == 'guru/list'){
										echo 'Data Guru';
									} else if (Yii::app()->urlManager->parseUrl(Yii::app()->request) == 'guru/add'){
										echo 'Add Data Guru';
									} else if (Yii::app()->urlManager->parseUrl(Yii::app()->request) == 'guru/edit'){
										echo 'Edit Data Guru';
									} else if (Yii::app()->urlManager->parseUrl(Yii::app()->request) == 'guru/view'){
										echo 'Profile Guru';
									}
									?>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
							
										<?php echo $content; ?> <!--CONTENT-->
									
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				<!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

			<script src="../../../../ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php //echo Yii::app()->request->baseUrl; ?>/media/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
		<script type="text/javascript">
		 window.jQuery || document.write("<script src='<?php// echo Yii::app()->request->baseUrl; ?>/media/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
		</script>
		<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='<?php //echo Yii::app()->request->baseUrl; ?>/media/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		
		<!-- core JS-->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery-1.8.3.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/bs3/js/bootstrap.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery-ui-1.9.2.custom.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery-ui-1.10.3.custom.min.js"></script>
		
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/bootstrap.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!-- page specific plugin scripts -->

		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.dataTables.bootstrap.js"></script>
		
		<!--[if lte IE 8]>
		  <script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.slimscroll.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.easy-pie-chart.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.sparkline.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/flot/jquery.flot.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/flot/jquery.flot.pie.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/flot/jquery.flot.resize.min.js"></script>
		
		<!-- page specific plugin scripts -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/fuelux/fuelux.wizard.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.validate.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/additional-methods.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.maskedinput.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/select2.min.js"></script>
		
		<!-- page specific plugin scripts  wysiwyg -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/markdown/markdown.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/markdown/bootstrap-markdown.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.hotkeys.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/bootstrap-wysiwyg.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/bootbox.min.js"></script>

		<!-- Date Picker -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/chosen.jquery.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/date-time/moment.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/date-time/daterangepicker.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/bootstrap-colorpicker.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.knob.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.autosize.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/bootstrap-tag.min.js"></script>
		
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/jquery.gritter.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/spin.min.js"></script>
		
		<!-- ace scripts -->
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/ace-elements.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/media/js/ace.min.js"></script>

		
		<!-- inline scripts related to this page -->

		<script type="text/javascript">
			$(function(){
				$('#save_profil').click(function () {
					var mysave = $('#profil').html();
					$('#content').val(mysave);
					$("form:first").submit();
					$('#content').append(mysave);
					//alert($('#hiddeninput').val());
				});
			});
			
			$(function(){
				$('#save_welcome').click(function () {
					var mysave = $('#profil').html();
					$('#content').val(mysave);
					$("form:first").submit();
					$('#content').append(mysave);
					//alert($('#hiddeninput').val());
				});
			});
		
			$(function(){
				$('#save_carabeli').click(function () {
					var mysave = $('#profil').html();
					$('#content').val(mysave);
					$("form:first").submit();
					$('#content').append(mysave);
					//alert($('#hiddeninput').val());
				});
			});
			
			$(function(){
				$('#save_produk').click(function () {
					var mysave = $('#profil').html();
					$('#content').val(mysave);
					//$("form:first").submit();
					$('#content').append(mysave);
					//alert($('#content').val());
				});
			});
			
			$(function(){
				$('#save_pesan').click(function () {
					var mysave = $('#profil').html();
					$('#content').val(mysave);
					//$("form:first").submit();
					$('#content').append(mysave);
					//alert($('#content').val());
				});
			});
	
		jQuery(function($) {
				//TABLE RESPONSIVE
				var oTable1 = $('#guru').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null, null, null, null,
				  { "bSortable": false }
				] } );
				
				var oTable2 = $('#siswa').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null, null, null,
				  { "bSortable": false }
				] } );
				
				var oTable3 = $('#kategori').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null,
				  { "bSortable": false }
				] } );
				
				var oTable4 = $('#produk').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null, null, null, null, null,
				  { "bSortable": false }
				] } );
				
				var oTable5 = $('#order').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null, null, null, null,
				  { "bSortable": false }
				] } );
				
				var oTable6 = $('#ongkoskirim').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null, null,
				  { "bSortable": false }
				] } );
				
				var oTable7 = $('#hubungi').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null, null, null,
				  { "bSortable": false }
				] } );
				
				var oTable8 = $('#header').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,
				  { "bSortable": false }
				] } );
				
				var oTable9 = $('#bank').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null, null,
				  { "bSortable": false }
				] } );
				
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});
							
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
				});
			
			
			$("#bootbox-confirm").on(ace.click_event, function() {
				bootbox.confirm("Are you sure?", function(result) {
					if(result) {
					
					}
				});
			});
			
	//$('#profil').ace_wysiwyg();//this will create the default editor will all buttons

	//but we want to change a few buttons colors for the third style
	$('#profil').ace_wysiwyg({
		toolbar:
		[
			'font',
			null,
			'fontSize',
			null,
			{name:'bold', className:'btn-info'},
			{name:'italic', className:'btn-info'},
			{name:'strikethrough', className:'btn-info'},
			{name:'underline', className:'btn-info'},
			null,
			{name:'insertunorderedlist', className:'btn-success'},
			{name:'insertorderedlist', className:'btn-success'},
			{name:'outdent', className:'btn-purple'},
			{name:'indent', className:'btn-purple'},
			null,
			{name:'justifyleft', className:'btn-primary'},
			{name:'justifycenter', className:'btn-primary'},
			{name:'justifyright', className:'btn-primary'},
			{name:'justifyfull', className:'btn-inverse'},
			null,
			{name:'createLink', className:'btn-pink'},
			{name:'unlink', className:'btn-pink'},
			null,
			{name:'insertImage', className:'btn-success'},
			null,
			'foreColor',
			null,
			{name:'undo', className:'btn-grey'},
			{name:'redo', className:'btn-grey'}
		],
		'wysiwyg': {
			fileUploadError: showErrorAlert
		}
	}).prev().addClass('wysiwyg-style2');


	$('[data-toggle="buttons"] .btn').on('click', function(e){
		var target = $(this).find('input[type=radio]');
		var which = parseInt(target.val());
		var toolbar = $('#profil').prev().get(0);
		if(which == 1 || which == 2 || which == 3) {
			toolbar.className = toolbar.className.replace(/wysiwyg\-style(1|2)/g , '');
			if(which == 1) $(toolbar).addClass('wysiwyg-style1');
			else if(which == 2) $(toolbar).addClass('wysiwyg-style2');
		}
	});

	$('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
		$(this).prev().focus();
	});
	
	$('#id-input-file-1 , #id-input-file-2').ace_file_input({
		no_file:'JPG/PNG, MAX: 200kb',
		btn_choose:'Choose',
		btn_change:'Change',
		droppable:false,
		onchange:null,
		thumbnail:false
		//| true | large
		//whitelist:'gif|png|jpg|jpeg'
		//blacklist:'exe|php'
		//onchange:''
		//
	})
	
	$('#id-input-file-3').ace_file_input({
		no_file:'Tipe gambar harus JPG/JPEG dan ukuran gambar 940px x 291px',
		btn_choose:'Choose',
		btn_change:'Change',
		droppable:false,
		onchange:null,
		thumbnail:false //| true | large
		//whitelist:'gif|png|jpg|jpeg'
		//blacklist:'exe|php'
		//onchange:''
		//
	})
	
	$('#id-input-file-4').ace_file_input({
		no_file:'',
		btn_choose:'Choose',
		btn_change:'Change',
		droppable:false,
		onchange:null,
		thumbnail:false //| true | large
		//whitelist:'gif|png|jpg|jpeg'
		//blacklist:'exe|php'
		//onchange:''
		//
	})
		//Add Image Resize Functionality to Chrome and Safari
	//webkit browsers don't have image resize functionality when content is editable
	//so let's add something using jQuery UI resizable
	//another option would be opening a dialog for user to enter dimensions.
	if ( typeof jQuery.ui !== 'undefined' && /applewebkit/.test(navigator.userAgent.toLowerCase()) ) {
		
		var lastResizableImg = null;
		function destroyResizable() {
			if(lastResizableImg == null) return;
			lastResizableImg.resizable( "destroy" );
			lastResizableImg.removeData('resizable');
			lastResizableImg = null;
		}

		var enableImageResize = function() {
			$('.wysiwyg-editor')
			.on('mousedown', function(e) {
				var target = $(e.target);
				if( e.target instanceof HTMLImageElement ) {
					if( !target.data('resizable') ) {
						target.resizable({
							aspectRatio: e.target.width / e.target.height,
						});
						target.data('resizable', true);
						
						if( lastResizableImg != null ) {//disable previous resizable image
							lastResizableImg.resizable( "destroy" );
							lastResizableImg.removeData('resizable');
						}
						lastResizableImg = target;
					}
				}
			})
			.on('click', function(e) {
				if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
					destroyResizable();
				}
			})
			.on('keydown', function() {
				destroyResizable();
			});
	    }
		
		enableImageResize();

		/**
		//or we can load the jQuery UI dynamically only if needed
		if (typeof jQuery.ui !== 'undefined') enableImageResize();
		else {//load jQuery UI if not loaded
			$.getScript($path_<?php echo Yii::app()->request->baseUrl; ?>/media+"/js/jquery-ui-1.10.3.custom.min.js", function(data, textStatus, jqxhr) {
				if('ontouchend' in document) {//also load touch-punch for touch devices
					$.getScript($path_<?php echo Yii::app()->request->baseUrl; ?>/media+"/js/jquery.ui.touch-punch.min.js", function(data, textStatus, jqxhr) {
						enableImageResize();
					});
				} else	enableImageResize();
			});
		}
		*/
	}

			
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').slimScroll({
					height: '300px'
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
				
				$('#simple-colorpicker-1').ace_colorpicker({pull_right:true}).on('change', function(){
					var color_class = $(this).find('option:selected').data('class');
					var new_class = 'widget-header';
					if(color_class != 'default')  new_class += ' header-color-'+color_class;
					$(this).closest('.widget-header').attr('class', new_class);
				});
				
				$('.slim-scroll').each(function () {
					var $this = $(this);
					$this.slimScroll({
						height: $this.data('height') || 100,
						railVisible:true
					});
				});
				
				// Portlets (boxes)
			    $('.widget-container-span').sortable({
			        connectWith: '.widget-container-span',
					items:'> .widget-box',
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'widget-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer'
			    });
				
				$('[data-rel=tooltip]').tooltip();
			
				$(".select2").css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				}); 
			
			
				var $validation = false;
				$('#fuelux-wizard').ace_wizard().on('change' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) return false;
					}
				}).on('finished', function(e) {
					bootbox.dialog({
						message: "Thank you! Your information was successfully saved!", 
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}
					});
				}).on('stepclick', function(e){
					//return false;//prevent clicking on steps
				});
			
			
				$('#skip-validation').removeAttr('checked').on('click', function(){
					$validation = this.checked;
					if(this.checked) {
						$('#sample-form').hide();
						$('#validation-form').removeClass('hide');
					}
					else {
						$('#validation-form').addClass('hide');
						$('#sample-form').show();
					}
				});
			
			
			
				//documentation : http://docs.jquery.com/Plugins/Validation/validate
			
			
				$.mask.definitions['~']='[+-]';
				$('#phone').mask('(999) 999-9999');
			
				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");
			
				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					rules: {
						email: {
							required: true,
							email:true
						},
						password: {
							required: true,
							minlength: 5
						},
						password2: {
							required: true,
							minlength: 5,
							equalTo: "#password"
						},
						name: {
							required: true
						},
						phone: {
							required: true,
							phone: 'required'
						},
						url: {
							required: true,
							url: true
						},
						comment: {
							required: true
						},
						state: {
							required: true
						},
						platform: {
							required: true
						},
						subscription: {
							required: true
						},
						gender: 'required',
						agree: 'required'
					},
			
					messages: {
						email: {
							required: "Please provide a valid email.",
							email: "Please provide a valid email."
						},
						password: {
							required: "Please specify a password.",
							minlength: "Please specify a secure password."
						},
						subscription: "Please choose at least one option",
						gender: "Please choose gender",
						agree: "Please accept our policy"
					},
			
					invalidHandler: function (event, validator) { //display error alert on form submit   
						$('.alert-danger', $('.login-form')).show();
					},
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
						$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is(':checkbox') || element.is(':radio')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},
			
					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});
			
				$('#modal-wizard .modal-header').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
				
			function showErrorAlert (reason, detail) {
				var msg='';
				if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
				else {
					console.log("error uploading file", reason, detail);
				}
				$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
				 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
			}	

			var $validation = false;
			$('#fuelux-wizard').ace_wizard().on('change' , function(e, info){
				if(info.step == 1 && $validation) {
					if(!$('#validation-form').valid()) return false;
				}
			}).on('finished', function(e) {
				bootbox.dialog({
					message: "Thank you! Your information was successfully saved!", 
					buttons: {
						"success" : {
							"label" : "OK",
							"className" : "btn-sm btn-primary"
						}
					}
				});
			}).on('stepclick', function(e){
				//return false;//prevent clicking on steps
			});
			
			$('#skip-validation').removeAttr('checked').on('click', function(){
				$validation = this.checked;
				if(this.checked) {
					$('#sample-form').hide();
					$('#validation-form').removeClass('hide');
				}
				else {
					$('#validation-form').addClass('hide');
					$('#sample-form').show();
				}
			});
			
			
			$.mask.definitions['~']='[+-]';
			$('#phone').mask('(999) 999-9999');
		
			jQuery.validator.addMethod("phone", function (value, element) {
				return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
			}, "Enter a valid phone number.");
		
			$('#validation-form').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				rules: {
					email: {
						required: true,
						email:true
					},
					password: {
						required: true,
						minlength: 5
					},
					password2: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					},
					name: {
						required: true
					},
					phone: {
						required: true,
						phone: 'required'
					},
					url: {
						required: true,
						url: true
					},
					comment: {
						required: true
					},
					state: {
						required: true
					},
					platform: {
						required: true
					},
					subscription: {
						required: true
					},
					gender: 'required',
					agree: 'required'
				},
		
				messages: {
					email: {
						required: "Please provide a valid email.",
						email: "Please provide a valid email."
					},
					password: {
						required: "Please specify a password.",
						minlength: "Please specify a secure password."
					},
					subscription: "Please choose at least one option",
					gender: "Please choose gender",
					agree: "Please accept our policy"
				},
		
				invalidHandler: function (event, validator) { //display error alert on form submit   
					$('.alert-danger', $('.login-form')).show();
				},
		
				highlight: function (e) {
					$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
				},
		
				success: function (e) {
					$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
					$(e).remove();
				},
		
				errorPlacement: function (error, element) {
					if(element.is(':checkbox') || element.is(':radio')) {
						var controls = element.closest('div[class*="col-"]');
						if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
						else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
					}
					else if(element.is('.select2')) {
						error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
					}
					else if(element.is('.chosen-select')) {
						error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
					}
					else error.insertAfter(element.parent());
				},
		
				submitHandler: function (form) {
				},
				invalidHandler: function (form) {
				}
			});
			
		/*END*/
		});
		</script>
	</body>

<!-- Mirrored from 192.69.216.111/themes/preview/ace/ by HTTrack Website Copier/3.x [XR&CO'2013], Fri, 15 Nov 2013 07:12:53 GMT -->
</html>

<?php } ?>