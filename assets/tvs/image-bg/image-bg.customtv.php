<style>
	.mimipic_thumb{position:absolute; top:0;left:0;width:30px;height:30px; padding:2px;z-index:22;cursor:pointer;}
	.minipic_show{width:128px; height:128px; position:absolute;top:30px; background:white; padding:5px; z-index:99;    box-shadow: 0 0.2rem 2rem rgb(0 0 0 / 10%); display:none;}
	.mimipic_thumb:not(:empty):hover + .minipic_show {display:block;}	
</style>
<div class="mimipic_thumb" id="minipic_thumb_<?=$field_id?>">
	<?php if ($field_value!='') echo '<img src="./../'.$modx->runSnippet('phpthumb',array('input'=>$field_value,'options'=>'w=30,h=30,far=c,bg=FFFFFF')).'">';?>
</div>
<div class="minipic_show" id="minipic_show_<?=$field_id?>">
	<?php if ($field_value!='') echo '<img src="./../'.$modx->runSnippet('phpthumb',array('input'=>$field_value,'options'=>'w=128,h=128,far=c,bg=FFFFFF')).'">';?>
</div>

<input type="text" id="tv<?=$field_id?>" class="form-control" name="tv<?=$field_id?>" value="<?=$field_value?>" onchange="documentDirty=true;getminipic(this.value,<?=$field_id?>);" style="padding-left:36px;">
<input class="form-control" type="button" value="Вставить" onclick="BrowseServer('tv<?=$field_id?>')" style="position:absolute;top:0;right:5px;">
<script>
	if (typeof getminipic != 'function') {
		function getminipic(pic,id){
			
			var http = new XMLHttpRequest();
			http.open('HEAD', './../'+pic, false);
			http.send();		
			if ((http.status!=404) && (pic)){
				document.getElementById('minipic_thumb_'+id).innerHTML = '<img src="./../'+pic+'">';
				document.getElementById('minipic_show_'+id).innerHTML = '<img src="./../'+pic+'">';			
			} else {
				document.getElementById('minipic_thumb_'+id).innerHTML = '';
				document.getElementById('minipic_show_'+id).innerHTML = '';			
			}
		}	
	}
</script>
