@layout('layouts/main')
@section('navigation')
@parent
<li><?php echo HTML::link_to_action('home@about', 'About'); ?></li>
@endsection
@section('content')
<div class="hero-unit">
    <div class="row">
        <div class="span6">
            <h1>Welcome to FatTuts</h1>
            <p>Discover new ways to do things.</p>
        </div>
        <div class="span4">
            <p><a href="about" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
        </div>
    </div>
</div>
<!-- Example row of columns -->
<div class="row">
    <div class="span3">
            <form class="well" method="POST" action="user/authenticate">
                <label for="email">Email</label>
                <input type="email" placeholder="Your Email Address" name="email" id="email" />
                <label for="password">Password</label>
                <input type="password" placeholder="Your Password" name="password" id="password" />
                <label class="checkbox" for="new_user">
                    <input type="checkbox" name="new_user" id="new_user" checked="checked"> I am a new user
                </label>
                <br />
                <button type="submit" class="btn btn-success">Login or Register</button>
            </form>
    </div>
    <div class="span4">
        <a href="#"><img src="http://fc00.deviantart.net/fs6/i/2005/049/f/0/space_invader_icon_2_by_moglenstar.png" alt="Get it on iOS" /></a>
    </div>
    <div class="span4">
        <a href="#"><img src="http://fc00.deviantart.net/fs6/i/2005/049/f/0/space_invader_icon_2_by_moglenstar.png" alt="Get it on Android" /></a>
    </div>
</div>
@endsection