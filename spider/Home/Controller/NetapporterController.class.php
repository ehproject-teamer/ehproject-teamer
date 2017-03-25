<?php
namespace Home\Controller;
use Think\Controller;
class NetapporterController extends Controller
{
    /**
     * 抓取商品分类
     */
    public function category(){
        
        $this->mycurl = new Curl();
        $result_html = $this->mycurl->quickGet("http://www.toutiao.com/search_content/?format=json&keyword=$keyword&count=$count&offset=$offset",null);
        $doc_baidu = phpQuery::newDocumentHTML($result_html);
        phpQuery::selectDocument($doc_baidu);
        $list = pq("#content_left .c-container");
        
        $this->show("success");
    }
    
    /**
     * 抓取商品地址
     */
    public function goods_url(){
    
        $this->show("success");
    }
    
    /**
     * 抓取商品的详情
     * 包括属性、相册
     */
    public function goods_detail(){
    
        $this->show("success");
    }
    
    
}

?>