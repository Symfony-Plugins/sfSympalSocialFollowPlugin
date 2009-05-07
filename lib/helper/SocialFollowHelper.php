<?php

function get_date_summary($feed, $date)
{
  $summary = array();
  if (is_object($feed))
  {
    foreach ($feed->getItems() as $item)
    {
      if ($date == date('m/d/Y', $item->getPubDate()))
      {
        $type = get_follow_feed_type($item->getFeed());
        if (!isset($summary[$type]))
        {
          $summary[$type] = 0;
        }
        $summary[$type]++;
      }
    }
  }
  return $summary;
}

function get_follow_row_icon($row)
{
  $options['title'] = get_follow_feed_name($row->getFeed()) . ': ' . date('m/d/Y h:i A', $row->getPubDate());

  return get_follow_feed_icon($row->getFeed(), $options);
}

function get_follow_feed_icon($feed, $options = array())
{
  $type = get_follow_feed_type($feed);

  $options['size'] = '16x15';

  if (!isset($options['title']))
  {
    $options['title'] = get_follow_feed_name($type);
  }

  return image_tag('/sfSympalSocialFollowPlugin/images/'.$type . '.png', $options);
}

function get_follow_feed_name($feed)
{
  switch (get_follow_feed_type($feed))
  {
    case 'twitter':
      return 'Twitter Status Update';
    break;

    case 'google':
      return 'Google Reader Shared Item';
    break;

    case 'facebook':
      return 'Facebook Status Update';
    break;

    case 'digg':
      return 'My Diggs';
    break;

    case 'flickr':
      return 'Flickr Photos';
    break;

    case 'blog':
      return 'Blog';
  }
}

function get_follow_feed_type($feed)
{
  if ($feed instanceof sfFeed)
  {
    $feedTitle = strtolower($feed->getTitle());
  } else {
    $feedTitle = $feed;
  }

  $type = null;
  if (strstr($feedTitle, 'twitter'))
  {
    $type = 'twitter';
  } else if (strstr($feedTitle, 'google')) {
    $type = 'google';
  } else if (strstr($feedTitle, 'facebook')) {
    $type = 'facebook';
  } else if (strstr($feedTitle, 'digg')) {
    $type = 'digg';
  } else if (strstr($feedTitle, 'uploads from') || strstr($feedTitle, 'flickr')) {
    $type = 'flickr';
  } else if (strstr($feedTitle, 'blog')) {
    $type = 'blog';
  }

  return $type;
}