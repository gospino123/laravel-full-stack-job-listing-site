<?php
// php artisan make:mail
namespace App\Mail;

use App\Models\Job;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class JobPosted extends Mailable
{
    use Queueable, SerializesModels;

    // public $foo = 'bar';

    /**
     * Create a new message instance.
     */
    public function __construct(public Job $job)
    {
        // All public properties instantly available within view

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        // Also add To, From, Reply To, etc.
        return new Envelope(
            subject: 'Job Posted',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        // with sends only those values instead of access to all
        // but make Job protected instead of public
        return new Content(
            view: 'mail.job-posted',
            // with: [
            //     'foo' => 'bar', 
            //     'title' => $this->job->title,
            // ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
