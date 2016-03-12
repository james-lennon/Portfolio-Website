<? $this->load->view('templates/header'); ?>
<form class="ui form" action="<?= base_url() ?>dream_gen/generate">
  <div class="field">
    <label>Theme</label>
    <input type="text" name="theme" placeholder="e.g. Mountain">
  </div>
  <button class="ui button" type="submit">Generate</button>
</form>
<? $this->load->view('templates/footer'); ?>
