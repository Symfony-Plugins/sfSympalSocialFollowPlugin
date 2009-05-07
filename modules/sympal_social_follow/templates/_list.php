<?php use_helper('SocialFollow'); ?>
<?php use_stylesheet('/sfSympalSocialFollowPlugin/css/follow') ?>

<?php echo auto_discovery_link_tag('rss', '@sympal_follow_feed') ?>

<div id="sympal_social_follow">
  <?php foreach (sfSympalFollow::getFeeds() as $name): ?>
    <?php echo image_tag('/sfSympalSocialFollowPlugin/images/'.$name.'.png', 'title='.sfInflector::humanize($name)) ?>
  <?php endforeach; ?>

  <ul>
    <?php $date = ''; ?>
    <?php foreach ($feed->getItems() as $row): ?>
      <?php if (date('m/d/Y', $row->getPubDate()) != $date): ?>
        <h2 class="header">
          <?php $date = date('m/d/Y', $row->getPubDate()); ?>

          <div class="date_summary">
            <?php $summary = get_date_summary($feed, $date) ?>
            <?php foreach ($summary as $name => $num): ?>
              <?php echo image_tag('/sfSympalSocialFollowPlugin/images/'.$name.'.png', 'title='.sfInflector::humanize($name)) ?><strong><?php echo $num ?></strong>
            <?php endforeach; ?>
          </div>

          <span class="date"><?php echo $date; ?></span>
        </h2>
      <?php endif; ?>

      <li>
        <div class="title_wrapper"><span class="icon"><?php echo get_follow_row_icon($row); ?></span> <span class="title"><?php echo $row->getTitle(); ?></span> <small>[<?php echo link_to('link', $row->getLink(), 'target=_BLANK'); ?>]</small></div>
        <?php if ($row->getTitle() != $row->getDescription() && $row->getDescription()): ?>
          <p class="body"><?php echo $row->getDescription(); ?></p>
        <?php endif; ?>
        <br />
      </li>
    <?php endforeach; ?>
  </ul>
</div>