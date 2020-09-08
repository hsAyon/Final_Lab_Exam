<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Employers</title>
</head>
<body>
    <div>
        <table>
            <tr>
                <td>
                    <table width=100%>
                        <tr>
                            <td width="100%">
                                <input type="text" name="empSearch" id="empSearch" style="width: 100%">
                            </td>
                            <td style="width: fit-content">
                                <button id="searchBtn">Search!</button>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table id='dispEmp' border="1" width=100%>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                Username
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Company
                            </th>
                            <th>
                                Contact
                            </th>
                            <th>
                                Actions
                            </th>
                        </tr>
                        @foreach ($data as $employer)
                            <tr>
                                <td>{{$employer->uid}}</td>
                                <td>{{$employer->username}}</td>
                                <td>{{$employer->name}}</td>
                                <td>{{$employer->company}}</td>
                                <td>{{$employer->contact}}</td>
                            <td><button onclick="location.href = '/admin/edit/{{$employer->uid}}'">Edit</button>
                                <button style="color: red" onclick="location.href = '/admin/delete/{{$employer->uid}}'">Delete</button>
                            </td>
                            </tr>
                        @endforeach
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>