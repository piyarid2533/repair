<div class="panel">
    <div class="panel_header">ข้อมูลผู้ใช้ระบบ</div>
    <div class="panel_body">
        <!-- form -->
        <form method="post" action="<?php echo Kohana::config("config.site_name"); ?>user/save">
            <fieldset>
                <legend>บันทึกข้อมูล</legend>
                <table>
                    <tr>
                        <td>ระดับ</td>
                        <td><?php echo form::dropdown("user_level", enum::getUserLevel()); ?></td>
                    </tr>
                    <tr>
                        <td>ชื่อ</td>
                        <td><input type="text" name="user_name" value="<?php echo @$user->user_name; ?>" /></td>
                        <td>email</td>
                        <td><input type="text" name="user_email" value="<?php echo @$user->user_email; ?>" /></td>
                        <td>เบอร์โทร</td>
                        <td><input type="text" name="user_tel" value="<?php echo @$user->user_tel; ?>" /></td>
                    </tr>
                    <tr>
                        <td>username</td>
                        <td><input type="text" name="user_username" value="<?php echo @$user->user_username; ?>" /></td>
                        <td>password</td>
                        <td><input type="password" name="user_password" /></td>
                        <td>ยืนยัน password</td>
                        <td><input type="password" name="user_password_confirm" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" value="บันทึก" class="app_button" /></td>
                    </tr>
                </table>
            </fieldset>
            <input type="hidden" name="id" value="<?php echo @$user->id; ?>" />
        </form>

        <!-- data -->
        <table class="grid">
            <thead>
                <tr>
                    <td width="30px">no</td>
                    <td width="150px">ชื่อ</td>
                    <td width="200px">email</td>
                    <td width="120px">วันที่บันทึก</td>
                    <td width="100px">ระดับ</td>
                    <td width="100px">username</td>
                    <td width="100px">password</td>
                    <td width="25px">แก้ไข</td>
                    <td width="25px">ลบ</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td align="right" class="grid_left"><?php echo $n++; ?></td>
                    <td><?php echo $user->user_name; ?></td>
                    <td><?php echo $user->user_email; ?></td>
                    <td align="center"><?php echo kdate::to_thai_day($user->user_created_date); ?></td>
                    <td align="center"><?php echo $user->user_level; ?></td>
                    <td align="center"><?php echo $user->user_username; ?></td>
                    <td align="center"><?php echo $user->user_password; ?></td>
                    <td align="center">
                        <a href="<?php echo Kohana::config("config.site_name"); ?>user/view/<?php echo $user->id; ?>">
                            <img src="<?php echo url::base(); ?>images/actions/edit.png" />
                        </a>
                    </td>
                    <td align="center">
                        <a href="<?php echo Kohana::config("config.site_name"); ?>user/delete/<?php echo $user->id; ?>" onclick="return confirm('ยืนยันการลบ')">
                            <img src="<?php echo url::base(); ?>images/actions/button_cancel.png" />
                        </a>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>