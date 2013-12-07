<?php

/* TODO: Add code here */
require('config/globalconfig.php');
include_once('class/model_articletype.php');
include_once('class/model_article.php');
include_once('class/model_user.php');

$objArticleType = new model_ArticleType($objConnection);
$objArticle = new model_Article($objConnection);
$arrCategory =  $objArticleType->getAllArticleType();

$objUser = new Model_User($objConnection);

if ($_pgR["act"] == Model_User::ACT_LOGIN)
{
	
}

?>

<?php
include_once('include/_header.inc');
/*include_once('include/_menu.inc');
include_once('include/_cat_list.inc');
*/
?>
<link rel="stylesheet" type="text/css" href="css/gallery.css" />
<script src="js/ga.js" type="text/javascript"></script>
<script type="text/javascript">
   $(document).ready(function () {
    $(".item").click(function (e) {
        /*e.stopPropagation();
        $(".item").removeClass("clicked");
        $(this).toggleClass("clicked");
        $("body").addClass("showing-item");
 
        var offset = $(this).offset();
        var pos = offset.left + $(this).width()
        var center = $(".gallery").width() / 2;
        if (pos > center) {
            var align = "left";
        } else {
            var align = "right";
        }
        $(this).removeClass(".left, .right").addClass(align);
 
        return false;*/
    });
 
    $('html').click(function () {
        $(".item").removeClass("clicked");
        $("body").removeClass("showing-item");
    });
});
</script>
<style> 
#header
{
	display:none;
}
</style>
<div id="content">	
	<div class="gallery">
	  <div class="item">
		<img align="left" src="images/data//c2NAjXD.jpg">
		<span class="caption">
		  <h1>
			Tim KM
		  </h1>
		  <p>
			Tim KM
		  </p>
		</span>
	  </div>
	  <div class="item">
		<img align="left" src="images/data//FeCziip.png">
		<span class="caption">
		  <h1>
			Tim KM
		  </h1>
		  <p>
			Tim KM
		  </p>
		</span>
	  </div>
	  <div class="item">
		<img align="left" src="images/data//OYlw7Pw.jpg">
		<span class="caption">
		  <h1>
			Tim KM
		  </h1>
		  <p>
			Tim KM
		  </p>
		</span>
	  </div>
	  <div class="item">
		<img align="left" src="images/data//MVammek.jpg">
		<span class="caption">
		  <h1>
			Tim KM
		  </h1>
		  <p>
			Tim KM
		  </p>
		</span>
	  </div>
	  <div href="#" class="item">
		<img align="left" src="images/data//gfp57KR.png">
		<span class="caption">
		  <h1>
			Tim KM
		  </h1>
		  <p>
			Tim KM
		  </p>
		</span>
	  </div>
	  <div class="item">
		<img align="left" src="images/data//FeCziip.png">
		<div class="caption">
		  <h1>
			Tim KM
		  </h1>
		  <p>
			Tim KM
		  </p>
		</div>
	  </div>
	</div>
</div>


<?php 
//footer
include_once('include/_footer.inc');
?>
