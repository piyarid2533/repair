<div class="panel">
    <div class="panel_header">แจ้งปัญหาการใช้งาน</div>
    <div class="panel_body">
        <form method="post" action="<?php echo Kohana::config("config.site_name"); ?>order_repair/save">
            <fieldset>
                <legend>ส่งข้อมูลไปยังฝ่ายรับซ่อม</legend>
                <table>
                    <tr>
                        <td>ชื่อเครื่อง</td>
                        <td><input type="text" name="order_repair_computer_name" value="<?php echo @$order_repair->order_repair_computer_name; ?>" /></td>
                    </tr>
                    <tr valign="top">
                        <td>อาการเสีย</td>
                        <td><textarea name="order_repair_detail" cols="100" rows="5"><?php echo @$order_repair->order_repair_detail; ?></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="บันทึก" class="app_button" /></td>
                    </tr>
                </table>
            </fieldset>
            <input type="hidden" name="id" value="<?php echo @$order_repair->id; ?>" />
        </form>

        <table class="grid" width="100%">
            <thead>
                <tr>
                    <td width="30px">no</td>
                    <td width="100px">ชื่อเครื่อง</td>
                    <td>อาการ</td>
                    <td width="180px">วันที่แจ้ง</td>
                    <td width="100px">สถานะ</td>
                    <td width="40px">&nbsp;</td>
                </tr>
            </thead>
            <tbody>
                <?php $order_status = enum::getOrderStatus(); ?>
                <?php foreach ($order_repairs as $order_repair): ?>
                <tr valign="top">
                    <td align="right" class="grid_left"><?php echo $n++; ?></td>
                    <td><?php echo $order_repair->order_repair_computer_name; ?></td>
                    <td><?php echo $order_repair->order_repair_detail; ?></td>
                    <td align="center"><?php echo kdate::to_thai_date($order_repair->order_repair_created_date); ?></td>
                    <td align="center"><?php echo $order_status[$order_repair->order_repair_status]; ?></td>
                    <td align="center">
                        <?php if ($order_repair->service_id == 0): ?>
                        <a title="แก้ไขเพิ่มเติม" href="<?php echo Kohana::config("config.site_name"); ?>order_repair/form/<?php echo $order_repair->id; ?>">
                            <img src="<?php echo url::base(); ?>images/actions/edit.png" />
                        </a>
                        <?php else: ?>
                        <a target="_blank" title="เปิดดูรายละเอียดความคืบหน้า" href="<?php echo Kohana::config("config.site_name"); ?>order_repair/detail/<?php echo $order_repair->id; ?>" >
                            <img src="<?php echo url::base(); ?>images/actions/fileopen.png" />
                        </a>
                        <?php endif ?>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
