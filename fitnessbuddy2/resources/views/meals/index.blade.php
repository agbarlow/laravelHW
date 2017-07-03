@extends('layouts.app')

@section('content')

<h4>All Meals</h4>

@if(!$meals->isEmpty())
<ul class = "list-group">
  @foreach($meals as $meal )
     <li class ="list-group-item"  >

       <a href =  "/meals/{{$meal->id}}">
        {{ $meal->name }} 
       </a>
       <span class="pull-right">
       <?php
		$phpdate = strtotime( $meal->created_at );
		$mysqldate = date( 'g:ia \o\n l, F jS', $phpdate );
		?>	
			{{ $mysqldate }}
		</span>
      </li>
   @endforeach
 </ul>
 @else
<h5>You have no meals<a href= "/meals/create"> Create One Now !!!</a></h5>

@endif
@stop