<div class="row">
	<div class="col-xs-12">	
		<div class="widget-box">
			<div class="widget-header" >
				<h5>Data Guru</h5>
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
				
					<a href="<?php echo Yii::app()->request->baseUrl; ?>/guru/add">
						<button class='btn btn-danger'>
							<i class='icon-cogs align-top bigger-125'></i>
							Add Data Guru
						</button>
					</a>
					<div class='hr hr-18 dotted hr-double'></div>
				
					<div class='table-responsive'>
						<table id='guru' class='table table-striped table-bordered table-hover'>
							<thead>
								<tr>
									<th class='center'>No.</th>
									<th>NIP</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $j = 1;
								foreach ($gurus as $guru){?>
								<tr>
									<td class='center'><?php echo $j; ?></td>
									<td><?php echo $guru->nip; ?></td>
									<td><?php echo $guru->nama.', '.$guru->gelar_belakang; ?></td>
									<td><?php echo $guru->alamat; ?></td>
									<td><?php if ($guru->status == '1')
										{
											echo "<span class='label label-sm label-success'>Aktif</span>";
										} 
										else if ($guru->status == '2')
										{
											echo "<span class='label label-sm label-warning'>Cuti</span>";
										} 
										else if ($guru->status == '3')
										{
											echo "<span class='label label-sm label-inverse'>Keluar</span>";
										}?>
									</td>
									<td>
										<div class='visible-md visible-lg hidden-sm hidden-xs action-buttons'>
											<a class='green' href=''>
												<i class='icon-pencil bigger-130'></i>
											</a>
										</div>
						
										<div class='visible-xs visible-sm hidden-md hidden-lg'>
											<div class='inline position-relative'>
												<button class='btn btn-minier btn-danger dropdown-toggle' data-toggle='dropdown'>
													<i class='icon-caret-down icon-only bigger-120'></i>
												</button>

												<ul class='dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close'>
													<li>
														<a href='' class='tooltip-success' data-rel='tooltip' title='Edit'>
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


