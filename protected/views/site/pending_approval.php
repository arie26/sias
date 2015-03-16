<?php
    $notificationConfig = Yii::app()->config->get('notification_bar');
    $totalCount = 0;
    if ($notificationConfig['max_pending_event'] >0)  {
        $totalCount += count($pending['event']);
    }
    if ($notificationConfig['max_pending_register'] >0)  {
        $totalCount += count($pending['register']);
    }
    if ($notificationConfig['max_pending_nilai'] >0)  {
        $totalCount += count($pending['nilai']);
    }

?>

<li id="header_inbox_bar" class="dropdown">
    <a data-toggle="dropdown" class="dropdown-toggle" href="/reor/media/#">
        <i class="fa fa-envelope-o"></i>
        <?php if ($totalCount > 0) { ?>
            <span class="badge bg-warning"><?php echo $totalCount; ?></span>
        <?php } ?>
    </a>
    <ul class="dropdown-menu extended inbox">
        <li>
            <p class="red"><?php echo $totalCount; ?> event(s) waiting for approval</p>
        </li>
        <?php
        $i = 0;
        $max = $notificationConfig['max_pending_event'];
        while ($i < $max && $i < count($pending['event'])) {
            $event = $pending['event'][$i];
            ?>
            <li>
                <a href="<?php echo Yii::app()->baseUrl;?>/exam/approve/<?php echo Yii::app()->getSecurityManager()->encrypt($event->id_exam);?>">
                    <span class="subject">
                    <span class="from"><?php echo $event->judul_exam; ?></span>
                    <span class="time"><?php echo $event->strSinceUpdate; ?></span>
                    </span>
                    <span class="message">
                        Pengajuan Ujian Baru
                    </span>
                </a>
            </li>
            <?php
            $i++;
        } ?>
        <?php $j = 0;
        $max = $i+ $notificationConfig['max_pending_register'];
        while ($i < $max && $j < count($pending['register'])) {
            $registrant = $pending['register'][$j];
            ?>
            <li>
                <a href="<?php echo Yii::app()->baseUrl;?>/registrant/detail/<?php echo Yii::app()->getSecurityManager()->encrypt($registrant->id_registrant);?>">
                <span class="subject">
                <span class="from"><?php echo $registrant->nama_registrant; ?></span>
                <span class="time"><?php echo $registrant->strSinceUpdate; ?></span>
                </span>
                <span class="message">
                    Registrasi <?php echo $registrant->idExam->judul_exam; ?>
                </span>
                </a>
            </li>
            <?php
            $i++;
            $j++;
        } ?>
        <?php $j = 0;
        $max = $i+ $notificationConfig['max_pending_nilai'];
        while ($i < $max && $j < count($pending['nilai'])) {
            $registrant = $pending['nilai'][$j];
            ?>
            <li>
                <a href="<?php echo Yii::app()->baseUrl;?>/score/create/<?php echo Yii::app()->getSecurityManager()->encrypt($registrant->id_registrant);?>">
                <span class="subject">
                <span class="from"><?php echo $registrant->nama_registrant; ?></span>
                <span class="time"><?php echo $registrant->strSinceUpdate; ?></span>
                </span>
                <span class="message">
                    Nilai masuk menunggu persetujuan
                </span>
                </a>
            </li>
            <?php
            $i++;
            $j++;
        } ?>
        <?php if (count($pending['event']) > 0 && $notificationConfig['max_pending_event'] >0)  { ?>
            <li>
                <hr/>
                <a href="/reor/exam/mendatang">Lihat semua pengajuan ujian</a>
            </li>
        <?php } ?>
        <?php if (count($pending['register']) > 0 && $notificationConfig['max_pending_register'] >0) { ?>
            <li>
                <a href="/reor/approval/pending_register">Lihat semua peserta baru</a>
            </li>
        <?php } ?>
        <?php if (count($pending['nilai']) > 0 && $notificationConfig['max_pending_nilai']  >0) { ?>
            <li>
                <a href="/reor/approval/pending_nilai">Lihat semua nilai masuk</a>
            </li>
        <?php } ?>
    </ul>
</li>