<div class="ui card project-card" project-id="<?= $project->id ?>">
  <div class="image">
    <img src="<?= $project->img_url ?>">
  </div>
  <div class="content">
    <div class="header"><?= $project->title ?></div>
    <div class="meta">
      <span class="date"><?= date("F Y", $project->date_timestamp) ?></span>
    </div>
  </div>
</div>