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
        <h1>Welcome {{ Auth::user()->email }} Your articles</h1>
        @forelse ($articles as $article)
        <div class="well" style="text-align: center">
            <h2>{{ $article->title }}</h2>
            <p>{{ $article->content }}</p>
        </div>
        @empty
        <div class="alert alert-info">
            <h4 class="alert-heading">Awww!</h4>
            <p>Seems like you don't have any articles yet. <a href="#">Upload a new one?</a></p>
        </div>
        @endforelse
		
		<h1>All Articles</h1>
		@forelse ($articles_all as $article_all)
		<div class="well" style="text-align: left">
			<h2>{{ $article_all->title }}</h2>
			<p>{{ $article_all->content }}</p>
			<p>Published by: {{ $article_all->email }}</p>
			<p>Created at: {{ $article_all->created_at }}</p>
			<p>Last Modified: {{ $article_all->updated_at }}</p>
		</div>
		@empty
        <div class="alert alert-info">
            <h4 class="alert-heading">Awww!</h4>
            <p>There are currently no articles in our database.  <a href="#">Upload a new one?</a></p>
        </div>
		@endforelse
    </div>
</div>
@endsection
