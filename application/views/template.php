<html>
    <head>
        <title>ระบบแจ้งซ่อมออนไลน์</title>
        <meta charset="utf-8" />
        <script type="text/javascript" src="<?php echo url::base(); ?>jquery/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo url::base(); ?>jquery/js/jquery.corner.js"></script>
        <script type="text/javascript" src="<?php echo url::base(); ?>script.js"></script>
        <link rel="stylesheet" href="<?php echo url::base(); ?>style.css" />
    </head>
    <body>
        <?php if (isset($content)): ?>
            <!-- header -->
        <?php echo View::factory("header"); ?>

            <!-- message -->
        <?php if (Session::instance()->get("message") != null): ?>
                <div class="message"><?php echo Session::instance()->get("message"); ?></div>
        <?php endif ?>

                <!-- content -->
        <?php if (Session::instance()->get("user_id") != null): ?>
                    <table width="100%">
                        <tr valign="top">
                            <td width="200px"><?php echo View::factory("menu_left"); ?></td>
                            <td><?php echo $content; ?></td>
                        </tr>
                    </table>
        <?php else: ?>
        <?php echo $content; ?>
        <?php endif ?>
        <?php endif ?>
    </body>
</html>