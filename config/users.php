<?php

return [
    'Users.Social.login' => true,
    'OAuth.providers.google.options.clientId' => '364302975510-95hf59ddlsv3p9cfaigdk9for3agjqdk.apps.googleusercontent.com',
    'OAuth.providers.google.options.clientSecret' => 'mw_r1NKQt9l9W6LrAZIQY3FL',
    'Email' => [
        // determines if the user should include email
        'required' => true,
        // determines if registration workflow includes email validation
        'validate' => false
    ],
    'Tos' => [
        // determines if the user should include tos accepted
        'required' => false,
    ]
];