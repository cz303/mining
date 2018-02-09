<?php 

$data['seo_title'] = $seo_title;
$data['meta'] = $meta;
?>
<?php $this->load->view('header',$data);?>
<?php echo  $page->content; ?>
<?php $this->load->view('footer');?>