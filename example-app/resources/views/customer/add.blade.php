

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
</head>
<body>

    @extends('templates.layout');
    @section('content')
    <h1>{{ $title }}</h1>
    {{-- @if($error->any()){

    } --}}
    <form action="{{route('add_customer')}}" method="post" enctype="multipart/form-data">
        @csrf
         <input type="text"  name="name" placeholder="Họ tên"> <br>
         <input type="text"  name="email" placeholder="Email"> <br>

         <input type="text"  name="sdt"  placeholder="sdt"> <br>

         <input type="date"  name="date_of_birth"  placeholder="date"> <br>
         <input type="text"  name="address" placeholder="address"> <br>
         <select name="gender" id="">
             <option value="0">nam</option>
             <option value="1">nữ</option>
         </select> <br>
         <img id="image_preview" src="https://png.pngtree.com/element_our/png/20181206/users-vector-icon-png_260862.jpg"
          height="110px" width="120px" alt="Customer image">
         <input type="file" name="image" accept="image/*" class="@error('image') is-invalid @enderror"><br>
<button type="submit" name="btn_add" >Thêm</button>


    </form>
    @endsection
</body>
</html>
