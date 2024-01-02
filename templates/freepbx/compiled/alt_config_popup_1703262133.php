<?php if(!defined('IN_RAINTPL')){exit('Hacker attempt');}?><html>
    <head>
        <title>PBX Endpoint Configuration Manager</title>
        <script type="text/javascript" src="assets/js/jquery-1.7.1.min.js" language="javascript"></script>
        <script type="text/javascript" src="assets/js/jquery-ui-1.8.9.min.js" language="javascript"></script>
        <link href="assets/css/jquery-ui.css" rel="stylesheet" type="text/css">
        <link href="assets/endpointman/theme/codemirror.css" rel="stylesheet" type="text/css" />
        <link href="assets/endpointman/css/main.css" rel="stylesheet" type="text/css">
        <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
        <script type="text/javascript" src="assets/endpointman/js/codemirror.js"></script>
        <script type="text/javascript" src="assets/endpointman/js/xml.js"></script>
        <link href="assets/endpointman/theme/default.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/mainstyle.css" rel="stylesheet" type="text/css" />
        <script language="javascript">
            function Close() {
                self.close();
            }
            function submitform() {
                $('#myform').append('<input type="hidden" name="button_save" value="Save"/>');
                document.myform.submit();
                setTimeout("opener.Reload()",100);
            }
            
            /*$(document).ready(function() {
                var editor = CodeMirror.fromTextArea(document.getElementById("textarea"), {lineWrapping: true, lineNumbers: true, mode: {name: "xml", htmlMode: true}});                
            });*/
        </script>
    </head>
    <body name="alt_config_pop">
     <div id="page_body">
        <div id="spinner">
        </div>
        <h1><face="Arial"><center><?php echo _('End Point Configuration Manager')?></center></h1>
        <hr>
<?php
	if( isset($var["show_error_box"]) ){
?>
    <?php
		$tpl = new RainTPL( RainTPL::$tpl_dir . dirname("message_box"));
		$tpl->assign( $var );
				$tpl->draw(basename("message_box"));
?>
<?php
	}
?>
	<center><h4><?php echo _("File Configuration Editor For")?>: <?php echo $var["file"];?></h4>
	    <font color="red">Warning! You can really mess up your phone by messing with these settings. Potentially causing it to not boot!</font><br/>
	    <?php
	if( isset($var["location"]) && isset($var["allow_hdfiles"]) ){
?>
	    <strong>You are editing a global file. This will effect any & all phones that reference this hard file
		<br/>It is <font color="red">NOT</font> individual to this template!!!</strong><br/>
	    <i>You can setup individual templates in the "Product Configuration Editor" under "End Point Advanced Settings"</i>
	    <?php
	}
?>
	    <form name="myform" id="myform" method="post" action=""><input type="hidden" id="value" name="value" value="<?php echo $var["value"];?>" />
		<table width="90%" border="0" cellspacing="4" cellpadding="4">
		    <tr><td><div style="font-size: 14px" align="left"><?php
	if( isset($var["location"]) ){
?>File Location: <i><?php echo $var["location"];?></i><?php
	}
?></div></td></tr>
		    <tr>
			<td>
			    <label>
				<textarea name="config_text" id="textarea" cols="100"><?php
	if( isset($var["config_data"]) ){
?><?php echo $var["config_data"];?><?php
	}
?></textarea>
			    </label>
			    <br><div style="font-size: 15px">
				<label>
				    <button type="submit" name="button_save" onClick="javascript:submitform();"><i class='icon-save blue'></i> <?php echo _('Save')?></button>
                    <button type=button onClick="javascript:Close();"><i class='icon-save blue'></i> <?php echo _('Cancel')?></button>
				</label>
		    </tr>
		</table>
	    </form>
	</center>
    </div>
    </body>
</html>
