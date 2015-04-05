<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header" >
				<h5>Profil Siswa</h5>

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
					<div>
						<button class='btn btn-danger' onclick="javascript:history.go(-1)">
							<i class='icon-reply align-top bigger-125'></i>
							Kembali
						</button>
							
						<div class="hr hr-18 dotted hr-double"></div>
						<div class="space-10"></div>
						
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-3 center">
								<div>
									<span class="profile-picture">
										<a href="<?php echo Yii::app()->getBaseUrl(true); ?>/siswa/download_foto/<?php echo Yii::app()->getSecurityManager()->encrypt($siswas->id_siswa);?>" target="blank">
											<img width="143" height="211" src="<?php echo Yii::app()->getBaseUrl(true); ?>/siswa/showimage/<?php echo Yii::app()->getSecurityManager()->encrypt($siswas->id_siswa);?>" style="border-style: solid; border-width: 1px; border-color: #D8D8D8;" />
										</a>
									</span>

									<div class="space-4"></div>

									<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
												<span class="white"><?php echo $siswas->nama; ?></span>
											</a>
										</div>
									</div>
								</div>

							</div>

							<div class="col-xs-12 col-sm-9">

								<div class="profile-user-info profile-user-info-striped">
									<div class="profile-info-row">
										<div class="profile-info-name"> NIP </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?php echo $siswas->nis; ?></span>
										</div>
									</div>
								
									<div class="profile-info-row">
										<div class="profile-info-name"> Nama </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?php echo $siswas->nama; ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Status </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?php if ($siswas->status == '1')
												{
													echo "<span class='label label-sm label-success'>Aktif</span>";
												} 
												else if ($siswas->status == '2')
												{
													echo "<span class='label label-sm label-primary'>Lulus</span>";
												} 
												else if ($siswas->status == '3')
												{
													echo "<span class='label label-sm label-inverse'>Keluar</span>";
												}?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Tahun Masuk </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?php echo $siswas->tahun_masuk; ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Tempat Lahir </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?php echo $siswas->tempat_lahir; ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Tempat Lahir </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?php echo Yii::app()->dateFormatter->format('dd MMMM yyyy',$siswas->tanggal_lahir); ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Alamat </div>

										<div class="profile-info-value">
											<i class="icon-map-marker light-orange bigger-110"></i>&nbsp;
											<span class="editable" id="username"><?php echo $siswas->alamat; ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Orang Tua </div>

										<div class="profile-info-value">
											<span class="editable" id="age"><?php echo $siswas->orang_tua; ?></span>
										</div>
									</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>