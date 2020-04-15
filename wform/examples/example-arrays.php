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
        <form class="quform" action="process-arrays.php" method="post" enctype="multipart/form-data">
            <div class="quform-wrapper">
                <h1>Quform - <a href="http://demos.themecatcher.net/quform/buy.php">Ajax Contact Form</a></h1>
                <h2>Easy to install into any PHP / HTML web page</h2>
                <div class="quform-inner">
                    <div class="quform-title">Array notation form fields</div>
                    <div class="quform-elements clearfix">
                        <p>Fields that are part of an array are still validated and filtered normally.</p>
                        <!-- Begin Single level deep array element 1 -->
                        <div class="element-wrapper single_level-field1-element-wrapper clearfix">
                            <label for="single_level-field1">Single level array field 1 <span class="red">*</span></label>
                            <div class="input-wrapper single_level-field1-input-wrapper">
                                <input class="single_level-field1-element" id="single_level-field1" type="text" name="single_level[field1]" />
                            </div>
                            <p class="description">(single_level[field1])</p>
                        </div>
                        <!-- End Single level deep array element 1 -->
                        <!-- Begin Single level deep array element 2 -->
                        <div class="element-wrapper single_level-field2-element-wrapper clearfix">
                            <label for="single_level-field2">Single level array field 2 <span class="red">*</span></label>
                            <div class="input-wrapper single_level-field2-input-wrapper">
                                <input class="single_level-field2-element" id="single_level-field2" type="text" name="single_level[field2]" />
                            </div>
                            <p class="description">(single_level[field2]) Validators: email</p>
                        </div>
                        <!-- End Single level deep array element 2 -->
                        <!-- Begin Second level deep array element 1 -->
                        <div class="element-wrapper first_level-second_level-field1-element-wrapper clearfix">
                            <label for="first_level-second_level-field1">Second level array field 1 <span class="red">*</span></label>
                            <div class="input-wrapper first_level-second_level-field1-input-wrapper">
                                <input class="first_level-second_level-field1-element" id="first_level-second_level-field1" type="text" name="first_level[second_level][field1]" />
                            </div>
                            <p class="description">(first_level[second_level][field1]) Validators: digits</p>
                        </div>
                        <!-- End Second level deep array element 1 -->
                        <!-- Begin Second level deep array element 2 -->
                        <div class="element-wrapper first_level-second_level-field2-element-wrapper clearfix">
                            <label for="first_level-second_level-field2">Second level array field 2 <span class="red">*</span></label>
                            <div class="input-wrapper first_level-second_level-field2-input-wrapper">
                                <input class="first_level-second_level-field2-element" id="first_level-second_level-field2" type="text" name="first_level[second_level][field2]" />
                            </div>
                            <p class="description">(first_level[second_level][field2]) Validators: digits Filters: digits</p>
                        </div>
                        <!-- End Second level deep array element 2 -->
                        <!-- Begin Second level deep array multiple -->
                        <div class="element-wrapper level_one-level_two-element-wrapper clearfix">
                            <label for="level_one-level_two">Second level array multiple field <span class="red">*</span></label>
                            <div class="input-wrapper level_one-level_two-input-wrapper">
                                <select id="level_one-level_two" name="level_one[level_two][]" multiple="multiple">
                                    <option value="Multi option 1">Multi option 1</option>
                                    <option value="Multi option 2">Multi option 2</option>
                                    <option value="Multi option 3">Multi option 3</option>
                                </select>
                            </div>
                            <p class="description">(level_one[level_two][]) Filters: alpha</p>
                        </div>
                        <!-- End Second level deep array multiple -->
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