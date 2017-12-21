<div class="panel">
    <div class="panel_header">สถิติการซ่อมคอมพิวเตอร์</div>
    <div class="panel_body">
        <fieldset>
            <legend>เงื่อนไขในการแสดงรายงาน</legend>
            ปี: <?php echo kdate::ddl_year("search_year"); ?>
            <input type="submit" value="ค้นหา..." class="app_button" />
        </fieldset>

        <table class="grid" width="100%">
            <thead>
                <tr>
                    <td>เดือน</td>
                    <td width="80px">งานเข้า</td>
                    <td width="80px">ซ่อมเสร็จ</td>
                    <td width="80px">กำลังซ่อม</td>
                    <td width="80px">งานค้าง</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($months as $month): ?>
                <tr>
                    <td><?php echo $month; ?></td>
                    <td align="right"><?php echo number_format(Order_Repair_Model::countByMonth($month_index)); ?></td>
                    <td align="right"><?php echo number_format(Order_Repair_Model::countCompleteByMonth($month_index)); ?></td>
                    <td align="right"><?php echo number_format(Order_Repair_Model::countRepairByMonth($month_index)); ?></td>
                    <td align="right"><?php echo number_format(Order_Repair_Model::countNoCompleteByMonth($month_index)); ?></td>
                </tr>
                <?php $month_index++; ?>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>