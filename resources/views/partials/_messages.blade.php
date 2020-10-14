@if(Session::has('Success'))

  <div class="col-md-5 alert alert-success alert-dismissable">
 
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Success!</strong> {{ Session::get('Success') }}
    </div>
   <!-- <div class="alert alert-success" role="alert">
  <strong>Success!</strong> {{ Session::get('Success') }}
</div> -->
   @endif


<!-- Errors Messages -->
   @if(count($errors)>0)
   <div class="alert alert-danger" role="alert">
  <strong>Errors!</strong> 

  <ul>
@foreach($errors->all() as $error)

<li>{{$error}}</li>
@endforeach
</ul>
</div>
@endif