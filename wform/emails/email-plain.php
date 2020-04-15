<?php

if (!defined('QUFORM_ROOT')) exit;

$n = QUFORM_EMAIL_NEWLINE;
echo $mailer->Subject;

foreach ($form->getElements() as $element) {
    if (!$element->isHidden()) {
        echo $n . $n . $element->getLabel() . $n;
        echo '------------------------' . $n;
        echo $element->getFormattedValue();
    }
}

if (isset($extra) && is_array($extra) && count($extra)) {
    foreach ($extra as $key => $value) {
        if (is_array($value) && array_key_exists('plain', $value)) $value = $value['plain'];
        echo $n . $n . $key . $n;
        echo '------------------------' . $n;
        echo $value . $n;
    }
}