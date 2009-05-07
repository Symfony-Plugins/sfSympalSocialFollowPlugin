<?php

/**
 * Base components for the sfSympalSocialFollowPlugin sympal_social_follow module.
 * 
 * @package     sfSympalSocialFollowPlugin
 * @subpackage  sympal_social_follow
 * @author      Your name here
 * @version     SVN: $Id: BaseComponents.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
abstract class Basesympal_social_followComponents extends sfComponents
{
  public function executeList()
  {
    $this->feeds = sfSympalFollow::getFeeds();
    $this->feed = sfSympalFollow::getFeedAggregate();
  }
}