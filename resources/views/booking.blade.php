<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="" method='post' enctype="multipart/form-data">
    @csrf
        <label for="cars">Choose a category:</label>

        <select name="category">
        @foreach($categories as $category)
            <option value="{{ $category['id']}}">{{ $category['category_name']}}</option>
        @endforeach
        </select>
    <br>
        <label for="">Company Name</label>
        <input name='company_name' type="text">
        <br>
        <label for="">Address</label>
        <input name='address' type="text">
        <br>
        <label for="">Company description</label>
        <input name='desc' type="text">
        <br>
        <label for="img">Select image:</label>
        <input type="file" id="img" name="img" accept="image/*">

        <br>


        <label for="">Name</label>
        <input name='name' type="text">
        <br>
        <label for="">Surname</label>
        <input name='surname'type="text">
        <br>
        <label for="">email</label>
        <input name='email' type="text" required autocomplete="email">
        <br>
        <label for="">Password</label>
        <input id="password" type="password"  name="password" required autocomplete="new-password">
        <br>
        <label for="">Re Password</label>
        <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
        <br>

        <label for="">Mobile1</label>
        <input name='mobile1' type="number">
        <br>
        <label for="">Mobile2</label>
        <input name='mobile2' type="number">
        <br>
        <label for="">Phone</label>
        <input name='phone' type="number">
        <br>
        <input type="submit">
    </form>
</body>
</html>