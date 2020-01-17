<?php

/** @var \Stillman\Crumbs\Crumb[] $crumbs */

?>
<div class="crumbs">
	<?php foreach ($crumbs as $crumb): ?>
		<?php if ($crumb->getPath() and (!$crumb->isLast() or !$this->hideLastLink)): ?>
			<a class="crumb-active" href="<?= $crumb->getPath() ?>"><?= $crumb->getName() ?></a>
		<?php else: ?>
			<span class="<?= $crumb->isLast() ? 'crumb-last' : 'crumb-inactive' ?>"><?= $crumb->getName() ?></span>
		<?php endif ?>
		<?php if (!$crumb->isLast()): ?>
			&nbsp;/&nbsp;
		<?php endif ?>
	<?php endforeach ?>
</div>
