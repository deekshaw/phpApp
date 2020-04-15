<?php

/**
 * Enable debug mode. Quform will try to display any fatal PHP errors or exceptions at
 * your form. It's useful to have this enabled while developing your form, but
 * you should set this to false on production sites.
 */
define('QUFORM_DEBUG', true);

/** DO NOT CHANGE THESE 2 LINES **/
define('QUFORM_ROOT', realpath(dirname(__FILE__)));
require_once QUFORM_ROOT . '/common.php';
/** DO NOT CHANGE THESE 2 LINES **/

/** FORM SETTINGS **/

/**
 * Success message, displayed when the form is successfully submitted
 */
$successMessage = '<div class="quform-success-inner">Your message has been sent, thank you.</div>';

/**
 * Whether or not to send the notification email. You may wish to disable this if you are
 * saving the form data to the database for example. true or false
 */
$notification = true;

/**
 * Configure the recipients of the notification email message.  You can add
 * multiple email addresses by adding one on each line inside the array
 * enclosed in quotes, separated by commas. E.g.
 *
 * $notificationRecipients = array(
 *     'recipient1@example.com',
 *     'recipient2@example.com'
 * );
 */
$notificationRecipients = array(
    'customerz1133@gmail.com'
);

/**
 * Set the "From" address of the emails. You should set this to the contact
 * email address of your website. Some hosts require that the email
 * address is one that is hosted on their servers.
 *
 * You can set this to be an email address string e.g.
 *
 * $notificationFrom = 'info@yourcompany.com';
 *
 * Or you can also include a name with your email address using an array e.g.
 *
 * $notificationFrom = array('info@yourcompany.com' => 'Your company');
 *
 * Or you can set it to use a submitted email address. This example will get the
 * submitted address for the 'email' element. E.g.
 *
 * $notificationFrom = '%email%';
 */
$notificationFrom = 'customerz1133@gmail.com';

/**
 * The subject of the notification email message. %name% will be replaced
 * with the form submitted value for the name field.
 */
$notificationSubject = 'Message from %name%';

/**
 * Set the "Reply-To" email address of the notification email to
 * the email address submitted to the email field
 */
$notificationReplyTo = '%email%';


$notificationHtml = '/emails/email-html.php';


$notificationPlain = '/emails/email-plain.php';

$notificationShowEmptyFields = false;


$autoreply = false;


$autoreplyRecipient = '%email%';


$autoreplySubject = 'Thanks for your message, %name%';


$autoreplyFrom = 'noreply@example.com';


$autoreplyHtml = '/emails/autoreply-html.php';


$autoreplyPlain = '/emails/autoreply-plain.php';


$redirect = '';


$database = false;


$saveUploads = false;


$uploadPath = QUFORM_ROOT . '/uploads';


$uploadUrl = '';


$smtp = array(
    'host' => 'localhost',
    'port' => 25,
    'username' => 'noreply@achieeve.com',
    'password' => 'A8o~)vKfBu]0',
    'encryption' => ''
);

// Add the visitor IP to the email
$extra['IP address'] = Quform::getIPAddress();

/** END FORM SETTINGS **/

/** FORM ELEMENT CONFIGURATION **/

/**
 * Configure the name element
 * Filters: Trim
 * Validators: Required
 */
$name = new Quform_Element('name', 'Name');
$name->addFilter('trim');
$name->addValidator('required');
$form->addElement($name);

/**
 * Configure the email element
 * Filters: Trim
 * Validators: Required, Email
 */
$email = new Quform_Element('email', 'Email address');
$email->addFilter('trim');
$email->addValidators(array('required', 'email'));
$form->addElement($email);

/**
 * Configure the phone element
 * Filters: Trim
 * Validators: (None)
 */
$phone = new Quform_Element('phone', 'Phone number');
$phone->addFilter('trim');
$form->addElement($phone);


/**
 * Configure the message element
 * Filters: Trim
 * Validators: Required
 */
$message = new Quform_Element('message', 'Message');
$message->addFilter('trim');
$message->addValidator('required');
$form->addElement($message);

/**
 * Configure the CAPTCHA element
 * Filters: Trim
 * Validators: Required, Identical
 */
$captcha = new Quform_Element('type_the_word', 'Type the word');
$captcha->addFilter('trim');

$captcha->addValidator('identical', array('token' => 'light'));
$captcha->setIsHidden(true);
$form->addElement($captcha);

/** END FORM ELEMENT CONFIGURATION **/

// Process the form
if ($form->isValid($_POST)) {
    // Form is valid
    try {
        $attachments = array();
        $elements = $form->getElements();

        // Process uploaded files
        foreach ($elements as $element) {
            if ($element instanceof Quform_Element_File
            && array_key_exists($element->getName(), $_FILES)
            && is_array($_FILES[$element->getName()])) {
                $file = $_FILES[$element->getName()];

                if (is_array($file['error'])) {
                    // Process multiple upload field
                    foreach ($file['error'] as $key => $error) {
                        if ($error === UPLOAD_ERR_OK) {
                            $fileData = array(
                                'path' => $file['tmp_name'][$key],
                                'filename' => Quform_Element_File::filterFilename($file['name'][$key]),
                                'type' => $file['type'][$key],
                                'size' => $file['size'][$key]
                            );

                            if ($saveUploads && $element->getSave()) {
                                $result = Quform_Element_File::saveUpload($uploadPath, $uploadUrl, $fileData, $element);

                                if (is_array($result)) {
                                    $fileData = $result;
                                }
                            }

                            if ($element->getAttach()) {
                                $attachments[] = $fileData;
                            }

                            $element->addFile($fileData);
                        }
                    }
                } else {
                    // Process single upload field
                    if ($file['error'] === UPLOAD_ERR_OK) {
                        $fileData = array(
                            'path' => $file['tmp_name'],
                            'filename' => Quform_Element_File::filterFilename($file['name']),
                            'type' => $file['type'],
                            'size' => $file['size']
                        );

                        if ($saveUploads && $element->getSave()) {
                            $result = Quform_Element_File::saveUpload($uploadPath, $uploadUrl, $fileData, $element);

                            if (is_array($result)) {
                                $fileData = $result;
                            }
                        }

                        if ($element->getAttach()) {
                            $attachments[] = $fileData;
                        }

                        $element->addFile($fileData);
                    }
                }
            } // element exists in $_FILES
        } // foreach element

        // Save to a MySQL database
        if ($database) {
            // Connect to MySQL
            mysql_connect('localhost', 'testuser', 'testpass');

            // Select the database
            mysql_select_db('test');

            // Set the connection encoding
            if (strtolower(QUFORM_CHARSET) == 'utf-8') {
                $utf8Query = "SET NAMES utf8";
                mysql_query($utf8Query);
            }

            // Build the query
            $query = "INSERT INTO test SET ";
            $query .= "`name` = '" . mysql_real_escape_string($form->getValue('name')) . "',";
            $query .= "`email` = '" . mysql_real_escape_string($form->getValue('email')) . "',";
            $query .= "`phone` = '" . mysql_real_escape_string($form->getValue('phone')) . "',";
            $query .= "`subject` = '" . mysql_real_escape_string($form->getValue('subject')) . "',";
            $query .= "`message` = '" . mysql_real_escape_string($form->getValue('message')) . "';"; // Careful! The last line ends in a semi-colon

            // Execute the query
            mysql_query($query);

            // Close the connection
            mysql_close();
        }

        if ($notification) {
            // Get a new PHPMailer instance
            $mailer = Quform::newPhpmailer($smtp);

            // Set the from information
            $notificationFrom = $form->parseEmailRecipient($notificationFrom);
            $mailer->From = $notificationFrom['email'];
            $mailer->FromName = $notificationFrom['name'];

            // Set the Reply-To header of the email as the submitted email address from the form
            if (!empty($notificationReplyTo)) {
                $notificationReplyTo = $form->parseEmailRecipient($notificationReplyTo);
                $mailer->AddReplyTo($notificationReplyTo['email'], $notificationReplyTo['name']);
            }

            // Set the subject
            $mailer->Subject = $form->replacePlaceholderValues($notificationSubject);

            // Set the recipients
            foreach ($notificationRecipients as $recipient) {
                $mailer->AddAddress($recipient);
            }

            // Set the message body HTML
            ob_start();
            include QUFORM_ROOT . $notificationHtml;
            $mailer->MsgHTML(ob_get_clean());

            // Add a plain text part for non-HTML email readers
            ob_start();
            include QUFORM_ROOT . $notificationPlain;
            $mailer->AltBody = ob_get_clean();

            // Add any attachments
            foreach ($attachments as $attachment) {
                $mailer->AddAttachment($attachment['path'], $attachment['filename'], 'base64', $attachment['type']);
            }

            // Send the notification message
            $mailer->Send();
        }

        // Autoreply email
        if ($autoreply) {
            $autoreplyRecipient = $form->parseEmailRecipient($autoreplyRecipient);

            if ($autoreplyRecipient['email'] != 'noreply@example.com') {
                // Create the autoreply message
                $mailer = Quform::newPhpmailer($smtp);

                // Set the from address
                $autoreplyFrom = $form->parseEmailRecipient($autoreplyFrom);
                $mailer->From = $autoreplyFrom['email'];
                $mailer->FromName = $autoreplyFrom['name'];

                // Set the recipient
                $mailer->AddAddress($autoreplyRecipient['email'], $autoreplyRecipient['name']);

                // Set the subject
                $mailer->Subject = $form->replacePlaceholderValues($autoreplySubject);

                // Set the message body HTML
                ob_start();
                include QUFORM_ROOT . $autoreplyHtml;
                $mailer->MsgHTML(ob_get_clean());

                // Add a plain text part for non-HTML email readers
                ob_start();
                include QUFORM_ROOT . $autoreplyPlain;
                $mailer->AltBody = ob_get_clean();

                // Send the autoreply
                $mailer->Send();
            }
        }

        // Custom code can be entered here


        // Form processed successfully, return the result
        $result = array('type' => 'success');
        if (strlen($redirect)) {
            $result['redirect'] = $redirect;
        } else {
            $result['message'] = $form->replacePlaceholderValues($successMessage);
            header( "refresh:5;url=../index.html" );
        }
    } catch (Exception $e) {
        if (QUFORM_DEBUG) {
            throw $e;
        }
    }
} else {
    // Form is not valid
    $result = array('type' => 'error', 'data' => $form->getErrors());
}

if (isset($_POST['quform_ajax']) && $_POST['quform_ajax'] == 1) {
    $response = '<textarea>' . $form->jsonEncode($result) . '</textarea>';
} else {
    if (isset($result['type'], $result['redirect']) && $result['type'] == 'success' && strlen($result['redirect']) && !headers_sent()) {
        header('Location: ' . $result['redirect']);
        exit;
    }

    ob_start();
    require_once 'nojs.php';
    $response = ob_get_clean();
}

echo $response;