<h2 class="ui green dividing header">
	<i class="check circle icon"></i>
	Dream Generated Successfully!
</h2>
<div class="ui center aligned grid">
	<?
		$img_url = $dream_data->image;
		if ($img_url):
	?>
	<div class="row">
		<div class="column">
			<img src="<?= $img_url ?>" class="dream_image" />
		</div>
	</div>
	<? endif; ?>
	<div class="row">
		<div class="column">
			<p class="dream_text">
				<?= $dream_data->dream ?>
			</p>
		</div>
	</div>
	<div class="row">
		<button class="ui labeled icon button" id="back_button">
			<i class="angle left icon"></i>
			Back
		</button>
		<button class="ui labeled icon button" id="reload_dream_btn">
			<i class="refresh icon"></i>
			Reload
		</button>
	</div>
</div>

<script type="text/javascript">
$("#reload_dream_btn").click(function() {
	console.log("yo");
	$(this).addClass("loading").addClass("disabled");
	$(this).prop("disabled",true);
	load_dream(theme);
});
$("#back_button").click(function() {
	window.location.replace("<?= base_url() ?>/dream_gen");
});
</script>