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
 * View page for displaying embedded content.
 *
 * @package    local_globalembed
 * @copyright  2025 Flávio Araújo <flaviolopes1027@gmail.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require('../../config.php');

$userid = required_param('id', PARAM_INT);
require_login();

$context = context_system::instance();
require_capability('local/globalembed:viewembed', $context);

$PAGE->set_url(new moodle_url('/local/globalembed/view.php', ['id' => $userid]));
$PAGE->set_context($context);
$PAGE->set_title(get_string('viewembed', 'local_globalembed'));

$embedcode = get_config('local_globalembed', 'embedcode');

echo $OUTPUT->header();

if (!empty($embedcode)) {
    echo format_text($embedcode, FORMAT_HTML, ['noclean' => true]);
} else {
    echo $OUTPUT->notification(get_string('noembed', 'local_globalembed'), 'info');
}

echo $OUTPUT->footer();
