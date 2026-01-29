<?php 
  $show_search_area = show_search_area($controller_name, $params, 'user');
?>
<style>
  @media (max-width: 991.98px) {
    .table-responsive {
      overflow-x: auto !important;
      display: block;
      width: 100%;
      -webkit-overflow-scrolling: touch;
    }
    .table-responsive table {
      width: 100% !important;
      min-width: 800px; /* Force table to be wider than screen */
    }
    .order-details-scroll {
      overflow: visible !important; /* Remove individual column scroll */
    }
    .order-details-list {
      display: flex !important;
      flex-wrap: nowrap !important;
      gap: 15px;
      padding: 0;
      margin: 0;
      list-style: none;
    }
    .order-details-list li {
      flex: 0 0 auto;
      white-space: nowrap !important;
      font-size: 14px;
      color: #727b83;
    }
    .table th, .table td {
      white-space: nowrap !important; /* Prevent text wrapping */
    }
  }
</style>
<div class="lists-index-ajax">
  <?php include('ajax_index_overplay.php'); ?>

  <div class="page-title m-b-20">
    <div class="row justify-content-between">
      <div class="col-md-2">
        <h1 class="page-title">
          <span class="fe fe-calendar"></span> <?=lang($controller_name)?>
        </h1>
      </div>
      <div class="col-md-4">
        <div class="d-flex">
          <a href="<?=cn("order/new_order")?>" class="ml-auto btn btn-outline-primary">
            <span class="fe fe-plus"></span>
              <?=lang("add_new")?>
          </a>
        </div>
      </div>
      <div class="col-md-12">
        <div class="row justify-content-between">
          <div class="col-md-10"  id="btn-filter-group">
            
          </div>
          <div class="col-md-2">
            <div class="d-flex search-area">
              <?php echo $show_search_area; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
 
  <?php 
    $this->load->view('table_blade.php'); 
  ?>
</div>
