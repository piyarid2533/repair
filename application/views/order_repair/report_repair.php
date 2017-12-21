<div class="panel">
    <div class="panel_header">รายงานการซ่อมคอมพิวเตอร์</div>
    <div class="panel_body">
        <?php echo form::open("order_repair/report_repair"); ?>
        <fieldset>
            <legend>เงื่อนไขการแสดงรายงาน</legend>
            <table>
                <tr>
                    <td>สถานะ</td>
                    <td><?php echo form::dropdown("search_status", enum::getOrderStatus(true), $search_status); ?></td>
                </tr>
                <tr>
                    <td>จากวันที่</td>
                    <td><?php echo kdate::dropdown("from_date"); ?></td>
                    <td>ถึงวันที่</td>
                    <td><?php echo kdate::dropdown("to_date"); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="ค้นหา..." class="app_button" /></td>
                </tr>
            </table>
        </fieldset>
        <?php echo form::close(); ?>

        <?php if (!empty($order_repairs)): ?>
            <table width="100%" class="grid">
                <thead>
                    <tr>
                        <td width="30px">no</td>
                        <td>ผู้แจ้งซ่อม</td>
                        <td width="100px">ชื่อเครื่อง</td>
                        <td width="150px">วันที่แจ้งซ่อม</td>
                        <td width="120px">ผู้รับซ่อม</td>
                        <td width="150px">วันที่รับซ่อม</td>
                        <td width="100px">วันที่กำหนดเสร็จ</td>
                        <td width="170px">วันที่ซ่อมเสร็จ</td>
                        <td width="70px">รายละเอียด</td>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($order_repairs as $order_repair): ?>
                    <tr>
                        <td align="right" class="grid_left"><?php echo $n++; ?></td>
                        <td><?php echo $order_repair->user_name; ?></td>
                        <td align="center"><?php echo $order_repair->order_repair_computer_name; ?></td>
                        <td align="center"><?php echo kdate::to_thai_date($order_repair->order_repair_created_date); ?></td>
                        <td><?php echo $order_repair->service_name; ?></td>
                        <td align="center"><?php echo kdate::to_thai_date($order_repair->order_repair_get_date); ?></td>
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
        <?php endif ?>
    </div>
</div>