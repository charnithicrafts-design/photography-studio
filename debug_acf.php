<?php
require_once 'wp-load.php';
require_once 'wp-admin/includes/admin.php';
$post_id = 47;
$post = get_post($post_id);
setup_postdata($post);
$field_groups = acf_get_field_groups(array('post_id' => $post_id));
$html = '';
foreach ($field_groups as $group) {
    if ($group['key'] === 'group_pillar_content') {
        ob_start();
        $fields = acf_get_fields($group);
        foreach ($fields as $field) {
            acf_render_field_wrap($field);
        }
        $html .= ob_get_clean();
    }
}
file_put_contents('debug_acf.html', $html);
echo "Done\n";
