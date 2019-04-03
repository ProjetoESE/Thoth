</div>
<br>
<footer class="footer">
	<div class="container">
		<small class="text-center text-muted">&copy; 2018 by <a target="_blank"
																href="http://lesse.com.br">Lesse</a></small>
	</div>
</footer>
<?php
$this->load->view('modal/modal_inclusion_criteria');
$this->load->view('modal/modal_exclusion_criteria');
$this->load->view('modal/modal_synonym');
$this->load->view('modal/modal_general_score');
$this->load->view('modal/modal_term');
$this->load->view('modal/modal_research');
$this->load->view('modal/modal_keyword');
$this->load->view('modal/modal_domain');
$this->load->view('modal/modal_paper');
$this->load->view('modal/modal_question_quality');
$this->load->view('modal/modal_score_quality');
$this->load->view('modal/modal_question_extraction');
$this->load->view('modal/modal_option');
$this->load->view('modal/modal_help_domain');
?>
<input type="hidden" id="base_url" value="<?= base_url() ?>">
</body>
</html>
