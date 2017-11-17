<?php
/**
 * Created by PhpStorm.
 * User: AntoanPopoff
 * Date: 11/16/2017
 * Time: 20:35
 */
use Illuminate\Support\HtmlString;
use Illuminate\Support\ViewErrorBag;

Form::macro('userSelect', function ($name, $title, ViewErrorBag $errors, $object = null, array $options = []) {
    if (array_key_exists('multiple', $options)) {
        $nameForm = $name . '[]';
    } else {
        $nameForm = $name;
    }

    $string = "<div class='form-group dropdown" . ($errors->has($name) ? ' has-error' : '') . "'>";
    $string .= "<label for='$nameForm'>$title</label>";

    if (is_object($object)) {
        $currentData = isset($object->$name) ? $object->$name : '';
    } else {
        $currentData = false;
    }

    /* Bootstrap default class */
    $array_option = ['class' => 'form-control'];

    if (array_key_exists('class', $options)) {
        $array_option = ['class' => $array_option['class'] . ' ' . $options['class']];
        unset($options['class']);
    }

    $options = array_merge($array_option, $options);

    $string .= '<select name="'.$nameForm.'" ';
    $users = \Modules\User\Entities\Sentinel\User::all();

    foreach ($options as $key => $value){
        $string .= sprintf('%s="%s"',$key,$value);
    }

    $string .='>';
    foreach ($users as $user){
        $string .= '<option value="'.$user->id.'">'.$user->first_name.'</option>';
    }

    $string .= '</select>';
    $string .= $errors->first($name, '<span class="help-block">:message</span>');
    $string .= '</div>';

    return new HtmlString($string);
});