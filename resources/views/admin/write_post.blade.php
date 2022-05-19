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
    <title>admin</title>
    <script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
    <div class="row">
        <div class="col-md-6" style="margin: 0 auto">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <label for="">Tiêu đề</label>
                <input type="text" name="title" class="form-control" required>
                <label for="">Ảnh đại diện</label>
                <input type="file" name="images" required>
                <textarea name='text' id="text" cols="30" rows="10" required></textarea>
            <script src={{ url('ckeditor/ckeditor.js') }}></script>
            <script>
             CKEDITOR.replace( 'text', {
              filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
                } );
                CKEditor.replace('divcomponentid', {
                   language: 'vi'
                })
             </script>
             @include('ckfinder::setup')  
             <label>Tiêu đề ngắn</label>
             <input type="text" class="form-control" name="short_title" placeholder="Tiêu đề ngắn" required>
             <button class="btn btn-primary">Đăng bài</button>
            </form>
        </div>
    </div> 
 




    

    
</body>
<script>
    // Thay thế <textarea id="post_content"> với CKEditor
    CKEDITOR.replace( 'post_content' );// tham số là biến name của textarea
</script>
<script type="text/javascript" src="/js/ckfinder/ckfinder.js"></script>
<script>CKFinder.config( { connectorPath: '/ckfinder/connector' } );</script>
</html>