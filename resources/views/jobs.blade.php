@extends('template')
@section('content')

<h3>Oferty pracy</h3>
 
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
     <td>Branża</td>
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