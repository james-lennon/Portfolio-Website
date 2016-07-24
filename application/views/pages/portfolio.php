<? $this->load->view("templates/header", ['body_class'=>'']); ?>

<div class="ui top fixed menu" id="nav-menu">
	<div class="item">
		<img src="/images/logo.png">
	</div>
	<h1 class="ui huge header">James Lennon</h1>
	<div class="ui right secondary stackable menu">
	  	<a class="item">Features</a>
		<a class="item">Testimonials</a>
	 	<a class="item">Sign-in</a>
	</div>
</div>


<div class="ui very padded raised container segment" id="title-bar">
	<h1 class="ui huge header">James Lennon</h1>

	<div class="ui bottom right floated secondary stackable menu">
	  	<a class="item">Features</a>
		<a class="item">Testimonials</a>
	 	<a class="item">Sign-in</a>
	</div>
</div>

<div class="ui container">

	<div class="ui center aligned grid">
		<div class="row">
			<? if(isset($admin) && $admin): ?>
				<a class="ui black button" href="<?= base_url() ?>admin/edit_project">
					<i class="plus icon"></i> Add Project
				</a>
			<? endif; ?>
		</div>
		<div class="row">
			<div class="column">
				<div class="ui three stackable link cards">
					<? foreach ($projects as $project) {

						$this->load->view('components/project_preview',['project'=>$project]);

						print("<br>");
					} 
					?>
				</div>
			</div>
		</div>
		
	</div>
</div>

<div class="ui inverted vertical footer segment" id="homepage-footer">
    <div class="ui container">
      <div class="ui stackable inverted divided equal height stackable grid">
        <div class="three wide column">
          <h4 class="ui inverted header">About</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Sitemap</a>
            <a href="#" class="item">Contact Us</a>
            <a href="#" class="item">Religious Ceremonies</a>
            <a href="#" class="item">Gazebo Plans</a>
          </div>
        </div>
        <div class="three wide column">
          <h4 class="ui inverted header">Services</h4>
          <div class="ui inverted link list">
            <a href="#" class="item">Banana Pre-Order</a>
            <a href="#" class="item">DNA FAQ</a>
            <a href="#" class="item">How To Access</a>
            <a href="#" class="item">Favorite X-Men</a>
          </div>
        </div>
        <div class="seven wide column">
          <h4 class="ui inverted header">Footer Header</h4>
          <p>Extra space for a call to action inside the footer that could help re-engage users.</p>
        </div>
      </div>
      <div class="ui center aligned container">
      	</p>&copy; 2016 James Lennon</p>
      </div>
    </div>
  </div>

<div class="ui modal" id="project-modal">
	<p>Lorem ipsum dopem flipsum.</p>
</div>

<script type="text/javascript" src="<?= base_url() ?>res/js/portfolio.js"></script>

<? $this->load->view("templates/footer"); ?>