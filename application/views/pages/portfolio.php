<? $this->load->view("templates/header", ['body_class'=>'']); ?>

<div class="ui top fixed menu" id="nav-menu">
	<div class="item">
		<a class="ui contact-open mini image" href="#">
			<img class="ui mini circular image" src="<?= base_url()."res/img/homepage/profile.jpg" ?>">
		</a>
	</div>
	<div class="ui right secondary stackable menu">
		<a class="item">Projects</a>
		<a class="item">About</a>
		<a class="contact-open item">Contact</a>
	</div>
</div>


<div class="ui basic container segment grid" id="title-bar">
	<div class="middle aligned row">
		<a class="two wide contact-open column" href="#">
			<img class="ui small circular image" src="/res/img/homepage/profile.jpg">
		</a>
		<div class="five wide column">
			<h1 class="ui left floated huge header">
				James Lennon
				<div class="sub header"><em>I like pizza and stuff.</em></div>
			</h1>
		</div>
		<div class="nine wide bottom aligned column">
			<div class="ui bottom right floated secondary stackable menu">
				<a class="item">Projects</a>
				<a class="item">About</a>
				<a class="contact-open item">Contact</a>
			</div>
		</div>
	</div>
	<div class="ui divider"></div>
	
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
		  <h4 class="ui inverted header">Contact</h4>
		  <div class="ui inverted link list">
			<a href="#" class="item">LinkedIn</a>
			<a href="#" class="item">Facebook</a>
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

<div class="ui basic long scrolling modal" id="project-modal">

	<div class="content">
		<div class="ui labeled icon button" id="modal-back">
			<i class="left arrow icon"></i>
			Back
		</div>
		<br>
		<br>
		<div id="project-info"></div>
	</div>
</div>

<div class="ui basic modal" id="contact-modal">

	<div class="content">
		<div class="ui labeled icon button" id="contact-modal-back">
			<i class="left arrow icon"></i>
			Back
		</div>
		<br>
		<br>
		<div class="ui basic container segment grid" id="title-bar">
			<div class="middle aligned row">
				<div class="seven wide column">
					<img class="ui medium circular image" src="/res/img/homepage/profile.jpg">
				</div>
				<div class="five wide column">
					<h1 class="ui left floated huge header">
						James Lennon
						<div class="sub header"><em>I like pizza and stuff.</em></div>
						<br>
						<a href="facebook.com">Facebook</a><br>
						<a href="linkedin.com">LinkedIn</a><br>
						<a href="google.com">Google</a><br>
						<a href="poo.com">Poo</a><br>
					</h1>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?= base_url() ?>res/js/portfolio.js"></script>

<? $this->load->view("templates/footer"); ?>