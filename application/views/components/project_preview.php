<div class="ui card project-card" project-id="<?= $project->id ?>">
  <div class="image">
    <img src="<?= $project->img_url ?>">
  </div>
  <div class="content">
    <a class="header"><?= $project->title ?></a>
    <div class="meta">
      <span class="date"><?= date("F Y", $project->date_timestamp) ?></span>
    </div>
  </div>
  <div class="extra content">
    <a>
      <i class="user icon"></i>
      22 Friends
    </a>
  </div>
</div>