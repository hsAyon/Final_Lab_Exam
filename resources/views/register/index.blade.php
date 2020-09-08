<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <fieldset>
        <legend>Register</legend>
        <form action="" method="post">
            {{csrf_field()}}
            <table>
                <tr>
                    <td><label for="username">Username:&nbsp;</label></td>
                    <td><input type="text" name="username" id=""></td>
                </tr>
                <tr>
                    <td><label for="password">Password:&nbsp;</label></td>
                    <td><input type="password" name="password" id=""></td>
                </tr>
                <tr>
                    <td><label for="confpassword">Confirm Password:&nbsp;</label></td>
                    <td><input type="password" name="password_confirmation" id=""></td>
                </tr>
                <tr><td style="height: 5px;"></td></tr>
                <tr>
                    <td><label for="name">Name:&nbsp;</label></td>
                    <td><input type="text" name="name" id=""></td>
                </tr>
                <tr>
                    <td><label for="company">Company:&nbsp;</label></td>
                    <td><input type="text" name="company" id=""></td>
                </tr>
                <tr>
                    <td><label for="contact">Contact:&nbsp;</label></td>
                    <td><input type="text" name="contact" id=""></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;"><input type="submit" value="Register"></td>
                </tr>
            </table>
        </form>
        <div style='color: red;'>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    </fieldset>
</body>
</html>