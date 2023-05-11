<?php

function get_all_rsvp()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'rsvp';
    $sql = "SELECT * FROM " . $table_name;
    $query = $wpdb->get_results($sql);
    $query = json_decode(json_encode($query), true);
    return $query;
}

function get_all_rsvp_by_postid($id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'rsvp';
    $sql = "SELECT * FROM " . $table_name . " WHERE post_id=" . $id;
    $query = $wpdb->get_results($sql);
    $query = json_decode(json_encode($query), true);
    return $query;
}

function post_rsvp()
{
    $post_id = get_the_ID();
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $kehadiran = isset($_POST['kehadiran']) ? $_POST['kehadiran'] : '';
    $ucapan = isset($_POST['ucapan']) ? $_POST['ucapan'] : '';

    $data = array(
        'post_id' => $post_id,
        'nama' => $nama,
        'kehadiran' => $kehadiran,
        'ucapan' => $ucapan
    );

    if ($nama != '') {
        try {
            global $wpdb;
            $table = $wpdb->prefix . 'rsvp';
            $wpdb->insert($table, $data);
            $my_id = $wpdb->insert_id;
            return $my_id;
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
        }
    }

}

function put_rsvp()
{
    $table = $wpdb->prefix . 'rsvp';

    $updated = $wpdb->update($table, $data, $where);
    return $updated;
}

function delete_rsvp($id)
{
    global $wpdb;
    $table = $wpdb->prefix . 'rsvp';
    $deleted = $wpdb->delete($table, array('id' => $id), '');
    return $deleted;
}