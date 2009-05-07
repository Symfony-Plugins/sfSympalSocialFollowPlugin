<?php

/**
 * Base actions for the sfSympalSocialFollowPlugin sympal_social_follow module.
 * 
 * @package     sfSympalSocialFollowPlugin
 * @subpackage  sympal_social_follow
 * @author      Your name here
 * @version     SVN: $Id: BaseActions.class.php 12534 2008-11-01 13:38:27Z Kris.Wallsmith $
 */
abstract class Basesympal_social_followActions extends sfActions
{
  public function executeFeed(sfWebRequest $request)
  {
    $this->setLayout(false);

    $this->feed = sfSympalFollow::getFeed();
  }
}
