<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-flud">
    <div class="container">
        <h1 class="display-3" ><?php echo $data['title'];?></h1>
    </div>
</div>

<p class ="lead">simple social network on my own mvc</p>
<ul><?php 
foreach($data['posts'] as $post):?>
<li><?php 
echo $post->title;?></li>



<?php endforeach;?></ul>
<?php require APPROOT . '/views/inc/footer.php'; ?>