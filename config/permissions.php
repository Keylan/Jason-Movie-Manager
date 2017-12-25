<?php
    return [
        'Users.SimpleRbac.permissions' => [
            [
                'role' => 'user',
                'controller' => 'Movies',
                'action' => ['/', 'index', 'view', 'add', 'edit', 'delete'],
            ],
            [
                'role' => 'admin',
                'prefix' => '*',
                'extension' => '*',
                'plugin' => '*',
                'controller' => '*',
                'action' => '*',
            ],
            [
                'role' => '*',
                'plugin' => 'CakeDC/Users',
                'controller' => 'Users',
                'action' => ['profile', 'logout'],
            ],
            [
                'role' => '*',
                'plugin' => 'CakeDC/Users',
                'controller' => 'Users',
                'action' => 'resetGoogleAuthenticator',
                'allowed' => function (array $user, $role, \Cake\Http\ServerRequest $request) {
                    $userId = \Cake\Utility\Hash::get($request->getAttribute('params'), 'pass.0');
                    if (!empty($userId) && !empty($user)) {
                        return $userId === $user['id'];
                    }

                    return false;
                }
            ],
            //all roles allowed to Pages/display
            [
                'role' => '*',
                'controller' => 'Pages',
                'action' => ['display', 'home', 'index'],
            ]
        ]
    ];
?>