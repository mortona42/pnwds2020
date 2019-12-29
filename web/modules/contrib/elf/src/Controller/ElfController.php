<?php

namespace Drupal\elf\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Routing\TrustedRedirectResponse;
use Drupal\elf\ElfManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Provides route controllers for External Link Filter.
 */
class ElfController extends ControllerBase {

  /**
   * The current request.
   *
   * @var \Symfony\Component\HttpFoundation\Request
   */
  protected $request;

  /**
   * The ELF manager.
   *
   * @var \Drupal\elf\ElfManagerInterface
   */
  protected $elfManager;

  /**
   * Constructs a new ELF controller.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The current request.
   * @param \Drupal\elf\ElfManagerInterface $elf_manager
   *   The ELF manager.
   */
  public function __construct(Request $request, ElfManagerInterface $elf_manager) {
    $this->request = $request;
    $this->elfManager = $elf_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('request_stack')->getCurrentRequest(),
      $container->get('elf.manager')
    );
  }

  /**
   * Redirect the browser to the external URL from $_GET['url'].
   *
   * @return \Symfony\Component\HttpFoundation\RedirectResponse
   *   The redirect response.
   */
  public function elfRedirect() {
    $url = $this->request->get('url');
    $key = $this->request->get('key');

    // Works as a broken link if no valid arguments found.
    if (!$url
      || !$key
      || $key != $this->elfManager->getRedirectUrl($url)->getOption('query')['key']) {
      throw new NotFoundHttpException();
    }

    // Perform the redirection to the external URL.
    return new TrustedRedirectResponse($url);
  }

}
