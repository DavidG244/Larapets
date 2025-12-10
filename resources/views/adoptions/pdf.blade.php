<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adoptions Report</title>
    <style>
        table { border: 2px solid #aaa; border-collapse: collapse; width: 100% }
        table th, table td { font-family: sans-serif; font-size: 10px; border: 1px solid #ccc; padding: 6px }
        table tr:nth-child(odd) { background-color: #f7f7f7 }
        table th { background-color: #333; color: #fff; text-align: center }
        .small-img { width: 72px; height: 72px; object-fit: cover }
    </style>
</head>
<body>
    <h2>Adoptions Report</h2>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>User Document</th>
                <th>User Fullname</th>
                <th>User Phone</th>
                <th>User Photo</th>
                <th>Pet Name</th>
                <th>Pet Kind</th>
                <th>Pet Breed</th>
                <th>Pet Location</th>
                <th>Pet Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach($adopts as $adopt)
            <tr>
                <td>{{ $adopt->id }}</td>
                <td>{{ $adopt->user->document ?? '' }}</td>
                <td>{{ $adopt->user->fullname ?? '' }}</td>
                <td>{{ $adopt->user->phone ?? '' }}</td>
                <td>
                    @php $uimg = $adopt->user->photo ?? 'no-photo.png'; $uext = substr($uimg, -4); @endphp
                    @if($uimg && $uext != 'webp' && $uext != '.svg')
                        <img src="{{ public_path().'/images/'.$uimg }}" class="small-img">
                    @else
                        N/A
                    @endif
                </td>
                <td>{{ $adopt->pet->name ?? '' }}</td>
                <td>{{ $adopt->pet->kind ?? '' }}</td>
                <td>{{ $adopt->pet->breed ?? '' }}</td>
                <td>{{ $adopt->pet->location ?? '' }}</td>
                <td>
                    @php $pimg = $adopt->pet->image ?? 'no-image.png'; $pext = substr($pimg, -4); @endphp
                    @if($pimg && $pext != 'webp' && $pext != '.svg')
                        <img src="{{ public_path().'/images/'.$pimg }}" class="small-img">
                    @else
                        N/A
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
