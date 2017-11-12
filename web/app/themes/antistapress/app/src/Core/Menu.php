<?php

namespace App\Core;

use Timber\Menu as TimberMenu;

class Menu extends TimberMenu
{
    public $MenuItemClass = 'App\Core\MenuItem';
    public $PostClass = 'App\PostTypes\Post';
}
