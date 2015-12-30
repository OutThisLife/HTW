<?php
/**
 * HTW
 *
 * Footer
 */
?>

<footer class="wrapper">
	<div class="s6 left">
		<p>
			&copy;<?=date('Y')?> HowTradingWorks.com
		</p>
	</div>

	<div class="s6 right align-right">
		<p>Trading is risky and you are solely responsible for your success and any failures.</p>
	</div>
</footer>

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-10405648-14', 'auto');
ga('send', 'pageview');
</script>

<?=BackEnd::getOption('extra-scripts')?>
<?php wp_footer() ?>

<script src="<?=bowerDir?>/materialize/js/waves.js"></script>

</body>
</html>