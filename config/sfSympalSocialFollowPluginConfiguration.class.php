<?php

/**
 * sfSympalSocialFollowPlugin configuration.
 * 
 * @package     sfSympalSocialFollowPlugin
 * @subpackage  config
 * @author      Your name here
 * @version     SVN: $Id: PluginConfiguration.class.php 17207 2009-04-10 15:36:26Z Kris.Wallsmith $
 */
class sfSympalSocialFollowPluginConfiguration extends sfPluginConfiguration
{
  const VERSION = '1.0.0-DEV';

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {
    $this->dispatcher->connect('sympal.load_config_form', array($this, 'loadConfigForm'));
  }

  public function loadConfigForm(sfEvent $event)
  {
    $form = $event->getSubject();
    $form->addSetting('follow', 'feed_title');
    $form->addSetting('follow', 'feed_link');
    $form->addSetting('follow', 'feed_author_name');
    $form->addSetting('follow', 'feed_author_email');
    $form->addSetting('follow', 'feeds', 'Feeds', 'SympalArray', 'SympalArray');
  }
}