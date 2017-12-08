<?php

	$this->load->view($module . '/includes/header', array('title' => $title));
	$this->load->view($module . '/includes/sidebar');
	$this->load->view($module . '/includes/navbar');
	$this->load->view($content);
	$this->load->view($module . '/includes/footer');
?>
