<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptions Excel</title>
    <style>
        table { border-collapse: collapse }
        th, td { border: 1px solid #ccc; padding: 4px }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User Document</th>
                <th>User Fullname</th>
                <th>User Phone</th>
                <th>Pet Name</th>
                <th>Pet Kind</th>
                <th>Pet Breed</th>
                <th>Pet Location</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adopts as $adopt)
            <tr>
                <td>{{ $adopt->id }}</td>
                <td>{{ $adopt->user->document ?? '' }}</td>
                <td>{{ $adopt->user->fullname ?? '' }}</td>
                <td>{{ $adopt->user->phone ?? '' }}</td>
                <td>{{ $adopt->pet->name ?? '' }}</td>
                <td>{{ $adopt->pet->kind ?? '' }}</td>
                <td>{{ $adopt->pet->breed ?? '' }}</td>
                <td>{{ $adopt->pet->location ?? '' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
