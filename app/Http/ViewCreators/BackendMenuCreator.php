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
            'icon'  => 'md md-people',
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
            'icon'  => 'md md-people',
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

        $view->with('allMenu', $menu);
    }
}
