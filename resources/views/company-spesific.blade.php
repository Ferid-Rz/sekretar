<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
</head>
<body>
<!-- Shirketin adi: 
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
{{ $company['address']}}<br> -->

------------------




<!-- <form  action="" method='post'>
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
    @csrf
    <select name="service">
    @foreach($company_services as $service)
        <option value="{{ $service['id'] }}">{{ $service['name']}}</option>
    @endforeach
    </select>
    <input type="submit" value='tesdiq'>
</form> -->

<select id='select_staff' style='width:250px;height:100px' name="service1">
@foreach($company_services as $service)
    <option value="{{ $service['id'] }}">{{ $service['name']}}</option>
@endforeach
</select>

<select id='test'  name="service2">
</select>


<select id='aa'  name="service3">
@foreach($days as $key => $day)
    <option value="{{ $key }}">{{ $day}}</option>
@endforeach
</select>


<select id='test_hour'  name="service3">
</select>


</body>

<script>

var _token = $('input[name="_token"]').val(); 
// var bank_id = bank_data[i]['bank_id']


<?php 
        $json_str1 = $hours[0];
        $json_str2 = $hours[1];
        $json_str3 = $hours[2];
        $json_str4 = $hours[3];
        $json_str5 = $hours[4];
        $json_str6 = $hours[5];
        $json_str7 = $hours[6];

    ?>

$(function(){

    var d1 = <?php echo json_encode($json_str1); ?>;
    var d2 = <?php echo json_encode($json_str2); ?>;
    var d3 = <?php echo json_encode($json_str3); ?>;
    var d4 = <?php echo json_encode($json_str4); ?>;
    var d5 = <?php echo json_encode($json_str5); ?>;
    var d6 = <?php echo json_encode($json_str6); ?>;
    var d7 = <?php echo json_encode($json_str7); ?>;

    // $( "#test" ).change(function() {
    //     alert( "Handler for .change() called." );
    // });

    $('#aa').on('change', function(e){ 
        var num = $('#aa').val();
        // console.log(num)
        // console.log(typeof(num))
        // var val = 0
        switch ( num) {
        case '0':
            val = d1;
            break;
        case '1':
            val = d2;
            break;
        case '2':
            val = d3;
            break;
        case '3':
            val = d4;
            break;
        case '4':
            val = d5;
            break;
        case '5':
            val = d6;
            break;
        case '6':
            val = d7;
        }

        $('#test_hour')
            .empty()
            .append('')
        ;
        
        $.each(val, function(key, value) { 
            $('#test_hour')
                .append($("<option></option>")
                            .attr("value",key)
                            .text(value)); 
        });
       

        // $.each(xx, function(key, value) {   
        //     $('#test_hour')
        //         .append($("<option></option>")
        //                     .attr("value",key)
        //                     .text(value)); 
        // });

        // for (i = 0; i < 3; i++) {
        //     $('#layihe'+i).show();
        //     // $("#image"+i).attr('href', lbl4[i]['bank']['internet_bank']);
        //     $("#logo"+i).attr('src', 'images/'+lbl4[i]['bank']['logo']);
        //     $("#title"+i).text(lbl4[i]['title']);
        //     $("#minfaiz"+i).text(lbl4[i]['min_FIFD']+'%');
        //     $("#maxmuddet"+i).text(lbl4[i]['max_muddet']);
        //     $("#bankid"+i).attr('href', 'credit/'+lbl4[i]['slug_title']);
        //     $("#bank-sehifesi"+i).attr('href', 'bank-about/'+lbl4[i]['bank']['slug_adi']);
        // }
    });



    $('#select_staff').on('change', function(e){  
        var id = $('#select_staff').val();
        //  alert(id)
        $.ajax({
        url:"/show-services",
        method:"POST",
        data:{ staff_id: id, _token: '{{csrf_token()}}'},
        success: function (data) {
                // console.log(data[0][0]['service']['service_name'])
                var xx = []
                for (i = 0; i<Object.keys(data[0]).length; i++) {
                    // console.log((data[0][i]['service']['service_name']))
                    xx.push(data[0][i]['service']['service_name'])
                }

                

                // append new value to the array
                // console.log('---------')
                // console.log(xx);
                // console.log('---------')
                // alert(data)
                // $('#select_staff').html("Appended item");
                // $("#select_staff").append("Appended item");

                // var list = $("#test");
                // $.each(items, function(index, item) {
                // list.append(new Option(item.text, item.value));
                // });

                $('#test')
                    .empty()
                    .append('')
                ;
                // selectValues = { "1": "test 1", "2": "test 2" };
                $.each(xx, function(key, value) {   
                    $('#test')
                        .append($("<option></option>")
                                    .attr("value",key)
                                    .text(value)); 
                });


            }
        })

    });



    $('#select_hours').on('change', function(e){  
        var id = $('#select_staff').val();
       

    });



})
</script>
</html>