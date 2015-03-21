<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header" >
				<h5>Profile Guru</h5>

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
							<i class='icon-exchange align-top bigger-125'></i>
							Kembali
						</button>
							
						<div class="hr hr-18 dotted hr-double"></div>
						<div class="space-10"></div>
						
						<div id="user-profile-1" class="user-profile row">
							<div class="col-xs-12 col-sm-3 center">
								<div>
									<span class="profile-picture">
										<a href="<?php echo Yii::app()->getBaseUrl(true); ?>/guru/download_foto/<?php echo Yii::app()->getSecurityManager()->encrypt($gurus->id_guru);?>" target="blank">
											<img width="143" height="211" src="<?php echo Yii::app()->getBaseUrl(true); ?>/guru/showimage/<?php echo Yii::app()->getSecurityManager()->encrypt($gurus->id_guru);?>" style="border-style: solid; border-width: 1px; border-color: #D8D8D8;" />
										</a>
									</span>

									<div class="space-4"></div>

									<div class="width-80 label label-info label-xlg arrowed-in arrowed-in-right">
										<div class="inline position-relative">
												<span class="white"><?php 
													if($gurus->gelar_depan == null){
														echo "";
													}else{
														echo $gurus->gelar_depan." ";
													}
													
													echo $gurus->nama; 
													
													if($gurus->gelar_belakang == null){
														echo "";
													}else{
														echo ", ".$gurus->gelar_belakang;
													}?></span>
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
											<span class="editable" id="username"><?php echo $gurus->nip; ?></span>
										</div>
									</div>
								
									<div class="profile-info-row">
										<div class="profile-info-name"> Nama </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?php 
													if($gurus->gelar_depan == null){
														echo "";
													}else{
														echo $gurus->gelar_depan." ";
													}
													
													echo $gurus->nama; 
													
													if($gurus->gelar_belakang == null){
														echo "";
													}else{
														echo ", ".$gurus->gelar_belakang;
													}?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Tempat Lahir </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?php echo $gurus->tempat_lahir; ?></span>
										</div>
									</div>
									
									<div class="profile-info-row">
										<div class="profile-info-name"> Tempat Lahir </div>

										<div class="profile-info-value">
											<span class="editable" id="username"><?php echo Yii::app()->dateFormatter->format('dd MMMM yyyy',$gurus->tanggal_lahir); ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Alamat </div>

										<div class="profile-info-value">
											<i class="icon-map-marker light-orange bigger-110"></i>&nbsp;
											<span class="editable" id="username"><?php echo $gurus->alamat; ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Kontak </div>

										<div class="profile-info-value">
											<span class="editable" id="age"><?php echo $gurus->kontak; ?></span>
										</div>
									</div>

									<div class="profile-info-row">
										<div class="profile-info-name"> Email </div>

										<div class="profile-info-value">
											<span class="editable" id="signup"><?php echo $gurus->email; ?></span>
										</div>
									</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>