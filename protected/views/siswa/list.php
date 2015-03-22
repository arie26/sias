<div class="row">
	<div class="col-xs-12">	
		<div class="widget-box">
			<div class="widget-header" >
				<h5>Data Siswa</h5>
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
					<!--<button class="btn btn-info" id="bootbox-confirm">Confirm</button>-->
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/siswa/add">
						<button class='btn btn-danger'>
							<i class='icon-plus align-top bigger-125'></i>
							Add Data Siswa
						</button>
					</a>
					<div class='hr hr-18 dotted hr-double'></div>
				
					<div class='table-responsive'>
						<table id='siswa' class='table table-striped table-bordered table-hover'>
							<thead>
								<tr>
									<th class='center'>No.</th>
									<th>NIS</th>
									<th>Nama</th>
									<th>Tahun Masuk</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $j = 1;
								foreach ($siswas as $siswa){?>
								<tr>
									<td class='center'><?php echo $j; ?></td>
									<td><?php echo $siswa->nis; ?></td>
									<td><?php echo $siswa->nama; ?></td>
									<td><?php echo $siswa->tahun_masuk; ?></td>
									<td align="center"><?php if ($siswa->status == '1')
										{
											echo "<span class='label label-sm label-success'>Aktif</span>";
										} 
										else if ($siswa->status == '2')
										{
											echo "<span class='label label-sm label-primary'>Lulus</span>";
										} 
										else if ($siswa->status == '3')
										{
											echo "<span class='label label-sm label-inverse'>Keluar</span>";
										}?>
									</td>
									<td>
										<div class='visible-md visible-lg hidden-sm hidden-xs action-buttons'>
											<a class='blue' href="<?php echo Yii::app()->getBaseUrl(true)."/siswa/view/".Yii::app()->getSecurityManager()->encrypt($siswa->id_siswa); ?>" title="Lihat">
												<i class='icon-zoom-in bigger-130'></i>
											</a>
										
											<a class='green' href="<?php echo Yii::app()->getBaseUrl(true)."/siswa/edit/".Yii::app()->getSecurityManager()->encrypt($siswa->id_siswa); ?>" title="Edit">
												<i class='icon-pencil bigger-130'></i>
											</a>
											
											<a class='red'  onclick="return confirm_click();" href="<?php echo Yii::app()->getBaseUrl(true)."/siswa/delete/".Yii::app()->getSecurityManager()->encrypt($siswa->id_siswa); ?>" title="Hapus">
												<i class='icon-trash bigger-130'></i>
											</a>
										</div>
						
										<div class='visible-xs visible-sm hidden-md hidden-lg'>
											<div class='inline position-relative'>
												<button class='btn btn-minier btn-yellow dropdown-toggle' data-toggle='dropdown'>
													<i class='icon-caret-down icon-only bigger-120'></i>
												</button>

												<ul class='dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close'>
													<li>
														<a href="<?php echo Yii::app()->getBaseUrl(true)."/siswa/view/".Yii::app()->getSecurityManager()->encrypt($siswa->id_siswa); ?>" class='tooltip-info' title='View' data-rel="tooltip">
																<span class='blue'>
																	<i class='icon-zoom-in bigger-120'></i>
																</span>
														</a>
														<a href="<?php echo Yii::app()->getBaseUrl(true)."/siswa/edit/".Yii::app()->getSecurityManager()->encrypt($siswa->id_siswa); ?>" class='tooltip-success' title='Edit' data-rel="tooltip">
															<span class='green'>
																<i class='icon-edit bigger-120'></i>
															</span>
														</a>
														<a href="<?php echo Yii::app()->getBaseUrl(true)."/siswa/delete/".Yii::app()->getSecurityManager()->encrypt($siswa->id_siswa); ?>" class='tooltip-error' title='Hapus' data-rel="tooltip" onclick="return confirm_click();">
															<span class='red'>
																<i class='icon-trash bigger-120'></i>
															</span>
														</a>
													</li>
												</ul>
											</div>
										</div>
									</td>
								</tr>
								<?php $j++; }  ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function confirm_click()
{
return confirm("Apakah anda yakin ingin menghapus ?");
}

</script>

