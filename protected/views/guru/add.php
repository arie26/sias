<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header" >
				<h5>Add Data Guru</h5>

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

			<div class="widget-body">
				<div class="widget-main">
					<div class='step-content row-fluid position-relative' id='step-container'>
						<div class='step-pane active' id='step1'>
							<form class='form-horizontal' id='validation-form' method='POST' action="<?php echo Yii::app()->getBaseUrl(true) . '/site/add' ?>">
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='nip'>NIP :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input type='text' name='Guru[nip]' id='nip' class='col-xs-12 col-sm-6' required/>
										</div>
									</div>
								</div>

								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='Guru[nama]'>Nama :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input type='text' name='Guru[nama]' id='Guru[nama]' class='col-xs-12 col-sm-6' required/>
										</div>
									</div>
								</div>

								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='Guru[status]'>Status :</label>
									
									<div class="col-xs-12 col-sm-6">
										<div class="control-group">

											<div class="radio">
												<label>
													<input name="form-field-radio" type="radio" class="ace" value="1" name="Guru[status]" id="status" checked="checked"/>
													<span class="lbl"> Aktif</span>
												</label>
											</div>

											<div class="radio">
												<label>
													<input name="form-field-radio" type="radio" value="2" name="Guru[status]" id="status" class="ace" />
													<span class="lbl"> Cuti</span>
												</label>
											</div>

											<div class="radio">
												<label>
													<input name="form-field-radio" type="radio" value="3" name="Guru[status]" id="status" class="ace" />
													<span class="lbl"> Keluar</span>
												</label>
											</div>
										</div>
									</div>
								</div>

								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='Guru[tempat_lahir]'>Tempat Lahir :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input type='text' name='Guru[tempat_lahir]' id='Guru[tempat_lahir]' class='col-xs-12 col-sm-6' required/>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='Guru[tanggal_lahir]'>Tanggal Lahir :</label>
									
									<div class="col-xs-5 col-sm-3">
										<div class="input-group">
											<input class="form-control date-picker" id="id-date-picker-1" type="text" name='Guru[tanggal_lahir]' data-date-format="dd-mm-yyyy" />
											<span class="input-group-addon">
												<i class="icon-calendar bigger-110"></i>
											</span>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='Guru[alamat]'>Alamat :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'> 
											<textarea class="col-xs-12 col-sm-6" id="form-field-5" name='Guru[alamat]'></textarea>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='Guru[kontak]'>Kontak :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input type='text' name='Guru[kontak]' id='Guru[kontak]' class='col-xs-12 col-sm-6' required/>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='Guru[email]'>Email :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input type='email' placeholder="email@example.com" name='Guru[email]' id='Guru[email]' class='col-xs-12 col-sm-6' required/>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='Guru[gelar_depan]'>Gelar Depan :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input type='text' placeholder="ST, MT" name='Guru[gelar_depan]' id='Guru[gelar_depan]' class='col-xs-12 col-sm-6' required/>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='Guru[gelar_belakang]'>Gelar Belakang :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input type='text' placeholder="Ir." name='Guru[gelar_belakang]' id='Guru[gelar_belakang]' class='col-xs-12 col-sm-6' required/>
										</div>
									</div>
								</div>
								
								<div class='space-2'></div>
								
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-2 no-padding-right' for='Guru[foto]'>Foto :</label>

									<div class='col-xs-12 col-sm-3'>
										<div class='clearfix'>
											<input type="file" id="id-input-file-2" name='Guru[foto]' required/>
										</div>
									</div>
								</div>
																
								<div class='space-2'></div>			
													
								<div class='clearfix form-actions'>
									<div class='col-md-offset-2 col-md-9'>
										<button class='btn btn-info' type='submit'>
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

