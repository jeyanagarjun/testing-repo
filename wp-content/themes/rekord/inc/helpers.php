<?php
/**
 *  Helper functions
 *
 *  @author    xvelopers
 *  @package   rekord
 *  @version   1.3.8
 *  @since     1.3.8
 */

function input($arg=[]){
    $type= !empty($arg['type']) ? $arg['type']: 'text'; 
    $required =  $required_lebel ='';
    if(isset($arg['required']) && $arg['required']){
        $required= $arg['required'];
        $required_lebel = '<span class="text-primary">*</span>';
    }
    $size ='';
    if(isset($arg['size']))
     $size = $arg['size'];

echo '<div class="form-group form-float">
        <div class="form-line">
        <label class="form-label" for="'.$arg['name'].'">'. __($arg['label'], 'rekord') .'
        '.$required_lebel.'   
        </label>
        <input class="form-control"
         name="'.$arg['name'].'" 
         size="'. $size.'" 
         type="'. $type.'" 
         value="'. $arg['value'].'" 
         '.  $required. '
         />
        </div>
        </div>';
}

function textarea($label,$name,$value,$placeholder=''){
    echo '<div class="form-group">
        <div class="form-line">
            <label for="'.$name.'">'. __($label, 'rekord') .'</label>
        
    <textarea id="comment" placeholder="'.$placeholder.'" class="form-control r-0" name="'.$name.'"  cols="45" rows="3">'.$value.'</textarea>
            </div>
        </div>';
}



  //Paid membership pro
  
function pmpro_getAllLevelsList(){
    $reordered_levels =[];
    if(class_exists('PMPro_Membership_Level')){
        $pmpro_levels = pmpro_getAllLevels(false, true);
            foreach($pmpro_levels as $key=>$level) {
                $reordered_levels[$level->id] = $level->name;
            }
    }
    return $reordered_levels;
}
  
function rekord_canAccess($key){
if(!rekord_get_field($key) || !class_exists('PMPro_Membership_Level') ) return true;
return (class_exists('PMPro_Membership_Level') && pmpro_hasMembershipLevel(rekord_get_field($key)));
}
