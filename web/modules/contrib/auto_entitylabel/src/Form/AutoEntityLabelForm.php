<?php

namespace Drupal\auto_entitylabel\Form;

use Drupal\auto_entitylabel\AutoEntityLabelManager;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Config\Entity\ConfigEntityType;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Administrative form to enable/configure auto_entitylabel on an entity type.
 */
class AutoEntityLabelForm extends ConfigFormBase {

  /**
   * An interface for entity types.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityManager;

  /**
   * An interface for classes representing the result of routing.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $route_match;

  /**
   * An interface for classes that manage a set of enabled modules.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  private $moduleHandler;

  /**
   * An account interface which represents the current user.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  private $user;

  /**
   * The machine name of the entity type this form is for.
   *
   * @var string
   */
  protected $entityType;

  /**
   * The machine name of the bundle this form is for.
   *
   * @var string
   */
  protected $entityBundle;

  /**
   * The entity type that our config entity describes bundles of.
   *
   * @var string
   */
  protected $entityTypeBundleOf;

  /**
   * AutoEntityLabelForm constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   A configuration object factory.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_manager
   *   An interface for entity types.
   * @param \Drupal\Core\Routing\RouteMatchInterface $routeMatch
   *   An interface for classes representing the result of routing.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $moduleHandler
   *   An interface for classes that manage a set of enabled modules.
   * @param \Drupal\Core\Session\AccountInterface $user
   *   An account interface which represents the current user.
   */
  public function __construct(ConfigFactoryInterface $config_factory, EntityTypeManagerInterface $entity_manager, RouteMatchInterface $routeMatch, ModuleHandlerInterface $moduleHandler, AccountInterface $user) {
    parent::__construct($config_factory);

    $this->entityManager = $entity_manager;
    $this->routeMatch = $routeMatch;
    $this->moduleHandler = $moduleHandler;
    $this->user = $user;
    $route_options = $this->routeMatch->getRouteObject()->getOptions();
    $array_keys = array_keys($route_options['parameters']);
    $this->entityType = array_shift($array_keys);
    $entity_type = $this->routeMatch->getParameter($this->entityType);
    if (!empty($entity_type)) {
      $this->entityBundle = $entity_type->id();
      $this->entityTypeBundleOf = $entity_type->getEntityType()->getBundleOf();
    }
    else {
      $this->entityBundle = $this->entityType;
      $this->entityTypeBundleOf = $this->entityType;
    }
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'auto_entitylabel.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'auto_entitylabel_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static (
      $container->get('config.factory'),
      $container->get('entity.manager'),
      $container->get('current_route_match'),
      $container->get('module_handler'),
      $container->get('current_user')
    );
  }

  /**
   * Get the config name for this entity & bundle.
   *
   * @return string
   *   The compiled config name.
   */
  protected function getConfigName() {
    return 'auto_entitylabel.settings.' . $this->entityTypeBundleOf . '.' . $this->entityBundle;
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config($this->getConfigName());
    /*
     * @todo
     *  Find a generic way of determining if the label is rendered on the
     *  entity form. If not, don't show 'auto_entitylabel_optional' option.
     */
    $options = [
      AutoEntityLabelManager::DISABLED => $this->t('Disabled'),
      AutoEntityLabelManager::ENABLED => $this->t('Automatically generate the label and hide the label field'),
      AutoEntityLabelManager::OPTIONAL => $this->t('Automatically generate the label if the label field is left empty'),
      AutoEntityLabelManager::PREFILLED => $this->t('Automatically prefill the label'),
    ];

    // Create an array for description of the options.
    $options_description = [
      AutoEntityLabelManager::DISABLED => [
        '#description' => $this->t('Selecting this option will disable the auto labels for the entity.'),
      ],
      AutoEntityLabelManager::ENABLED => [
        '#description' => $this->t('Selecting this option will hide the title field and will generate a new option based on the pattern provided below.'),
      ],
      AutoEntityLabelManager::OPTIONAL => [
        '#description' => $this->t('Selecting this option will make the label field optional and will generate a label if the label field is left empty.'),
      ],
      AutoEntityLabelManager::PREFILLED => [
        '#description' => $this->t('Selecting this option will prefills the label field with the generated pattern provided below. This option provides limited token support because it only prefills the label and it will not be able to replace all the tokens like current node based tokens for ex: [node:nid] because that token has not been generated yet.'),
      ],
    ];
    // Shared across most of the settings on this page.
    $invisible_state = [
      'invisible' => [
        ':input[name="status"]' => ['value' => AutoEntityLabelManager::DISABLED],
      ],
    ];

    $form['auto_entitylabel'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('Automatic label generation for @type', ['@type' => $this->entityBundle]),
      '#weight' => 0,
    ];

    $form['auto_entitylabel']['status'] = [
      '#type' => 'radios',
      '#default_value' => $config->get('status') ?: 0,
      '#options' => $options,
    ];
    $form['auto_entitylabel']['status'] += $options_description;

    $form['auto_entitylabel']['pattern'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Pattern for the label'),
      '#description' => $this->t('Leave blank for using the per default generated label. Otherwise this string will be used as label. Use the syntax [token] if you want to insert a replacement pattern.'),
      '#default_value' => $config->get('pattern') ?: '',
      '#attributes' => ['class' => ['pattern-label']],
      '#states' => $invisible_state,
    ];

    // Display the list of available placeholders if token module is installed.
    if ($this->moduleHandler->moduleExists('token')) {
      // Special treatment for Core's taxonomy_vocabulary and taxonomy_term.
      $token_type = strtr($this->entityTypeBundleOf, ['taxonomy_' => '']);
      $form['auto_entitylabel']['token_help'] = [
        // #states needs a container to work, so put the token replacement link inside one.
        '#type' => 'container',
        '#states' => $invisible_state,
        'token_link' => [
          '#theme' => 'token_tree_link',
          '#token_types' => [$token_type],
          '#dialog' => TRUE,
        ],
      ];
    }
    else {
      $form['auto_entitylabel']['pattern']['#description'] .= ' ' . $this->t('To get a list of available tokens install <a href=":drupal-token" target="blank">Token</a> module.', [':drupal-token' => 'https://www.drupal.org/project/token']);
    }

    $form['auto_entitylabel']['escape'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Remove special characters.'),
      '#description' => $this->t('Check this to remove all special characters.'),
      '#default_value' => $config->get('escape'),
      '#states' => $invisible_state,
    ];

    $form['#attached']['library'][] = 'auto_entitylabel/auto_entitylabel.admin';

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->configFactory()->getEditable($this->getConfigName());
    $form_state->cleanValues();
    foreach (['status', 'pattern', 'escape'] as $key) {
      $config->set($key, $form_state->getValue($key));
    }

    /** @var \Drupal\Core\Config\Entity\ConfigEntityStorage $storage */
    $storage = $this->entityManager->getStorage($this->entityType);
    /** @var \Drupal\Core\Config\Entity\ConfigEntityType $entity_type */
    $entity_type = $storage->getEntityType();
    if ($entity_type instanceof ConfigEntityType) {
      $prefix = $entity_type->getConfigPrefix();
      $config->set('dependencies', [
        'config' => [$prefix . '.' . $this->entityBundle]
      ]);
    }
    $config->save();
    parent::submitForm($form, $form_state);
  }

}
