<div class="row">
    <div class="col-lg-12">
        <h3>Aplication Setting</h3>

        <form class="cmxform form-horizontal " id="editUser" method="POST" action="">
            <section class="panel">
                <header class="panel-heading">
                    Exam
				<span class="tools pull-right">
					<a class="fa fa-chevron-down" href="javascript:;"></a>
					<a class="fa fa-cog" href="javascript:;"></a>
					<a class="fa fa-times" href="javascript:;"></a>
				 </span>
                </header>

                <div class="panel-body">
                    <div class="form">
                        <?php foreach ($exam as $key => $value) { ?>
                            <div class="form-group">
                                <label for="Users_user_name"
                                       class="col-sm-5 control-label col-lg-5"><?php echo $key; ?></label>

                                <div class="col-lg-5">
                                    <input class="form-control" maxlength="20" name="config[exam][<?php echo $key; ?>]"
                                           id="" value="<?php echo $value; ?>" type="text">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>

            <?php if (Yii::app()->session['role'] == 'admin'){?>
            <section class="panel">
                <header class="panel-heading">
                    Payment
				<span class="tools pull-right">
					<a class="fa fa-chevron-down" href="javascript:;"></a>
					<a class="fa fa-cog" href="javascript:;"></a>
					<a class="fa fa-times" href="javascript:;"></a>
				 </span>
                </header>

                <div class="panel-body">
                    <div class="form">
                        <?php foreach ($payment as $key => $value) { ?>
                            <div class="form-group">
                                <label for="Users_user_name"
                                       class="col-sm-5 control-label col-lg-5"><?php echo $key; ?></label>

                                <div class="col-lg-5">
                                    <input class="form-control" maxlength="20" name="config[payment][<?php echo $key; ?>]"
                                           id="" value="<?php echo $value; ?>" type="text">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <?php }?>

            <section class="panel">
                <header class="panel-heading">
                    Alert & Notifikasi
				<span class="tools pull-right">
					<a class="fa fa-chevron-down" href="javascript:;"></a>
					<a class="fa fa-cog" href="javascript:;"></a>
					<a class="fa fa-times" href="javascript:;"></a>
				 </span>
                </header>

                <div class="panel-body">
                    <div class="form">
                        <?php foreach ($notification_bar as $key => $value) { ?>
                            <div class="form-group">
                                <label for="Users_user_name"
                                       class="col-sm-5 control-label col-lg-5"><?php echo $key; ?></label>

                                <div class="col-lg-5">
                                    <input class="form-control" maxlength="20" name="config[notification_bar][<?php echo $key; ?>]"
                                           id="" value="<?php echo $value; ?>" type="text">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>

            <section class="panel">
                <header class="panel-heading">
                    Layout Cetak Kartu Ujian
				<span class="tools pull-right">
					<a class="fa fa-chevron-down" href="javascript:;"></a>
					<a class="fa fa-cog" href="javascript:;"></a>
					<a class="fa fa-times" href="javascript:;"></a>
				 </span>
                </header>

                <div class="panel-body">
                    <div class="form">
                        <?php foreach ($print_kartu_ujian as $key => $value) { ?>
                            <div class="form-group">
                                <label for="Users_user_name"
                                       class="col-sm-5 control-label col-lg-5"><?php echo $key; ?></label>

                                <div class="col-lg-5">
                                    <input class="form-control" maxlength="20" name="config[print_kartu_ujian][<?php echo $key; ?>]"
                                           id="" value="<?php echo $value; ?>" type="text">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>

            <section class="panel">
                <header class="panel-heading">
                    Layout Cetak Sertifikat
				<span class="tools pull-right">
					<a class="fa fa-chevron-down" href="javascript:;"></a>
					<a class="fa fa-cog" href="javascript:;"></a>
					<a class="fa fa-times" href="javascript:;"></a>
				 </span>
                </header>

                <div class="panel-body">
                    <div class="form">
                        <?php foreach ($print_certificate as $key => $value) { ?>
                            <div class="form-group">
                                <label for="Users_user_name"
                                       class="col-sm-5 control-label col-lg-5"><?php echo $key; ?></label>

                                <div class="col-lg-5">
                                    <input class="form-control" maxlength="20" name="config[print_certificate][<?php echo $key; ?>]"
                                           id="" value="<?php echo $value; ?>" type="text">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </section>
            <section class="panel">
                <header class="panel-heading">
                    Nomor Sertifikat Selanjutnya
				<span class="tools pull-right">
					<a class="fa fa-chevron-down" href="javascript:;"></a>
					<a class="fa fa-cog" href="javascript:;"></a>
					<a class="fa fa-times" href="javascript:;"></a>
				 </span>
                </header>

                <div class="panel-body">
                    <div class="form">
                        <div class="form-group">
                            <label for="Users_user_name"
                                   class="col-sm-5 control-label col-lg-5">next_certificate_number</label>

                            <div class="col-lg-5">
                                <input class="form-control" maxlength="20" name="config[next_certificate_number]"
                                       id="" value="<?php echo $next_certificate_number; ?>" type="text">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-5 control-label col-lg-5"></label>

                            <div class="col-lg-5">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</div>