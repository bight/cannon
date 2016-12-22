<?php namespace PacketBoat\Postmark;

use Postmark\PostmarkClient;
use Postmark\Models\PostmarkAttachment;

class PostMark
{
    /**
     * Override \wp_mail() to use the Postmark API
     *
     * @param string|array $to Array or comma-separated list of email addresses to send message.
     * @param string $subject Email subject.
     * @param string $message Message contents.
     * @param string|array $headers Optional. Additional headers.
     * @param string|array $attachments Optional. Files to attach.
     *
     * @const POSTMARK_API_KEY
     * @const POSTMARK_SENDER_ADDRESS
     *
     * @return bool Whether the email contents were sent successfully.
     */

    public function mailer($to, $subject, $message, $headers = '', $attachments = array())
    {
        $client = new PostmarkClient(POSTMARK_API_KEY);

        if (! is_array($to)) {
            $recipients = explode(',', $to);
        } else {
            $recipients = $to;
        }

        $processed_attachments = [];
        if (! empty($attachments)) {
            $mimetypes = \wp_get_mime_types();
            foreach ($attachments as $attachment) {
                $processed_attachments[] = PostmarkAttachment::fromFile($attachment, pathinfo($attachment, PATHINFO_BASENAME), pathinfo($attachment, PATHINFO_EXTENSION));
            }
        }

        $emails = [];
        foreach ($recipients as $recipient) {
            $email = [];
            $email['To'] = $recipient;
            $email['From'] = POSTMARK_SENDER_ADDRESS;
            $email['Subject'] = $subject;
            $email['TextBody'] = $message;

            if (strpos($headers, 'text/html')) {
                $email['HtmlBody'] = $message;
            }

            if (! empty($processed_attachments)) {
                $email['Attachments'] = $processed_attachments;
            }

            $emails[] = $email;
        }

        $responses = $client->sendEmailBatch($emails);

        foreach ($responses as $response) {
            if (0 !== $response['ErrorCode']) {
                return false;
            }
        }

        return true;
    }
}
