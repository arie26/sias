<div class="row">
	<div class="col-xs-12">	
		<div class="widget-box">
			<div class="widget-header" >
				<h5>Data Tahun Ajaran</h5>
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
					<a href="<?php echo Yii::app()->baseUrl; ?>/tahan/add">
						<button class='btn btn-danger'>
							<i class='icon-plus align-top bigger-125'></i>
							Tambah Data Tahun Ajaran
						</button>
					</a>
					<div class='hr hr-18 dotted hr-double'></div>
				
					<div class='table-responsive'>
						<table id='tahan' class='table table-striped table-bordered table-hover'>
							<thead>
								<tr>
									<th class='center'>No.</th>
									<th>Nama</th>
									<th>Tanngal Mulai</th>
									<th>Tanngal Akhir</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $j = 1;
								foreach ($tahan as $tahan){?>
								<tr>
									<td class='center'><?php echo $j; ?></td>
									<td><?php echo $tahan->nama; ?></td>
									<td><?php echo Yii::app()->dateFormatter->format('dd MMMM yyyy',$tahan->tanggal_mulai); ?></td>
									<td><?php echo Yii::app()->dateFormatter->format('dd MMMM yyyy',$tahan->tanggal_akhir); ?></td>
									<td align="center"><?php if ($tahan->status == '1')
										{
											echo "<span class='label label-sm label-success'>Aktif</span>";
										} 
										else if ($tahan->status == '2')
										{
											echo "<span class='label label-sm label-inverse'>Tidak Aktif</span>";
										} ?>
									</td>
									<td>
										<div class='visible-md visible-lg hidden-sm hidden-xs action-buttons'>
											<a class='green' href="<?php echo Yii::app()->getBaseUrl(true)."/tahan/edit/".Yii::app()->getSecurityManager()->encrypt($tahan->id_tahun_ajaran); ?>" title="Edit">
												<i class='icon-pencil bigger-130'></i>
											</a>
											
											<!--<a class='red'  onclick="return confirm_click();" href="<?php //echo Yii::app()->getBaseUrl(true)."/tahan/delete/".Yii::app()->getSecurityManager()->encrypt($tahan->id_tahun_ajaran); ?>" title="Hapus">
												<i class='icon-trash bigger-130'></i>-->
											</a>
										</div>
						
										<div class='visible-xs visible-sm hidden-md hidden-lg'>
											<div class='inline position-relative'>
												<button class='btn btn-minier btn-yellow dropdown-toggle' data-toggle='dropdown'>
													<i class='icon-caret-down icon-only bigger-120'></i>
												</button>

												<ul class='dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close'>
													<li>
														<a href="<?php echo Yii::app()->getBaseUrl(true)."/tahan/edit/".Yii::app()->getSecurityManager()->encrypt($tahan->id_tahun_ajaran); ?>" class='tooltip-success' title='Edit' data-rel="tooltip">
															<span class='green'>
																<i class='icon-edit bigger-120'></i>
															</span>
														</a>
														<!--<a href="<?php //echo Yii::app()->getBaseUrl(true)."/tahan/delete/".Yii::app()->getSecurityManager()->encrypt($tahan->id_tahun_ajaran); ?>" class='tooltip-error' title='Hapus' data-rel="tooltip" onclick="return confirm_click();">
															<span class='red'>
																<i class='icon-trash bigger-120'></i>
															</span>
														</a>-->
													</li>
												</ul>
											</div>
										</div>
									</td>
								</tr>
								<?php $j++; }  ?>
							</tbody>
						</table>
						<p><i>(<font color="red">*</font>)Pastikan status tahun ajaran hanya ada satu yang "Aktif".</i></p>
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

