<? $this->load->view("templates/header", ['body_class'=>'gray_body']); ?>

<div class="ui center aligned grid">
	<div class="row">
		<div class="column">
			<div class="ui link cards">
				<? foreach ($projects as $project) {

					$this->load->view('components/project_preview',['project'=>$project]);

					print("<br>");
				} 
				?>
			</div>
		</div>
	</div>
</div>

<? $this->load->view("templates/footer"); ?>