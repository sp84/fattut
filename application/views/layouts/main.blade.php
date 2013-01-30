<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>FatTuts</title>
        {{ Asset::styles() }}
        {{ Asset::scripts() }}
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a href="<?php echo URL::to_action('home@index'); ?>" class="brand">FatTuts</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            @section('navigation')
                            <li class="active"><?php echo HTML::link_to_action('home@index', 'Home'); ?></li>
                            @yield_section
                        </ul>
                    </div><!--/.nav-collapse -->
					@section('post_navigation')
					@if (Auth::check())
						@include('plugins.loggedin_postnav')
					@endif
					@yield_section
                </div> <!--/.container -->
            </div> <!--/.navbar-inner -->
        </div>
	</div>
        <div class="container">
			<div class="spacer"></div>
			@include('plugins.status')
            @yield('content')
            <hr>
            <footer>
				<p>&copy; FatTuts 2020</p>
            </footer>
        </div> <!-- /container -->
		@section('modals')
		@if (Auth::check())
			@include('plugins.post_modal')
		@endif
		@yield_section
    </body>
</html>