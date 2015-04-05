<div class="row">
	<div class="col-xs-12">	
		<div class="widget-box">
			<div class="widget-header" >
				<h5>Data Semester</h5>
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
					<div class='hr hr-18 dotted hr-double'></div>
				
					<div class='table-responsive'>
						<table id='semester' class='table table-striped table-bordered table-hover'>
							<thead>
								<tr>
									<th class='center'>No.</th>
									<th>Nama</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $j = 1;
								foreach ($semester as $semester){?>
								<tr>
									<td class='center'><?php echo $j; ?></td>
									<td><?php echo $semester->nama; ?></td>
									<td align="center"><?php if ($semester->status == '1')
										{
											echo "<span class='label label-sm label-success'>Aktif</span>";
										} 
										else if ($semester->status == '2')
										{
											echo "<span class='label label-sm label-inverse'>Tidak Aktif</span>";
										} ?>
									</td>
									<td>
										<div class='visible-md visible-lg hidden-sm hidden-xs action-buttons'>
											<a class='green' href="<?php echo Yii::app()->getBaseUrl(true)."/semester/edit/".Yii::app()->getSecurityManager()->encrypt($semester->id_semester); ?>" title="Edit">
												<i class='icon-pencil bigger-130'></i>
											</a>
										</div>
						
										<div class='visible-xs visible-sm hidden-md hidden-lg'>
											<div class='inline position-relative'>
												<button class='btn btn-minier btn-yellow dropdown-toggle' data-toggle='dropdown'>
													<i class='icon-caret-down icon-only bigger-120'></i>
												</button>

												<ul class='dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close'>
													<li>
														<a href="<?php echo Yii::app()->getBaseUrl(true)."/semester/edit/".Yii::app()->getSecurityManager()->encrypt($semester->id_semester); ?>" class='tooltip-success' title='Edit' data-rel="tooltip">
															<span class='green'>
																<i class='icon-edit bigger-120'></i>
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
						<p><i>(<font color="red">*</font>)Pastikan status semester hanya ada satu yang "Aktif".</i></p>
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

