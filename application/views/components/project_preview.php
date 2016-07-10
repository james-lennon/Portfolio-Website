<div class="ui card">
  <div class="image">
    <img src="<?= $project->img_url ?>">
  </div>
  <div class="content">
    <a class="header"><?= $project->title ?></a>
    <div class="meta">
      <span class="date">Joined in 2013</span>
    </div>
    <div class="description">
      <?= $project->description ?>
    </div>
  </div>
  <div class="extra content">
    <a>
      <i class="user icon"></i>
      22 Friends
    </a>
  </div>
</div>