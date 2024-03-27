@extends('layouts.app')
@section('title','الملف الشخصي')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Registration</title>
<link rel="stylesheet" href="styles.css">

<style>
    /* styles.css */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
}

form {
    margin-top: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

    /* body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 4px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    } */
    /*.image-div {
        width: 200px;
        height: 100px;
        background-image: url('users/default.png'); /* Replace 'example.jpg' with your image file path */
        
    
    .profile-photo {
        width: 150px;
        height: 150px;
        background-color: #ccc;
        border-radius: 50%;
        background-size: cover;
        background-position: center;
        margin-bottom: 20px;
    }

    .file-input {
        display: none;
    }

    .btn-browse {
        display: inline-block;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>
</head>
<body>
    <div class="image-div">
        <img src="{{asset(auth()->user()->image)}}" alt="" width="82px" height="82px">
        <h3>
            {{auth()->user()->name}}
        </h3>
    </div>

    <form action="/profile" method="post">
@csrf
@method('PATCH')
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"  value="{{auth()->user()->name}}"  >

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{auth()->user()->email}}"   >

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <div class="profile-photo" id="preview">

        </div>
        
        <input type="file" class="file-input" id="fileInput" accept="image/*">
        <label for="fileInput" class="btn-browse">Change you Photo</label>
    
        <script>
            document.getElementById('fileInput').addEventListener('change', function(event) {
                var file = event.target.files[0];
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').style.backgroundImage = 'url(' + e.target.result + ')';
                };
                reader.readAsDataURL(file);
            });
        </script>
 <div>
    <input type="submit" value="حفظ التعديلات">
        <input type="submit" value="تسجيل الخروج" form="logout">
 </div>

    
       
    </form>
    <form action="/logout" id="logout" method="POST">
        @csrf
    </form>
</body>


    
@endsection