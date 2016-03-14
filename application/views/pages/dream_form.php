<? $this->load->view('templates/header'); ?>
<div class="ui page grid">
  <div class="row">
    <div class="column">
      <h1 class="ui header">Dream Generator</h1>
      <div class="ui centered raised segment" id="dream_segment" >
      	<form class="ui form" action="<?= base_url() ?>dream_gen/generate" id="dream_form">
      	  <div class="field">
        		<label>Theme</label>
        		<input type="text" name="theme" placeholder="e.g. Mountain">
      	  </div>
      	  <button class="ui button" type="submit">Generate</button>
      	</form>
      </div>
    </div>
  </div>
</div>
<script src="<?= base_url() ?>res/js/dream_gen.js" ></script>
<? $this->load->view('templates/footer'); ?>
