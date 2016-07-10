<? $this->load->view("templates/header", ['body_class'=>'gray_body']); ?>
<div class="ui center aligned grid">
	<div class="row">
		<div class="column" id="project_form_column">
			<h2 class="ui dividing header"><?= isset($project_id) ? "Edit" : "Add" ?> Project</h2>
			<form class="ui large form" action="<?= base_url() ?>admin/edit_project" method="post">
			  <div class="ui stacked segment">
				<div class="field">
				<label>Title:</label>
					<div class="ui input">
						<input type="text" name="title" placeholder="Project Title" value="">
					</div>
				</div>
				<label>Preview Image:</label>
				<div class="field">
					<div class="ui input">
						<input type="url" name="img_url" placeholder="URL" value="">
					</div>
				</div>
				<label>Description:</label>
				<div class="field">
					<div class="ui input">
						<textarea name="description" placeholder="Description"></textarea>
					</div>
				</div>
				<label>Date:</label>
				<div class="field">
					<div class="ui input">
						<input type="text" name="date" placeholder="Month & Year">
					</div>
				</div>
				<input type="hidden" name="project_id" value="<? if (isset($project_id)) { echo $project_id; } ?>">
				<div class="ui large submit button">Save</div>
			  </div>

			  <div class="ui error message">
			  </div>

			</form>
		</div>
	</div>
</div>

<script type="text/javascript">

$(document).ready(function() {
  $('.ui.form')
	.form({
	  fields: {
		title: {
		  identifier  : 'title',
		  rules: [
			{
			  type   : 'empty',
			  prompt : 'Please enter a title'
			}
		  ]
		},
		description: {
		  identifier  : 'description',
		  rules: [
			{
			  type   : 'empty',
			  prompt : 'Please enter a description'
			}
		  ]
		}
	  }
	});
});

</script>
<? $this->load->view("templates/footer"); ?>