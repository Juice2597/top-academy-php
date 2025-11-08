<?php

function render(string $page, array $params = []): string
{
    return renderTemplate('layouts/main', array_merge($params, [
        'menu' => renderTemplate('components/menu', $params),
        'content' => renderTemplate($page, $params),
    ]));
}

function renderTemplate(string $page, array $params = []): string
{
    ob_start();
    extract($params);
    include VIEWS_PATH . '/' . $page . '.phtml';
    return ob_get_clean();
}