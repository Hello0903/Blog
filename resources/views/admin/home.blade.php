@php
    if(session_status()=== PHP_SESSION_NONE)
    session_start();

    if(!isset($_SESSION['admin'])){
        header("Location: ../login"); 
        exit();
    } else if($_SESSION['admin'] != 'admindepzai'){
        header("Location: ../login"); 
        exit();
    }
    
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>list</title>
</head>
<body>
    <div class="row ">
        <div class="col-md-7" style="margin: 0 auto">
            <table class="table">
                <th>ID</th>
                <th>title</th>
                <th>Trạng thái(0 is active)</th>
                <th>Chức năng</th>
             <tbody>
                @foreach ($post as $item)
                   <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->status}}</td>
                    <td><button data-id="{{$item->id}}" class="add_btn btn btn-primary">Duyệt</button> 
                        <button data-id="{{$item->id}}" class="block_btn btn btn-primary">Bỏ</button></td>
                </tr> 
                @endforeach
                

             </tbody>
            </table>

        </div>
        {!!$post->links()!!}
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $('.add_btn').click(function(){
        if(confirm('Bạn muốn duyệt')){
        id = $(this).data('id');
        var urls = window.location.protocol+'//'+window.location.hostname+'/check/'+id+'/0';
        fetch(urls).then(function(response){
            window.location.reload();
        }).catch(
            function(e){
                console.log(e);
            }
        ) 
        }
    })
    $('.block_btn').click(function(){
        if(confirm('Bạn muốn khóa')){
        id = $(this).data('id');
        var urls = window.location.protocol+'//'+window.location.hostname+'/check/'+id+'/1';
        fetch(urls).then(function(response){
            window.location.reload();
        }).catch(
            function(e){
                console.log(e);
            }
        ) 
        }
    })

</script>
</html>