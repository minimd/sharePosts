<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URLROOT; ?>/posts/add" class="btn btn-primary pull-right">
            <i class="fa fa-pencil"></i>add post</a>
    </div>
</div>
<?php
foreach($data['posts']as $posts):?>
<div class="card card-body mb-3"><h4 class="card-title">
    <?php echo $posts->title;?>
</h4>
<div class="bg-light p-2 mb3">
    written by <?php echo $posts->name;?> on <?php echo $posts->postDate;?>
</div>
<p class="card-text"><?php echo $posts->body;?></p>
<a href="<?php echo URLROOT; ?>/posts/show/<?php echo $posts->postid?>" class="btn btn-dark">more</a>
</div>
<?php endforeach?>

<?php require APPROOT . '/views/inc/footer.php'; ?>