<? $this->load->view("templates/header", ['body_class'=>'gray_body']); ?>

<div class="ui center aligned grid">
	<div class="row">
		<div class="column">
			<? foreach ($projects as $project) {
				var_dump($project);
				print("<br>");
			} 
			?>
		</div>
	</div>
</div>

<? $this->load->view("templates/footer"); ?>