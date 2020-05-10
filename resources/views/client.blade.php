<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3 for="cars">Kateqoriyalar və şirkətlər:</h3>
    @foreach($companies as $company)
    <h3>{{ $company['category_name'] }}</h3>
    <!-- <br> -->
    @foreach($company['company'] as $data)
    <a href="company/{{$data['id']}}">{{ $data['company_name']}}</a>
    <br>
    @endforeach
    <br>
    @endforeach
</body>
</html>