<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a href="#">
                        <i class="fa fa-tasks"></i>
                        <span>UNAR</span>
                    </a>
                    <ul class="sub">                        
                        <li>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/site/kalender">
                                <i class="fa fa-calendar"></i>
                                <span>Kalender</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-tasks"></i>
                                <span>Daftar Ujian</span>
                            </a>
                            <ul class="sub">
                                <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/exam/mendatang">Akan Datang</a></li>
                                <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/exam/list_dibuka">Pendaftaran Dibuka</a></li>
                                <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/exam/riwayat">Riwayat Ujian</a></li>                               
                                <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/exam/listreschedule">Mohon Reschedule</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Peserta </span>
                            </a>
                            <ul class="sub">
                                <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/registrant/list">Daftar Peserta</a></li>
                                <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/registrant/bayar">Status Pembayaran</a></li>
                                <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/registrant/cetak_kartu">Cetak Kartu Ujian</a></li>
                                <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/registrant/nilai">Daftar Nilai</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-tasks"></i>
                        <span>IAR</span>
                    </a>
                    <ul class="sub">
                        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/registrant/sertifikat">Cetak IAR</a></li>
                        <!-- <li>
                            <a href="#">
                                <i class="fa fa-bullhorn"></i>
                                <span>Permohonan</span>
                            </a>
                            <ul class="sub">
                                <li> <a href="<?php //echo Yii::app()->request->baseUrl; ?>/logCertificate/listpermohonan/<?php //echo Yii::app()->getSecurityManager()->encrypt(1);?>">Permohonan Cetak Ulang IAR</a></li>
                                <li> <a href="<?php //echo Yii::app()->request->baseUrl; ?>/logCertificate/listpermohonan/<?php //echo Yii::app()->getSecurityManager()->encrypt(2);?>">Permohonan Perpanjangan IAR</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-tasks"></i>
                        <span>IAR KHUSUS</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/IarKhusus/list">
                                <i class="fa fa-tasks"></i>
                                <span>Daftar Permohonan</span>
                            </a>
                        </li>
                        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/IarKhusus/permohonan/<?php echo Yii::app()->getSecurityManager()->encrypt(1);?>">Permohonan IAR DX-Pedition</a></li>
                        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/IarKhusus/permohonan/<?php echo Yii::app()->getSecurityManager()->encrypt(2);?>">Permohonan IAR Warga Asing</a></li>
                        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/IarKhusus/permohonan/<?php echo Yii::app()->getSecurityManager()->encrypt(3);?>">Permohonan IAR Repeater</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-tasks"></i>
                        <span>IKRAP</span>
                    </a>
                    <ul class="sub">
                        <li>
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/Ikrap/list">
                                <i class="fa fa-tasks"></i>
                                <span>Daftar Permohonan</span>
                            </a>
                        </li>
                        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/Ikrap/permohonan ">Permohonan IKRAP</a></li>
                    </ul>
                </li>
            </ul>            
		</div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
