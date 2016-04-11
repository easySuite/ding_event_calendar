<?php
/**
 * @file
 * Template for rendering events list block.
 */
?>
<div class="event-day-header">
  <?php print t($date); ?>
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
      ?>
      <div class="event-time"><?php print $event_time; ?></div>
      <div class="event-title">
        <a href="<?php print url('node/' . $item->nid); ?>">
          <?php print $item->title; ?>
        </a>
      </div>
    </div>
  <?php endforeach; ?>
</div>
