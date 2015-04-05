<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header" >
				<h5>Edit Data Jadwal</h5>

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

						$('#kelas_nama').on('keyup', function () {
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

						$('#kelas_kapasistas').keydown(function(event) {
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
							<form class='form-horizontal' enctype="multipart/form-data" id="addkelas" method="POST" action="<?php echo Yii::app()->getBaseUrl(true).'/jadwal/edit/'.Yii::app()->getSecurityManager()->encrypt($jadwal->id_jadwal); ?>" >
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for=jadwal_nama'>Tahun Ajaran<font color="red">*</font> :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input class='col-xs-12 col-sm-6' type='text' name="Jadwals[id_tahann]" id='kelas_nama' value="<?php echo $jadwal->idTahunAjaran->nama; ?>" disabled="true">
											<input class='col-xs-12 col-sm-6' type='hidden' name="Jadwals[id_tahun_ajaran]" id='kelas_nama_hidden' value="<?php echo $jadwal->idTahunAjaran->id_tahun_ajaran; ?>" >
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for=jadwal_nama'>Kelas<font color="red">*</font> :</label>

									<div class='col-xs-12 col-sm-3'>
										<select name="Jadwals[id_kelas]" id="Kelass_wali_kelas" class="form-control">
												<option value="<?php echo $jadwal->id_kelas; ?>"><?php echo $jadwal->idKelas->nama; ?></option>
												<?php foreach ($kelas as $kelas) { ?>
													<option value="<?php echo $kelas['id_kelas']; ?>"><?php echo $kelas['nama']; ?></option>		
												<?php }?>
											</select>
									</div>
								</div>
								
								<div class='space-2'></div>	
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for=jadwal_nama'>Mata Pelajaran<font color="red">*</font> :</label>

									<div class='col-xs-12 col-sm-3'>
										<select name="Jadwals[id_mapel]" id="Kelass_wali_kelas" class="form-control">
												<option value="<?php echo $jadwal->id_mapel; ?>"><?php echo $jadwal->idMapel->nama; ?></option>q
												<?php foreach ($mapel as $mapel) { ?>
													<option value="<?php echo $mapel['id_mapel']; ?>"><?php echo $mapel['nama']; ?></option>		
												<?php }?>
											</select>
									</div>
								</div>
								
								<div class='space-2'></div>	
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for=jadwal_nama'>Pengajar<font color="red">*</font> :</label>

									<div class='col-xs-12 col-sm-3'>
										
										<select name="Jadwals[id_guru]" id="Kelass_wali_kelas" class="form-control">
										<option value="<?php echo $jadwal->id_guru; ?>">
											<?php if($jadwal->idGuru->gelar_depan == null){
														echo "";
													}else{
														echo $jadwal->idGuru->gelar_depan." ";
													}
												
													echo $jadwal->idGuru->nama; 
													
													if($jadwal->idGuru->gelar_belakang == null){
														echo "";
													}else{
														echo ", ".$jadwal->idGuru->gelar_belakang;
													}?>
										</option>
												<?php foreach ($guru as $guru) { ?>
													<option value="<?php echo $guru['id_guru']; ?>">
														<?php if($guru->gelar_depan == null){
															echo "";
														}else{
															echo $guru->gelar_depan." ";
														}
													
														echo $guru->nama; 
														
														if($guru->gelar_belakang == null){
															echo "";
														}else{
															echo ", ".$guru->gelar_belakang;
														}?>
													</option>		
												<?php }?>
											</select>
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

