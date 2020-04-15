<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Quform - Ajax Contact Form</title>

<link rel="stylesheet" type="text/css" href="../css/pagestyles.css" /><!-- Page styles -->
<link rel="stylesheet" type="text/css" href="../css/standard.css" /><!-- Standard form layout -->

<script type="text/javascript" src="../js/jquery-1.7.1.min.js"></script><!-- If your webpage already has the jQuery library you do not need this -->
<script type="text/javascript" src="../js/plugins.js"></script>
<script type="text/javascript" src="../js/scripts.js"></script>
</head>
<body>
<div class="outside">
    <!-- To copy the form HTML, start here -->
    <div class="quform-outer">
        <form class="quform" action="process-file-uploads.php" method="post" enctype="multipart/form-data">
            <div class="quform-wrapper">
                <h1>Quform - <a href="http://demos.themecatcher.net/quform/buy.php">Ajax Contact Form</a></h1>
                <h2>Quform supports file uploads.  You can also prevent uploads over a certain size
                or uploads with the wrong file extensions and you can have the uploads emailed to you as attachments!</h2>
                <div class="quform-inner">
                    <div class="quform-title">Please get in touch</div>
                    <div class="quform-elements clearfix">
                        <!-- Begin Name element -->
                        <div class="element-wrapper name-element-wrapper clearfix">
                            <label for="name">Name <span class="red">*</span></label>
                            <div class="input-wrapper name-input-wrapper">
                                <input class="name-element" id="name" type="text" name="name" />
                            </div>
                        </div>
                        <!-- End Name element -->
                        <!-- Begin Email element -->
                        <div class="element-wrapper email-element-wrapper clearfix">
                            <label for="email">Email <span class="red">*</span></label>
                            <div class="input-wrapper phone-input-wrapper">
                                <input class="email-element quform-tooltip" id="email" type="text" name="email" title="We will never send you spam, we value your privacy as much as our own" />
                            </div>
                        </div>
                        <!-- End Email element -->
                        <!-- Begin Message element -->
                        <div class="element-wrapper message-element-wrapper clearfix">
                            <label for="message">Message <span class="red">*</span></label>
                            <div class="input-wrapper message-input-wrapper clearfix">
                                <textarea class="message-element" id="message" name="message" rows="7" cols="45"></textarea>
                            </div>
                        </div>
                        <!-- End Message element -->
                        <!-- Begin Upload element -->
                        <div class="element-wrapper upload-element-wrapper clearfix">
                            <label for="upload">File upload <span class="red">*</span></label>
                            <div class="input-wrapper upload-input-wrapper clearfix">
                                <input type="file" class="upload-element" id="upload" name="upload"></input>
                            </div>
                            <p class="description">All files allowed.  Maximum size 10MB.</p>
                        </div>
                        <!-- End Upload element -->
                        <!-- Begin Grouped Upload element -->
                        <div class="element-wrapper upload-element-wrapper clearfix">
                            <label>Grouped file upload <span class="red">*</span></label>
                            <div class="input-wrapper upload-input-wrapper clearfix">
                                <input type="file" class="upload-element" name="uploads[]"></input>
                            </div>
                            <div class="input-wrapper upload-input-wrapper clearfix">
                                <input type="file" class="upload-element" name="uploads[]"></input>
                            </div>
                            <div class="input-wrapper upload-input-wrapper clearfix">
                                <input type="file" class="upload-element" name="uploads[]"></input>
                            </div>
                            <p class="description">Allowed extensions .jpg, .jpeg, .png, .gif. Maximum size 1MB (each). Two uploads required.</p>
                        </div>
                        <!-- End Grouped Upload element -->
                        <!-- Begin Captcha element -->
                        <div class="element-wrapper captcha-element-wrapper clearfix">
                            <label for="type_the_word">Type the word <span class="red">*</span></label>
                            <div class="input-wrapper captcha-input-wrapper clearfix">
                                <div class="quform-captcha-img"><img src="../images/captcha.png" alt="" /></div>
                                <input id="type_the_word" class="captcha-element" type="text" name="type_the_word" />
                            </div>
                        </div>
                        <!-- End Captcha element -->
                        <!-- Begin Submit button -->
                        <div class="button-wrapper submit-button-wrapper clearfix">
                            <div class="quform-loading-wrap"><span class="loading">Please wait...</span></div>
                            <div class="button-input-wrapper submit-button-input-wrapper">
                                <input type="submit" class="quform-submit-button" value="Send" />
                            </div>
                        </div>
                        <!-- End Submit button -->
                   </div>
               </div>
           </div>
        </form>
    </div>
    <!-- To copy the form HTML, end here -->
</div>
</body>
</html>