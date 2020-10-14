@extends('main')
@section('title','| All Posts')
@section('content')


<div class="row">
<div class="col-md-10">
<h1>All Posts</h1>

</div>
<div class="col-md-2">

<a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary">Create New Post</a>

</div>

<div class="col-md-12">

<hr>
</div>
</div> <!--end of row -->

<div class="row">
<div class="col">
<table class='table'>
        <thead>
        <th>Title</th>
        <th>Body</th>
        <th>Created At</th>
        <th></th>

        </thead>
        <tbody>
     @foreach($posts as $post)
            <tr>
           <td>{{$post->title}}</td>
           <td>{{substr($post->body,0,50)}}{{strlen($post->body)>50?"...":""}}</td>
           <td>{{date('M j Y h:i a',strtotime($post->created_at.'+330 minutes'))}}</td>
           <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-default btn-sm btn-primary">View</a> 
           <!-- <a href="{{route('posts.edit',$post->id)}}" class="btn btn-default btn-sm btn-primary">Edit</a></td> -->


            </tr>
        @endforeach
        
        </tbody>
</table>


<!--Pagination -->
<div class="text-center">
{!!$posts->links();!!}
</div>

</div>
</div>

@endsection