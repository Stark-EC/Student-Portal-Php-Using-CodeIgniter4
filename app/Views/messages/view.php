<h2>Message</h2>

<p><strong>From:</strong> <?= esc($message['sender_id']); ?></p>
<p><strong>Message:</strong> <?= esc($message['message']); ?></p>
<p><strong>Sent on:</strong> <?= esc($message['created_at']); ?></p>

<a href="<?= base_url('messages/inbox'); ?>">Back to Inbox</a>
