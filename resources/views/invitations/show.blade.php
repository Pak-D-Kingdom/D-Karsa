@php
    $templateKey = \App\Services\TemplateManager::resolveKey($couple->theme ?? null, $couple->category ?? null, $couple->sub_category ?? null);
    $template = \App\Services\TemplateManager::get($templateKey);
@endphp
@include($template['blade'], [
    'couple' => $couple,
    'guest' => $guest,
    'wishes' => $wishes,
    'isDemo' => $isDemo ?? false,
    'isAdminPreview' => $isAdminPreview ?? false,
    'template' => $template
])
