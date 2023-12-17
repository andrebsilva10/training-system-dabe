<?php

namespace App\Lib;

use Closure;
use Core\Routes\Route;
use ReflectionClass;

class SimpleForm
{
    private $object;

    public function for($object, $url, $method, Closure $callBack)
    {
        $this->object = $object;

        echo "<form action='{$url}' method='{$this->httpMethod($method)}'>";
        echo "<input type='hidden' name='_method' value='{$method}'>";
        $callBack($this);
        echo '</form>';
    }

    public function inputFor($attribute, $name, $type = 'text')
    {
        return <<<HTML
            <div class="form-floating mb-3">
                <input id="{$this->id($attribute)}"
                       type="{$type}"
                       value="{$this->getValue($attribute,$type)}"
                       name="{$this->name($attribute)}"
                       class="form-control {$this->classWhenError($attribute)}" placeholder="{$name}">
                <label for="{$this->id($attribute)}" class="form-label">{$name}</label>
                <span class="invalid-feedback">{$this->object->errors($attribute)}</span>
            </div>
        HTML;
    }

    public function checkboxFor($attribute, $name, $checked = false)
    {
        $checkedAttribute = $checked ? 'checked' : '';

        return <<<HTML
            <div class="form-check mb-2">
                <input id="{$this->id($attribute)}"
                        type="checkbox"
                        name="{$this->name($attribute)}"
                        class="form-check-input"
                        value="true"
                        {$checkedAttribute}
                        />
                <label for="{$this->id($attribute)}" class="form-check-label">{$name}</label>
            </div>
        HTML;
    }


    public function selectFor($attribute, $name, $prompt, $collection)
    {
        $options = "<option value=''>{$prompt}</option>";

        foreach ($collection as $obj) {
            $options .= "<option value='{$obj->getId()}'>{$obj->getName()}</option>";
        }

        return <<<HTML
            <div class="form-group">
                <label for="{$this->id($attribute)}">{$name}</label>
                <select
                    name="{$this->name($attribute)}" id="{$this->id($attribute)}"
                    class="{$this->classWhenError($attribute)}"
                    >
                    {$options}
                </select>
                <span class="invalid-feedback">{$this->object->errors($attribute)}</span>
            </div>
        HTML;
    }

    public function submit($value)
    {
        return <<<HTML
            <div>
                <input class="btn btn-primary" type="submit" value="{$value}">
            </div>
        HTML;
    }

    private function getValue($attribute, $type)
    {
        if ($type === 'password') {
            return '';
        }

        $method = 'get' . $attribute;
        return $this->object->$method();
    }

    private function classWhenError($attribute)
    {
        return $this->object->errors($attribute) ? 'is-invalid' : '';
    }

    private function name($attribute)
    {
        return strtolower("{$this->classNameInSnakeCase()}[{$attribute}]");
    }


    private function id($attribute)
    {
        return strtolower("{$this->classNameInSnakeCase()}_{$attribute}");
    }

    private function className()
    {
        return (new ReflectionClass($this->object))->getShortName();
    }

    private function classNameInSnakeCase()
    {
        return StringUtils::camelToSnakeCase($this->className());
    }

    private function httpMethod($method)
    {
        if ($method !== 'GET')
            return 'POST';

        return 'GET';
    }
}
