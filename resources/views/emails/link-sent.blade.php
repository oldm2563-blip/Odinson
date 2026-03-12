<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Link Sent</title>
</head>
<body style="margin:0; padding:0; background-color:#0f172a; font-family: Arial, Helvetica, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td align="center" style="padding:40px 15px;">
                
                <table width="100%" max-width="500" cellpadding="0" cellspacing="0" 
                       style="background:#020617; border-radius:12px; padding:30px; box-shadow:0 10px 25px rgba(0,0,0,0.4);">
                    
                    <tr>
                        <td align="center">
                            <h1 style="color:#38bdf8; margin-bottom:10px;">
                                Link Sent 🚀
                            </h1>
                        </td>
                    </tr>

                    <tr>
                        <td align="center">
                            <p style="color:#cbd5f5; font-size:16px; line-height:1.6;">
                                Hey <strong>{{ $name }} {{ $per }}</strong>,  
                                <br><br>
                                We’ve sent a secure link to your email address.
                                Click the button below to continue.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding:25px 0;">
                            <a href="http://127.0.0.1:8000/link/{{ $link }}"
                               style="
                                   background:#38bdf8;
                                   color:#020617;
                                   text-decoration:none;
                                   padding:14px 28px;
                                   border-radius:8px;
                                   font-weight:bold;
                                   display:inline-block;
                                   box-shadow:0 5px 15px rgba(56,189,248,0.4);
                               ">
                                Open Link
                            </a>
                        </td>
                    </tr>

                    <tr>
                        <td align="center">
                            <p style="color:#94a3b8; font-size:13px;">
                                If you didn’t request this, you can safely ignore this email.
                            </p>
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>
</html>
