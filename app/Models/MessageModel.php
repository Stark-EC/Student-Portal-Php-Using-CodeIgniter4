<?php

namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model
{
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $allowedFields = ['sender_id', 'recipient_id', 'message', 'is_read', 'created_at'];

    public function getMessagesByRecipient($recipientId)
    {
        return $this->where('recipient_id', $recipientId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    public function sendMessage($senderId, $recipientId, $message)
    {
        return $this->insert([
            'sender_id' => $senderId,
            'recipient_id' => $recipientId,
            'message' => $message,
            'is_read' => 0
        ]);
    }

    public function markAsRead($messageId)
    {
        return $this->update($messageId, ['is_read' => 1]);
    }
}
