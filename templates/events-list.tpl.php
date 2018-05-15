<?php
/**
 * @file
 * Template for rendering events list block.
 */
?>
<div class="event-day-header">
  <strong><?php print $date; ?></strong>
</div>
<div class="event-items">
  <?php foreach ($items as $item): ?>
    <div class="event-item">
      <?php
      $date = $item->field_ding_event_date[LANGUAGE_NONE][0];
      $unixdate = strtotime($date['value'] . ' ' . $date['timezone_db']);
      $event_time = format_date($unixdate, 'ding_time_only', '', $date['timezone']);
      if ($event_time == '0:00') {
        $event_time = t('All day');
      }

      $raw_category = field_view_field('node', $item, 'field_ding_event_category', array('label' => 'hidden'));
      $raw_location = field_view_field('node', $item, 'og_group_ref', array('label' => 'hidden'));
      ?>
      <div class="event-title">
        <a href="<?php print url('node/' . $item->nid); ?>">
          <?php print $item->title; ?>
        </a>
      </div>
      <div class="info-event">
      <?php if (!empty($raw_location)) : ?>
          <div class="event-location"><?php print l($raw_location[0]['#markup'], 'node/' . $raw_location['#items'][0]['target_id']); ?></div>
        <?php endif; ?>
        <div class="event-time"> <span><?php print $event_time; ?></span></div>
        <?php if (!empty($raw_category)) : ?>
          <div class="event-category"><?php print render($raw_category); ?></div>
        <?php endif; ?>
      </div>
    </div>
  <?php endforeach; ?>
</div>
<div class="more-link">
  <?php print l(t('See all events'), 'arrangementer'); ?>
</div>
