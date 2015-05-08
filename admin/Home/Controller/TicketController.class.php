<?php
namespace Home\Controller;
use Think\Controller;
use Think\Verify;
use Think\Model;
use Think\Page;
class TicketController extends Controller{

	public function exportexcel($data=array(),$title=array(),$fileName='report'){
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");
	
	    //创建处理对象实例
        $objPHPExcel=new \PHPExcel();

	    //设置表头
        $key = ord("A");
        //print_r($headArr);exit;
        foreach($title as $v){
            $colum = chr($key);
		    $objPHPExcel->getActiveSheet()->getColumnDimension($colum)->setAutoSize(true); 
			//$objPHPExcel->getActiveSheet()->getColumnDimension($colum)->setWidth(30); 
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }
	
		$column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();

        //print_r($data);exit;
		$fontWidth = $objPHPExcel->getDefaultStyle()->getFont()->getSize();
		//$fontWidth = 5;
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
				$objActSheet->setCellValueExplicit($j.$column);
                $objActSheet->setCellValue($j.$column, $value);
				//获取该列当前宽度，与字符串比较，如果字符串比较长，修改该列宽度
				$width = $objActSheet->getColumnDimension($colum)->getWidth();
				$nowWidth = strlen($value)*$fontWidth;
				if($nowWidth > $width)
					$objActSheet->getColumnDimension($colum)->setWidth($nowWidth); 
                $span++;
            }
            $column++;
        }

        //$fileName = iconv("utf-8", "gb2312", $fileName);
		$date = date("Y_m_d",time());
        $fileName .= "_{$date}.xls";
        //重命名表
        //$objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
		//$objPHPExcel->setActiveSheetIndex(0)->calculateColumnWidths(true);
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
		
		exit;
 	}

 	public function download(){

 		$startdate=$_GET['startDate'];//date("Y-m-d");
 		$enddate=$_GET['endDate'];//date("Y-m-d",strtotime("+1 day"));

		$sql = "SELECT booktic_id,car_id,booktic_Name,booktic_tel,booktic_num,car_time,
	            S.place_name start_add,E.place_name end_add
	            from booktic,car,place S,place E
	            where booktic_car = car_id 
	            and car_time > '".$startdate."'
	            and car_time < '".$enddate."'
	            and car_startP = S.place_id 
	            and car_endP = E.place_id
	            order by car_time";
 		//查询
		$Model = new Model();
		$requests=$Model->query($sql);
        //设置标题
		$title = array(0=>'订单号',1=>'车ID',2=>'姓名', 3=>'手机',4=>'上车人数', 5=>'上车时间',6=>'起点',7=>'终点');
		$result=$this->exportexcel($requests,$title,"订单表");

		if($result == "false"){
			$this->error("导出失败");
		}else{
			$this->success("导出成功");
		}
 	}
	public function checkToday(){
		$Admin = A('Admin');
		$Admin->checkLegal();

		$day = intval($_GET['day']);


		$startdate=date("Y-m-d");
		

		$sql = "SELECT booktic_id,car_id,booktic_Name,booktic_tel,booktic_num,car_time,
	            S.place_name start_add,E.place_name end_add
	            from booktic,car,place S,place E
	            where booktic_car = car_id 
	            and car_time > '".$startdate."'
	            and car_startP = S.place_id 
	            and car_endP = E.place_id
	            order by car_time"
	            ;

		$Model = new Model();
		$requests = $Model->query($sql);

		$count=count($requests);
        $Page= new Page($count,NUM_PER_PAGE);
        $index=(intval($_GET['p'])-1)*NUM_PER_PAGE;

        $sql.=" limit ".$index.",".NUM_PER_PAGE." ";//加上分页效果

        $requests = $Model->query($sql);
        $show=$Page->show();


        $enddate="2150-05-05";
        $html = '
        <input value="'.$startdate.'" type="hidden" id="startTime">
        <input value="'.$enddate.'" type="hidden" id="endTime">
        ';
        $this->assign("title","今天及今天之后");
        $this->assign("show",$show);
        $this->assign("requests",$requests);
        $this->assign("snow",$html);
		$this->display("checkRes");
	}
	
	public function checkPast(){
		$Admin = A('Admin');
		$Admin->checkLegal();

		$day = intval($_GET['day']);
		$enddate=date("Y-m-d");
		

		$sql = "SELECT booktic_id,car_id,booktic_Name,booktic_tel,booktic_num,car_time,
	            S.place_name start_add,E.place_name end_add
	            from booktic,car,place S,place E
	            where booktic_car = car_id 
	            and car_time < '".$enddate."'
	            and car_startP = S.place_id 
	            and car_endP = E.place_id
	            order by car_time"
	            ;

		$Model = new Model();
		$requests = $Model->query($sql);

		$count=count($requests);
        $Page= new Page($count,NUM_PER_PAGE);
        $index=(intval($_GET['p'])-1)*NUM_PER_PAGE;

        $sql.=" limit ".$index.",".NUM_PER_PAGE." ";//加上分页效果

        $requests = $Model->query($sql);
        $show=$Page->show();

        $startdate="1949-10-01";
        $html = '
        <input value="'.$startdate.'" type="hidden" id="startTime">
        <input value="'.$enddate.'" type="hidden" id="endTime">
        ';
        $this->assign("title","处理过期票");
        $this->assign("show",$show);
        $this->assign("requests",$requests);
        $this->assign("snow",$html);
		$this->display("checkRes");
	}

	public function checkRes(){
		$Admin = A('Admin');
		$Admin->checkLegal();

		$day = intval($_GET['day']);

		
		if(isset($_POST['startTime'])){//第一次post数据
			$startdate=$_POST['startTime'];
            $enddate=$_POST['endTime'];
            if($startdate == ""){
            	session("startdate",null);//清空查询
            }else{
            	session("startdate",$startdate);
            }
            if($enddate == ""){
            	session("enddate",null);//清空查询
            }else{
            	session("enddate",$enddate);
            }
        }

        if(session('startdate') != null){//翻页，保存了Post数据
        	$startdate = session('startdate');
        } 
        if(session('enddate') != null){//翻页，保存了Post数据
        	$enddate = session('enddate');
        }

        if(session('startdate') != null && session('enddate') != null){
        	$sql = "SELECT booktic_id,car_id,booktic_Name,booktic_tel,booktic_num,car_time,
	                S.place_name start_add,E.place_name end_add
	                from booktic,car,place S,place E
	                where booktic_car = car_id 
	                and car_time > '".$startdate."'
	                and car_time < '".$enddate."'
	                and car_startP = S.place_id 
	                and car_endP = E.place_id
	                order by car_time";
	                }else if(session('startdate') == null && session('enddate') == null){
		    $sql = "SELECT booktic_id,car_id,booktic_Name,booktic_tel,booktic_num,car_time,
	                S.place_name start_add,E.place_name end_add
	                from booktic,car,place S,place E
	                where booktic_car = car_id 
	                and car_startP = S.place_id 
	                and car_endP = E.place_id
	                order by car_time";
	                }else if(session('startdate') != null && session('enddate') == null){
	        $sql = "SELECT booktic_id,car_id,booktic_Name,booktic_tel,booktic_num,car_time,
	                S.place_name start_add,E.place_name end_add
	                from booktic,car,place S,place E
	                where booktic_car = car_id 
	                and car_time > '".$startdate."'
	                and car_startP = S.place_id 
	                and car_endP = E.place_id
	                order by car_time";
	                }else if(session('startdate') == null && session('enddate') != null){
	       $sql = "SELECT booktic_id,car_id,booktic_Name,booktic_tel,booktic_num,car_time,
	                S.place_name start_add,E.place_name end_add
	                from booktic,car,place S,place E
	                where booktic_car = car_id 
	                and car_time < '".$enddate."'
	                and car_startP = S.place_id 
	                and car_endP = E.place_id
	                order by car_time";
	                }

		//$startdate=date("Y-m-d");
		//$enddate=date("Y-m-d",strtotime("+1 day"));
		/*
and car_time > '".$startdate."'
and car_time < '".$enddate."'
*/
		

		$Model = new Model();
		$requests = $Model->query($sql);

		$count=count($requests);
        $Page= new Page($count,NUM_PER_PAGE);
        $index=(intval($_GET['p'])-1)*NUM_PER_PAGE;

        $sql.=" limit ".$index.",".NUM_PER_PAGE." ";//加上分页效果

        $requests = $Model->query($sql);
        $show=$Page->show();

		$this->assign("title","全部订票");
        $this->assign("show",$show);
        $this->assign("requests",$requests);
        $this->assign("snow",$sql);
		$this->display();

	}

	
	public function delete(){
		$Admin = A('Admin');
		$Admin->checkLegal();

		$booktic = M('booktic');

		if(isset($_GET['id'])){
			$_POST['id']=$_GET['id'];
		}
		
		foreach($_POST as $i=>$id){
			$data[]=$id;
		}

		//生成 条件语句
		if(is_array($data)){
           $where = 'booktic_id in('.implode(',',$data).')';
       	}else{
           $where = 'booktic_id='.$data;
       	}

       	$result = $booktic->where($where)->delete();
	   
	   if($result !== false){//更新成功
			$count=count($_POST);
			$successText='删除'.$count.'条数据'.$where.'成功';
			$this->success($successText);
		}else{
			$this->error('删除前 '.$result.'数据成功,但删除后面的失败');
			return ;
		}

	}
	
	public function deletePass(){
		$Admin = A('Admin');
		$Admin->checkLegal();

		$enddate=date("Y-m-d");
		
		$sql = "SELECT booktic_id,car_id,booktic_Name,booktic_tel,booktic_num,car_time,
	            S.place_name start_add,E.place_name end_add
	            from booktic,car,place S,place E
	            where booktic_car = car_id 
	            and car_time < '".$enddate."'
	            and car_startP = S.place_id 
	            and car_endP = E.place_id
	            order by car_time"
	            ;

		$Model = new Model();
		$requests = $Model->query($sql);

		$booktic = M('booktic');
		
		//据说这么删除比较效率，不用多次访问数据库
		
		//转化为一维数组
		foreach($requests as $i=>$id){
			$data[]=$id['booktic_id'];
		}
		//生成 条件语句
		if(is_array($data)){
           $where = 'booktic_id in('.implode(',',$data).')';
       }else{
           $where = 'booktic_id='.$data;
       }
	   $result = $booktic->where($where)->delete();
	   
	   if($result !== false){//更新成功
				
			}else{
				$this->error('删除前 '.$result.'数据成功,但删除后面的失败');
				return ;
			}
        /*
		foreach($requests as $i=>$id){
			$data['booktic_id']=$id['booktic_id'];
			//$booktic->where($data)->delete();

			if($result !== false){//更新成功
				$str.=$id['booktic_id']." ";
				continue;
			}else{
				$this->error('删除'.$str.'成功,但删除'.$id['booktic_id'].'失败');
				return ;
			}
		}
		$successText='删除'.$str.'成功';
		*/
		$count=count($requests);
		$successText='删除'.$count.'条数据'.$where.'成功';
		$this->success($successText);		
	}
}