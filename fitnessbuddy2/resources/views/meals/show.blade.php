@extends('layouts.app')

@section('content')

<body id="app-layout">
    

    <div class="container">
        	<div class="meal-info">
		<h2 class="meal-name"> {{ $meal->name }} </h2> 
		<span class="meal-time">
		<?php
		$phpdate = strtotime( $meal->created_at );
		$mysqldate = date( 'l, F jS, Y', $phpdate );
		?>	
			{{ $mysqldate }}
		</span>

		<br>

		<span class="meal-data label label-pill label-primary">
			<?php 
			$kCal = 0;
			
			foreach ($meal->foods as $food) {
			$kCal = ($food->protein * 4) + ($food->carbs * 4) + ($food->fat * 9) + $kCal;
			}
			?>
			
			{{ $kCal }} kCal
		</span>
			
			
			
		<span class="meal-data label label-protein label-default">
			<?php
			$protein = 0;
			
			foreach ($meal->foods as $food) {
			$protein = ($food->protein) + $protein;
			}
			?>
			{{ $protein }}g Protein
			
		</span>

		<span class="meal-data label label-pill label-default">
			<?php
			$carbs = 0;
			
			foreach ($meal->foods as $food) {
			$carbs = ($food->carbs) + $carbs;
			}
			?>
			{{ $carbs }}g Carbohydrates
		</span>

		<span class="meal-data label label-pill label-default">
			<?php
			$fat = 0;
			
			foreach ($meal->foods as $food) {
			$fat = ($food->fat) + $fat;
			}
			?>
			{{ $fat }}g Fat
		</span>
	</div>

	<hr>

	<h3>Foods</h3>
	@foreach ($meal->foods as $food)
	
	<ul>
	<p> {{ $food->name }} <span class="food-time pull-right"> {{ $food->protein }} / {{ $food->carbs }} / {{$food->fat}} (protein/carbs/fat)
		</span>
	</p>
	</ul>
	@endforeach
	
	<hr>


	<form action="/meals/{{$meal->id}}/foods" method="post">
	
	 {{ csrf_field() }}


		<div class="form-group row">
			<label for="name" class="col-sm-2 form-control-label">Food Name</label>
			<div class="col-sm-10">
				<input class="form-control" 
						type="text" 
						name="name" 
						placeholder="Food Name"
						required
						>
			</div>
		</div>

		<div class="form-group row">
			<label for="protein" class="col-sm-2 form-control-label">Protein</label>
			<div class="col-sm-10">
				<input class="form-control" 
						type="number" 
						name="protein" 
						placeholder="Protein/g"
						
						>
			</div>
		</div>

		<div class="form-group row">
			<label for="carbohydrates" class="col-sm-2 form-control-label">Carbohydrates</label>
			<div class="col-sm-10">
				<input class="form-control" 
						type="number" 
						name="carbs" 
						placeholder="Carbohydrates/g"
						required
						>
			</div>
		</div>

		<div class="form-group row">
			<label for="fat" class="col-sm-2 form-control-label">Fat</label>
			<div class="col-sm-10">
				<input class="form-control" 
						type="number" 
						name="fat" 
						placeholder="Fat/g"
						required
						>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-offset-2 col-sm-10">
				<button class="btn btn-primary" value="submit" type="submit">Submit</button>
			</div>
		</div>

	</form>

</div>

@endsection