<?php foreach($users as $user): ?>

    <!-- Print this user's name -->
    <?=$user['first_name']?> <?=$user['last_name']?>

    <!-- If there exists a connection with this user, show a unfollow link -->
    <?php if(isset($connections[$user['user_id']])): ?>
        <a href='/posts/unfollow/<?=$user['user_id']?>'><br>Unfollow</a>

    <!-- Otherwise, show the follow link -->
    <?php else: ?>
        <a href='/posts/follow/<?=$user['user_id']?>'><br>Follow</a>
    <?php endif; ?>

    <br><br>

<?php endforeach; ?>
