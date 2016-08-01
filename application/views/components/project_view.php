
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
				</div>
			</div>
		</div>
	</div>
	<div class="ui divider"></div>

	<div class="row">
		<p>Image grid goes here</p>
	</div>
	<div class="row">
		<p>
			<?= $project->description ?>
		</p>
	</div>
</div>
