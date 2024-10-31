<?php
/*
Plugin Name: Post PHP
Plugin URI: http://www.chetanweb.com
Description: Post PHP codes in our wordpress post.Just Add Code In between &lt;php&gt;[code]&lt;/php&gt;
Version: 1.0
Author: Chetan H. Mendhe
Author URI: http://www.chetanweb.com	
*/
/*  Copyright 2010  Chetan H. Mendhe  (email : xtrmcoder@gmail.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//Add Filter from WP API
add_filter('the_content', 'tidyphp', '1');

function tidyphp($content)
{
//Parse all PHP Highlight request from user
preg_match_all("'<php>(.*?)</php>'isx",$content,$codex);

//Clean Commands
$content=str_replace("<php>","",str_replace("</php>","",$content));

//Watch out each code one by one

foreach($codex[1] as $code)
{
	//Highighting code using highlight_string(str,return); function 
	$newcode='<div style="background-color:ffffff;">'.highlight_string(str_replace("\n","",$code),1).'</div>';
	
	//Replace new highlighted code with old black code.
	$content=str_replace($code,$newcode,$content);
}

//return the content most easy one
return $content;
	
}
?>
