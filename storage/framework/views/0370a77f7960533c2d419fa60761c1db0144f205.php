<?php
$user = $thread->user ? $thread->user : null;
$auth_user = Auth::user();
?>
<?php if(isset($user) && !empty($user)): ?>
    <?php if(isset($messages) && $messages->count() > 0): ?>
        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $date=>$message_date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $message_date; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                $sender_user = $message->sender;
                ?>
                <?php if($user->id == $message->sender_id): ?>
                    <h5><b>You</b> sent on <?php echo e(\Carbon\Carbon::parse($message->created_at)->format('d/m')); ?> <?php echo e(carbon\carbon::parse($message->created_at)->diffForHumans()); ?></h5>
                    <p><?php echo e($message->message); ?></p>
                    <br>
                <?php else: ?>
                    <h5><b><?php echo e($sender_user->username); ?></b> sent on <?php echo e(\Carbon\Carbon::parse($message->created_at)->format('d/m')); ?> <?php echo e(carbon\carbon::parse($message->created_at)->diffForHumans()); ?></h5>
                    <p><?php echo e($message->message); ?></p>
                    <br>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /var/www/html/public_html/resources/views/front/dashboard/partial/quote_history_listing.blade.php ENDPATH**/ ?>