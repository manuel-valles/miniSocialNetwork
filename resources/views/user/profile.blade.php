@extends('layouts.app')
<style type="text/css">
	.profile-img{
		max-width: 150px;
		border: 5px solid #fff;
		border-radius: 50%;
		box-shadow: 0 2px 2px rgba(0,0,0,0.3);
	}
</style>
@section('content')
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-body text-center">
					<img class="profile-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRiypen9Urd6cy9dhIB4Sd2myKFg6xB6tN2bFTroZcuY_muC3OSng" alt="profile-avatar-image">
					<h1>{{$user->name}}</h1>
					<h5>{{$user->email}}</h5>
					{{-- This dob has been customized @user.php --}}
					<h5>{{$user->dob->format('l j F Y')}} ({{$user->dob->age}} years old)</h5>
					<button class="btn btn-success">Follow</button>
				</div>
			</div>
		</div>
	</div>
@endsection