<?php
$meta_refresh = Variable::getInteger('status-refresh', 30);
$title = $this->report->getTitle();
$stylesheets = array('tablesorter');
include(__DIR__ . '/../layout/header.php');
?>
<div class="page-header">
  <h1>
    <?php echo fHTML::prepare($this->report->getTitle()); ?>
    <small>
      <?php echo $this->report->getStartDatetime(); ?>
      --
      <?php echo $this->report->getEndDatetime(); ?>
      (<?php echo $this->report->getDuration(); ?>)
    </small>
  </h1>
</div>
<div class="row">
  <div class="progress progress-striped active span10">
    <div class="bar" style="width: <?php echo $this->report->getElapsedRatio(); ?>%;"></div>
  </div>
  <div class="span2">
    <i class="icon-time"></i>
    时间：已经过 <?php echo $this->report->getElapsedRatio(); ?>%
  </div>
</div>
<table id="userscores" class="tablesorter table table-bordered table-striped">
  <thead>
    <tr>
      <?php foreach ($this->board->getHeaders() as $header): ?>
        <th><?php echo $header; ?></th>
      <?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <?php for ($i = 1; $i <= $this->board->getRowCount(); $i++): ?>
      <tr>
        <?php foreach ($this->board->getRow($i) as $cell): ?>
          <td><?php echo $cell; ?></td>
        <?php endforeach; ?>
      </tr>
    <?php endfor; ?>
  </tbody>
  <tfoot>
    <tr>
      <?php foreach ($this->board->getFooters() as $footer): ?>
        <th><?php echo $footer; ?></th>
      <?php endforeach; ?>
    </tr>
  </tfoot>
</table>
<div class="alert alert-info">
  Sort multiple columns simultaneously by 
  holding down the <strong>shift</strong> key and 
  clicking a second, third or even fourth column header!
</div>
<?php
$javascripts = array('jquery.tablesorter.min', 'board');
include(__DIR__ . '/../layout/footer.php');
