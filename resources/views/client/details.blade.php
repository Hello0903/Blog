<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>	Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="../asset/css/details.css">
   <script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
<div class="menu-pc">
    <a href="../">My Blog</a>
</div>
<div class="content">
  <div id="posts">
    <div id="img-post">
       <img  src="/asset/images/{{$details->image}}"> 
    </div>
    <div id="titles">
      <div id="description">  
           <h2>{{$details->title}}</h2>
      </div>
      <div id="short-article">
        {!! Illuminate\Mail\Markdown::parse($details->content) !!}
       
      </div>
       <div id="athor">
          Write by: {{$details->user_id}} at {{$details->date_create}}
        </div>
    </div>

  </div>
{{-- <div id="posts">
    <div class="comment">
        <h2>Các bình luận:</h2>
        
    </div>
  </div> --}}
</div>
</div>

{{-- <div class="footer">
    123


</div> --}}
</body>
</html>