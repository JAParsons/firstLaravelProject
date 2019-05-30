@extends('layouts.master')

@section('title')
    writeit | Account
@endsection

@section('content')
    <section class="row new-post">
        <div class="col-md-4 offset-md-2">
            <br><br><br><br><br>
            <header><h3>Your Account</h3></header>
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control" value="{{ $user->first_name }}" id="first_name">
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
        <div class="col-md-4">
            <br><br><br>
        <div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="image_outer_container">
				<div class="green_icon"></div>
				<div class="image_inner_container">
                @if (Storage::disk('local')->has($user->first_name . '_' . $user->id . '.jpg'))
                    <img src="{{ route('account.image', ['filename' => $user->first_name . '_' . $user->id . '.jpg']) }}">
                @else
                    <img src="{{URL::asset('/images/default.png')}}">
                @endif
				</div>
			</div>
		</div>
	</div>
        </div>
    </section>
@endsection