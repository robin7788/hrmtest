<h1><?php echo lang('index_heading'); ?></h1>
<p><?php echo lang('index_subheading'); ?></p>
<div id="infoMessage"><?php echo $message; ?></div>
<table class="table table-bordered table-striped">
    <tr>
        <th><?php echo lang('index_fname_th'); ?></th>
        <th><?php echo lang('index_lname_th'); ?></th>
        <th><?php echo lang('index_email_th'); ?></th>
        <th><?php echo lang('index_groups_th'); ?></th>
        <th><?php echo lang('index_status_th'); ?></th>
        <th><?php echo lang('index_action_th'); ?></th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?php echo $user->first_name; ?></td>
            <td><?php echo $user->last_name; ?></td>
            <td><?php echo $user->email; ?></td>
            <td>
                <?php foreach ($user->groups as $group): ?>
                    <?php echo anchor("auth/edit_group/" . $group->id, $group->name); ?><br />
                <?php endforeach ?>
            </td>
            <td><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, lang('index_active_link')) : anchor("auth/activate/" . $user->id, lang('index_inactive_link')); ?></td>
            <td><a href="<?php echo base_url('auth/edit_user') . "/$user->id";?>" class="btn btn-primary"><i class="icon-edit"></i> Edit</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<p><?php echo anchor('auth/create_user', lang('index_create_user_link')) ?> | <?php echo anchor('auth/create_group', lang('index_create_group_link')) ?> | <?php echo anchor('auth/logout', lang('logout')) ?></p>