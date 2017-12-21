<div class="panel">
    <div class="panel_header">ค้นหาประวัติการซ่อมเครื่อง</div>
    <div class="panel_body">
        <form method="post" action="<?php echo Kohana::config("config.site_name"); ?>order_repair/search_by_computer_name">
            ชื่อเครื่อง: <input type="text" name="order_repair_computer_name" value="<?php echo $order_repair_computer_name; ?>" />
            <input type="submit" value="ค้นหา..." class="app_button" />
        </form>

        <?php if (!empty($order_repairs)): ?>
        <table class="grid" width="100%">
            <thead>
                <tr>
                    <td width="30px">no</td>
                    <td>ผู้แจ้งซ่อม</td>
                    <td width="200px">ผู้รับซ่อม</td>
                    <td width="120px">วันที่แจ้ง</td>
                    <td width="120px">วันที่รับซ่อม</td>
                    <td width="120px">วันที่กำหนดเสร็จ</td>
                    <td width="120px">วันที่ซ่อมเสร็จ</td>
                    <td width="70px">รายละเอียด</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order_repairs as $order_repair): ?>
                <tr>
                    <td align="right" class="grid_left"><?php echo $n++; ?></td>
                    <td><?php echo $order_repair->user->user_name; ?></td>
                    <td><?php echo User_Model::findById($order_repair->service_id)->user_name; ?></td>
                    <td align="center"><?php echo kdate::to_thai_day($order_repair->order_repair_created_date); ?></td>
                    <td align="center"><?php echo kdate::to_thai_day($order_repair->order_repair_get_date); ?></td>
                    <td align="center"><?php echo kdate::to_thai_day($order_repair->order_repair_will_complete_date); ?></td>
                    <td align="center"><?php echo kdate::to_thai_day($order_repair->order_repair_complete_date); ?></td>
                    <td align="center">
                        <a target="_blank" href="<?php echo Kohana::config("config.site_name"); ?>order_repair/detail/<?php echo $order_repair->id; ?>/false">
                            <img src="<?php echo url::base(); ?>images/actions/fileopen.png" />
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        <?php endif ?>
    </div>
</div>