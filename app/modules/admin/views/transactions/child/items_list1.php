<?php if (!empty($items)) : $i = $from; ?>
    <?php
       $i = $from;
	       $transactions_status = app_config('template')['transactions_status'];
       $status_options = [
           '0'  => $transactions_status['0']['name'],
           '1'  => $transactions_status['1']['name'],
           '-1' => $transactions_status['-1']['name'],
       ];
       $can_edit_status = staff_has_permission($controller_name, 'edit');
       foreach ($items as $key => $item) :
            $i++;
            $item_payment_type  = show_item_transaction_type($item['type']);
            $created            = show_item_datetime($item['created'], 'long');
            $show_item_buttons  = show_item_button_action($controller_name, $item['id']);
            $item_status        = show_item_status($controller_name, $item['id'], $item['status'], '', '');
$transaction_image  = '';
            if (!empty($item['transaction_id']) && preg_match('/\.(jpg|jpeg|png|gif)$/i', $item['transaction_id'])) {
                $transaction_image = $item['transaction_id'];
            } elseif (!empty($item['note']) && preg_match('/\.(jpg|jpeg|png|gif)$/i', $item['note'])) {
                $transaction_image = $item['note'];
            }
            $transaction_image_url = (!empty($transaction_image)) ? BASE . 'assets/uploads/screenshots/' . $transaction_image : '';
    ?>
        <tr class="tr_<?php echo esc($item['ids']); ?>">
            <td class="text-center text-muted w-10p"><?=$item['id']?></td>
            <td><?php echo show_high_light(esc($item['email']), $params['search'], 'email'); ?></td>
            <td class="text-center w-5p"><?php if ($item['old_balance']) echo (double)$item['old_balance'] ; ?></td>
            <td class="text-center w-5p"><?php echo (double)$item['amount']; ?></td>
            <td class="text-center w-10p"><?php echo $item_payment_type ; ?></td>
            <td class="text-center">
                <?php if (!empty($transaction_image_url)) : ?>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#txn_image_<?php echo esc($item['ids']); ?>">
                        <img src="<?php echo esc($transaction_image_url); ?>" alt="Transaction screenshot" class="img-thumbnail" style="max-width: 60px; max-height: 60px;">
                    </a>
                    <div class="modal fade" id="txn_image_<?php echo esc($item['ids']); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header bg-pantone">
                                    <h4 class="modal-title"><i class="fa fa-image"></i> Transaction Screenshot</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="<?php echo esc($transaction_image_url); ?>" alt="Transaction screenshot" style="max-width: 100%; height: auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <?php echo show_high_light(esc($item['transaction_id']), $params['search'], 'transaction_id'); ?>
                <?php endif; ?>
            </td>
            <td class="text-center w-5p text-muted"><?php echo $item['txn_fee']; ?></td>
            <td class="text-center w-10p"><?php echo show_high_light(esc($item['note']), $params['search'], 'note'); ?></td>
            <td class="text-center w-10p text-muted"><?php echo $created; ?></td>
            <td class="text-center w-15p">
                <?php if ($can_edit_status && array_key_exists((string)$item['status'], $status_options)) : ?>
                    <?php
                        $redirect_url = current_url();
                        if (!empty($_SERVER['QUERY_STRING'])) {
                            $redirect_url .= '?' . $_SERVER['QUERY_STRING'];
                        }
                        $form_attributes = [
                            'class' => 'form actionForm',
                            'data-redirect' => $redirect_url,
                            'method' => 'POST',
                        ];
                        $form_hidden = ['ids' => $item['ids']];
                    ?>
                    <?php echo form_open(admin_url($controller_name . "/store"), $form_attributes, $form_hidden); ?>
		       <input type="hidden" name="task" value="change-status">
                        <?php echo form_dropdown('status', $status_options, (string)$item['status'], [
                            'class' => 'form-control form-control-sm',
                            'onchange' => 'this.form.submit()',
                        ]); ?>
                    <?php echo form_close(); ?>
                <?php else : ?>
                    <?php echo $item_status; ?>
                <?php endif; ?>
            </td>
            <td class="text-center w-5p"><?php echo $show_item_buttons; ?></td>
        </tr>
    <?php endforeach; ?>
<?php else : ?>
    <?php echo render_tr_no_item(); ?>
<?php endif; ?>
