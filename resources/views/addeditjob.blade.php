@extends('template')
@section('content')

<h3>Oferta pracy   </h3>
   @if (isset($isedit) && $isedit)
      <h4>Edycja</h4>
   @else
      <h4>Dodawanie</h4>
   @endif

@if ($errors != "")   
    <div class="alert alert-danger" role="alert">
        {{$errors}}
    </div> 
@endif
 

<form action="" method="Post">
     @csrf

    <label>Branża</label>
    <select name="type_id"  class="form-control">
        <option>-</option>
        @foreach ($types AS $t)    
              <option value="{{$t->id}}" 
                 @if ($t->id == $offer->type_id) selected @endif
               >{{$t->name}}</option>
        @endforeach
    </select> 

     <label>Tytuł</label>
     <input type="text"  class="form-control" name="title" placeholder="Title" value="{{$offer->title}}"  >
 
     <label>Lokacja</label>
     <input type="text"  class="form-control" name="location" placeholder="Miejsce" value="{{$offer->location}}"  >
 
    <label>Opis</label>
    <textarea name="body"  class="form-control">{{$offer->body}}</textarea>
  
    <br/>

     <input type="hidden" value="1" name="save" />
     @if (isset($isedit) && $isedit)
         <input type="submit" class="btn btn-primary" value="Edytuj Ofertę" />
     @else
         <input type="submit" class="btn btn-primary" value="Dodaj Ofertę" />
     @endif
     
    
</form>
 


@endsection('content')