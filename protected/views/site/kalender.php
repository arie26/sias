<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header" >
				<h5>Kalender</h5>

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
							<form class='form-horizontal' id='validation-form' method='POST' action='$aksi?module=kategori&act=input'>
								<div class='form-group'>
									<label class='control-label col-xs-12 col-sm-3 no-padding-right' for='nama_kategori'>Nama Kategori :</label>

									<div class='col-xs-12 col-sm-9'>
										<div class='clearfix'>
											<input type='text' name='nama_kategori' id='nama_kategori' class='col-xs-12 col-sm-6' required/>
										</div>
									</div>
								</div>

								<div class='space-2'></div>
													
								<div class='clearfix form-actions'>
									<div class='col-md-offset-3 col-md-9'>
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


