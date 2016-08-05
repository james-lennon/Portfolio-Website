<? $this->load->view("templates/header", ['body_class'=>'gray_body']); ?>
<div class="ui center aligned grid">
	<div class="row">
		<div class="column" id="project_form_column">
			<h2 class="ui dividing header"><?= isset($project_id) ? "Edit" : "Add" ?> Project</h2>
			<form class="ui large left aligned form" action="<?= base_url() ?>admin/edit_project<? if (isset($project)) echo "/$project->id" ?>" method="post">
			  <div class="ui stacked segment">
				<div class="field">
					<label>Title:</label>
					<div class="ui input">
						<input type="text" name="title" placeholder="Project Title" value="<? if (isset($project)) echo $project->title; ?>">
					</div>
				</div>
				
				<div class="field">
					<label>Preview Image:</label>
					<div class="ui input">
						<input type="url" name="img_url" placeholder="URL" value="<? if (isset($project)) echo $project->img_url; ?>">
					</div>
				</div>

				<div class="field">
					<label>Web URL:</label>
					<div class="ui input">
						<input type="url" name="web_url" placeholder="URL" value="<? if (isset($project)) echo $project->web_url; ?>">
					</div>
				</div>

				<div class="field">
					<label>iOS URL:</label>
					<div class="ui input">
						<input type="url" name="ios_url" placeholder="URL" value="<? if (isset($project)) echo $project->ios_url; ?>">
					</div>
				</div>

				<div class="field">
					<label>Android URL:</label>
					<div class="ui input">
						<input type="url" name="android_url" placeholder="URL" value="<? if (isset($project)) echo $project->android_url; ?>">
					</div>
				</div>

				<div class="field">
					<label>Description:</label>
					<div class="ui input">
						<textarea name="description" placeholder="Description"><? if (isset($project)) echo $project->description; ?></textarea>
					</div>
				</div>
				
				<div class="ui two fields">

					<div class="field">
						<div class="ui input">
							<input type="text" name="date" placeholder="Date" value="<? if (isset($project)) echo date("F Y", $project->date_timestamp); ?>">
						</div>
					</div>

					<div class="ui checkbox">
					  <input type="checkbox" name="is_featured" <? if (isset($project) && $project->is_featured == 1) echo "checked";  ?> >
					  <label>Featured</label>
					</div>

				</div>
				
				<br>
				<input type="hidden" name="project_id" value="<? if (isset($project_id)) { echo $project_id; } ?>">
				
				<? if (isset($project)): ?>
				<div class="ui buttons">
					<a class="ui large red button" href="<?= base_url() ?>admin/delete_project/<?= $project->id ?>">Delete</a>
					<div class="ui or"></div>
					<div class="ui large submit button">Save</div>
				</div>
				<? else: ?>
					<div class="ui large submit button">Add</div>
				<? endif; ?>

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
		},
		img_url: {
		  identifier  : 'img_url',
		  rules: [
			{
			  type   : 'empty',
			  prompt : 'Please enter an image url'
			}
		  ]
		},
		date: {
		  identifier  : 'date',
		  rules: [
			{
			  type   : 'empty',
			  prompt : 'Please enter a date'
			}
		  ]
		}
	  }
	});
});

</script>
<? $this->load->view("templates/footer"); ?>