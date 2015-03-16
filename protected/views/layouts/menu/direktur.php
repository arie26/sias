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
                        <li class="sub-menu">
                            <a href="<?php echo Yii::app()->request->baseUrl; ?>/logCertificate/ListExam">
                                <i class="fa fa-book"></i>
                                <span>Approve Hasil Akhir UNAR</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-tasks"></i>
                        <span>IAR</span>
                    </a>
                    <ul class="sub">
                        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/logCertificate/listpermohonan/<?php echo Yii::app()->getSecurityManager()->encrypt(1);?>">Permohonan Cetak Ulang IAR</a></li>
                        <li> <a href="<?php echo Yii::app()->request->baseUrl; ?>/logCertificate/listpermohonan/<?php echo Yii::app()->getSecurityManager()->encrypt(2);?>">Permohonan Perpanjangan IAR</a></li>
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
                    </ul>
                </li>  
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
