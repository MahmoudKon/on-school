<?php

return [
    // Limit the number of displayed toasts
    'maxItems' => null,

    'options' => [
        'closeButton'       => true,
        'closeClass'        => 'toast-close-button',
        'closeDuration'     => 500,
        'closeEasing'       => 'swing',
        'closeHtml'         => '<button><i class="icon-off"></i></button>',
        'closeMethod'       => 'fadeOut',
        'closeOnHover'      => true,
        'containerId'       => 'toast-container',
        'debug'             => false,
        'escapeHtml'        => false,
        'extendedTimeOut'   => 10000,
        'hideDuration'      => 1000,
        'hideEasing'        => 'linear',
        'hideMethod'        => 'fadeOut',
        'iconClass'         => 'toast-info',
        'iconClasses'       => [
            'error'   => 'toast-error',
            'info'    => 'toast-info',
            'success' => 'toast-success',
            'warning' => 'toast-warning',
        ],
        'messageClass'      => 'toast-message',
        'newestOnTop'       => true,
        'onHidden'          => null,
        'onShown'           => null,
        'positionClass'     => 'toast-top-center',
        'preventDuplicates' => false,
        'progressBar'       => true,
        'progressClass'     => 'toast-progress',
        'rtl'               => false,
        'showDuration'      => 300,
        'showEasing'        => 'swing',
        'showMethod'        => 'fadeIn',
        'tapToDismiss'      => true,
        'target'            => 'body',
        'timeOut'           => 10000,
        'titleClass'        => 'toast-title',
        'toastClass'        => 'toast',
    ],
];
