<div class="panel">
    <div class="panel_header">
        รายละเอียดการซ่อมเครื่อง:
        <font color="red"><?php echo $order_repair->order_repair_computer_name; ?></font>
    </div>
    <div class="panel_body">
        <table width="100%">
            <tr>
                <td width="100px">ผู้แจ้ง</td>
                <td class="read_only"><?php echo $order_repair->user->user_name; ?></td>
                <td width="100px">วันที่แจ้ง</td>
                <td class="read_only"><?php echo kdate::to_thai_date($order_repair->order_repair_created_date); ?></td>
                <td width="100px"></td>
                <td></td>
            </tr>
            <tr valign="top">
                <td>อาการ</td>
                <td colspan="5" class="read_only"><?php echo $order_repair->order_repair_detail; ?></td>
            </tr>
            <tr>
                <td>ผู้รับซ่อม</td>
                <td class="read_only"><?php echo $service->user_name; ?></td>
                <td>วันที่รับซ่อม</td>
                <td class="read_only"><?php echo $order_repair->order_repair_get_date; ?></td>
                <td>วันที่กำหนดเสร็จ</td>
                <td class="read_only"><?php echo kdate::to_thai_date($order_repair->order_repair_will_complete_date); ?></td>
            </tr>
            <tr valign="top">
                <td>สาเหตุ</td>
                <td colspan="5" class="read_only"><?php echo $order_repair->order_repair_reason; ?></td>
            </tr>
        </table>

        
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