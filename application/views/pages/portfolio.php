<? $this->load->view("templates/header", ['body_class'=>'']); ?>

<div class="ui top fixed secondary blurred menu" id="nav-menu">
	<div class="contact-open link item">
		<div class="ui contact-open mini image">
			<img class="ui mini circular image" src="<?= base_url()."res/img/homepage/profile.jpg" ?>">
		</div>
	</div>
	<div class="contact-open link item">
		<h3>James Lennon</h3>
	</div>
	<!-- <div class="ui right secondary stackable menu">
		<a class="item">Projects</a>
		<a class="item">About</a>
		<a class="contact-open item">Contact</a>
	</div> -->
</div>


<div class="ui basic container segment stackable grid" id="title-bar">
	<div class="middle aligned row">
		<a class="two wide contact-open column" href="#">
			<img class="ui small circular image" src="/res/img/homepage/profile.jpg">
		</a>
		<div class="fourteen wide column">
			<a class="contact-open" href="#">
				<h1 class="ui left floated huge header">
					James Lennon
					<div class="sub header"><em>Sophomore at Harvard studying computer science and economics</em></div>
				</h1>
			</a>
		</div>
		<div class="five wide bottom aligned column">
			<!-- <div class="ui bottom right floated secondary stackable menu">
				<a class="item">Projects</a>
				<a class="item">About</a>
				<a class="contact-open item">Contact</a>
			</div> -->
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

<div class="ui basic modal" id="image-modal">

	<div class="content">
		<div class="ui labeled icon button" id="image-modal-back">
			<i class="left arrow icon"></i>
			Back
		</div>
		<br>
		<br>
		<div class="ui huge image">
			<img src="" id="image-modal-img"/>
		</div>
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
		<div class="ui basic container segment stackable grid" id="title-bar">
			<div class="middle aligned row">
				<div class="four wide column">
					<img class="ui small circular image" src="/res/img/homepage/profile.jpg">
				</div>
				<div class="twelve wide column">
					<div class="ui grid">
						<div class="row">
							<h1 class="ui left floated huge header">
								Contact:
							</h1>
						</div>
						<div class="row">
							<h5>Email: <a href="mailto:jameslennon321@gmail.com" target="_top">jameslennon321@gmail.com</a></h5>
						</div>
						<div class="row">
							<div class="ui buttons">
								<a class="ui blue icon button" href="https://www.facebook.com/james.lennon.3511" target="_blank" >
									<i class="facebook icon"></i>
								</a>
								<a class="ui cyan icon button" href="https://www.linkedin.com/in/james-lennon-30421078?trk=hp-identity-name" target="_blank">
									<i class="linkedin icon"></i>
								</a>
								<a class="ui black icon button" href="https://github.com/jameslennon321" target="_blank">
									<i class="github icon"></i>
								</a>
								<a class="ui yellow icon button" href="mailto:jameslennon321@gmail.com" target="_top">
									<i class="mail icon"></i>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?= base_url() ?>res/js/portfolio.js"></script>

<? $this->load->view("templates/footer"); ?>