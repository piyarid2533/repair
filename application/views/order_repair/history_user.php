<div class="panel">
    <div class="panel_header">ประวัติการซ่อมที่ผ่านมา</div>
    <div class="panel_body">
        <?php echo form::open("order_repair/history_user"); ?>
        <fieldset>
            <legend>เงื่อนไขการแสดงรายงาน</legend>
            ปี: <?php echo kdate::ddl_year("search_year"); ?>
            <input type="submit" value="ค้นหา..." class="app_button" />
        </fieldset>
        <?php echo form::close(); ?>
        
        <table class="grid" width="100%">
            <thead>
                <tr>
                    <td width="30px">no</td>
                    <td width="170px">วันที่แจ้งซ่อม</td>
                    <td>ผู้ซ่อม</td>
                    <td width="170px">วันที่รับซ่อม</td>
                    <td width="170px">วันที่กำหนดเสร็จ</td>
                    <td width="170px">วันที่ซ่อมเสร็จ</td>
                    <td width="80px">รายละเอียด</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order_repairs as $order_repair): ?>
                <tr>
                    <td align="right" class="grid_left"><?php echo $n++; ?></td>
                    <td align="center"><?php echo kdate::to_thai_date($order_repair->order_repair_created_date); ?>&nbsp;</td>
                    <td align="center"><?php echo User_Model::findById($order_repair->service_id)->user_name; ?>&nbsp;</td>
                    <td align="center"><?php echo kdate::to_thai_date($order_repair->order_repair_get_date); ?>&nbsp;</td>
                    <td align="center"><?php echo kdate::to_thai_date($order_repair->order_repair_will_complete_date); ?>&nbsp;</td>
                    <td align="center"><?php echo kdate::to_thai_date($order_repair->order_repair_complete_date); ?>&nbsp;</td>
                    <td align="center">
                        <a target="_blank" href="<?php echo Kohana::config("config.site_name"); ?>order_repair/detail/<?php echo $order_repair->id; ?>/false">
                            <img src="<?php echo url::base(); ?>images/actions/fileopen.png" />
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
