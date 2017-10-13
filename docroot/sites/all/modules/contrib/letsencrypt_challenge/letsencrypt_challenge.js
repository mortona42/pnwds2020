(function ($) {

/**
 * Internal function to check using Ajax if clean URLs can be enabled on the
 * settings page.
 *
 * This function is not used to verify whether or not clean URLs
 * are currently enabled.
 */
Drupal.behaviors.letsEncryptChallengeCheck = {
  attach: function (context, settings) {
    // This behavior attaches by ID, so is only valid once on a page.
    // Also skip if we are on an install page, as Drupal.cleanURLsInstallCheck will handle
    // the processing.
    if (!($('#edit-letsencrypt-challenge').length)) {
      return;
    }
    var url = settings.basePath + '.well-known/acme-challenge';
    $.ajax({
      url: location.protocol + '//' + location.host + url,
      dataType: 'html',
      error: function (jqXHR, textStatus, errorThrown) {
        $('#edit-letsencrypt-challenge').attr('disabled','disabled').addClass('error');
        $('#edit-letsencrypt-challenge').before(Drupal.theme('letsEncryptError', 'The <a href="' + url + '">challenge url</a> is not working with an HTTP status of ' + jqXHR.status + '. Please check your .htaccess as it may need modifications, see <a href="https://www.drupal.org/node/2408321">Support RFC 5785 by whitelisting the .well-known directory</a>.'));
      }
    });
  }
};

/**
 * Formats an error message
 *
 * @param str
 *   The error message to display
 * @return
 *   The formatted error message (html).
 */
Drupal.theme.prototype.letsEncryptError = function(message) {
  return '<div class="messages error">' + message + '</div>';
}

})(jQuery);
