<?php
if (!isset($page))
	$page = 1;
?>

<!--- Search Input -->
<div id="search_simple">
<?php
echo form_open($this->fu_board . '/search');
echo '<div class="input-prepend">';
echo '<span class="add-on" rel="popover" data-original-title="How to search" data-content="' . htmlentities('Place a <tt>|</tt> in between expressions to get one of them in results, e.g. <tt>tripcode|email</tt> to locate posts that contain either the word tripcode or email in them.<br />Place a <tt>-</tt> before a word to exclude posts containing that word: <tt>-tripcode</tt><br />Place quotes around phrases to find pages containing the phrase: <tt>"I am a filthy tripcode user"</tt>') . '">?</span>';
echo form_input(array(
	'name' => 'text',
	'id' => 'text',
	'value' => (isset($search["text"])) ? rawurldecode($search["text"]) : ''
));
echo form_submit(array(
	'value' => 'Search',
	'class' => 'btn notice',
	'style' => 'border-radius:0; -webkit-border-radius:0; -moz-border-radius:0',
	'onClick' => 'getSearch(\'simple\', this.form); return false;'
));
echo form_submit(array(
	'value' => 'Advanced',
	'class' => 'btn notice',
	'style' => 'margin-left:-6px',
	'onClick' => 'toggleSearch(\'simple\'); toggleSearch(\'advanced\'); return false;'
));
echo '</div>';
echo form_close();
?>
</div>

<!--- Advanced Search Input -->
<div id="search_advanced" style="display: none">
<?php
echo form_open($this->fu_board . '/search');
echo '<div class="input-prepend">';
echo '<span class="add-on" rel="popover-right" data-original-title="How to search" data-content="' . htmlentities('Place a <tt>|</tt> in between expressions to get one of them in results, e.g. <tt>tripcode|email</tt> to locate posts that contain either the word tripcode or email in them.<br />Place a <tt>-</tt> before a word to exclude posts containing that word: <tt>-tripcode</tt><br />Place quotes around phrases to find pages containing the phrase: <tt>"I am a filthy tripcode user"</tt>') . '">?</span>';
echo form_input(array(
	'name' => 'text',
	'id' => 'text',
	'value' => (isset($search["text"])) ? rawurldecode($search["text"]) : ''
));
echo form_submit(array(
	'value' => 'Search',
	'class' => 'btn notice',
	'style' => 'border-radius:0; -webkit-border-radius:0; -moz-border-radius:0',
	'onClick' => 'getSearch(\'advanced\', this.form); return false;'
));
echo form_submit(array(
	'value' => 'Advanced',
	'class' => 'btn notice active',
	'style' => 'margin-left:-6px',
	'onClick' => 'toggleSearch(\'simple\'); toggleSearch(\'advanced\'); return false;'
));
echo '</div>';
?>
<br/>
<div style="max-width: 360px">
	<div class="clearfix">
		<label for="username">Username</label>
		<div class="input">
			<?php echo form_input(array('name' => 'username', 'id' => 'username', 'value' => (isset($search["username"])) ? rawurldecode($search["username"]) : '')); ?>
		</div>
	</div>
	<div class="clearfix">
		<label for="tripcode">Tripcode</label>
		<div class="input">
			<?php echo form_input(array('name' => 'tripcode', 'id' => 'tripcode', 'value' => (isset($search["tripcode"])) ? rawurldecode($search["tripcode"]) : '')); ?>
		</div>
	</div>
	<div class="clearfix">
		<label>Deleted Posts</label>
		<div class="input">
			<ul class="inputs-list">
				<li>
					<label>
						<?php echo form_radio(array('name' => 'deleted', 'value' => '', 'checked' => (empty($search["deleted"])) ? TRUE : FALSE)); ?>
						<span>Display All Posts</span>
					</label>
				</li>
				<li>
					<label>
						<?php echo form_radio(array('name' => 'deleted', 'value' => 'deleted', 'checked' => (!empty($search["deleted"]) && $search["deleted"] == 'deleted') ? TRUE : FALSE)); ?>
						<span>Only Deleted Posts</span>
					</label>
				</li>
				<li>
					<label>
						<?php echo form_radio(array('name' => 'deleted', 'value' => 'not-deleted', 'checked' => (!empty($search["deleted"]) && $search["deleted"] == 'not-deleted') ? TRUE : FALSE)); ?>
						<span>Only Non-Deleted Posts</span>
					</label>
				</li>
			</ul>
		</div>
	</div>
	<div class="clearfix">
		<label>Ghost Posts</label>
		<div class="input">
			<ul class="inputs-list">
				<li>
					<label>
						<?php echo form_radio(array('name' => 'ghost', 'value' => '', 'checked' => (empty($search["ghost"])) ? TRUE : FALSE)); ?>
						<span>Display All Posts</span>
					</label>
				</li>
				<li>
					<label>
						<?php echo form_radio(array('name' => 'ghost', 'value' => 'only', 'checked' => (!empty($search["ghost"]) && $search["ghost"] == 'only') ? TRUE : FALSE)); ?>
						<span>Only Ghost Posts</span>
					</label>
				</li>
				<li>
					<label>
						<?php echo form_radio(array('name' => 'ghost', 'value' => 'none', 'checked' => (!empty($search["ghost"]) && $search["ghost"] == 'none') ? TRUE : FALSE)); ?>
						<span>Old Archived Posts</span>
					</label>
				</li>
			</ul>
		</div>
	</div>
	<div class="clearfix">
		<label>Order By</label>
		<div class="input">
			<ul class="inputs-list">
				<li>
					<label>
						<?php echo form_radio(array('name' => 'order', 'value' => 'desc', 'checked' => (empty($search["order"]) || (!empty($search["order"]) && $search["order"] == 'desc')) ? TRUE : FALSE)); ?>
						<span>New Posts First</span>
					</label>
				</li>
				<li>
					<label>
						<?php echo form_radio(array('name' => 'order', 'value' => 'asc', 'checked' => (!empty($search["order"]) && $search["order"] == 'asc') ? TRUE : FALSE)); ?>
						<span>Old Posts First</span>
					</label>
				</li>
			</ul>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
</div>

<!--- Post Input -->
<?php
echo form_open($this->fu_board . '/post');
echo '<div class="input-prepend">';
echo '<span class="add-on">Post No.</span>';
echo form_input(array(
	'name' => 'post',
	'id' => 'post',
	'class' => 'mini'
));
echo form_submit(array(
	'value' => 'Go',
	'class' => 'btn notice',
	'onClick' => 'getPost(this.form); return false;'
));
echo '</div>';
echo form_close();
?>

<!--- Page Input -->
<?php
if (!$this->input->cookie('fu_ghost_mode'))
{
	$toggle_mode = 'ghost';
	echo form_open($this->fu_board . '/page');
	echo '<div class="input-prepend">';
	echo '<span class="add-on">Page #</span>';
}
else
{
	$toggle_mode = 'page';
	echo form_open($this->fu_board . '/ghost');
	echo '<div class="input-prepend">';
	echo '<span class="add-on">? Page #</span>';
	
}
echo form_input(array(
	'name' => 'page',
	'id' => 'page',
	'class' => 'mini',
	'value' => $page
));
echo form_submit(array(
	'value' => 'Go',
	'class' => 'btn notice',
	'style' => 'border-radius:0; -webkit-border-radius:0; -moz-border-radius:0',
	'onClick' => 'getPage(this.form); return false;'
));
?>
<input type="button" class="btn notice<?php echo ($this->input->cookie('fu_ghost_mode')) ? ' active' : '' ?>" style="margin-left: -6px" value="Ghost Mode" onClick="location.href='<?php echo site_url($this->fu_board . '/' . $toggle_mode . '/' . $page) ?>'">
<?php
echo '</div>';
echo form_close();
?>
<div class="clearfix"></div>