@extends('main')

@section('title', '| Homepage')

@section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                  <h2>Welcome to My Blog!</h2>
                  <p class="lead">Thank you so much for visiting. This is my test website !</p>
                  <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
                </div>
            </div>
        </div> <!-- end of header .row -->

        <div class="row">
            <div class="col-md-8">
                
                @foreach($posts as $post)
                
                    <div class="post">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ substr(strip_tags($post->body), 0, 300) }}{{ strlen(strip_tags($post->body)) > 300 ? "..." : "" }}</p>
                        <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-primary">Read More</a>
                    </div>

                    <hr>

                @endforeach

            </div>

            <!-- <div class="col-md-3 col-md-offset-1">
                <h2>Sidebar</h2> 
                <div class="w3-content w3-section" style="max-width:500px">
<img class="mySlides" src="/baby2.jpg" style="width:100%">
  <img class="mySlides" src="/baby1.jpg" style="width:100%">
  
</div> -->

<script>
// var myIndex = 0;
// carousel();

// function carousel() {
//     var i;
//     var x = document.getElementsByClassName("mySlides");
//     for (i = 0; i < x.length; i++) {
//        x[i].style.display = "none";  
//     }
//     myIndex++;
//     if (myIndex > x.length) {myIndex = 1}    
//     x[myIndex-1].style.display = "block";  
//     setTimeout(carousel, 2000); // Change image every 2 seconds
// }
</script>


            </div>



<!--Pagination -->

<div class="row">
<div class="col-md-12">
    <div class="text-center">
        {!! $posts->links() !!}
    </div>
</div>
</div>



        </div>







@stop