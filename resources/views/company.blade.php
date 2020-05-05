<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/add-service" method='post'>
    @csrf
        <h3 for="cars">Uygun kateqoriaya gore servis elave ele:</h3>
        <p>Servisin adı:</3>
        <select name="service">
        @foreach($services as $service)
            <option value="{{ $service['id']}}">{{ $service['service_name']}}</option>
        @endforeach
        </select>
        <br>
        Servisin muddeti(deqiqelernen):
        <input name='time' type="number" required>
        <input type="submit" value='tesdiq'>
    </form>
    <br>
    
    <form action="/delete-service" method='post' >
    @csrf
        <h3 for="cars">Kategoriaya aid servisler:</h3>
        @foreach($company_services as $service)
        <span>{{ $service['service']['service_name']}}</span>
        <button name="delete_service" value="{{ $service['service']['id']}}">servisi sil</button>
        <br>
        @endforeach
    </form>
    ---------------------------------
    <form action="add-staff" method='post' enctype="multipart/form-data">
    @csrf
        <h3 for="cars">Ishci elave et:</h3>
        
        <label for="">Name</label>
        <input name='name' type="text" required>
        <br>
        <label for="">Surname</label>
        <input name='surname'type="text" required>
        <br>
       
        <label for="">Mobile</label>
        <input name='mobile' type="number" required>
        <br>

        <label for="img">Select image:</label>
        <input type="file" id="img" name="img" accept="image/*" required>
        <br>
        <input type="submit" value='tesdiq'>
    </form>

    <form action="/delete-staff" method='post'>
    @csrf
        <h3 for="cars">Ishciler:</h3>
        @foreach($staffs as $staff)
        <span>{{ $staff['name']}}</span>
        <button name="delete_staff" value="{{ $staff['id']}}">ishcini sil</button>
        <br>
        @endforeach
    </form>
    <!-- <form> d  
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
    </form> -->
</body>
</html>