<h2>Private Profile for <b><?php echo $user->username; ?></b></h2>
<br/>
<a href="<?php echo url::site("page/edit/") ?>"><?php echo __('Edit Pages')?> </a> | 
<a href="#">...</a>

<table>
    <thead>
        <tr><td>#</td><td>title</td><td>action</td></tr>
    </thead>
    <tbody>
<?php foreach ($pages_all as $page): ?>
    
   <tr><td><?=$page->id?></td><td><?=$page->title?></td><td><a href="<?php echo url::site("page/edit").'/'.$page->page_name; ?>"><?php echo __('Edit Pages')?> </a> </td></tr> 
<?php endforeach; ?>
</tbody>
</table>
<?php echo $pager_links;?>
