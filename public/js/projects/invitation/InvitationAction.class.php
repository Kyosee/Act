<?php
/**
 * 邀请函
 */
class InvitationAction extends Action {

    public function index() {
		$this->display();
    }
	
	public function save(){
		$form1 = htmlspecialchars($this->_post('who'), ENT_QUOTES);
		$form2 = htmlspecialchars($this->_post('name'), ENT_QUOTES);
		$form3 = htmlspecialchars($this->_post('tel'), ENT_QUOTES);
		$form4 = htmlspecialchars($this->_post('company'), ENT_QUOTES);
		
		if($form1 != '' && $form2 != '' && $form3 != '' && $form4 != ''){
			$sessionid = session_id();
			$class = 'Invitation';

			$Model = M();
			$result = $Model->query('SELECT `Id` FROM `hr_form_xz` WHERE `sessionid` = "'.$sessionid.'"');
			if(!$result){
				$Model->execute('INSERT INTO `hr_form_xz`(`sessionid`,`class`,`form1`,`form2`,`form3`,`form4`) VALUES("'.$sessionid.'","'.$class.'","'.$form1.'","'.$form2.'","'.$form3.'","'.$form4.'")');
			}
		}
		
		$res["code"] = "1";
		echo json_encode($res); 
	}
}
