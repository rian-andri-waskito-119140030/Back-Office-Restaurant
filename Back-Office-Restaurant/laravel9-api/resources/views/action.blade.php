<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('assets/all.css'); }}">
</head>
<body>
<a href="{{ route('menu.edit',$id_menu) }}" data-toggle="tooltip" data-original-title="Edit" class="edit btn btn-success edit">
Edit
</a>
<a href="javascript:void(0)" data-id="{{ $id_menu }}" data-toggle="tooltip" data-original-title="Delete" class="delete btn btn-danger">
Delete
</a>
</body>
</html>

