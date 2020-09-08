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
                <td><input type="text" name="username" id="" value="{{$data->username}}"></td>
                </tr>
                <tr><td style="height: 5px;"></td></tr>
                <tr>
                    <td><label for="name">Name:&nbsp;</label></td>
                    <td><input type="text" name="name" id="" value="{{$data->name}}"></td>
                </tr>
                <tr>
                    <td><label for="company">Company:&nbsp;</label></td>
                    <td><input type="text" name="company" id="" value="{{$data->company}}"></td>
                </tr>
                <tr>
                    <td><label for="contact">Contact:&nbsp;</label></td>
                    <td><input type="text" name="contact" id="" value="{{$data->username}}"></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;"><input type="submit" value="Update"></td>
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