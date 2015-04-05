<div class="row">
	<div class="col-xs-12">	
		<div class="widget-box">
			<div class="widget-header" >
				<h5>Data Pembagian Kelas</h5>
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
					<a href="<?php echo Yii::app()->baseUrl; ?>/bagkel/add">
						<button class='btn btn-danger'>
							<i class='icon-plus align-top bigger-125'></i>
							Tambah Data Pembagian Kelas
						</button>
					</a>
					<div class='hr hr-18 dotted hr-double'></div>
				
					<div class='table-responsive'>
						<table id='bagkel' class='table table-striped table-bordered table-hover'>
							<thead>
								<tr>
									<th class='center'>No.</th>
									<th>Nama Siswa</th>
									<th>Kelas</th>
									<th>Tahun Ajaran</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $j = 1;
								foreach ($bagkel as $bagkel){?>
								<tr>
									<td class='center'><?php echo $j; ?></td>
									<td><?php echo $bagkel->idSiswa->nama; ?></td>
									<td><?php echo $bagkel->idKelas->nama; ?></td>
									<td><?php echo $bagkel->idTahunAjaran->nama; ?></td>
									<td>
										<div class='visible-md visible-lg hidden-sm hidden-xs action-buttons'>
											<a class='green' href="<?php echo Yii::app()->getBaseUrl(true)."/bagkel/edit/".Yii::app()->getSecurityManager()->encrypt($bagkel->id_pembagian_kelas); ?>" title="Edit">
												<i class='icon-pencil bigger-130'></i>
											</a>
											
											<a class='red'  onclick="return confirm_click();" href="<?php echo Yii::app()->getBaseUrl(true)."/bagkel/delete/".Yii::app()->getSecurityManager()->encrypt($bagkel->id_pembagian_kelas); ?>" title="Hapus">
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
														<a href="<?php echo Yii::app()->getBaseUrl(true)."/bagkel/edit/".Yii::app()->getSecurityManager()->encrypt($bagkel->id_pembagian_kelas); ?>" class='tooltip-success' title='Edit' data-rel="tooltip">
															<span class='green'>
																<i class='icon-edit bigger-120'></i>
															</span>
														</a>
														<a href="<?php echo Yii::app()->getBaseUrl(true)."/bagkel/delete/".Yii::app()->getSecurityManager()->encrypt($bagkel->id_pembagian_kelas); ?>" class='tooltip-error' title='Hapus' data-rel="tooltip" onclick="return confirm_click();">
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

