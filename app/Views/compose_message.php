<!-- <div class="container">
    <h2>Compose Message</h2>

    <form action="< ?= base_url('messages/send'); ?>" method="post">
        <div class="form-group">
            <label for="recipient_id">Recipient:</label>
            <input type="text" id="recipient_id" name="recipient_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Message</button>
    </form>
</div> -->

<!-- <form action="< ?= base_url('messages/send'); ?>" method="post">
    <label for="recipient_id">Recipient ID:</label>
    <input type="number" name="recipient_id" required>
    
    <label for="message">Message:</label>
    <textarea name="message" required></textarea>
    
    <button type="submit">Send Message</button>
</form> -->
<form action="<?= base_url('messages/send'); ?>" method="post">
    <input type="hidden" name="recipient_id" value="<?= session()->get('recipient_id'); ?>"> <!-- Set this value appropriately -->
    <textarea name="message" placeholder="Type your message..." required></textarea>
    <button type="submit">Send Message</button>
</form>

<script>
document.querySelector('form').addEventListener('submit', function() {
    const messageInput = document.querySelector('textarea[name="message"]');
    console.log('Message being sent:', messageInput.value);
});
</script>



