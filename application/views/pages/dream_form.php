<? $this->load->view('templates/header', 
    ['title' => 'Dream Generator', 'body_class'=>'dream_body']); ?>
<div class="ui page grid">
  <div class="row">
    <div class="column">
      <div class="ui centered raised segment" id="dream_segment" >
        <h1 class="ui dividing header">Dream Generator</h1>
      	<form class="ui form" id="dream_form">
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
<script type="text/javascript">

BASE_URL = '<?= base_url() ?>'

$(document).ready(function(){
  $("#dream_form").submit(function(){
    dream_form = $("#dream_form");
    dream_form.addClass("loading");

    theme = $('#dream_form input[name=theme]').val();
    
    load_dream(theme);

    return false;
  });
});

function load_dream (theme) {
  $.post(BASE_URL+'dream_gen/generate/'+theme, {}, function(data, status){
    dream_form.remove()
    $("#dream_segment").html(data);
    $("#dream_segment").transition('pulse');
  });
}

</script>
<? $this->load->view('templates/footer'); ?>
