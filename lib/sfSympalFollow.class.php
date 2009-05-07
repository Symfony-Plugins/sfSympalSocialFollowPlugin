<?php
class sfSympalFollow
{
  public static function getFeedUrls()
  {
    return sfSympalConfig::get('follow', 'feeds');
  }

  public static function getFeeds()
  {
    return array_keys(self::getFeedUrls());
  }

  public static function getFeedAggregate()
  {
    $feedUrls = self::getFeedUrls();
    $feeds = array();

    foreach ($feedUrls as $url)
    {
      $feeds[] = sfFeedPeer::createFromWeb($url);
    }

    return sfFeedPeer::aggregate($feeds, array('limit' => 500));
  }

  public static function getFeed()
  {
    $agg = self::getFeedAggregate();

    $feed = new sfAtom1Feed();

    $feed->setTitle(sfSympalConfig::get('follow', 'feed_title'));
    $feed->setLink(sfSympalConfig::get('follow', 'feed_link'));
    $feed->setAuthorEmail(sfSympalConfig::get('follow', 'feed_author_email'));
    $feed->setAuthorName(sfSympalConfig::get('follow', 'feed_author_name'));

    foreach ($agg->getItems() as $item)
    {
      $feed->addItem($item);
    }
    return $feed;
  }
}