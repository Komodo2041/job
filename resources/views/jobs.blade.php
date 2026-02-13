@extends('template')
@section('content')

<h3>Oferty pracy</h3>
 

<form action="" method="get">
     
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Wyszukiwanie
  </a>

 <div class="collapse" id="collapseExample">
    <label>Branża</label>
    <select name="type_id"  class="form-control">
        <option>-</option>
        @foreach ($types AS $t)    
              <option value="{{$t->id}}"  
              @if (isset($search['type_id']) && $search['type_id'] == $t->id) selected @endif
              >{{$t->name}}</option>
        @endforeach
    </select>
     <label>Słowa kluczowe</label>
     <input type="text"  class="form-control" name="keys" placeholder="Słowa kluczowe"    @if (isset($search['keys'])) value="{{$search['keys']}}" @else value="" @endif  >    
    <br/>
    <input type="submit" class="btn btn-primary" value="Wyszukaj" />
    <a href="jobs" class="btn btn-primary">Resetuj</a>
     <br/> 
</div>  
</form>
 <br/>

 <table class="table">
    <thead>
        <tr>
            <th>Tytuł</th>
            <th>Branża</th>
            <th>Lokacja</th>
            <th></th>
        </tr>  
    </thead>  
    <tbody>
@forelse ($jobs as $job)
  <tr>
     <td>{{$job->title}}</td>
     <td>{{$typetable[$job->type_id]}}</td>
     <td>{{$job->location}}</td>
     <td>
         <a href="/jobs/edit/{{$job->id}}">Edytuj</a> | 
         <a href="/jobs/delete/{{$job->id}}" class="delrem">Usuń</a>
     </td>
   </tr>   
@empty
   <tr><td>Brak Ofert</td></tr>
@endforelse
</tbody>
</table>

<br/>
<a href="jobs/add" class="btn btn-primary">Dodaj Ofertę pracy</a>


@endsection('content')