<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header" >
				<h5>Edit Data Guru</h5>

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

						$('#guru_nama, #guru_tempat_lahir, #guru_alamat').on('keyup', function () {
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

						$('#guru_kontak').keydown(function(event) {
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
							<form class='form-horizontal' enctype="multipart/form-data" id="addGuru" method="POST" action="<?php echo Yii::app()->getBaseUrl(true).'/guru/edit/'.Yii::app()->getSecurityManager()->encrypt($gurus->id_guru);?>" >
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='guru_nip'>NIP<font color="red">*</font> :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input class='col-xs-12 col-sm-6' type='text' name='Gurus[nip]' id='guru_nip' disabled="true" value="<?php echo $gurus->nip?>" />
										</div>
									</div>
								</div>

								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='guru_nama'>Nama<font color="red">*</font> :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input class='col-xs-12 col-sm-6' type='text' name='Gurus[nama]' id='guru_nama' value="<?php echo $gurus->nama; ?>" required/>
										</div>
									</div>
								</div>

								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='guru_status'>Status<font color="red">*</font> :</label>
									
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">

											<div class="radio">
												<label>
													<input  type="radio" value="1" name="Gurus[status]" id="guru_status" class="ace" 
													<?php if($gurus->status == 1){echo "checked=checked";} ?>/>
													<span class="lbl"> Aktif</span>
												</label>
											</div>

											<div class="radio">
												<label>
													<input  type="radio" value="2" name="Gurus[status]" id="guru_status" class="ace"
													<?php if($gurus->status == 2){echo "checked=checked";} ?>/>
													<span class="lbl"> Cuti</span>
												</label>
											</div>

											<div class="radio">
												<label>
													<input  type="radio" value="3" name="Gurus[status]" id="guru_status" class="ace"
													<?php if($gurus->status == 3){echo "checked=checked";} ?>/>
													<span class="lbl"> Keluar</span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='guru_tempat_lahir'>Tempat Lahir<font color="red">*</font> :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input class='col-xs-12 col-sm-6' type='text' name='Gurus[tempat_lahir]' id='guru_tempat_lahir' value="<?php echo $gurus->tempat_lahir;?>" required/>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='guru_tanggal_lahir'>Tanggal Lahir<font color="red">*</font> :</label>
									
									<div class="col-xs-5 col-sm-3">
										<div class="input-group">
											<input class="form-control date-picker" id="id-date-picker-1" type="text" name='Gurus[tanggal_lahir]' data-date-format="dd-mm-yyyy" value="<?php echo Yii::app()->dateFormatter->format('dd-MM-yyyy',$gurus->tanggal_lahir);?>" required/>
											<span class="input-group-addon">
												<i class="icon-calendar bigger-110"></i>
											</span>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='guru_alamat'>Alamat<font color="red">*</font> :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'> 
											<textarea class="col-xs-12 col-sm-6" id="guru_alamat" name='Gurus[alamat]' required><?php echo $gurus->alamat;?></textarea>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='guru_kontak'>Kontak<font color="red">*</font> :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input class='col-xs-12 col-sm-6' type='text' name='Gurus[kontak]' id='guru_kontak' value="<?php echo $gurus->kontak;?>" required/>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='guru_email'>Email<font color="red">*</font> :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input class='col-xs-12 col-sm-6' type='email' placeholder="email@example.com" name='Gurus[email]' id='guru_email' value="<?php echo $gurus->email;?>" required/>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='guru_gelar_depan'>Gelar Depan :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input class='col-xs-12 col-sm-6' type='text' placeholder="contoh : Ir." name='Gurus[gelar_depan]' id='guru_gelar_depan' value="<?php echo $gurus->gelar_depan;?>" />
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='guru_gelar_belakang'>Gelar Belakang :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input class='col-xs-12 col-sm-6' type='text' placeholder="contoh : ST, MT" name='Gurus[gelar_belakang]' id='guru_gelar_belakang' value="<?php echo $gurus->gelar_belakang;?>" />
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='berat'>Foto :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<a href="<?php echo Yii::app()->getBaseUrl(true); ?>/guru/download_foto/<?php echo Yii::app()->getSecurityManager()->encrypt($gurus->id_guru);?>" target="blank">
												<img width="105" height="143" src="<?php echo Yii::app()->getBaseUrl(true); ?>/guru/showimage/<?php echo Yii::app()->getSecurityManager()->encrypt($gurus->id_guru);?>" style="border-style: solid; border-width: 1px; border-color: #D8D8D8;" />
											</a>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='guru_foto'>Ganti Foto :</label>

									<div class='col-xs-12 col-sm-3'>
										<div class='clearfix'>
											<input type="file" id="id-input-file-1" name="Gurus[foto]" />
											<!--<a href="<?php //echo Yii::app()->getBaseUrl(true); ?>/guru/download_foto/<?php //echo Yii::app()->getSecurityManager()->encrypt($gurus->id_guru);?>" target="blank"><?php //echo $gurus->foto?></a>-->
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
										<button class='btn' type='reset'  onclick="javascript:history.go(-1)">
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