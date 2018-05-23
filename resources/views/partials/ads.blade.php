<!-- <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
	<div class="col-md-6 px-0">
	  <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Do you want to ads here please contact me 1110 px x 130px</a></p>
	</div>
</div> -->
<br/><br/>

<?php  
	$adves = \App\Advertising::where('expire','=','0')->get();
	$x = 1;
?>
<div class="jumbotron p-0 rounded ">
	<div class="col-md-12 px-0">
	  
	  <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
		  <div class="carousel-inner" role="listbox">

		  	@foreach($adves as $ads)
		  	<div class="carousel-item <?php print ($x == 1) ? 'active' : ''; ?>">
		      	<a href="{{$ads->link}}" title="{{$ads->company}}"><img class="d-block img-fluid" src="{{asset('')}}/{{$ads->image}}" alt="{{$ads->company}}"></a>
		    </div>
		    <?php $x ++; ?>
		  	@endforeach
		    
		    
		  </div>
		</div>
		  
	</div>
</div>