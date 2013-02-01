@layout('layouts/main')
@section('navigation')
@parent
<li><?php echo HTML::link_to_action('article@new', 'Post an Article'); ?></li>
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
	
        <h3>{{ HTML::link('article/' . $article->id, $article->title) }}</h3>
		<small>Written by {{ $article->id }} on {{ $article->created_at }}.  Last modified on {{ $article->updated_at }}.</small>
		<p>{{ $article->content }}</p>
		<p>{{ HTML::link('article/fork/' . $article->id, 'Fork This Article') }}</p>
		
		<div class="well well-small">
			<div style="float:left; height:80px; width:80px; font-size: 64px; margin-right:40px;">
				<p style="line-height:80px;">+{{ $ratings }}</p>
			</div>	
			<div>
				<h4>Rate this article.</h4>
				<form method="POST" action="{{ URL::to('article/rateup') }}" id="article_rateup_form" enctype="multipart/form-data">
					<input type="hidden" name="article" value="{{ $article->id }}" />
				</form>
				<button type="button" onclick="$('#article_rateup_form').submit();" class="btn btn-primary" style="float:left;margin-right:20px;">Thumbs Up</button>
				<form method="POST" action="{{ URL::to('article/ratedown') }}" id="article_ratedown_form" enctype="multipart/form-data">
					<input type="hidden" name="article" value="{{ $article->id }}" />
				</form>
				<button type="button" onclick="$('#article_ratedown_form').submit();" class="btn btn-primary">Thumbs Down</button>
			</div>
		</div>
		
		<hr>
		
		<h2>Forks</h2>
        @forelse ($forks as $fork)
        <div class="well" style="text-align: center">
            <h2>{{ HTML::link('article/' . $fork->id, $fork->title) }}</h2>
            <p>{{ substr($fork->content, 0, 120) . ' [..]' }}</p>
			<p>{{ HTML::link('article/' . $fork->id, 'Read more &rarr;') }}</p>
        </div>
        @empty
        <div class="alert alert-info">
            <h4 class="alert-heading">Dang!</h4>
            <p>Seems like this article has not been forked yet.  Interested? {{ HTML::link('article/fork/' . $article->id, 'Fork it!') }}</p>
        </div>
        @endforelse
		
		<hr>
		
		<h2>Comments</h2>
        @forelse ($comments as $comment)
        <div class="well well-small">
            <p>{{ $comment->message }}</p>
        </div>
        @empty
        <div class="alert alert-info">
            <h4 class="alert-heading">Doh!</h4>
            <p>Seems like this article has no comments.  Want to be the first?  Comment below!</p>
        </div>
        @endforelse

		<div class="form" id="article_comment">
			<h3>Leave a comment</h3>
			<form method="POST" action="{{ URL::to('article/comment') }}" id="article_comment_form" enctype="multipart/form-data">
				<label for="comment">Comment</label>
				<textarea placeholder="Comment goes here" name="comment" id="comment" class="span5"></textarea>
				<input type="hidden" name="article" value="{{ $article->id }}" />
			</form>
			<button type="button" onclick="$('#article_comment_form').submit();" class="btn btn-primary">Submit</button>
		</div>
		
    </div>
</div>
@endsection
