<?php
$user_id = Session::instance()->get("user_id");
$user_level = Session::instance()->get("user_level");
?>

<?php if (!empty($user_id)): ?>

<!-- admin -->
<?php if ($user_level == "admin"): ?>
<div class="panel">
    <div class="panel_header">เมนูสำหรับผู้ดูแลระบบ</div>
    <div class="panel_body">
        <div><a href="<?php echo Kohana::config("config.site_name"); ?>user/view">จัดการข้อมูลผู้ใช้ระบบ</a></div>
    </div>
</div>
<?php endif ?>

<?php if ($user_level == "user"): ?>
<div class="panel">
    <div class="panel_header">เมนูสำหรับผู้ใช้ทั่วไป</div>
    <div class="panel_body">
        <div><a href="<?php echo Kohana::config("config.site_name"); ?>order_repair/form">แจ้งปัญหาการใช้งาน</a></div>
        <div><a href="<?php echo Kohana::config("config.site_name"); ?>order_repair/history_user">ประวัติการซ่อมที่ผ่านมา</a></div>
    </div>
</div>
<?php endif ?>

<?php if ($user_level == "service"): ?>
<div class="panel">
    <div class="panel_header">เมนูสำหรับผู้ให้บริการ</div>
    <div class="panel_body">
        <div><a href="<?php echo Kohana::config("config.site_name"); ?>order_repair/search_by_computer_name">ค้นหาประวัติการซ่อม</a></div>
        <div><a href="<?php echo Kohana::config("config.site_name"); ?>order_repair/get_order">รับแจ้งปัญหาการใช้งาน</a></div>
        <div><a href="<?php echo Kohana::config("config.site_name"); ?>order_repair/my_order">รายการที่รับแจ้งไว้แล้ว</a></div>
    </div>
</div>
<?php endif ?>

<?php if ($user_level == "manager"): ?>
<div class="panel">
    <div class="panel_header">เมนูสำหรับผู้บริหาร</div>
    <div class="panel_body">
        <div><a href="<?php echo Kohana::config("config.site_name"); ?>order_repair/report_repair">รายงานการซ่อม</a></div>
        <div><a href="<?php echo Kohana::config("config.site_name"); ?>order_repair/state_repair">รายงานสถิติการซ่อม</a></div>
    </div>
</div>
<?php endif ?>

<br />
<center>
    <a href="<?php echo Kohana::config("config.site_name"); ?>user/logout" style="color: red; font-weight: bold">
        ออกจากระบบ
    </a>
</center>
<?php endif ?>