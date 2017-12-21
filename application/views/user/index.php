<script type="text/javascript">
    $(function() {
        $("#user_username").focus();
    });
</script>

<table width="400px" align="center" class="login">
    <tr>
        <td>
            <form method="post" action="<?php echo Kohana::config("config.site_name"); ?>user/login">
                <div class="panel">
                    <div class="panel_header">Login เข้าสู่ระบบ</div>
                    <div class="panel_body">
                        <table>
                            <tr>
                                <td>Username:</td>
                                <td>Password:</td>
                            </tr>
                            <tr>
                                <td><input type="text" name="user_username" id="user_username" value="<?php echo $user_username; ?>" /></td>
                                <td><input type="password" name="user_password" /></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Login" class="app_button" /></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </form>
        </td>
    </tr>
</table>