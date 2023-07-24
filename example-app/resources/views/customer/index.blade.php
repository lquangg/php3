<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <h1>{{ $title }}</h1>
    <!-- action bắt theo tên của route-->
    <form action="{{ route('search') }}" method="post">
        @csrf
        <input type="text" name="search_name">
        <input type="submit" name="btn-search" value="Search">
    </form>
    @if (Session::has('success'))
    {{Session::get('success')}}
    @endif

    <table border='1'>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>image</th>
            <th>Phone</th>
            <th>Date</th>
            <th>Adress</th>
            <th>Gender</th>
            <th>aa</th>
        </tr>
        @foreach($customers as $cs)
        <tr>
            <td>{{ $cs->id }}</td>
            <td>{{ $cs->name }}</td>
            <td>{{ $cs->email }}</td>
            <td>
                <img width="200px" height="200px" src="{{ $cs->image ? '' . Storage::url($cs->image) : 'https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg' }}" alt="">
            </td>



            <td>{{ $cs->sdt }}</td>
            <td>{{ $cs->date_of_birth}}</td>
            <td>{{ $cs->address }}</td>
            <td>{{ $cs->gender == 1 ? "Nam" : "Nữ" }}</td>
            <td> <a href="{{ route('edit_customer',[ 'id' => $cs->id ]) }}">Edit</a></td>
            <td> <a href="{{ route('delete',[ 'id' => $cs->id ]) }}">Delete</a></td>
        </tr>
        @endforeach
    </table>
</body>
</html>
