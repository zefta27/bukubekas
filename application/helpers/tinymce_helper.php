<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
function initialize_tinymce() {
$tinymce = '<script type="text/javascript" src="' . base_url() . 'tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({

theme : "advanced",
plugins : "jbimages,autolink,lists,pagebreak,style,emotions,,media,contextmenu,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,",
theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,formatselect,fontselect,fontsizeselect",
theme_advanced_buttons2 : "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,|,forecolor,backcolor,jbimages",
theme_advanced_toolbar_location : "top",
theme_advanced_toolbar_align : "left",
theme_advanced_statusbar_location : "bottom",
theme_advanced_resizing : true,
mode : "textareas",

convert_urls : false,
height: 300,
width:700
});
</script>';
return $tinymce;
 
}