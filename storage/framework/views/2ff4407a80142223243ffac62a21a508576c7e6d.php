<?php
$auth_user = Auth::user();
$quoteFound = false;
?>
<style>
    .trans_current_chat.active {
        background: #ffffff!important;
    }
</style>
<?php if(isset($chats) && $chats->count() > 0): ?>
    <?php $__currentLoopData = $chats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
        $latest_message = $chat->message_latest;
        $unreadCount = $chat->unread_count;
        $chat_history_url = route('transporter.message.history',$chat->id);
        $quote = $quotes->where('id', $chat->user_quote_id)->first();
        if($quote) {
            $quoteFound = true;
        }
        ?>
        <?php if($quote): ?>
            <li class="<?php if($selected_chat_id == $chat->id): ?> active <?php endif; ?> trans_current_chat" data-id="<?php echo e($chat->id); ?>">
                <?php if(isset($auth_user) && !empty($auth_user)): ?>
                    <a href="javascript:;" class="chat_list_info unread_msg get-chat-history" onclick="getChatHistory('<?php echo e($chat_history_url); ?>',this)">
                        <div class="chat_list_info_fst">
                            <img src="<?php echo e($quote->image); ?>" alt="Car">
                            <div class="chat_msg">
                                <h6><span><?php echo e($quote->vehicle_make); ?> <?php echo e($quote->vehicle_model); ?></span><?php if($chat->message_latest): ?> -<?php echo e(Str::limit($chat->message_latest->message, 50)); ?> <?php endif; ?></h6>
                                <h3>
                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="4" cy="4" r="4" fill="#52D017"/>
                                    </svg>
                                    <?php if(isset($front_user[$chat->user_id]) && in_array($chat->user_id, array_keys($front_user))): ?>
                                        <?php echo e(Str::limit($front_user[$chat->user_id]['username'], 10)); ?>

                                    <?php endif; ?>

                                </h3>
                                <?php if($chat->message_latest): ?>
                                    <p><?php echo e($chat->message_latest->message); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="chat_list_info_lst">
                            <span><?php echo e(Carbon\Carbon::parse($chat->last_msg_update_time)->diffForHumans()); ?></span>
                        </div>
                    </a>
                <?php endif; ?>
            </li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(!$quoteFound): ?>
        <div class="get-chat-history text-left px-3 py-2">-Currently none to show-</div>
    <?php endif; ?>
<?php else: ?>
    <div class="get-chat-history text-left px-3 py-2">-Currently none to show-</div>
<?php endif; ?>
<script src="<?php echo e(asset('assets/web/js/admin.js')); ?>"></script>
<script>
    $('.trans_current_chat').on('click', function (){
        $('body').attr('id', 'messages');
        $('#trans_current_chat_id').val($(this).data('id'));
    });
</script>
<?php /**PATH /var/www/html/public_html/resources/views/transporter/dashboard/partial/chat_listing.blade.php ENDPATH**/ ?>