<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BlogCommentModel extends CI_Model
{
    public function listData($blogId)
    {
        $sql = 'select comment.*, reply.description as reply_comment, reply.name as reply_name, reply.created_at as reply_created_at
        from tbblog_comment as comment
        left join tbblog_reply as reply on reply.comment_id=comment.id
        where comment.blog_id = '.$blogId.'
        order by comment.id,reply.id asc';

        // Execute query
        $result = $this->db->query($sql)->result_array();

        // Initialise desired result
        $shaped_result = array();

        // Loop through the SQL result creating the data in your desired shape
        foreach ($result as $key => $row) {
            // The primary key of A
            $id = $row['id'];

            // Add a new result row for A if we have not come across this key before
            if (!array_key_exists($id, $shaped_result)) {
                $shaped_result[$id] = array(
                        'id' => $id,
                        'description' => $row['description'],
                        'name' => $row['name'],
                        'created_at' => $row['created_at'],
                        'reply' => array());
            }

            if ($row['reply_comment'] != null) {
                // Push B item onto sub array
                $shaped_result[$id]['reply'][$key]['comment'] = $row['reply_comment'];
            }

            if ($row['reply_name'] != null) {
                // Push B item onto sub array
                $shaped_result[$id]['reply'][$key]['name'] = $row['reply_name'];
            }

            if ($row['reply_created_at'] != null) {
                // Push B item onto sub array
                $shaped_result[$id]['reply'][$key]['created_at'] = $row['reply_created_at'];
            }
        }

        return $shaped_result;
    }

    public function insert($data)
    {
        $this->db->insert('tbblog_comment', $data);
        return $this->db->insert_id();
    }

    public function update($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('tbblog_comment', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tbblog_comment');
    }
}
