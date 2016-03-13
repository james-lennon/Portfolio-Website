<? $this->load->view('templates/header'); ?>
<div class="ui page grid">
  <div class="ui centered raised segment">
  	<form class="ui form" id="dream_segment" action="<?= base_url() ?>dream_gen/generate">
  	  <div class="field">
    		<label>Theme</label>
    		<input type="text" name="theme" placeholder="e.g. Mountain">
  	  </div>
  	  <button class="ui button" type="submit">Generate</button>
  	</form>
  </div>
</div>
<? $this->load->view('templates/footer'); ?>
