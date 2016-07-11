<? $this->load->view("templates/header", ['body_class'=>'gray_body']); ?>

<div class="ui center aligned grid">
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

<? $this->load->view("templates/footer"); ?>