<li id="header_notification_bar" class="dropdown">
        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
            <i class="fa fa-bell-o"></i>
            <?php if (count($notifications) > 0){?>
                <span class="badge bg-important"><?php echo count($notifications);?></span>
            <?php }?>
        </a>
        <ul class="dropdown-menu extended notification">
            <li>
                <p>Notifications</p>
            </li>
            <?php foreach ($notifications as $notif) { ?>
                <li>
                    <div class="alert alert-danger clearfix">
                        <div class="noti-info" style="font-size: 12px">
                            <?php echo $notif; ?>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>

</li>