@extends ('main')

@section('title','| View Posts')
@section('content')
<div class="row">
<div  class="col-md-8">
<h1> {{$post->title}}</h1>

<p class='lead'>{{$post->body}}<p>

<hr>


<div id="backend-comments" style="margin-top: 50px;">
				<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>

				<table class="table">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Comment</th>

							<th width="70px">Actions</th>
						</tr>
					</thead>

					<tbody>
						@foreach ($post->comments as $comment)
						<tr>
							<td>{{ $comment->name }}</td>
							<td>{{ $comment->email }}</td>
							<td>{{ $comment->comment }}</td>
							<td>
								<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-pencil"></span></a>
								<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>




<div class="col-md-4 ">
<div class="well">

<dl class="dl-horizontal">
<label>URL:</label>
<!-- <p><a href="{{url('blog/'.$post->slug)}}">{{url($post->slug)}}</a></p> -->

<p><a href="{{route('blog.single',$post->slug)}}">{{route('blog.single',$post->slug)}}</a></p>
</dl>

<dl class="dl-horizontal">
<label>Created At:</label>
<p>{{date('M j Y h:i a',strtotime($post->created_at.'+330 minutes'))}}</p>
</dl>

<dl class="dl-horizontal">
<label>Last Updated:</label>
<p>{{date('M j Y h:i a',strtotime($post->updated_at.'+330 minutes'))}}</p>
</dl>

<hr>


<div class="row">
<div class="col-sm-6 ">
{!!Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block'))!!}

<!-- <a href="#" class="btn btn-primary btn-block">Edit</a> -->
</div> 
<div class="col-sm-6">
{!!Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])!!}

{!!Form::submit('Delete',['class'=>'btn btn-danger btn-block'])!!}

{!!Form::close()!!}

<!-- <a href="#" class="btn btn-danger btn-block">Delete</a> -->
</div>
</div>

<div class="row">
<div class="col-md-12">

{!!Html::linkRoute('posts.index','<< See All Posts',array(),array('class'=>'btn btn-default btn-block','style'=>'margin-top:20px;'))!!}


</div>
</div>

</div>
</div>
</div>





@endsection