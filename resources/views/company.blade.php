<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

    <form action="/add-to-slider" method='post' enctype="multipart/form-data">
    @csrf
        <h3 for="cars">Slidere shekil elave ele:</h3>
        <input type="file" id="img" name="img1" accept="image/*">
        <input type="file" id="img" name="img2" accept="image/*">
        <input type="file" id="img" name="img3" accept="image/*">
        <input type="submit" value='tesdiq'>
        <br>
        
    </form>
    <br>

    <form action="/delete-slider" method='post' enctype="multipart/form-data">
    @csrf
        <h3 for="cars">Slider shekilleri:</h3>
        @foreach($slider as $data)
        <img src="{{URL::asset('/images/slider')}}/{{ $data['image_filename']}}" alt="profile Pic" height="100" width="200">
        <button name="delete_slide" value="{{ $data['id']}}">sil</button>
        <!-- <br> -->
        @endforeach
        <!-- <input type="submit" value='tesdiq'> -->
        <br>
        
    </form>
    <br>


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
        <input type="file" id="img" name="img" accept="image/*" >
        <br>
        

        <label for="img">1ci gun:</label>
        <input name="start1" type="number"   min="09" max="24" value='09' required>
        <input name="end1" type="number"   min="09" max="24" value='24' required>
        <label> Ishlemir:</label>
        <input type="checkbox" name="day1" value="true">
        <br>

        <label for="img">2ci gun:</label>
        <input name="start2" type="number"   min="09" max="24" value='09' required>
        <input name="end2" type="number"   min="09" max="24" value='24' required>
        <label> Ishlemir:</label>
        <input type="checkbox" name="day2" value="true">
        <br>

        <label for="img">3cu gun:</label>
        <input name="start3" type="number"   min="09" max="24" value='09' required>
        <input name="end3" type="number"   min="09" max="24" value='24' required>
        <label> Ishlemir:</label>
        <input type="checkbox" name="day3" value="true">
        <br>

        <label for="img">4cu gun:</label>
        <input name="start4" type="number"   min="09" max="24" value='09' required>
        <input name="end4" type="number"   min="09" max="24" value='24' required>
        <label> Ishlemir:</label>
        <input type="checkbox" name="day4" value="true">
        <br>

        <label for="img">5ci gun:</label>
        <input name="start5" type="number"   min="09" max="24" value='09' required>
        <input name="end5" type="number"   min="09" max="24" value='24' required>
        <label> Ishlemir:</label>
        <input type="checkbox" name="day5" value="true">
        <br>

        <label for="img">6ci gun:</label>
        <input name="start6" type="number"   min="09" max="24" value='09' required>
        <input name="end6" type="number"   min="09" max="24" value='24' required>
        <label> Ishlemir:</label>
        <input type="checkbox" name="day6" value="true">
        <br>

        <label for="img">7ci gun:</label>
        <input name="start7" type="number"   min="09" max="24" value='09' required>
        <input name="end7" type="number"   min="09" max="24" value='24' required>
        <label> Ishlemir:</label>
        <input type="checkbox" name="day7" value="true">
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