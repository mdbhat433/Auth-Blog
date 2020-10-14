@extends('main')

@section('content')

@section('title','| Contact')

  
  <div class="row">
  <div class="col-md-12">
  <h1> Contact Me ! </h1>

  <form action="{{url('contact')}}" method="POST">
    {{ csrf_field() }}
  <div class="form-group">
  <label name="email">Email:</label>
   <input id="email" name="email" class="form-control" required>
  

  <label name="subject">Subject:</label>
   <input id="subject" name="subject" class="form-control" required>
  

  <label name="message">Message:</label>
   <textarea id="message" name="message" class="form-control" required>Type Your Message Here ..</textarea>
  
  <br>
<input type="Submit" value="Send Message" class="btn btn-success">

  </form>
  </div>
  </div>
  </div>
@endsection