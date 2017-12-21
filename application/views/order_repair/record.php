<div class="panel">
    <div class="panel_header">บันทึกการซ่อมเครื่อง</div>
    <div class="panel_body">
        <form method="post" action="<?php echo Kohana::config("config.site_name"); ?>order_repair/record_save">
            <table width="100%">
                <tr>
                    <td width="150px">ผู้แจ้ง</td>
                    <td class="read_only"><?php echo $order_repair->user->user_name; ?></td>
                    <td width="150px">วันที่แจ้ง</td>
                    <td class="read_only" width="180px"><?php echo kdate::to_thai_date($order_repair->order_repair_created_date); ?></td>
                    <td width="150px"></td>
                    <td width="150px"></td>
                </tr>
                <tr valign="top">
                    <td>อาการ</td>
                    <td class="read_only" colspan="5"><?php echo $order_repair->order_repair_detail; ?></td>
                </tr>
                <tr>
                    <td>ผู้รับแจ้ง</td>
                    <td class="read_only"><?php echo $service->user_name; ?></td>
                    <td>วันที่รับแจ้ง</td>
                    <td class="read_only"><?php echo kdate::to_thai_date($order_repair->order_repair_get_date); ?></td>
                    <td>วันที่กำหนดเสร็จ</td>
                    <td class="read_only"><?php echo kdate::to_thai_date($order_repair->order_repair_will_complete_date); ?></td>
                </tr>
                <tr valign="top">
                    <td>สาเหตุ</td>
                    <td class="read_only" colspan="5"><?php echo $order_repair->order_repair_reason; ?>&nbsp;</td>
                </tr>
                <tr valign="top">
                    <td>บันทึกการดำเนินการ</td>
                    <td colspan="5"><textarea name="repair_record_detail" rows="3" style="width: 100%"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="app_button" value="บันทึก" /></td>
                </tr>
            </table>
            <input type="hidden" name="order_repair_id" value="<?php echo $order_repair->id; ?>" />
        </form>

        <table class="grid" width="100%">
            <thead>
                <tr>
                    <td width="40px">no</td>
                    <td width="200px">วันที่</td>
                    <td>การดำเนินการ</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($repair_records as $repair_record): ?>
                <tr>
                    <td align="right"><?php echo $n++; ?></td>
                    <td align="center"><?php echo kdate::to_thai_date($repair_record->repair_record_created_date); ?></td>
                    <td><?php echo $repair_record->repair_record_detail; ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>