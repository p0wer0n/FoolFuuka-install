<?php foreach ($plugins as $module => $plugins_array) : ?>

<h3><?= \Str::tr(__('Plugins for :module'), array('module' => \Config::get($module.'.main.name'))) ?></h3>

<table class="table table-bordered table-striped table-condensed">
	<thead>
		<tr>
			<th><?= __('Plugin name') ?></th>
			<th><?= __('Description') ?></th>
			<th><?= __('Status') ?></th>
			<th><?= __('Remove') ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($plugins_array as $plugin) : ?>
			<tr>
				<td><?php echo $plugin->getJsonConfig('extra.name', $plugin->getJsonConfig('name')) ?></td>
				<td><?php echo $plugin->getJsonConfig('description') ?></td>
				<td>
					<?php
					echo \Form::open('admin/plugins/action/'.$plugin->getJsonConfig('extra.identifier').'/'.$plugin->getJsonConfig('extra.slug'),
						array('action' => $plugin->isEnabled() ? 'disable' : 'enable')
					);
					echo \Form::hidden(\Config::get('security.csrf_token_key'), \Security::fetch_token());
					echo '<input type="submit" class="btn" value="' . ($plugin->isEnabled() ? __('Disable')
							: __('Enable')) . '" />';
					echo \Form::close();
					?>
				</td>
				<td><?php
					echo \Form::open('admin/plugins/action', array('action' => 'remove')
					);
					echo \Form::hidden(\Config::get('security.csrf_token_key'), \Security::fetch_token());
					echo '<input type="submit" class="btn" value="' . __('Remove') . '" />';
					echo \Form::close();
					?>
				</td></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endforeach; ?>