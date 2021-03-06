<?php

namespace Drupal\menu_per_role\Form;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Menu per role administration form.
 *
 * @package Drupal\menu_per_role\Form
 */
class MenuPerRoleAdminSettings extends ConfigFormBase implements ContainerInjectionInterface {

  /**
   * Display both hide and show role checkbox lists.
   */
  const MODE_DISPLAY_BOTH = 0;

  /**
   * Display only the hide from checkbox list.
   */
  const MODE_DISPLAY_ONLY_HIDE = 1;

  /**
   * Display only the show to checkbox list.
   */
  const MODE_DISPLAY_ONLY_SHOW = 2;

  /**
   * Always display fields on links to content.
   */
  const MODE_DISPLAY_ON_CONTENT_ALWAYS = 0;

  /**
   * Only display fields on menu items if there are no node_access providers.
   */
  const MODE_DISPLAY_ON_CONTENT_NO_NODE_ACCESS = 1;

  /**
   * Never display fields on links to content.
   */
  const MODE_DISPLAY_ON_CONTENT_NEVER = 2;

  /**
   * The entity type manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a \Drupal\system\ConfigFormBase object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The factory for configuration objects.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager service.
   */
  public function __construct(ConfigFactoryInterface $config_factory, EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($config_factory);
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['menu_per_role.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'menu_per_role_settings';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);

    // Get the roles with "administer menu_per_role" permission.
    $admin_roles = [];
    /** @var \Drupal\user\RoleInterface[] $roles */
    $roles = $this->entityTypeManager
      ->getStorage('user_role')
      ->loadMultiple();
    foreach ($roles as $role) {
      if ($role->hasPermission('administer menu_per_role')) {
        $admin_roles[] = $role->id();
      }
    }

    $config = $this->config('menu_per_role.settings');

    $form['hide_show'] = [
      '#type' => 'radios',
      '#title' => $this->t('Select what is shown when editing menu items'),
      '#options' => [
        static::MODE_DISPLAY_BOTH => $this->t('Hide and Show check boxes'),
        static::MODE_DISPLAY_ONLY_HIDE => $this->t('Only Hide check boxes'),
        static::MODE_DISPLAY_ONLY_SHOW => $this->t('Only Show check boxes'),
      ],
      '#description' => $this->t('By default, both list of check boxes are shown when editing a menu item (in the menu administration area or while editing a node.) This option let you choose to only show the "Show menu item only to selected roles" or "Hide menu item from selected roles". WARNING: changing this option does not change the existing selection. This means some selection will become invisible when you hide one of the set of check boxes...'),
      '#default_value' => $config->get('hide_show'),
    ];

    $form['hide_on_content'] = [
      '#type' => 'radios',
      '#title' => $this->t('Show fields on menu items that point to content'),
      '#options' => [
        static::MODE_DISPLAY_ON_CONTENT_ALWAYS => $this->t('Always'),
        static::MODE_DISPLAY_ON_CONTENT_NO_NODE_ACCESS => $this->t('If NO Node Access Modules are enabled.'),
        static::MODE_DISPLAY_ON_CONTENT_NEVER => $this->t('Never'),
      ],
      '#description' => $this->t('Fields are shown when editing any menu item. This will hide the fields when editing menu items, that point to nodes. This is useful on sites using Node Access modules.'),
      '#default_value' => $config->get('hide_on_content'),
    ];

    $form['disable_admin_bypass'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Disable admin access'),
      '#description' => $this->t('Hide links admin should not see'),
      '#default_value' => $config->get('disable_admin_bypass'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('menu_per_role.settings')
      ->set('hide_show', $form_state->getValue('hide_show'))
      ->set('hide_on_content', $form_state->getValue('hide_on_content'))
      ->set('disable_admin_bypass', $form_state->getValue('disable_admin_bypass'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
