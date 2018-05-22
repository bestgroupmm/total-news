<?php  
	$socials = \App\Sociallink::all();
?>
<footer class="blog-footer">
	<p>
		copyright © <?php print date('Y'); ?> <a href="https://www.mmtotalnews.com">www.mmtotalnews.com</a>. All right reserved. <br/><br/>

		Power By <a href="https://www.itrabbitmyanmar.com">IT Rabbit Website Services Co., Ltd</a>
	</p>
	<p>
		<a href="#">Back to top</a>
	</p>

	<hr>

	<p>
		@foreach($socials as $social)
		<a href="{{$social->link}}" style="{{$social->class}}"><i class="{{$social->icon}}"></i></a> &nbsp;&nbsp;
		@endforeach
		<!-- <a href="" style="font-size: 30px;"><i class="fa fa-twitter-square"></i></a> &nbsp;&nbsp;
		<a href="" style="font-size: 30px;"><i class="fa fa-google-plus-square"></i></a> &nbsp;&nbsp;
		<a href="" style="font-size: 30px;"><i class="fa fa-youtube-square"></i></a> &nbsp;&nbsp;
		<a href="" style="font-size: 30px;"><i class="fa fa-linkedin-square"></i></a> -->
	</p>

</footer>
