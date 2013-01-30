@layout('layouts/main')
@section('navigation')
@parent
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
	
        <h1>{{ HTML::link('article/' . $article->id, $article->title) }}</h1>
		<h6>Written by {{ $article->id }} on {{ $article->created_at }}.  Last modified on {{ $article->updated_at }}.</h6>
		<p>{{ $article->content }}</p>
		<p>{{ HTML::link('articles/' . $article->id, 'Return to Index') }}</p>
		<hr>
		<h2>Comments</h2>
    </div>
</div>
@endsection
