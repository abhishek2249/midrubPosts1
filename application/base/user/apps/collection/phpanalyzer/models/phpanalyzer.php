<?php
/**
 * Storage Lists Model
 *
 * PHP Version 5.6
 *
 * Storage Lists Model contains the Storage Lists Model
 *
 * @category Social
 * @package  Midrub
 * @author   Abhey
 * @license  https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License
 * @link     https://www.midrub.com/
 */
if ( !defined('BASEPATH') ) {
    exit('No direct script access allowed');
}

/**
 * Achieve_lists_model class - operates the lists table.
 *
 * @since 0.0.7.6
 * 
 * @category Social
 * @package  Midrub
 * @author   Scrisoft <asksyn@gmail.com>
 * @license  https://www.gnu.org/licenses/gpl-2.0.html GNU General Public License
 * @link     https://www.midrub.com/
 */
class PHPAnalyzer extends CI_MODEL 
{
    
    /**
     * Class variables
     */
    private $table = 'instagram_users';

    /**
     * Initialise the model
     */
    public function __construct() {
        
        // Call the Model constructor
        parent::__construct();
        
        // Set the tables value
        $this->tables = $this->config->item('tables', $this->table);
        
    }

     /**
     * The function get_all_plans gets all plans
     * 
     * @param integer $visible contains the status option
     * 
     * @return object with all plans or false
     */
    public function get_all_users() {
        
        $this->db->select('username,full_name,profile_picture_url,followers,following,uploads,average_engagement_rate');
        $this->db->from($this->table);
        //$this->db->where('username', 'akshaykumar');
        //$this->db->limit(8);

        $query = $this->db->get();
        
        if ( $query->num_rows() > 0 ) {
            
            return $query->result();
            
        } else {
            
            return false;
            
        }
    }

    public function get_user_detail($curr_user, $username) {
        
        $this->db->select('*');
        $this->db->from('instagram_users');
        $this->db->where('username', $username);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ( $query->num_rows() === 1 ) {    
            $source_account = $query->result(); 
        } else {            
            return false;            
        }

        $this->db->select('*');
        $this->db->from('instagram_logs');
        $this->db->where('username', $username);
        $this->db->order_by('date', 'DESC');
        $query = $this->db->get();
        
        if ( $query->num_rows() > 0 ) {    
            $source_account_logs = $query->result();
        }

        $fav = $this->db->select('user_id')->from('favorites')->where('source_user_id',$source_account[0]->id)->where('user_id',$curr_user)->get();

        if( $fav->num_rows() > 0 ) {
            $class ="fa-heart";
        } else {
            $class="fa-heart-o";
        }

       $user = [];
       $user['detail'] = $source_account[0];
       $user['logs'] = $source_account_logs;
       $user['fav'] = $class;

       
        
       return $user;
    }

    public function get_media_detail($details) {
        
        foreach ($details->top_posts as $key => $value) {
            echo $key."-".$value."</br>";
        }

    }

     /**
     * The function get_all_plans gets all plans
     * 
     * @param integer $visible contains the status option
     * 
     * @return object with all plans or false
     */
    public function get_all_user_media($id) {
        $this->db->select('*');
        $this->db->from('instagram_media');
        $this->db->where('instagram_user_id', $id);
        $this->db->order_by('created_date', 'DESC');
        $query = $this->db->get();
        

        if ( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            
            return false;
            
        }
    }

    /**
     * The function get_all_plans gets all plans
     * 
     * @param integer $visible contains the status option
     * 
     * @return object with all plans or false
     */
    public function get_users_name($username) {
        
        $this->db->select('username');
        $this->db->from($this->table);
        $this->db->like('username', $username, 'after');
        
        $query = $this->db->get();
        
        
        if ( $query->num_rows() > 0 ) {
            return $query->result();
        } else {
            
            return false;
            
        }
    }


    public function favourite($curr_user, $option, $userid) {
        
        if($option== "add") {
            // Set data
        $data = array(
            'user_id' => $curr_user,
            'source_user_id' => $userid,
            'source' => 'instagram',
            'date' => date("Y-m-d h:i:s")
        );
        
            $this->db->insert('favorites', $data);
            return true;
        }

        if($option== "remove") {

            $this->db->where('user_id', $curr_user);
            $this->db->where('source_user_id', $userid);
            $this->db->where('source', 'instagram');
            $this->db->delete('favorites');
            
            if($this->db->affected_rows()) {
                return true;
            }
        }

        return false;
    }

    public function favourite_report($curr_user) {

        $this->db->select('source_user_id');
        $this->db->from('favorites');
        $this->db->where('source', 'instagram');
        $this->db->where('user_id', $curr_user);
        
        $query = $this->db->get();
        
        
        if ( $query->num_rows() > 0 ) {
            $result = $query->result();
            foreach ($result as $key => $value) {
                $fav_ids[] = $value->source_user_id;
            }
            
            $this->db->select('id,username,followers,following,uploads');
            $this->db->from('instagram_users');
            $this->db->where_in('id', $fav_ids);
            $query = $this->db->get();   
            
            $favourite = [];
            if ( $query->num_rows() > 0 ) {
                $favourite['report'] = $query->result();
                $favourite['count'] = $query->num_rows();
                return $favourite;
            } else {                
                return false;                
            }

            //return $query->result();
        } else {
            return false;
        }
    }
    
}

/* End of file Achieve_lists_model.php */