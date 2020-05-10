<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
Shirketin adi: 
{{ $company['company_name']}}<br>
Logo:
{{ $company['logo']}}<br>
<img src="{{URL::asset('/images/companies')}}/{{ $company['company_logo']}}" alt="profile Pic" height="100" width="200">
<br>
Slayder shekilleri:<br>
@foreach($company['slider'] as $data)
<img src="{{URL::asset('/images/slider')}}/{{ $data['image_filename']}}" alt="profile Pic" height="100" width="200">
<!-- <button name="delete_slide" value="{{ $data['id']}}">sil</button> -->
<!-- <br> -->
@endforeach
<br>
---

Telefonlar:<br>
{{ $company['mobile']}}<br>
{{ $company['mobile2']}}<br>
{{ $company['phone']}}
<br>
Shirketin haqqinda:
{{ $company['company_desc']}}<br>
Unvan:
{{ $company['address']}}<br>

<form  action="/show-masters" method='post'>
    @csrf
    <input type="date" name='date' required>
    <select name="service">
    @foreach($company_services as $service)
        <option value="{{ $service['service']['id'] }}">{{ $service['service']['service_name']}}</option>
    @endforeach
    </select>
    <input type="submit" value='tesdiq'>
</form>
</body>
</html>