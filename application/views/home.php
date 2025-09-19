<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Add New Post</h3>
    </div>
    <div class="panel-body">
        <?php echo form_open('/home/post_new'); ?>
        <div class="form-group">
            <input type="text" name="new_post_title" placeholder="Write Post title here..." class="form-control" />
        </div>
        <div class="form-group">
            <textarea name="new_post" rows="4" cols="20" class="form-control" placeholder="Write Something here..."></textarea>
        </div>
        <input type="submit" value="Post" class="btn btn-default btn-block" />
        <?php echo form_close(); ?>
    </div>
</div>
<?php foreach ($posts as $post) { ?>    
    <div class="panel panel-primary"> 
        <a name="post_no<?php echo $post->id; ?>"></a>
        <div class="panel-heading">
            <?php echo $post->title; ?> 
            <div class="dropdown pull-right">
                <a data-toggle="dropdown" href="#" class="btn btn-default btn-xs">More <span class="glyphicon glyphicon-chevron-down"></span> </a>
                <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                    <li><a href="#">Unfollow</a></li>
                    <li><a href="#">Hide post</a></li>
                </ul>
            </div>
            <span class="pull-right">                
                Posted by <?php echo $post->profile; ?>
                <span class="label label-info">Likes: <?php echo $post->likes; ?></span>
                <?php if ($post->liked == FALSE) { ?>
                    <a href="<?php echo base_url(); ?>inc/common_controller/likes/<?php echo $post->id . '/1/home#post_no' . $post->id; ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-thumbs-up"></span></a>
                <?php } else { ?>
                    <a href="#" class="btn btn-default btn-xs" disabled="disabled"><span class="glyphicon glyphicon-ok"></span> Liked</a>
                <?php } ?>
            </span>            
        </div>
        <div class="panel-body">                
            <?php echo $post->post; ?>
            <div class="text-muted text-right"><small>created on <?php echo $post->created; ?></small></div>
        </div>
        <div class="panel-footer">
            <?php
            $atts = array('name' => 'frm_comment_' . $post->id, 'id' => $post->id);
            echo form_open('home/post_comment/' . $post->id, $atts);
            ?>
            <input type="text" class="form-control input-sm" name="comment_box_<?php echo $post->id; ?>">            
            <?php echo form_close(); ?>           
        </div>
        <ul class="list-group">
            <?php
            foreach ($comments as $comment) {
                if ($post->id == $comment->post_id) {
                    ?>
                    <li class="list-group-item">
                        &QUOT;<?php echo $comment->comment; ?>&QUOT;
                        <small class="text-muted"><?php echo $comment->user_id; ?> said.</small>
                        <span class=" pull-right">
                            <span class="label label-info">Likes: <?php echo $comment->likes; ?></span>
                            <?php if ($comment->liked == FALSE) { ?>
                                <a href="<?php echo base_url(); ?>inc/common_controller/likes/<?php echo $comment->id . '/2/home#post_no' . $post->id; ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-thumbs-up"></span></a>                
                            <?php } else { ?>
                                <a href="#" class="btn btn-default btn-xs" disabled="disabled"><span class="glyphicon glyphicon-ok"></span> Liked</a>
                            <?php } ?>
                        </span>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
    </div>
<?php } ?>