<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
    


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
   
    
    var token = '223867703.c880546.88d74143bc2b4c9f9510e590a1389ced', 
        userid = 223867703,
        num_photos = 4000; 

        $.ajax({
            url: 'https://api.instagram.com/v1/users/' + userid + '/media/recent',
            dataType: 'jsonp',
            type: 'GET',
            data: {access_token: token, count: num_photos},
            success: function(data){
                console.log(data);
                for( n in data.data ){

                    
                    console.log(data.data[n]);
                    console.log(data.data[n].type);
                    if(data.data[n].type == "image"){
                        $('body').append('<div><img src="'+data.data[n].images.standard_resolution.url+'"></div>');
                    }else if(data.data[n].type == "video"){
                        $('body').append('<div><video controls><source src="'+data.data[n].videos.standard_resolution.url+'"></source></video></div>');     
                    }
                }
            },
            error: function(data){
                console.log(data);
            }
        });
  
    </script>
</body>
</html>