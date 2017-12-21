<div class="panel">
    <div class="panel_header">ข้อมูลการแจ้งซ่อม</div>
    <div class="panel_body">
        <table class="grid" width="100%">
            <thead>
                <tr>
                    <td width="25px">no</td>
                    <td width="170px">ผู้แจ้ง</td>
                    <td width="150px">ชื่อเครื่อง</td>
                    <td width="170px">วันที่แจ้ง</td>
                    <td>อาการ</td>
                    <td width="50px">รับแจ้ง</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order_repairs as $order_repair): ?>
                <tr>
                    <td align="right" class="grid_left"><?php echo $n++; ?></td>
                    <td><?php echo $order_repair->user->user_name; ?></td>
                    <td><?php echo $order_repair->order_repair_computer_name; ?></td>
                    <td align="center"><?php echo kdate::to_thai_date($order_repair->order_repair_created_date); ?></td>
                    <td><?php echo $order_repair->order_repair_detail; ?></td>
                    <td align="center">
                        <a href="<?php echo Kohana::config("config.site_name"); ?>order_repair/get_order_form/<?php echo $order_repair->id; ?>">
                            <img src="<?php echo url::base(); ?>images/actions/agt_update_misc.png" />
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>