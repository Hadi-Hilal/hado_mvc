<?PHP

class Forms
{

    var $html;
    var $method;
    var $action;
    var $onsubmit;
    var $FormName;
    var $enctype;
    var $className;
    var $lang;
    var $dir;
    var $align;

    function __construct($Method = "POST", $enctype = false, $name = '', $action = '', $onsubmit = '', $langauge = 'ar')
    {
        switch ($langauge) {
            case 'en':
            case 'fr':
                $this->lang = "fr";
                $this->dir = "ltr";
                $this->align = "left";
                break;

            case 'ar':
            default:
                $this->lang = "ar";
                $this->dir = "rtl";
                $this->align = "right";
                break;
        }

        $this->method = $Method;
        $this->enctype = ($enctype) ? "enctype='multipart/form-data'" : "";
        $this->FormName = (strlen($name) > 0) ? " name=$name " : "";
        $this->action = (strlen($action) > 0) ? " action=$action " : "";
        $this->onsubmit = (strlen($action) > 0) ? " onsubmit=\"$onsubmit\" " : "";
    }

    function SetAtt($classname)
    {
        $this->className = $classname;
    }

    function AddTitle_label($title)
    {
        $this->html .= '
		    <div class="portlet box green"><div class="portlet-title">
                                    <div class="caption" style="float:' . $this->align . '">
                                        <i class="fa fa-comments"></i>' . $f . ' </div>
                                    <div class="tools">
                                        <a title="" data-original-title="" href="javascript:;" class="collapse"> </a>
                                        <a title="" data-original-title="" href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a title="" data-original-title="" href="javascript:;" class="reload"> </a>
                                        <a title="" data-original-title="" href="javascript:;" class="remove"> </a>
                                    </div>
                                </div>
                                </div>
		    ';
    }

    function AddTitle($title, $icon = 'icon-social-dribbble')
    {
        $this->html .= '<div class="portlet-title">
                                    <div class="caption" style="float:' . $this->align . '">
                                        <i class="' . $icon . ' font-green"></i>
                                        <span class="caption-subject font-green bold uppercase">' . $title . '</span>
                                    </div>
                                    <!--<div class="actions">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-wrench"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>-->
                                </div>';
    }

    function AddCheckBox($title, $name, $value, $check, $req = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }

        $checked = ($check) ? "checked" : "";
        $this->html .= '<div class="form-group"  ><label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
							<div style="clear:both"></div><label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
							    <input class="control-label"  type="checkbox" name="' . $name . '" value="' . $value . '" ' . $checked . ' ' . $validate . '>
							        </div>';
    }

    function AddNote($title, $value)
    {
        $this->html .= '<div style="float:' . $this->align . '"><b>' . $title . '</b> : ' . $value . '</div>';
    }
    function AddButton($value)
    {
        $this->html .= '<div style="float:' . $this->align . '" > ' . $value . '</div>';
    }

    function AddCheckBoxs($title, $name, $array, $selectArray, $req = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }

        $this->html .= '<div class="form-group"  >
		    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
							<div style="clear:both"></div>';
        while (list($key, $val) = each($array)) {
            $checked = ($selectArray[$key]) ? "checked" : "";
            $this->html .= '		<input class="control-label"  type="checkbox" name="' . $name . '[]" value="' . $key . '" ' . $checked . '>' . $val . '<br>';
        }
        $this->html .= '</div>';
    }

    function startCheckGroub($title, $req = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
        } else {
            $star =  "";
        }

        $this->html .= '<div class="form-group form-md-checkboxes">
                                            <label>' . $title . $star . '</label>
                                            <div class="md-checkbox-inline">';
    }

    function AddCheckBoxsMD($name, $title, $isChecked = "off", $req = false)
    {
        if ($req) {
            $validate = "required";
        } else {
            $validate = "";
        }


        $checked = ($isChecked == "on") ? "checked" : "";
        $this->html .= ' <div class="md-checkbox">
                                 <input type="checkbox" id="' . $name . '" class="md-check" name="' . $name . '" ' . $checked . '>
                                   <label for="' . $name . '">
                                   <span></span>
                                    <span class="check"></span>
                                    <span class="box"></span> ' . $title . ' </label>
                             </div>';
    }

    function endCheckGroub()
    {
        $this->html .= '</div></div>';
    }


    function AddRadioButton($title, $name, $value, $check, $req = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }

        $checked = ($check) ?  "checked" : "";
        $this->html .= '<div class="form-group"  ><label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
							<div style="clear:both"></div><label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
					<input class="control-label"  type="radio" name="' . $name . '" value="' . $value . '" ' . $checked . ' ' . $validate . '>
					    </div>';
    }

    function AddRadioButtons($title, $name, $array, $selectArray)
    {
        $this->html .= '<div class="form-group" ><label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
							<div style="clear:both"></div>';
        $this->html .= '		<div class="icheck-inline">';

        while (list($key, $val) = each($array)) {
            $checked = ($selectArray == $key) ? "checked" : "";
            $this->html .= '	<label><input class="icheck" data-radio="iradio_square-grey"  type="radio" name="' . $name . '" value="' . $key . '" ' . $checked . ' >' . $val . '</label>';
        }
        $this->html .= '	</div>';
        $this->html .= '</div>';
    }
    function AddDropDownBox($title, $name, $array, $selectedid, $req = false, $multiple = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }

        $multiple = ($multiple) ? "multiple" : "";
        $this->html .= '
							<div  class="form-group" >
							    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
                                <div style="clear:both"></div>
							    <select   class="form-control " name="' . $name . '" ' . $multiple . ' ' . $validate . '>';
        while (list($key, $val) = each($array)) {
            $selected = ($key == $selectedid) ? "selected" : "";
            $this->html .= '	<option value="' . $key . '" ' . $selected . '>' . $val . '</option>';
        }
        $this->html .= '		</select></div>';
    }
    function AddInlineDropDownBox($title, $name, $array, $selectedid, $req = false, $multiple = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }

        $multiple = ($multiple) ? "multiple" : "";
        $this->html .= '
							<div  class="form-group inline-block" >
							    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
                                <div style="clear:both"></div>
							    <select   class="form-control " name="' . $name . '" ' . $multiple . ' ' . $validate . '>';
        while (list($key, $val) = each($array)) {
            $selected = ($key == $selectedid) ? "selected" : "";
            $this->html .= '	<option value="' . $key . '" ' . $selected . '>' . $val . '</option>';
        }
        $this->html .= '		</select></div>';
    }

    function AddDropDownBoxMulti($title, $name, $array, $selectedArr, $req = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }

        //echo $selectedArr;
        $selectedArr = explode(',', $selectedArr);
        //print_r($selectedArr);

        $this->html .= '
		<div  class="form-group" >
							    <label for="' . $name . '" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
                                <div style="clear:both"></div>
		<div class="input-group select2-bootstrap-append">
		<select id="' . $name . '" name="' . $name . '[]" class="form-control select2" multiple ' . $validate . '>
			<option></option>';

        while (list($key, $val) = each($array)) {
            $selected = (in_array($key, $selectedArr)) ? "selected" : "";

            $this->html .= '	<option value="' . $key . '" ' . $selected . '>' . $val . '</option>';
        }
        $this->html .= '</select>
		<span class="input-group-btn">
			<button class="btn btn-default" type="button" data-select2-open="' . $name . '">
				<span class="glyphicon glyphicon-search"></span>
			</button>
		</span>
	</div>
	</div>';
    }

    function ReturnDropDownBox($title, $name, $array, $selectedid, $multiple = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }

        $multiple = ($multiple) ? "multiple" : "";
        $html = '<div  class="form-group" >
		    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
        <div style="clear:both"></div>
		        <select class="form-control" name="' . $name . '" ' . $multiple . ' >';
        while (list($key, $val) = each($array)) {
            $selected = ($key == $selectedid) ? "selected" : "";
            $html .= '		<option value="' . $key . '" ' . $selected . '>' . $val . '</option>';
        }
        $html .= '		</select></div>';
        return $html;
    }

    function AddTextkBox($title, $name, $value, $req = false, $note = '')
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }

        $this->html .= '
        <div class="form-group">
		    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . ' </label>
        <div style="clear:both"></div>
         <div class="input-icon right">
          <i class="fa"></i>
        <input class="form-control " type="text" name="' . $name . '" value="' . $value . '"  ' . $validate . ' placeholder="' . $title . '"> ' . $note . '
           </div> </div>';
    }

    function AddPassword($title, $name, $value, $note = '', $req = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }

        $this->html .= '<div class="form-group">
			    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
			        <div style="clear:both"></div>
			        <div style="clear:both"></div> <input type="password" name="' . $name . '" value="' . $value . '" ' . $validate . ' placeholder="' . $title . '">
			            </div>';
    }

    function AddTextArea($title, $name, $value, $wysiwyg = true, $req = false, $note = '')
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }

        if ($wysiwyg) {
            $this->html .= '<div class="form-group">
			    <label for="' . $name . '" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
			        <div style="clear:both"></div>
			        <textarea class="editme" rows="5" name="' . $name . '"  id="' . $name . '" cols="30"  ' . $validate . '>' . $value . '</textarea><br>' . $note . '
			            </div>';
        } else {
            $this->html .= '<div class="form-group">
			    <label for="' . $name . '" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
			        
			        <textarea class="form-control" rows="' . $rows . '" name="' . $name . '"  id="' . $name . '" placeholder="' . $title . '" cols="' . $cols . '"  ' . $validate . '>' . $value . '</textarea><br>' . $note . '
			            </div>';
        }
    }


    function AddFileUpload($title, $name, $curfile = '', $required = false, $note = '') //, $req = false
    {
        global $cat, $id;
        $file = '';

        if ($required) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }

        if (file_exists($curfile)) {
            $size = getimagesize($curfile);
            if ($size[2] == 1 || $size[2] == 2 || $size[2] == 3) {
                $w = ($size[0] > 200) ? 200 : $size[0];
                $h = ($w / $size[0]) * $size[1];
                $file = "<br><img border=\"0\" src=\"$curfile\" width=\"$w\" height=\"$h\">";
            } elseif ($size[2] == 4) {
                $w = ($size[0] > 500) ? 500 : $size[0];
                $h = ($w / $size[0]) * $size[1];
                $file = "<br><embed src=\"$curfile\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" name=\"obj1\" width=\"$w\" height=\"$h\">";
            } else {
                $file = "<br><a href=\"$curfile\">الملف الحالي</a>";
            }
            $file .= "<div class=\"fileinput fileinput-new\" data-provides=\"fileinput\">
                    <div class=\"input-group input-large\">
                    <a href=\"admin.php?op=rimg$cat&fn=$name&id=$id\" data-dismiss=\"fileinput\"> إزالة الملف </a>
             <!-- <a href=\"?op=rimg$cat&fn=$name&id=$id\">إزالة الملف</a>-->
			</div></div>";
        }
        $this->html .= "
		     		    <div class=\"form-group\">
			    <label for=\"default\" class=\"control-label\" style=\"float:" . $this->align . "\">" . $title . $star . "</label>
			        <div style=\"clear:both;margin-top:\"></div>
			            <div class=\"fileinput fileinput-new\" data-provides=\"fileinput\">
                                                        <div class=\"input-group input-large\">
                                                            
                                                           
                                                               
                                                                <input id=\"$name\" name=\"$name\" type=\"text\" value='$curfile' readonly $validate/>
		              <a href=\"javascript:;\" onclick=\"moxman.browse({fields : '$name', relative_urls : false});\" class=\"btn btn-primary\"><i class=\"fa fa-upload\"></i></a>  <i>" . $note . '</i> ' . $file . "
                                                           <!-- <a href=\"javascript:;\" class=\"input-group-addon btn red fileinput-exists\" data-dismiss=\"fileinput\"> إزالة </a>-->
                                                        </div>
			          
			           </div> ";
    }

    function AddFileUpload_STOP($title, $name, $curfile = '', $required = false, $cat1 = '') //, $req = false
    {
        global $cat, $id;
        $file = '';
        if (file_exists($curfile)) {
            $size = getimagesize($curfile);
            if ($size[2] == 1 || $size[2] == 2 || $size[2] == 3) {
                $w = ($size[0] > 500) ? 500 : $size[0];
                $h = ($w / $size[0]) * $size[1];
                $file = "<br><img border=\"0\" src=\"$curfile\" width=\"$w\" height=\"$h\">";
            } elseif ($size[2] == 4) {
                $w = ($size[0] > 500) ? 500 : $size[0];
                $h = ($w / $size[0]) * $size[1];
                $file = "<br><embed src=\"$curfile\" pluginspage=\"http://www.macromedia.com/go/getflashplayer\" type=\"application/x-shockwave-flash\" name=\"obj1\" width=\"$w\" height=\"$h\">";
            } else {
                $file = "<br><a href=\"$curfile\">الملف الحالي</a>";
            }
            $file .= " -<div class=\"fileinput fileinput-new\" data-provides=\"fileinput\">
                    <div class=\"input-group input-large\">
                    <a href=\"?op=rimg$cat&fn=$name&id=$id\" class=\"input-group-addon btn red fileinput-exists\" data-dismiss=\"fileinput\"> إزالة الملف </a>
             <!-- <a href=\"?op=rimg$cat&fn=$name&id=$id\">إزالة الملف</a>-->
			</div></div>";
        }
        $this->html .= '
		     
		    <div class="form-group">
			    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
			        <div style="clear:both;margin-top:"></div>
			            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="input-group input-large">
                                                            <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                                <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                                <span class="fileinput-filename"> </span>
                                                            </div>
                                                            <span class="input-group-addon btn default btn-file">
                                                                <span class="fileinput-new"> إختر الملف </span>
                                                                <span class="fileinput-exists"> تبديل </span>
                                                                <input type="file" name="' . $name . '" size="20" ' . $validate . '>  ' . $file . '</span>
                                                            <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> إزالة </a>
                                                        </div>
			           ' . $curfile . '
			           </div> ';
    }

    function AddSubmitButton($name, $value, $title = "")

    {
        $this->html .= '<div class="form-group" >
							<input class="btn btn-info" type="submit" value="' . $value . '" name="' . $name . '"></div>';
    }
    function AddSubmitprint($id, $title, $url)
    {
        $this->html .= '<div class="form-group" style="float:' . $this->align . '"><a target="_blank" href="' . $url . '"><center>طباعة البيانات</center></a>
		          </div>';
    }

    function AddImage($name, $img, $title)
    {
        $this->html .= '<div class="form-group">
			    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
			        <div style="clear:both"></div><input border="0" src="' . $img . '" name="' . $name . '" type="image">
			            </div>';
    }

    function AddHiddenFields($name, $value)
    {
        $this->html .= '<div class="form-group" style="float:' . $this->align . '"><input type="hidden" name="' . $name . '" value="' . $value . '">
		    </div>';
    }

    function AddHtml($title, $value)
    {
        $this->html .= '<div class="form-group" style="float:' . $this->align . '"><b>' . $title . '</b> : ' . $value . '  
		    </div>';
    }
    function AddHtml_comm($title, $value)
    {
        $this->html .= '<div class="form-group">
			    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
				<div style="clear:both"></div>  ' . $value . '
		    </div>';
    }
    /*  new elements */
    function AddNewLine()
    {
        $this->html .= "\n<div style='clear:both'></div>";
    }
    /*  new elements & <BR>*/
    function AddNewLine_br()
    {
        $this->html .= "\n<div style='clear:both'><br></div>";
    }
    function AddNewLine_hr()
    {
        $this->html .= "\n<div style='clear:both'><br><hr><br></div>";
    }

    function AddEmail($title, $name, $value, $note = '', $req = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }
        $this->html .= '<div class="form-group">
			    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
			        <div style="clear:both"></div> <input  class="control-label" type="email" name="' . $name . '" value="' . $value . '"  ' . $validate . ' placeholder="' . $title . '"> ' . $note . '
			            </div>';
    }

    function AddNumber($title, $name, $value, $note = '', $min, $max, $req = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }
        $this->html .= '<div class="form-group">
			    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
			        <div style="clear:both"></div><input  class="control-label" type="number" name="' . $name . '" value="' . $value . '"  min="' . $min . '" max="' . $max . '" ' . $validate . ' placeholder="' . $title . '"> ' . $note . '
			            </div>';
    }

    function AddColor($title, $name, $value, $note = '', $req = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }
        $this->html .= '<div class="form-group">
			    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
			        <div style="clear:both"></div> <input  class="control-label" type="color" name="' . $name . '" value="' . $value . '" ' . $validate . '> ' . $note . '
			            </div>';
    }

    function AddRange($title, $name, $value, $note = '', $min, $max, $req = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }
        $this->html .= '<div class="form-group">
			    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
			        <div style="clear:both"></div> <input  class="control-label" type="range" name="' . $name . '" value="' . $value . '" min="' . $min . '" max="' . $max . '" ' . $validate . '> ' . $note . '
			            </div>';
    }

    function AddURL($title, $name, $value, $note = '', $req = false)
    {
        if ($req) {
            $star =  '<span class="required"> * </span>';
            $validate = "required";
        } else {
            $star = $validate = "";
        }
        $this->html .= '<div class="form-group">
			    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
			        <div style="clear:both"></div> <input  class="control-label" type="url" name="' . $name . '" value="' . $value . '" ' . $validate . ' placeholder="' . $title . '"> ' . $note . '
			            </div>';
    }

    function AddVideoPlayer($controls = "controls", $autoplay = "autoplay", $height = "", $width = "", $mp4 = "")
    {
        $this->html .= '<div class="form-group" style="float:' . $this->align . '"> <video ' . $controls . ' ' . $autoplay . ' ' . $width . ' ' . $height . '>
  <source src="' . $mp4 . '" type="video/mp4">
  Your browser does not support HTML5 video.
</video> </div>';
    }

    function AddAudioPlayer($controls = "controls", $autoplay = "autoplay", $mp3 = "")
    {
        $this->html .= '<div class="form-group" style="float:' . $this->align . '"> <audio ' . $controls . ' ' . $autoplay . '>
  <source src="' . $mp3 . '" type="audio/mp3">
  Your browser does not support the audio tag.
</audio> </div>';
    }

    function AddImg($src, $width, $heigth, $alt, $title)
    {
        $this->html .= '\n<div class="form-group" style="float:' . $this->align . '"><img src="" width="" heigth="" alt="" title=""></div>';
    }

    function AddIFrame($src, $width, $heigth, $name)
    {
        $this->html .= '<div class="form-group" style="float:' . $this->align . '"><iframe src="' . $src . '" name="' . $name . '" width="' . $width . '" heigth="' . $height . '" sandbox="allow-same-origin"></iframe></div>';
    }

    //  function AddDate( $name, $value)
    function AddDate($title, $name, $value, $note = '', $id = '')
    {
        $cur_date = date('d-m-Y');
        $this->html .= '<div class="form-group">
			    <label for="default" class="control-label" style="float:' . $this->align . '">' . $title . $star . '</label>
			        <div style="clear:both"></div>
			            
			            <div class="input-group input-medium date date-picker" data-date="$cur_date" data-date-format="yyyy-mm-dd" data-date-viewmode="years">
                                                        <input type="text" class="form-control" name="' . $name . '" value="' . $value . '" readonly>
                                                        <span class="input-group-btn">
                                                            <button class="btn default" type="button">
                                                                <i class="fa fa-calendar"></i>
                                                            </button>
                                                        </span>
                                                    </div>
			            
			            ';
    }

    function GetHtml()
    {
        if (!isset($content))
            $content = '';

        $content .= '	<form method="' . $this->method . '" ' . $this->enctype . ' ' . $this->FormName . ' role="form" id="form_sample_2">
					 <div class="portlet light bordered" >
                     <div class="alert alert-danger display-hide">
                                                <button class="close" data-close="alert"></button> لديك بعض الحقول المطلوبة الرجاء التاكد من تعبئة كامل الحقول المطلوبة </div>
                                            <div class="alert alert-success display-hide">
                                                <button class="close" data-close="alert"></button> تم التحقق من ادخالاتك بنجاح </div>
							';
        $content .= $this->html;
        $content .= '			
						</div>
					</form>';
        return $content;
    }
}
