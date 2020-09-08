<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <fieldset>
        <legend>Login</legend>
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
                    <td colspan="2" style="text-align: right;"><input type="submit" value="Login"></td>
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