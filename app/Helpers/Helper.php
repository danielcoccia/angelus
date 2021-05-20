<?php

function getCombo($json, $nome, $required){
       
       	if($required){
       	$html = '<select class="form-control select2" name="'.$nome.'" id="'.$nome.'"  required>';	
       	}else{
        $html = '<select class="form-control select2" name="'.$nome.'" id="'.$nome.'" >';
    	}
		
		$html.= '<option  value="">Selecione</option>';
        foreach ($json as $valors ) {
            $html.= '<option  value="'.$valors->id.'">'.$valors->nome.'</option>';
        }        
        $html.= '</select>';
        return $html;
    }
