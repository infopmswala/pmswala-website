<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Get_paginated_model extends CI_Model{
//get paginated countries
public function get_paginated_customer($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_customer.phone', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_customer');
    return $query->result();
}
//get paginated countries count
public function get_paginated_customer_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_customer.phone', $q);
    }
    $query = $this->db->get('td_customer');
    return $query->num_rows();
}


public function get_paginated_development_environments($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_development_environments.name', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_development_environments');
    return $query->result();
}
//get paginated countries count
public function get_paginated_development_environments_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_development_environments.name', $q);
    }
    $query = $this->db->get('td_development_environments');
    return $query->num_rows();
}


public function get_paginated_modules($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_modules.module_name', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_modules');
    return $query->result();
}
//get paginated countries count
public function get_paginated_modules_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_modules.module_name', $q);
    }
    $query = $this->db->get('td_modules');
    return $query->num_rows();
}

public function get_paginated_contact_list($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_contact_us.phone', $q);
    }
    $this->db->limit($per_page, $offset);
    $this->db->order_by("id", "desc");
    $query = $this->db->get('td_contact_us');
    return $query->result();
}
//get paginated countries count
public function get_paginated_contact_list_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_contact_us.phone', $q);
    }
    $this->db->order_by("id", "desc");
    $query = $this->db->get('td_contact_us');
    return $query->num_rows();
}

public function get_paginated_category($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_category.category', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_category');
    return $query->result();
}
//get paginated countries count
public function get_paginated_category_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_category.category', $q);
    }
    
    $query = $this->db->get('td_category');
    return $query->num_rows();
}

public function get_paginated_domains($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_domains.domain_name', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_domains');
    return $query->result();
}
//get paginated countries count
public function get_paginated_domains_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_domains.domain_name', $q);
    }
    
    $query = $this->db->get('td_domains');
    return $query->num_rows();
}
//get paginated countries
public function get_banner_image($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_banner.title', $q);
    }
    $this->db->order_by('position_order','desc');
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_banner');
    return $query->result();
}
//get paginated countries count
public function get_paginated_banner_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_banner.title', $q);
    }
    $this->db->order_by('position_order','desc');
    $query = $this->db->get('td_banner');
    return $query->num_rows();
}
//get paginated countries
public function get_brand_image($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_partner.title', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_partner');
    return $query->result();
}
//get paginated countries count
public function get_paginated_brand_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_partner.title', $q);
    }
    $query = $this->db->get('td_partner');
    return $query->num_rows();
}
public function get_paginated_td_social($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_social.name', $q);
    }
    $this->db->limit($per_page, $offset);
    $this->db->order_by('position_order','asc');
    $query = $this->db->get('td_social');
    return $query->result();
}
//get paginated Deals Page
public function get_paginated_td_social_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_social.name', $q);
    }
    $this->db->order_by('position_order','asc');
    $query = $this->db->get('td_social');
    return $query->num_rows();
}
public function get_paginated_sub_category($per_page, $offset){
    $q = trim($this->input->get('q', true));
    $category = trim($this->input->get('category', true));
    if (!empty($q)) {
        $this->db->like('td_sub_category.sub_category', $q);
    }
    if (!empty($category)) {
        $this->db->like('td_sub_category.category_id', $category);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_sub_category');
    return $query->result();}
//get paginated Deals Page
public function get_paginated_sub_category_count(){
    $q = trim($this->input->get('q', true));
    $category = trim($this->input->get('category', true));
    if (!empty($q)) {
        $this->db->like('td_sub_category.sub_category', $q);
    }
    if (!empty($category)) {
        $this->db->like('td_sub_category.category_id', $category);
    }
    $query = $this->db->get('td_sub_category');
    return $query->num_rows();
}
public function get_paginated_blog_category($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_blog_category.category', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_blog_category');
    return $query->result();
}
//get paginated countries count
public function get_paginated_blog_category_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_blog_category.category', $q);
    }
    $query = $this->db->get('td_blog_category');
    return $query->num_rows();
}
public function get_paginated_blog($per_page, $offset){
    $category = trim($this->input->get('category', true));
    $sub_category = trim($this->input->get('sub_category', true));
    $q = trim($this->input->get('q', true));
    if (!empty($category)) {
        $this->db->like('td_blog.category_id', $category);
    }
    if (!empty($sub_category)) {
        $this->db->like('td_blog.sub_category_id', $sub_category);
    }
    if (!empty($q)) {
        $this->db->like('td_blog.title', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_blog');
    return $query->result();
}
//get paginated countries count
public function get_paginated_blog_count(){
    $category = trim($this->input->get('category', true));
    $sub_category = trim($this->input->get('sub_category', true));
    $q = trim($this->input->get('q', true));
    if (!empty($category)) {
        $this->db->like('td_blog.category_id', $category);
    }
    if (!empty($sub_category)) {
        $this->db->like('td_blog.sub_category_id', $sub_category);
    }
    if (!empty($q)) {
        $this->db->like('td_blog.title', $q);
    }
    $query = $this->db->get('td_blog');
    return $query->num_rows();
}
// employment
public function get_paginated_product($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_product.title', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_product');
    return $query->result();
}
//get paginate employment cunt
public function get_paginated_product_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_product.title', $q);
    }
    $query = $this->db->get('td_product');
    return $query->num_rows();
}

public function get_paginated_information($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_information.information_title', $q);
    }
    $this->db->limit($per_page, $offset);
    $this->db->order_by("id", "desc");
    $query = $this->db->get('td_information');
    return $query->result();
}
//get paginated countries count
public function get_paginated_information_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_information.information_title', $q);
    }
    $this->db->order_by("id", "desc");
    $query = $this->db->get('td_information');
    return $query->num_rows();
}



public function get_paginated_section($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_section.course_id', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_section');
    return $query->result();
}
//get paginate employment cunt
public function get_paginated_section_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_section.course_id', $q);
    }
    $query = $this->db->get('td_section');
    return $query->num_rows();
}


public function get_paginated_lesson($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_lesson.lesson_id', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_lesson');
    return $query->result();
}
//get paginate employment cunt
public function get_paginated_lesson_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_lesson.lesson_id', $q);
    }
    $query = $this->db->get('td_lesson');
    return $query->num_rows();
}


// employment
public function get_paginated_td_faqs($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_faqs.question', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_faqs');
    return $query->result();
}
//get paginate employment cunt
public function get_paginated_td_faqs_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_faqs.question', $q);
    }
    $query = $this->db->get('td_faqs');
    return $query->num_rows();
}


// employment
public function get_paginated_td_videos($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_videos.question', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_videos');
    return $query->result();
}
//get paginate employment cunt
public function get_paginated_td_videos_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_videos.question', $q);
    }
    $query = $this->db->get('td_videos');
    return $query->num_rows();
}


public function get_paginated_scroll_text($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_scroll_text.scroll_text', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_scroll_text');
    return $query->result();
}
//get paginate employment cunt
public function get_paginated_scroll_text_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_scroll_text.scroll_text', $q);
    }
    $query = $this->db->get('td_scroll_text');
    return $query->num_rows();
}


public function get_paginated_td_price_list($per_page, $offset){
    $q = trim($this->input->get('q', true));
    $pricelist = trim($this->input->get('pricelist', true));
    if (!empty($q)) {
        $this->db->like('td_price_list.supply_location', $q);
    }
    if (!empty($pricelist)) {
        $this->db->like('td_price_list.category_price_list', $pricelist);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_price_list');
    return $query->result();
}
//get paginate employment cunt
public function get_paginated_td_price_list_count(){
    $q = trim($this->input->get('q', true));
    $pricelist = trim($this->input->get('pricelist', true));
    if (!empty($q)) {
        $this->db->like('td_price_list.supply_location', $q);
    }
    if (!empty($pricelist)) {
        $this->db->like('td_price_list.category_price_list', $pricelist);
    }
    $query = $this->db->get('td_price_list');
    return $query->num_rows();
}

public function get_paginated_td_job($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_job.question', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_job');
    return $query->result();
}
//get paginate employment cunt
public function get_paginated_td_job_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_job.question', $q);
    }
    $query = $this->db->get('td_job');
    return $query->num_rows();
}

public function get_paginated_td_articles($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_articles.question', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_articles');
    return $query->result();
}
//get paginate employment cunt
public function get_paginated_td_articles_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_articles.question', $q);
    }
    $query = $this->db->get('td_articles');
    return $query->num_rows();
}

// employment
public function get_paginated_td_coupons($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_coupons.coupons_name', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->get('td_coupons');
    return $query->result();
}
//get paginate employment cunt
public function get_paginated_td_coupons_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_coupons.coupons_name', $q);
    }
    $query = $this->db->get('td_coupons');
    return $query->num_rows();
}

// employment
public function get_paginated_td_orders($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_customer.phone', $q);
    }
    $this->db->limit($per_page, $offset);
    $query = $this->db->select('*')->from('td_mycourse')->join('td_product', 'td_product.course_id' == 'td_mycourse.course_id')->join('td_customer', 'td_customer.id' == 'td_mycourse.user_id')->get();
    echo $query->last_query();
    return $query->result();
}
//get paginate employment cunt
public function get_paginated_td_orders_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
         $this->db->like('td_customer.phone', $q);
    }
   $query = $this->db->select('*')->from('td_mycourse')->join('td_product', 'td_product.course_id' == 'td_mycourse.course_id')->join('td_customer', 'td_customer.id' == 'td_mycourse.user_id')->get();
    echo $query->last_query();
    return $query->num_rows();
}


public function get_paginated_table($per_page, $offset, $_table_name, $_like_name,$where = NULL, $sub=NULL){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like($_table_name.'.'.$_like_name, $q);
    }
    $this->db->limit($per_page, $offset);
    $this->db->order_by('id',"DESC");
    if($where != NULL){
    $this->db->where('module_id', $where);
    }
    if($sub != NULL){
         $this->db->where('portfolio_id', $sub);
    }
    $query = $this->db->get($_table_name);
    return $query->result();
}
//get paginate employment cunt
public function get_paginated_table_count($_table_name, $_like_name,$where = NULL, $sub=NULL){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like($_table_name.'.'.$_like_name, $q);
    }
    if($where != NULL){
         $this->db->where('module_id', $where);
    }
    if($sub != NULL){
         $this->db->where('portfolio_id', $sub);
    }
    $this->db->order_by('id',"DESC");
    $query = $this->db->get($_table_name);
    return $query->num_rows();
}


public function get_paginated_help_and_support($per_page, $offset, $_table_name, $_like_name,$where = NULL){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like($_table_name.'.'.$_like_name, $q);
    }
    $this->db->limit($per_page, $offset);
    $this->db->order_by('id',"DESC");
    if($where != NULL){
    $this->db->where('user_id', $where);
    }
    $query = $this->db->get($_table_name);
    return $query->result();
}
//get paginate employment cunt
public function get_paginated_help_and_support_count($_table_name, $_like_name,$where = NULL){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like($_table_name.'.'.$_like_name, $q);
    }
    if($where != NULL){
         $this->db->where('user_id', $where);
    }
    $this->db->order_by('id',"DESC");
    $query = $this->db->get($_table_name);
    return $query->num_rows();
}

public function get_paginated_seo($per_page, $offset){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_seo.page_name', $q);
    }
    $this->db->limit($per_page, $offset);
    $this->db->order_by("id", "ASC");
    $query = $this->db->get('td_seo');
    return $query->result();
}
//get paginated countries count
public function get_paginated_seo_count(){
    $q = trim($this->input->get('q', true));
    if (!empty($q)) {
        $this->db->like('td_seo.page_name', $q);
    }
    $this->db->order_by("id", "desc");
    $query = $this->db->get('td_seo');
    return $query->num_rows();
}

public function get_paginated_users_info($per_page, $offset){
    $q = trim($this->input->get('q', true));
    $Fdate = trim($this->input->get('Fdate', true));
    $Tdate = trim($this->input->get('Tdate', true));
    if (!empty($q)) {
        $this->db->like('td_users.phone', $q);
    }
    if(!empty($Fdate) & !empty($Tdate)) {
        $this->db->where('td_users.created_at BETWEEN "'. date('Y-m-d', strtotime($Fdate)). '" and "'.date('Y-m-d', strtotime($Tdate)).'"');
      }
    $this->db->limit($per_page, $offset);
    $this->db->order_by("id", "desc");
    $query = $this->db->get('td_users');
    return $query->result();
}
//get paginated countries count
public function get_paginated_users_info_count(){
    $q = trim($this->input->get('q', true));
    $Fdate = trim($this->input->get('Fdate', true));
    $Tdate = trim($this->input->get('Tdate', true));
    if (!empty($q)) {
        $this->db->like('td_users.phone', $q);
    }
    if(!empty($Fdate) & !empty($Tdate)) {
        $this->db->where('td_users.created_at BETWEEN "'. date('Y-m-d', strtotime($Fdate)). '" and "'.date('Y-m-d', strtotime($Tdate)).'"');
      }
    $this->db->order_by("id", "desc");
    $query = $this->db->get('td_users');
    return $query->num_rows();
}


public function get_paginated_users_payment_info($per_page, $offset){
    $q = trim($this->input->get('q', true));
     $Fdate = trim($this->input->get('Fdate', true));
    $Tdate = trim($this->input->get('Tdate', true));
    if (!empty($q)) {
        $this->db->like('td_payment_transactions.transaction_id', $q);
    }
     if(!empty($Fdate) & !empty($Tdate)) {
        $this->db->where('td_payment_transactions.created_at BETWEEN "'. date('Y-m-d', strtotime($Fdate)). '" and "'.date('Y-m-d', strtotime($Tdate)).'"');
      }
    $this->db->limit($per_page, $offset);
    $this->db->order_by("id", "desc");
    $query = $this->db->get('td_payment_transactions');
    return $query->result();
}
//get paginated countries count
public function get_paginated_users_payment_info_count(){
     $q = trim($this->input->get('q', true));
     $Fdate = trim($this->input->get('Fdate', true));
     $Tdate = trim($this->input->get('Tdate', true));
    if(!empty($q)){
        $this->db->like('td_payment_transactions.transaction_id', $q);
    }
    if(!empty($Fdate) & !empty($Tdate)){
    $this->db->where('td_payment_transactions.created_at BETWEEN "'. date('Y-m-d', strtotime($Fdate)). '" and "'.date('Y-m-d', strtotime($Tdate)).'"');
      }
    $this->db->order_by("id", "desc");
    $query = $this->db->get('td_payment_transactions');
    return $query->num_rows();
}


public function get_paginated_user_withdrawal_request_payment_info($per_page, $offset){
    $q = trim($this->input->get('q', true));
     $Fdate = trim($this->input->get('Fdate', true));
    $Tdate = trim($this->input->get('Tdate', true));
    if (!empty($q)) {
        $this->db->like('wq.transaction_id', $q);
    }
     if(!empty($Fdate) & !empty($Tdate)) {
        $this->db->where('wq.created_at BETWEEN "'. date('Y-m-d', strtotime($Fdate)). '" and "'.date('Y-m-d', strtotime($Tdate)).'"');
      }
     $this->db->select('wq.transaction_id as withdrawal_request_id, wq.message as message, wq.user_id as user_id, wq.id as id, wq.purchase as purchase, wq.created_at as created_at,wq.payment_status as payment_status,us.name,pt.amount as amount')->from('td_withdrawal_request wq')->join('td_users us','us.id = wq.user_id')->join('td_payment_transactions pt','pt.id = wq.payment_id');
    $this->db->limit($per_page, $offset);
    $this->db->order_by("wq.id", "desc");
    $query = $this->db->get();
    return $query->result();
}
//get paginated countries count
public function get_paginated_user_withdrawal_request_count(){
     $q = trim($this->input->get('q', true));
     $Fdate = trim($this->input->get('Fdate', true));
     $Tdate = trim($this->input->get('Tdate', true));
    if(!empty($q)){
        $this->db->like('wq.transaction_id', $q);
    }
    if(!empty($Fdate) & !empty($Tdate)){
    $this->db->where('wq.created_at BETWEEN "'. date('Y-m-d', strtotime($Fdate)). '" and "'.date('Y-m-d', strtotime($Tdate)).'"');
      }
    $this->db->select('wq.transaction_id as withdrawal_request_id, wq.message as message, wq.user_id as user_id, wq.id as id, wq.purchase as purchase, wq.created_at as created_at ,wq.payment_status as payment_status ,us.name,pt.amount as amount')->from('td_withdrawal_request wq')->join('td_users us','us.id = wq.user_id')->join('td_payment_transactions pt','pt.id = wq.payment_id');
    $this->db->order_by("wq.id", "desc");
    $query = $this->db->get();
    return $query->num_rows();
}

}



?>