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
		<div class="row">

				<? if(isset($admin) && $admin): ?>
					<a class="ui black button" href="<?= base_url() ?>admin/edit_project">
						<i class="plus icon"></i> Add
					</a>
				<? endif; ?>
		</div>
	</div>
</div>

<div class="ui modal" id="project-modal">
	<p>Lorem ipsum dopem flipsum.</p>
</div>

<script type="text/javascript" src="<?= base_url() ?>res/js/portfolio.js"></script>

<? $this->load->view("templates/footer"); ?>