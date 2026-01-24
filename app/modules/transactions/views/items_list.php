
<?php if (!empty($items)) : $i = $from; ?>
    <?php
      foreach ($items as $key => $item) :
          $i++;
          $item_payment_type  = show_item_transaction_type($item['type']);
          $created            = show_item_datetime($item['created'], 'long');
            
    ?>
        <tr class="tr_<?php echo esc($item['id']); ?>">
          <td class="text-center w-5p text-muted"><?=$item['id']?></td>
          <td class="text-center w-10p"><?php echo $item_payment_type ; ?></td>
          <td class="text-center w-10p">₹<?=number_format((double)$item['amount'], 2); ?></td>
          <td class="text-center w-5p text-muted">₹<?=number_format((double)$item['txn_fee'], 2); ?></td>
          <td class="text-center w-5p">
            <?php
              $status = isset($item['status']) ? $item['status'] : 'pending';
              $status_class = 'badge-secondary';
              $status_text = 'Pending';
              if ($status == 'approved' || $status == 1) {
                $status_class = 'badge-success';
                $status_text = 'Approved';
              } elseif ($status == 'rejected' || $status == 2) {
                $status_class = 'badge-danger';
                $status_text = 'Rejected';
              }
              echo '<span class="badge '.$status_class.'">'.$status_text.'</span>';
            ?>
          </td>
          <td class="text-center w-5p text-muted"><?php echo $created; ?></td>
        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <?php echo render_tr_no_item(); ?>
<?php endif; ?>
