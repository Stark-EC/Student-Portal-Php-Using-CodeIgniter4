<h2>Send Message</h2>

<form action="<?= base_url('messages/send'); ?>" method="post">
    <label for="recipient_id">Recipient ID:</label>
    <input type="number" name="recipient_id" id="recipient_id" required>

    <label for="message">Message:</label>
    <textarea name="message" id="message" required></textarea>

    <button type="submit">Send</button>
</form>