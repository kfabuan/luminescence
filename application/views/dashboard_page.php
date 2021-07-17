<?php if ($info->user_type === 'Admin'): ?>
  <?php $this->load->view("admin_page")?>
<?php else: ?>
  <?php $this->load->view("cashier_page")?>
<?php endif; ?>
