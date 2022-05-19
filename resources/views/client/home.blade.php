<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>	My blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"  crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="asset/css/home.css">
  </head>
<body>
<div class="menu-pc">
    <a href="../">My Blog</a>
</div>
<div class="content">
  {{-- <div id="posts">
    <div id="img-post">
       <img  src="https://d1hjkbq40fs2x4.cloudfront.net/2016-01-31/files/1045.jpg"> 
    </div>
    <div id="titles">
      <div id="description">  
           <h2>Đánh giá chi tiết iPhone 13: Thiết kế thay đổi, nâng cấp lớn về hệ thống camera cùng thời lượng sử dụng pin ấn tượng</h2>
      </div>
      <div id="short-article">
         <p>
           Tại sự kiện thường niên vào tháng 9/2021, iPhone 13 ra mắt với nhiều điểm nhấn đáng chú ý. Mẫu iPhone thế hệ mới của Apple không chỉ mang lại nhiều tính năng mới mà còn có những cải tiến đáng kể so với iPhone 12 trước đó. iPhone 13 hiệu năng mạnh mẽ hơn với con chip Apple A15. iPhone 13 chụp ảnh tốt với sự cải tiến mạnh mẽ về camera. Tuy nhiên pin iPhone 13 dùng được bao lâu? Hãy cùng mình tìm hiểu chi tiết qua bài đánh giá iPhone 13 bên dưới đây nha.
          Lưu ý: Bài viết được tham khảo từ chuyên trang công nghệ Techradar.

          ​Xem thêm: 

         </p> 
      </div>
    </div>

  </div> --}}

  @foreach ($list_post as $item)
  <div id="posts">
    <div id="img-post">
       <img  src="/asset/images/{{$item->image}}"> 
    </div>
    <div id="titles">
      <div id="description">  
           <a href="../detail/{{$item->id}}">{{$item->title}}</a>
      </div>
      <div id="short-article">
         @php
             echo ''.$item->shot_content;
         @endphp
          
         
      </div>
    </div>
  </div>
  @endforeach

  {!!$list_post->links("vendor.pagination.bootstrap-4")!!}

</div>
<div class="footer">
  Trang web đang trong thời gian triển khai. Xin cảm ơn bạn đã ghé thăm!


</div>
</body>
</html>