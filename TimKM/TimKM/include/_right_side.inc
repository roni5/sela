<div id="right-slider" >
	<section class="slider">
		<div class="flexslider">
		  <ul class="slides">
			<li>
				<img src="images/data/kitchen_adventurer_cheesecake_brownie.jpg" />
				</li>
				<li>
				<img src="images/data/kitchen_adventurer_lemon.jpg" />
				</li>
				<li>
				<img src="images/data/kitchen_adventurer_donut.jpg" />
				</li>
				<li>
				<img src="images/data/kitchen_adventurer_caramel.jpg" />
				</li>
		  </ul>
		</div>
	</section>
</div>
<script type="text/javascript">
$(window).load(function(){
	$('.flexslider').flexslider({
		animation: "slide",
		prevText: "",
		nextText: "",
		start: function(slider){
		  $('body').removeClass('loading');
		}
	});
});
</script>
