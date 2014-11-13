<?php
  		$data = "";
  		
		if($_POST) {
			foreach($_POST as $key => $val){ 
				$data[$key] = "$val";

				$val2 = base64_encode_url($val);
				$etc_var[] = "{$key}_{$val2}";
			}
			$etc = implode("/",$etc_var);
		} else {
			if($this->uri->segment($base_segment+1,0)) {
				for ($i=1; $i<100; $i++) { 
					if($this->uri->segment($base_segment+$i)) {
						$url_var = explode("_",$this->uri->segment($base_segment+$i)); 

						$data[$url_var[0]] = base64_decode_url($url_var[1]);
						$etc_var[] = "{$url_var[0]}_{$url_var[1]}";
					}
					else
					{
						break;
					}
				}
				$etc = implode("/",$etc_var);
			} else {
				$data['key'] = '';
				$data['keyword'] = '';
				$etc = "";
			}
		}
		
		if(!$this->uri->segment($base_segment)) {
			$data['page'] = $page = 1; 
		} else {
			$data['page'] = $page = $this->uri->segment($base_segment,0); 
		}
		
		//회원리스트와 게시판 리스트가 db테이블 명칭이 달라서 아래 소스 추가
		if(isset($this->id)){
			$table = $this->id;
		}elseif(isset($this->table)){
			$table = $this->table;	
		}
        //회원 숫자(찾는데 시간걸렸음)
		$data['total_record'] = $total_record = $this->db->count_all($table); 
		$data['total_page'] = $total_page = ceil($total_record / $page_view); 
		$start_idx = ($page - 1) * $page_view; 
		///////////////
		// 순서 정의
		$seq = ($total_page * $page_view) - ($page_view * ($page - 1)); 
		$remain = ($page_view - $total_record%$page_view); 
		if ($remain != $page_view) 
		{$seq -= $remain;} 
		$data['idx'] = $seq;
		// 페이징 만들기
        $prev_page = $page - 1;     
        $next_page = $page + 1; 
		$first_page = ((integer)(($page-1)/$page_per_block) * $page_per_block) + 1; 
        $last_page = $first_page + $page_per_block - 1; 
        if ($last_page > $total_page) 
            $last_page = $total_page; 	
		$page_var[] = "<a href='$base_url/1/$etc'>[맨앞]</a>&nbsp;";
		if($page>1) {
			$page_var[] = "<a href='$base_url/$prev_page/$etc'>◀</a>";
		}
		for ($i=$first_page;$i<=$last_page;$i++):
			if($page == $i) { $bold_s = "<b>"; $bold_e = "</b>"; } else { $bold_s = ""; $bold_e = ""; }
			$page_var[] = "<a href='$base_url/$i/$etc'>$bold_s $i $bold_e</a>";
		endfor;
		if($page < $total_page){
			$page_var[] = "<a href='$base_url/$next_page/$etc'>▶</a>";
		}
		$page_var[] = "&nbsp;<a href='$base_url/$total_page/$etc'>[맨뒤]</a>";
		$data['pagenum'] = implode("",$page_var); 
		// 폼 - 정의
		
		$data['act_url'] = $base_url;
?>