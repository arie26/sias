<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header" >
				<h5>Tambah Data Mata Pelajarana</h5>

				<div class="widget-toolbar">
					<a href="#" data-action="settings">
						<i class="icon-cog"></i>
					</a>

					<a href="#" data-action="reload">
						<i class="icon-refresh"></i>
					</a>

					<a href="#" data-action="collapse">
						<i class="icon-chevron-up"></i>
					</a>

					<a href="#" data-action="close">
						<i class="icon-remove"></i>
					</a>
				</div>
			</div>		
			<script>
				window.onload = function(){
						$.fn.capitalize = function () {
					    $.each(this, function () {
					        var split = this.value.split(' ');
					        for (var i = 0, len = split.length; i < len; i++) {
					            split[i] = split[i].charAt(0).toUpperCase() + split[i].slice(1);
					        }
					        this.value = split.join(' ');
					    });
					    return this;
						};

						$('#mapel_nama').on('keyup', function () {
						    $(this).capitalize();
						}).capitalize();

						$('#Registrants_call_sign').on('keyup', function () {
						    $(this).val($(this).val().toUpperCase());
						});

			            $('#Registrants_tanggal_lahir').datepicker().on('changeDate',function(ev){
			            	var dob = new Date(this.value);
			                var today = new Date();
			                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
			                if(age <17){
			                	$('#si_orangtua').show();
			                }
			                else{
			                	$('#si_orangtua').hide();	
			                }
			            });

						$('#mapel_kontak').keydown(function(event) {
					    	// Allow only backspace and delete
					    	if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40) {
					    		// let it happen, don't do anything
					    	}
					    	else {
					    		// Ensure that it is a number and stop the keypress
					    		if (event.keyCode < 48 || event.keyCode > 57 ) {
					    			event.preventDefault();	
					    		}	
					    	}
					    });

			      }
			</script>
			<div class="widget-body">
				<div class="widget-main">
					<div class='step-content row-fluid position-relative' id='step-container'>
						<div class='step-pane active' id='step1'>
							<form class='form-horizontal' enctype="multipart/form-data" id="addmapel" method="POST" action="<?php echo Yii::app()->getBaseUrl(true).'/mapel/add'; ?>" >
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='mapel_nama'>Nama<font color="red">*</font> :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input class='col-xs-12 col-sm-6' type='text' name='Mapels[nama]' id='mapel_nama' required/>
										</div>
									</div>
								</div>

								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='mapel_status'>Sifat<font color="red">*</font> :</label>
									
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">

											<div class="radio">
												<label>
													<input  type="radio" value="1" name="Mapels[sifat]" id="mapel_status" class="ace" checked="checked" required/>
													<span class="lbl"> Wajib</span>
												</label>
											</div>

											<div class="radio">
												<label>
													<input  type="radio" value="2" name="Mapels[sifat]" id="mapel_status" class="ace" />
													<span class="lbl"> Tambahan</span>
												</label>
											</div>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='mapel_status'>Status<font color="red">*</font> :</label>
									
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">

											<div class="radio">
												<label>
													<input  type="radio" value="1" name="Mapels[status]" id="mapel_status" class="ace" checked="checked" required/>
													<span class="lbl"> Aktif</span>
												</label>
											</div>

											<div class="radio">
												<label>
													<input  type="radio" value="2" name="Mapels[status]" id="mapel_status" class="ace" />
													<span class="lbl"> Tidak Aktif</span>
												</label>
											</div>
										</div>
									</div>
								</div>
																
								<div class='space-2'></div>			
													
								<div class='clearfix form-actions'>
									<div class='col-md-offset-2 col-md-9'>
										<button class='btn btn-info' type="submit">
											<i class='icon-ok bigger-110'></i>
											Submit
										</button>

										&nbsp; &nbsp; &nbsp;
										<button class='btn' type='reset' onclick=self.history.back()>
											<i class='icon-undo bigger-110'></i>
											Reset
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

