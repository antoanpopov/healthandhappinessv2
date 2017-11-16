<?php

namespace Modules\Health\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Sidebar\AbstractAdminSidebar;

class RegisterHealthSidebar extends AbstractAdminSidebar
{
    /**
     * Method used to define your sidebar menu groups and items
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('health::categories.categories'), function (Item $item) {
                $item->icon('fa fa-health');
                $item->weight(0);
                $item->route('admin.health.categories.index');
                $item->authorize(
                    $this->auth->hasAccess('health.categories.index')
                );
            });
            $group->item(trans('health::posts.posts'), function (Item $item) {
                $item->icon('fa fa-health');
                $item->weight(0);
                $item->route('admin.health.posts.index');
                $item->authorize(
                    $this->auth->hasAccess('health.posts.index')
                );
            });
        });

        return $menu;
    }
}
