<!-- app/Views/notifications.php -->

<h2>Your Notifications</h2>

<?php if (!empty($notifications)): ?>
    <ul>
        <?php foreach ($notifications as $notification): ?>
            <li>
                <?= esc($notification['message']) ?>
                <?php if (!$notification['is_read']): ?>
                    <form method="post" action="<?= base_url('notifications/read/' . $notification['id']) ?>">
                        <button type="submit">Mark as Read</button>
                    </form>
                <?php else: ?>
                    <span>(Read)</span>
                <?php endif; ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No notifications.</p>
<?php endif; ?>
