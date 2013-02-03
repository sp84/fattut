@layout('layouts/main')
@section('navigation')
@parent
<li><?php echo HTML::link_to_action('article@new', 'Post an Article'); ?></li>
<li><?php echo HTML::link_to_action('dashboard@profile', 'Account'); ?></li>
<li><?php echo HTML::link_to_action('user@logout', 'Logout'); ?></li>
@endsection
@section('content')
<div class="row">
    <div class="span3">
        <div class="well sidebar-nav">
            <ul class="nav nav-list">
                <li class="nav-header">Followers</li>
            </ul>
            <div style="margin-left: 10px">
                @forelse (Auth::user()->followers as $follower)
                    <div style="float: left; width: 30px; margin: 0px 3px 3px 5px;">
                        <img src="http://gravatar.com/avatar/{{ md5(strtolower(trim($follower->email))) }}?s=25&d=retro" alt="Follower" title="{{ $follower->email }}" />
                    </div>
                @empty
                    <div>You have no followers.</div>
                @endforelse
                <div style="clear: both"></div>
            </div>
            <ul class="nav nav-list">
                <li class="nav-header">Following</li>
            </ul>
            <div style="margin-left: 10px">
                @forelse (Auth::user()->following as $following)
                    <div style="float: left; width: 30px; margin: 0px 3px 3px 5px;">
                        <img src="http://gravatar.com/avatar/{{ md5(strtolower(trim($following->email))) }}?s=25&d=retro" alt="Following" title="{{ $following->email }}" />
                    </div>
                @empty
                    <div>You are not following anybody.</div>
                @endforelse
                <div style="clear: both"></div>
            </div>
        </div>
    </div>
    <div class="span9">
		<h3>User Profile</h3>
		<div class="well">
			<h4>Change Your Password</h4>
			<form method="POST" action="{{ URL::to('article/post') }}" id="article_fork_form" enctype="multipart/form-data">
				<label for="current_password">Current Password</label>
				<input type="password" placeholder="" name="current_password" id="current_password" />
				<hr />
				<label for="new_password">New Password</label>
				<input type="password" placeholder="" name="new_password" id="new_password" />
				<label for="new_password2">Again</label>
				<input type="password" placeholder="" name="new_password2" id="new_password2" />
			</form>
			<button type="button" onclick="$('#article_fork_form').submit();" class="btn btn-primary">Submit</a>
		</div>
    </div>
</div>
@endsection
