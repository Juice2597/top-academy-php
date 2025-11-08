<?php
function calculate()
{
    $operation = $_POST["operation"] ?? 'increment';

    switch ($operation) {
        case 'increment':
            return increment();
        case 'decrement':
            return decrement();
        case 'multiply':
            return multiply();
        case 'divide':
            return divide();
        default:
            return increment();
    }
}