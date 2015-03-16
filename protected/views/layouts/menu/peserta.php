<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                 <li class="sub-menu">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/registrant/detail/<?php echo Yii::app()->getSecurityManager()->encrypt(Yii::app()->session['id_registrant']);?>">
                        <i class="fa fa-book"></i>
                        <span>Data Pribadi</span>
                    </a>
                </li>
                <li class="sub-menu">
                    <a href="<?php echo Yii::app()->request->baseUrl; ?>/logCertificate/list">
                        <i class="fa fa-book"></i>
                        <span>IAR</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
