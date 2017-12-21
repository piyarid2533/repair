<div class="panel">
    <div class="panel_header">รายการที่รับแจ้งไว้</div>
    <div class="panel_body">
        <table width="100%" class="grid">
            <thead>
                <tr>
                    <td width="30px">no</td>
                    <td>ผู้แจ้ง</td>
                    <td width="200px">ชื่อเครื่อง</td>
                    <td width="170px">วันที่แจ้ง</td>
                    <td width="170px">วันที่รับซ่อม</td>
                    <td width="120px">วันที่กำหนดเสร็จ</td>
                    <td width="50px">ซ่อม</td>
                    <td width="50px">เสร็จ</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order_repairs as $order_repair): ?>
                <tr <?php if (date("d") == kdate::convert_to_day($order_repair->order_repair_will_complete_date)): ?> style="background-color: #ffffcc" <?php endif ?>>
                    <td align="right" class="grid_left"><?php echo $n++; ?></td>
                    <td><?php echo $order_repair->user->user_name; ?></td>
                    <td><?php echo $order_repair->order_repair_computer_name; ?></td>
                    <td align="center"><?php echo kdate::to_thai_date($order_repair->order_repair_created_date); ?></td>
                    <td align="center"><?php echo kdate::to_thai_date($order_repair->order_repair_get_date); ?></td>
                    <td align="center"><?php echo kdate::to_thai_date($order_repair->order_repair_will_complete_date); ?></td>
                    <td align="center">
                        <a href="<?php echo Kohana::config("config.site_name"); ?>order_repair/record/<?php echo $order_repair->id; ?>">
                            <img src="<?php echo url::base(); ?>images/actions/configure.png" />
                        </a>
                    </td>
                    <td align="center">
                        <a onclick="return confirm('ยืนยันการซ่อมเสร็จ คุณจะไม่สามารถเพิ่มเติมข้อมูลใด ๆ ได้อีก')" href="<?php echo Kohana::config("config.site_name"); ?>order_repair/complete/<?php echo $order_repair->id; ?>">
                            <img src="<?php echo url::base(); ?>images/actions/apply.png" />
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
