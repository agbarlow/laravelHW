@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Meal Tracker App, </div>

                <div class="panel-body">
                    You are logged in & have no meals listed. <a href= "/meals/create"> Create One Now !!!</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
