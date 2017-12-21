<div class="panel">
    <div class="panel_header">แบบฟอร์มรับแจ้งซ่อม</div>
    <div class="panel_body">
        <fieldset>
            <legend>รายละเอียดเครื่อง</legend>
            <table width="100%">
                <tr>
                    <td width="100px">ชื่อเครื่อง</td>
                    <td class="read_only"><?php echo $order_repair->order_repair_computer_name; ?></td>
                    <td width="100px">วันที่แจ้ง</td>
                    <td class="read_only"><?php echo kdate::to_thai_date($order_repair->order_repair_created_date); ?></td>
                </tr>
                <tr>
                    <td>ผู้แจ้ง</td>
                    <td class="read_only"><?php echo $order_repair->user->user_name; ?></td>
                </tr>
                <tr valign="top">
                    <td>อาการ</td>
                    <td class="read_only" colspan="3"><?php echo $order_repair->order_repair_detail; ?></td>
                </tr>
            </table>
        </fieldset>

        <form method="post" action="<?php echo Kohana::config("config.site_name"); ?>order_repair/get_order_save">
            <fieldset>
                <legend>บันทึกข้อมูลการซ่อม</legend>
                <table>
                    <tr>
                        <td width="100px">วันที่กำหนดเสร็จ</td>
                        <td><?php echo kdate::dropdown("order_repair_will_complete_date"); ?></td>
                    </tr>
                    <tr valign="top">
                        <td>สาเหตุ</td>
                        <td><textarea name="order_repair_reason" cols="100" rows="5"></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="บันทึก" class="app_button" /></td>
                    </tr>
                </table>
            </fieldset>
            <input type="hidden" name="id" value="<?php echo $order_repair->id; ?>" />
        </form>
    </div>
</div>