<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="content-type" content="text/html; charset=windows-1252">
    <title>Box Economy</title>
        <style type="text/css">
            body{font-family: Helvetica,sans-Serif;color: #77798c;font-size: 14px;}
        </style>
    </head>
    <body>        
        <table style="padding: 0;" width="100%" cellspacing="0" cellpadding="0">
            <tbody>
                <tr>
                    <td>
                        <table style="margin: 0px auto 0px; text-align: center; box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1); border-radius: 4px;background-color:#f4f6ff; padding: 20px;" width="500px" cellspacing="0" cellpadding="0">
                            <tbody>
                           <!--      <tr>
                                    <td>
                                        <img src="{{ url('/public/images/email/logo.png') }}" width="200px;" class="img-responsive">
                                    </td>
                                </tr> -->
                                <tr>
                                    <td>
                                        <table style="margin: 10px auto; text-align: center; box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, 0.1); background-color: #fff; border-radius: 4px;" width="100%" cellspacing="0" cellpadding="0">
                                            <tbody>
                                         <!--        <tr>
                                                    <td style="text-align:center; background-color:#d11f3c; padding:30px;">
                                                        <img src="{{ url('/public/images/email/forget-pass.png') }}" width="100px">
                                                    </td>
                                                </tr> -->
                                                <tr>
                                                    <td>
                                                        <h1 style="font-weight:normal;margin:20px 0 0 0;color: #5a75dd;">Reset Password</h1>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <h4 style="text-align:center; margin-bottom:0;color: #525252;"> Hello, {{ ucfirst($name) }} </h4>
                                                        <p style="letter-spacing:1px;line-height:30px;text-align:center; margin-bottom:30px; padding:10px; padding-left:20px;">
                                                        You requested for a new password? Lets get you a new one. Please click on the button below to reset your password. This link can only be used once. <br>
                                                        Ignore this email if this request wasn't made by you.
                                                        </p>          
                                                        <a href="{{ $set_password_url }}" style="padding:12px 25px;background-color:#d11f3c;border:none;border-radius:2px;cursor:pointer; text-decoration: none;box-shadow: 0 3px 6px -1px rgba(0,0,0,.25);color: #fff;font-weight: bold;">Reset Password</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:60px">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>