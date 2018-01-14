@extends('layouts.app')

@section('title')
	{{ $user->name }}'s Profile
@endsection

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">

						{{ $user->name }}

					</div>
					<div class="panel-body">
						
    					<img src="@if (!empty($user->profile->avatar_status) && ($user->profile->avatar_status == 1)) {{ $user->profile->avatar }} @else {{ Gravatar::get($user->email) }} @endif" alt="{{ $user->name }}" class="user-avatar">

						<dl class="user-info">

							<dt>
								Profile Username
							</dt>
							<dd>
								{{ $user->name }}
							</dd>

							<dt>
								First Name
							</dt>
							<dd>
								{{ $user->profile->first_name or 'No name' }}
							</dd>

							@if (!empty($user->profile->last_name))
								<dt>
									Last Name
								</dt>
								<dd>
									{{ $user->profile->last_name or 'No name' }}
								</dd>
							@endif

							<dt>
								Email
							</dt>
							<dd>
								{{ $user->email }}
							</dd>

							@if ($user->profile)

								@if ($user->profile->location)
									<dt>
										Location
									</dt>
									<dd>
										{{ $user->profile->location }} <br />

									</dd>
								@endif

								@if ($user->profile->bio)
									<dt>
										Bio
									</dt>
									<dd>
										{{ $user->profile->bio }}
									</dd>
								@endif

								@if ($user->profile->twitter_username)
									<dt>
										Twitter Username
									</dt>
									<dd>
										{!! HTML::link('https://twitter.com/'.$user->profile->twitter_username, $user->profile->twitter_username, array('class' => 'twitter-link', 'target' => '_blank')) !!}
									</dd>
								@endif

								@if ($user->profile->github_username)
									<dt>
										GitHub Username
									</dt>
									<dd>
										{!! HTML::link('https://github.com/'.$user->profile->github_username, $user->profile->github_username, array('class' => 'github-link', 'target' => '_blank')) !!}
									</dd>
								@endif
							@endif

						</dl>

						@if ($user->profile)
							@if (Auth::user()->id == $user->id)
								<a href={{'/profile/'.Auth::user()->name.'/edit'}} class = 'btn btn-small btn-info btn-block'>Edit Profile</a>

							@endif
						@else

							<p>No Profile Yet</p>
							<a href={{'/profile/'.Auth::user()->name.'/edit'}} class = 'btn btn-small btn-info btn-block'>Add Profile</a>
							
						@endif

					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

@section('scripts')
@endsection
