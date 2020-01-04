<?php

namespace App\Http\ViewCreators;

use Illuminate\View\View;

class BackendMenuCreator
{

    /**
     * The user model.
     *
     * @var \App\Model\User;
     */
    protected $user;

    /**
     * Create a new menu bar composer.
     */
    public function __construct()
    {
        $this->user = auth()->user();
    }

    /**
     * Bind data to the view.
     *
     * @param View $view
     * @return void
     */
    public function create(View $view)
    {
        $menu[] = [
            'class' => false,
            'route' => route('dashboard'),
            'icon'  => 'md md-home',
            'title' => 'Dashboard'
        ];
        /*
         * Sample for adding menu
         * array_push($menu,
            [
                'class' => {desired class},
                'route' => {desired route or url},
                'icon'  => {md or fa icon class},
                'title' => {title},
                \\Optional Sub Menu Items
                'items' => [
                    ['route' => {route or url}, 'title' => {title}],
                    ...
                ]
            ]);
         */

        array_push($menu, [
            'class' => 'gui-folder',
            'route' => 'javascript:void(0);',
            'icon'  => 'md md-location-on',
            'title' => 'Branches',
            'items' => [
                [
                    'route' => route('branch.index'),
                    'title' => 'List'
                ],
                [
                    'route' => route('branch.create'),
                    'title' => 'Create'
                ]
            ]
        ]);

        array_push($menu, [
            'class' => 'gui-folder',
            'route' => 'javascript:void(0);',
            'icon'  => 'md md-assignment-ind',
            'title' => 'Clients',
            'items' => [
                [
                    'route' => route('client.index'),
                    'title' => 'List'
                ],
                [
                    'route' => route('client.create'),
                    'title' => 'Create'
                ]
            ]
        ]);

        array_push($menu, [
            'class' => 'gui-folder',
            'route' => 'javascript:void(0);',
            'icon'  => 'md md-face-unlock',
            'title' => 'Employees',
            'items' => [
                [
                    'route' => route('employee.index'),
                    'title' => 'List'
                ],
                [
                    'route' => route('employee.create'),
                    'title' => 'Create'
                ]
            ]
        ]);

        array_push($menu, [
            'class' => 'gui-folder',
            'route' => 'javascript:void(0);',
            'icon'  => 'md md-redeem',
            'title' => 'Services',
            'items' => [
                [
                    'route' => route('service.index'),
                    'title' => 'List'
                ],
                [
                    'route' => route('service.create'),
                    'title' => 'Create'
                ]
            ]
        ]);

        array_push($menu, [
            'class' => 'gui-folder',
            'route' => 'javascript:void(0);',
            'icon'  => 'md md-perm-identity',
            'title' => 'Users',
            'items' => [
                [
                    'route' => route('user.index'),
                    'title' => 'List'
                ],
                [
                    'route' => route('user.create'),
                    'title' => 'Create'
                ]
            ]
        ]);

        array_push($menu, [
            'class' => 'gui-folder',
            'route' => 'javascript:void(0);',
            'icon'  => 'md md-receipt',
            'title' => 'Appointment',
            'items' => [
                [
                    'route' => route('appointment.index'),
                    'title' => 'List'
                ],
                [
                    'route' => route('appointment.create'),
                    'title' => 'Create'
                ]
            ]
        ]);

        array_push($menu, [
            'class' => 'gui-folder',
            'route' => 'javascript:void(0);',
            'icon'  => 'md md-report',
            'title' => 'Reports',
            'items' => [
                [
                    'route' => route('report.appointment'),
                    'title' => 'Appointment'
                ]
            ]
        ]);

        $view->with('allMenu', $menu);
    }
}
