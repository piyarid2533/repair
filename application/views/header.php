<div class="header">
    <table width="100%">
        <tr>
            <td>ระบบแจ้งซ่อมออนไลน์</td>
            <td align="right" style="padding-right: 20px; color: red;">
                <?php
                $user_id = Session::instance()->get("user_id");
                if (!empty($user_id)) {
                    $user = User_Model::findById($user_id);

                    echo "คุณ: {$user->user_name}";
                }
                ?>
            </td>
        </tr>
    </table>
</div>