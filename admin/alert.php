<?php
if (isset($message)) {
    echo '<ul class="alert alert-' . $message['type'] . '" style="list-style: none;" role="alert">';
    if (gettype($message['text']) == 'string') {
        echo '<li>' . $message['text'] . '</li>';
    } else if (gettype($message['text']) == 'array') {
        foreach ($message['text'] as $text) {
            echo '<li>' . $text . '</li>';
        }
    }
    echo '</ul>';
}
