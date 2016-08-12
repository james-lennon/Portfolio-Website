
<div class="ui grid">
	<div class="bottom aligned row">
		<div class="four wide column">
			<div class="ui image">
			    <img src="<?= $project->img_url ?>">
			</div>
		</div>
		<div class="ten wide column">
			<div class="ui grid">
				<div class="row">
					<h1 class="ui header"><?= $project->title ?></h1>
				</div>
				<div class="row">
					<? if ($project->ios_url != NULL): ?>
					<a href="<?= $project->ios_url ?>"><i class="large apple link icon"></i></a>
					<? endif; ?>
					<? if ($project->android_url != NULL): ?>
					<a href="<?= $project->android_url ?>"><i class="large android link icon"></i></a>
					<? endif; ?>
					<? if ($project->web_url != NULL): ?>
					<a href="<?= $project->web_url ?>"><i class="large external link icon"></i></a>
					<? endif; ?>
					<? if ($admin): ?>
					<a href="<?= base_url() ?>admin/edit_project/<?= $project->id ?>"><i class="large black edit icon"></i></a>
					<? endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="ui divider"></div>

	<div class="centered row">
		<div class="ui medium images">
			<? foreach ($images as $image): ?>
				<div class="ui blurring dimmable project image">
					<div class="ui dimmer">
				        <div class="content">
				          	<div class="center">
				            	<p>Click to view</p>
				          	</div>
				        </div>
				    </div>
					<img src="<?= $image->url ?>">
				</div>
			<? endforeach; ?>
		</div>
	</div>
	<div class="row">
		<p>
			<?= $project->description ?>
		</p>
	</div>
</div>

<script type="text/javascript">

$(".project.image").click(function() {
	img_url = $(this).find('img').attr('src');
	displayImage(true, img_url);
});

$('.project.image').dimmer({
  on: 'hover'
});

</script>