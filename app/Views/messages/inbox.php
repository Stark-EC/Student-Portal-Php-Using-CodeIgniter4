<style>

/* Inbox Styles */
.inbox {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

.inbox-header {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 20px;
}

.message-card {
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    padding: 15px;
    border-radius: 5px;
    margin-bottom: 15px;
    transition: background-color 0.3s ease;
}

.message-card.unread {
    background-color: #e9ecef;
}

.message-card.read {
    background-color: #fff;
}

.message-info {
    margin-bottom: 10px;
}

.message-info h3 {
    margin: 0;
    font-size: 18px;
    color: #007bff;
}

.message-info p {
    margin: 5px 0;
    color: #343a40;
    font-size: 16px;
}

.message-actions {
    display: flex;
    justify-content: flex-start;
    gap: 10px;
}

.message-actions a {
    text-decoration: none;
    color: #fff;
    background-color: #007bff;
    padding: 5px 10px;
    border-radius: 3px;
    transition: background-color 0.3s ease;
}

.message-actions a.btn-mark-read {
    background-color: #28a745;
}

.message-actions a.btn-delete {
    background-color: #dc3545;
}

.message-actions a:hover {
    opacity: 0.9;
}

.message-timestamp {
    font-size: 12px;
    color: #6c757d;
    text-align: right;
}

</style>

<div class="container inbox">
    <h2 class="inbox-header">Inbox</h2>
    
    <!-- Loop through messages -->
    <?php if (!empty($messages)) : ?>
        <?php foreach ($messages as $message) : ?>
            <div class="message-card <?= $message['is_read'] ? 'read' : 'unread'; ?>">
                <div class="message-info">
                    <h3>From: <?= esc($message['sender_name']); ?></h3>
                    <p><?= esc($message['message']); ?></p>
                </div>
                <div class="message-actions">
                    <a href="<?= base_url('messages/view/' . $message['id']); ?>" class="btn-view">View</a>
                    <?php if (!$message['is_read']) : ?>
                        <a href="<?= base_url('messages/mark-as-read/' . $message['id']); ?>" class="btn-mark-read">Mark as Read</a>
                    <?php endif; ?>
                    <a href="<?= base_url('messages/delete/' . $message['id']); ?>" class="btn-delete">Delete</a>
                </div>
                <div class="message-timestamp">
                    <span><?= date('F j, Y, g:i a', strtotime($message['created_at'])); ?></span>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No messages in your inbox.</p>
    <?php endif; ?>
</div>
