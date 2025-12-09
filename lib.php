<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Library functions and hooks for Local globalembed plugin.
 *
 * @package    local_globalembed
 * @copyright  2025 Flávio Araújo <flaviolopes1027@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Add dashboard link to user profile navigation.
 *
 * @param \core_user\output\myprofile\tree $tree The myprofile tree.
 * @param stdClass $user The user object.
 * @return void
 */
function local_globalembed_myprofile_navigation(core_user\output\myprofile\tree $tree, $user)
{
    if (
        has_capability('local/globalembed:viewembed', context_system::instance()) &&
        get_config('local_globalembed', 'showinprofile')
    ) {
        $url = new moodle_url('/local/globalembed/view.php', ['id' => $user->id]);
        $node = new core_user\output\myprofile\node(
            'miscellaneous',
            'globalembed_view',
            get_string('linknameinmenuprofile', 'local_globalembed'),
            null,
            $url
        );
        $tree->add_node($node);
    }
}
