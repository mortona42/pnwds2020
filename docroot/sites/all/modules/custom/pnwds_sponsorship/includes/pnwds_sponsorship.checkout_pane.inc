<?php
/**
 * @file
 * PNWDS Sponsorship checkout pane include.
 */

/**
 * Implements base_settings_form().
 */
function pnwds_sponsorship_pane_settings_form($checkout_pane) {
  $results = db_select('commerce_product', 'cp')
    ->fields('cp', array('product_id', 'sku', 'title'))
    ->execute();
  $products = array();
  foreach ($results as $result) {
    $products[$result->product_id] = t('@title (@sku)', array(
      '@title' => $result->title,
      '@sku' => $result->sku,
    ));
  }

  $form['pnwds_sponsorship_product'] = array(
    // @TODO: Make this an entity reference.
    '#type' => 'select',
    '#title' => t('Sposorship product'),
    '#description' => t('The product that will be added to the users cart if they choose to be a sponsor.'),
    '#default_value' => variable_get('pnwds_sponsorship_product', ''),
    '#options' => $products,
  );
  $message = variable_get('pnwds_sponsorship_message', array('value' => '', 'format' => ''));
  $form['pnwds_sponsorship_message'] = array(
    '#type' => 'text_format',
    '#title' => t('Sposorship message'),
    '#description' => t('The call to action message displayed to the user during checkout.'),
    '#default_value' => $message['value'],
    '#format' => $message['format'],
  );
  return $form;
}

/**
 * Implements base_checkout_form().
 */
function pnwds_sponsorship_pane_checkout_form($form, $form_state, $checkout_pane, $order) {
  if ($pid = variable_get('pnwds_sponsorship_product', '')) {
    $product = entity_metadata_wrapper('commerce_product', commerce_product_load($pid));

    if ($message = variable_get('pnwds_sponsorship_message', array('value' => '', 'format' => ''))) {
      $checkout_form['pndws_sponsorship_message'] = array(
        '#markup' => check_markup($message['value'], $message['format']),
      );
    }

    $checkout_form['pnwds_sponsorship_add_product'] = array(
      '#type' => 'checkbox',
      '#title' => t('Add @title (@value)', array(
        '@title' => $product->label(),
        '@value' => commerce_currency_format($product->commerce_price->amount->value(), $product->commerce_price->currency_code->value()),
      )),
      '#default_value' => (bool) _pnwds_sponsorship_in_order($order, $pid),
    );

    return $checkout_form;
  }
}

/**
 * Implements base_checkout_form_submit().
 */
function pnwds_sponsorship_pane_checkout_form_submit($form, &$form_state, $checkout_pane, $order) {
  // Add the product.
  if ($pid = variable_get('pnwds_sponsorship_product', '')) {
    $lid = _pnwds_sponsorship_in_order($order, $pid);
    if ($lid && empty($form_state['values']['pnwds_sponsorship']['pnwds_sponsorship_add_product'])) {
      commerce_cart_order_product_line_item_delete($order, $lid);
    }
    elseif (!_pnwds_sponsorship_in_order($order, $pid) && !empty($form_state['values']['pnwds_sponsorship']['pnwds_sponsorship_add_product'])) {
      commerce_cart_product_add_by_id($pid, 1, TRUE, $order->uid);
    }
  }
}

/**
 * Helper function to determine if product is in order.
 */
function _pnwds_sponsorship_in_order($order, $pid) {
  foreach (entity_metadata_wrapper('commerce_order', $order)->commerce_line_items as $delta => $line_item_wrapper) {
    if (in_array($line_item_wrapper->type->value(), commerce_product_line_item_types())) {
      if ($pid == $line_item_wrapper->commerce_product->raw()) {
        return $line_item_wrapper->getIdentifier();
      }
    }
  }
  return FALSE;
}
