<?php

namespace App\Controllers;

use App\Models\MessageModel;
use App\Models\StudentModel; // Assuming you have a StudentModel for fetching student details

class MessageController extends BaseController
{
    public function index()
    {
        $session = session();
        $studentId = $session->get('student_id');

        $messageModel = new MessageModel();
        $messages = $messageModel->getMessagesByRecipient($studentId);

        return view('messages/inbox', ['messages' => $messages]);
    }

    public function send() {
        return view('compose_message'); // View for composing a message
    }

    // public function sendMessage() {
    //     $recipientId = $this->request->getPost('recipient_id');
    //     $message = $this->request->getPost('message');
    
    //     $messageModel = new MessageModel();
    
    //     // Prepare data to save
    //     $data = [
    //         'sender_id' => session()->get('student_id'), // Get sender ID from session
    //         'recipient_id' => $recipientId, // Use recipient ID from the form
    //         'message' => $message,
    //     ];
    
    //     // Try to save the message and catch any errors
    //     if ($messageModel->save($data)) {
    //         return redirect()->to('/messages/inbox')->with('success', 'Message sent successfully!');
    //     } else {
    //         // Log errors if saving fails
    //         log_message('error', 'Failed to send message: ' . json_encode($messageModel->errors()));
    //         return redirect()->back()->with('errors', 'Failed to send message. Please try again.')->withInput();
    //     }
    // }

    
    public function sendMessage() {
        log_message('debug', 'Logged-in User ID: ' . session()->get('student_id'));

        $recipientId = $this->request->getPost('recipient_id');
        $message = $this->request->getPost('message');
    
        // Log the incoming data
        log_message('debug', 'Recipient ID: ' . $recipientId);
        log_message('debug', 'Message: ' . $message);
    
        $messageModel = new MessageModel();
    
        // Prepare data to save
        $data = [
            'sender_id' => session()->get('student_id'), // Get sender ID from session
            'recipient_id' => $recipientId, // Use recipient ID from the form
            'message' => $message,
        ];
    
        // Try to save the message and catch any errors
        if ($messageModel->save($data)) {
            return redirect()->to('/messages/inbox')->with('success', 'Message sent successfully!');
        } else {
            // Log errors if saving fails
            log_message('error', 'Failed to send message: ' . json_encode($messageModel->errors()));
            return redirect()->back()->with('errors', 'Failed to send message. Please try again.')->withInput();
        }
    }
    
    
    public function view($messageId)
    {
        $messageModel = new MessageModel();
        $message = $messageModel->find($messageId);

        if ($message) {
            // Mark message as read
            $messageModel->markAsRead($messageId);

            return view('messages/view', ['message' => $message]);
        } else {
            return redirect()->to('/messages/inbox')->with('error', 'Message not found.');
        }
    }

    public function inbox() {
        $messageModel = new MessageModel();
        $userId = session()->get('student_id'); // Get the logged-in user's ID
    
        // Fetch messages where the recipient is the logged-in user
        $messages = $messageModel->where('recipient_id', $userId)->findAll();
    
        return view('inbox', ['messages' => $messages]);
    }
    
}
