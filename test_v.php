<?php 
session_start();
	ob_start();
	//include 'redirect/redirect.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Greatmoods Programs</title>
		<link rel="stylesheet" type="text/css" href="css/mainStyles.css">
		
		<script src="js/loadXMLDoc.js"></script>
		<style type="text/css">
			#headerTop{
				background: no-repeat;
				background-position:right top;
				width:1024px;
				height:130px;
				padding:0;
				margin:0;
				position:relative;
				z-index:3;
				}
			#content{
				width:700px;
				margin:0px 0 50px 0;
				padding:0px 0px 50px 0px;
				float:right;
				position:relative;
				top:-50px;
				}
			#leadImg{
				position:relative;
				top:-125px;
				right:150px;
				float:right;
				}
			#logout {
				position: absolute;
				right: 8px;
			}
			.school {
				
			}
			.hidden {
				display: none;
			}
			.unhidden {
				display: block;
			}
			.collapsible,
.page_collapsible,
.accordion {
	margin: 0;
    padding:10px;
    height:20px;

 	border-top:#f0f0f0 1px solid;
    background: #cccccc;

	font-family: Arial, Helvetica, sans-serif;
    text-decoration:none;
    text-transform:uppercase;
    color: #000;
    font-size:1em;
}
.accordion-open,
.collapse-open {
	background:#000;
	color: #fff;
}
.accordion-open span,
.collapse-open span {
	display:block;
	float:right;
	padding:10px;
}
.accordion-open span,
.collapse-open span {
	background:url(../images/minus.png) center center no-repeat;
}
.accordion-close span,
.collapse-close span {
	display:block;
	float:right;
	background:url(../images/plus.png) center center no-repeat;
	padding:10px;
}
div.container {
	padding:0;
	margin:0;
}
div.content {
	background:#f0f0f0;
	margin: 0;
    padding:10px;
	font-size:.9em;
	line-height:1.5em;
	font-family:"Helvetica Neue", Arial, Helvetica, Geneva, sans-serif;
}
div.content ul, div.content p {
	padding:0;
	margin:0;
	padding:3px;
}
div.content ul li {
	list-style-position:inside;
	line-height:25px;
}
div.content ul li a {
	color:#555555;
}
code {
	overflow:auto;
}

pre code {
  display: block; padding: 0.5em;
  color: #000;
  background: #fff;
}

pre .subst,
pre .title {
  font-weight: normal;
  color: #000;
}

pre .comment,
pre .template_comment,
pre .javadoc,
pre .diff .header {
  color: #808080;
  font-style: italic;
}

pre .annotation,
pre .decorator,
pre .preprocessor,
pre .doctype,
pre .pi,
pre .chunk,
pre .shebang,
pre .apache .cbracket {
  color: #808000;
}

pre .tag,
pre .pi {
}

pre .tag .title,
pre .id,
pre .attr_selector,
pre .pseudo,
pre .literal,
pre .keyword,
pre .hexcolor,
pre .css .function,
pre .ini .title,
pre .css .class,
pre .list .title,
pre .tex .command {
  font-weight: bold;
  color: #000080;
}

pre .attribute,
pre .rules .keyword,
pre .number,
pre .date,
pre .regexp,
pre .tex .special {
  font-weight: bold;
  color: #0000ff;
}

pre .number,
pre .regexp {
  font-weight: normal;
}

pre .string,
pre .value,
pre .filter .argument,
pre .css .function .params,
pre .apache .tag {
  color: #008000;
  font-weight: bold;
}

pre .symbol,
pre .ruby .symbol .string,
pre .ruby .symbol .keyword,
pre .ruby .symbol .keymethods,
pre .char,
pre .tex .formula {
  color: #000;
  background: #d0eded;
  font-style: italic;
}

pre .phpdoc,
pre .yardoctag,
pre .javadoctag {
  text-decoration: underline;
}

pre .variable,
pre .envvar,
pre .apache .sqbracket,
pre .nginx .built_in {
  color: #660e7a;
}

pre .addition {
  background: #baeeba;
}

pre .deletion {
  background: #ffc8bd;
}

pre .diff .change {
  background: #bccff9;
}
		</style>
		
		
		
		
		

<script type="text/javascript" src="js/jquery-1.6.1.min.j"></script>	
<script type="text/javascript" src="js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="js/jquery.collapsible.js"></script>
<script type="text/javascript" src="js/highlight.pack.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

	//syntax highlighter
	hljs.tabReplace = '    ';
	hljs.initHighlightingOnLoad();

	//collapsible management
	$('.collapsible').collapsible({
		defaultOpen: 'section1',
		cookieName: 'nav'
	});
	$('.page_collapsible').collapsible({
		defaultOpen: 'body-section1',
		cookieName: 'body'
	});

	//assign open/close all to functions
	function openAll() {
		$('.page_collapsible').collapsible('open');
	}
	function closeAll() {
		$('.page_collapsible').collapsible('close');
	}

	//listen for close/open all
	$('#closeAll').click(function(event) {
		event.preventDefault();
		closeAll();

	});
	$('#openAll').click(function(event) {
		event.preventDefault();
		openAll();

	});

});
</script>
	</head>
    <body>
	  <div id="container">
		<?php include 'header.php' ; ?>
			<?php include 'mainLeftSidebar.php' ; ?>
         		<div id="content">
                    
         
        <h3 class="collapsible" id="section1">Heading<span></span><h3>
<div class="container">
    <div class="content">
        <h3>Sample Content</h3>
        <p>Content here....</p>
    </div>
</div>
<h3 class="collapsible" id="section2">Heading<span></span><h3>
<div class="container">
    <div class="content">
        <h3>Sample Content</h3>
        <p>Content here....</p>
    </div>
</div>
<h3 class="collapsible" id="section3">Heading<span></span><h3>
<div class="container">
    <div class="content">
        <h3>Sample Content</h3>
        <p>Content here....</p>
    </div>
</div>
         
         
         
				</div><!--end content-->
			<?php include 'footer.php' ; ?>
</div><!--end container-->

</body>
</html>
<? ob_end_flush(); ?>



























