
<html>
	<head>
		<title></title>
		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' />
		<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css' />
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
		

		<style>
			.margin-center{
				margin:0 auto;
			}
			.domain-list{
				min-height:338px;
			}
			.center-align{
				text-align:center;
			}
			.go-botton{
				margin:10px;
				padding:5px 20px;
			}
			div#preview {
				min-height: 540px;
			}
			label{
				font-weight:bold;
			}
			div#source-code {
				overflow: hidden;
				word-break: break-all;
			}
			div#source-code textarea{
				height: 440px;
			}
       .innerbox{
		       height: 500px;
			   width:500px;
	   }
	   .style{
		height: 500px;
	     width:500px;
	   }

			/* fullscreeen */

        #myDiv.fullscreen{
				z-index: 9999; 
				width: 100%; 
				height: 100%; 
				position: fixed; 
				top: 0; 
				left: 0; 
 		}

#myDiv{background:#cc0000; width:500px; height:400px;}

			/* fullscreen end */
		</style>
	</head>
	<body>
		<div class='col-md-10 margin-center'>
			<div class='row' id='step-1'>
				<div  class='col-md-6'>
					<div class='center-align'><label>Domains</label></div>
					<textarea class='form-control domain-list' id='domain-list'></textarea>
					<div class='center-align'> <button class='btn btn-primary go-botton' id='go'>Go</button></div>
				</div>
				<div  class='col-md-6'>
					<div class='col-md-12'>
						<label>Offer URL :</label>
						<input type='text' class='form-control' id='offer-url' value='azertyuiop'/>
					</div>
					<div class='col-md-12'>
						<label>Offer img :</label>
						<input type='text' class='form-control' id='offer-img' value='LGT2D.png'/>
					</div>
					<div class='col-md-12'>
						<label>Offer unsubscribe :</label>
						<input type='text' class='form-control' id='offer-uns' value='qsdfghjklm'/>
					</div>
					<div class='col-md-12'>
						<label>Offer uns img :</label>
						<input type='text' class='form-control' id='offer-uns-img' value='5RvEr.png'/>
					</div>
					<div class='col-md-12'>
						<label>Server unsubscribe :</label>
						<input type='text' class='form-control' id='server-uns' value='wxcvbnn'/>
					</div>
					<div class='col-md-12'>
						<label>Server uns img :</label>
						<input type='text' class='form-control' id='server-uns-img' value='ax7jk.jpg'/>
					</div>
				</div>
			</div>
			<div class='row' id='step-2' style='display:none'>
				<div  class='col-md-12 center-align' id='pagination'><label>1/5</label></div>
				<div  class='col-md-6'>
					<div class='center-align'><label>Code Source <pre></pre></label></div>
					
					<div id='source-code'>
				      <div style="style">
					  <button id="mybtn"style="position:absolute;background-color:yellow;">Edit html</button>
           		                <textarea readonly="readonly" class='innerbox html' id="editor">  
								   
								   </textarea>
								   
						</div>
					</div>
					<div class='row' id="preview2">
						<div class='col-md-3 center-align'><button class='btn btn-primary go-botton' id='back'>Back</button></div>
						<div class='col-md-3 center-align'><button class='btn btn-primary go-botton' id='copy'>Copy</button></div>
						<div class='col-md-3 center-align'><button class='btn btn-primary go-botton' id='next'>Next</button></div>
					</div>
				</div>
				<div class='col-md-6' >
					<div class='center-align' id="preview1"><label>Preview</label></div>
					<div id='previews'>
		 				 			
					</div>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
		<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js'></script>
		<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js'></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
		<script>
			var current_domain_list = [];
			var current_index = 1;
			function generate_template(){
					var selected_domain = current_domain_list[(current_index-1)];
					selected_domain = selected_domain.replace("http://","");
					selected_domain =  selected_domain.replace("https://","");
					selected_domain =  "http://"+selected_domain;
					var count_ = 1;
					var html =html_= "<table>\n";
					//$("#source-code").html("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
						html +=html_= "<tbody>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
							html +=html_= "<tr>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
								html +=html_= "<td align='center'>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					$("#line"+count_).text(html_);
					count_++;
									html +=html_= "<a href='"+selected_domain+"/"+$("#offer-url").val()+"'>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
										html +=html_= "<img style='max-width:100%; height:auto; color:black;' border='0' src='"+selected_domain+"/"+$("#offer-img").val()+"' alt=''>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
									html +=html_= "</a>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
									html +=html_= "<br><br>\n\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
									
									html +=html_= "<a href='"+selected_domain+"/"+$("#offer-uns").val()+"'>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
										html +=html_= "<img style='max-width:100%; height:auto; color:black;' border='0' src='"+selected_domain+"/"+$("#offer-uns-img").val()+"' alt=''>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
									html +=html_= "</a>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
									html +=html_= "<br><br>\n\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
									
									html +=html_= "<a href='"+selected_domain+"/"+$("#server-uns").val()+"'>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
									html +=html_= "	<img style='max-width:100%; height:auto; color:black;' border='0' src='"+selected_domain+"/"+$("#server-uns-img").val()+"' alt=''>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
									html +=html_= "</a>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
									html +=html_= "<br><br>\n\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
								html +=html_= "</td>\n\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
							html +=html_= "</tr>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
						html +=html_= "</tbody>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					html +=html_= "</table>\n";
					//$("#source-code").append("<div id='line"+count_+"'></div>");
					//$("#line"+count_).text(html_);
					count_++;
			    $("#previews").html(html);
				$("#source-code textarea").text(html);
			}
			function setPage(){
				$("#pagination label").html(current_index+"/"+current_domain_list.length);
				generate_template();
			}
			$("#go").on("click",function(){
				var domain_list = $("#domain-list").val();
				current_domain_list = domain_list.split("\n");
				console.log(current_domain_list);
				$("#step-1").hide();
				$("#step-2").show();
				setPage();
			});
			$("#next").on("click",function(){
				if(current_index < current_domain_list.length){
					current_index++;
					setPage();
				}
			});
			$("#back").on("click",function(){
				if(current_index > 1){
					current_index--;
					setPage();
				}
			});
			$("#copy").on("click",function(){
				var range = document.createRange();
				range.selectNode(document.getElementById("previews"));
				window.getSelection().removeAllRanges(); // clear current selection
				window.getSelection().addRange(range); // to select text
				document.execCommand("copy");
				window.getSelection().removeAllRanges();
				$.toast('Copied!');
			});
            var count=0;
			// fullscreen 
			$("#mybtn").on("click",function(){
		// 		count++;
          if(count){
					function launchIntoFullscreen(element) {
					if(element.requestFullscreen) {
						element.requestFullscreen();
					} else if(element.mozRequestFullScreen) {
						element.mozRequestFullScreen();
					} else if(element.webkitRequestFullscreen) {
						element.webkitRequestFullscreen();
					} else if(element.msRequestFullscreen) {
						element.msRequestFullscreen();
					}
					
				}
		  
		launchIntoFullscreen(document.getElementById("editor"));
		document.getElementById("editor").readOnly=false;
		// 		}
		    // document.getElementById("editor").animate({ height: "20em" }, 500);
		  }
			});
				// fullscreen end

             $(function(){

			
				function gethtml(){
					var html= $('.html').val();
					
					return html;
				}
				
                $(".innerbox").on("keyup",function(){
					var html= gethtml();
					console.log(html);
					$("#previews").html(html);
				})
			});
			$(document).keyup(function(e) {
     if (e.key === "Escape") { // escape key maps to keycode `27`
		document.getElementById("editor").readOnly=true;
    }
});
		</script>

		<script>
			
        w3CodeColor(document.getElementById("editor"));

        function w3CodeColor(elmnt, mode) {
            var lang = (mode || "html");
            var elmntObj = (document.getElementById(elmnt) || elmnt);
            var elmntTxt = elmntObj.innerHTML;
            var tagcolor = "mediumblue";
            var tagnamecolor = "brown";
            var attributecolor = "red";
            var attributevaluecolor = "mediumblue";
            var commentcolor = "green";
            var cssselectorcolor = "brown";
            var csspropertycolor = "red";
            var csspropertyvaluecolor = "mediumblue";
            var cssdelimitercolor = "black";
            var cssimportantcolor = "red";
            var jscolor = "black";
            var jskeywordcolor = "mediumblue";
            var jsstringcolor = "brown";
            var jsnumbercolor = "red";
            var jspropertycolor = "black";
            elmntObj.style.fontFamily = "Consolas,'Courier New', monospace";
            if (!lang) {
                lang = "html";
            }
            if (lang == "html") {
                elmntTxt = htmlMode(elmntTxt);
            }
            if (lang == "css") {
                elmntTxt = cssMode(elmntTxt);
            }
            if (lang == "js") {
                elmntTxt = jsMode(elmntTxt);
            }
            elmntObj.innerHTML = elmntTxt;

            function extract(str, start, end, func, repl) {
                var s, e, d = "",
                    a = [];
                while (str.search(start) > -1) {
                    s = str.search(start);
                    e = str.indexOf(end, s);
                    if (e == -1) {
                        e = str.length;
                    }
                    if (repl) {
                        a.push(func(str.substring(s, e + (end.length))));
                        str = str.substring(0, s) + repl + str.substr(e + (end.length));
                    } else {
                        d += str.substring(0, s);
                        d += func(str.substring(s, e + (end.length)));
                        str = str.substr(e + (end.length));
                    }
                }
                this.rest = d + str;
                this.arr = a;
            }

            function htmlMode(txt) {
                var rest = txt,
                    done = "",
                    php, comment, angular, startpos, endpos, note, i;
                comment = new extract(rest, "&lt;!--", "--&gt;", commentMode, "W3HTMLCOMMENTPOS");
                rest = comment.rest;
                while (rest.indexOf("&lt;") > -1) {
                    note = "";
                    startpos = rest.indexOf("&lt;");
                    if (rest.substr(startpos, 9).toUpperCase() == "&LT;STYLE") {
                        note = "css";
                    }
                    if (rest.substr(startpos, 10).toUpperCase() == "&LT;SCRIPT") {
                        note = "javascript";
                    }
                    endpos = rest.indexOf("&gt;", startpos);
                    if (endpos == -1) {
                        endpos = rest.length;
                    }
                    done += rest.substring(0, startpos);
                    done += tagMode(rest.substring(startpos, endpos + 4));
                    rest = rest.substr(endpos + 4);
                    if (note == "css") {
                        endpos = rest.indexOf("&lt;/style&gt;");
                        if (endpos > -1) {
                            done += cssMode(rest.substring(0, endpos));
                            rest = rest.substr(endpos);
                        }
                    }
                    if (note == "javascript") {
                        endpos = rest.indexOf("&lt;/script&gt;");
                        if (endpos > -1) {
                            done += jsMode(rest.substring(0, endpos));
                            rest = rest.substr(endpos);
                        }
                    }
                }
                rest = done + rest;
                for (i = 0; i < comment.arr.length; i++) {
                    rest = rest.replace("W3HTMLCOMMENTPOS", comment.arr[i]);
                }
                return rest;
            }

            function tagMode(txt) {
                var rest = txt,
                    done = "",
                    startpos, endpos, result;
                while (rest.search(/(\s|<br>)/) > -1) {
                    startpos = rest.search(/(\s|<br>)/);
                    endpos = rest.indexOf("&gt;");
                    if (endpos == -1) {
                        endpos = rest.length;
                    }
                    done += rest.substring(0, startpos);
                    done += attributeMode(rest.substring(startpos, endpos));
                    rest = rest.substr(endpos);
                }
                result = done + rest;
                result = "<span style=color:" + tagcolor + ">&lt;</span>" + result.substring(4);
                if (result.substr(result.length - 4, 4) == "&gt;") {
                    result = result.substring(0, result.length - 4) + "<span style=color:" + tagcolor + ">&gt;</span>";
                }
                return "<span style=color:" + tagnamecolor + ">" + result + "</span>";
            }

            function attributeMode(txt) {
                var rest = txt,
                    done = "",
                    startpos, endpos, singlefnuttpos, doublefnuttpos, spacepos;
                while (rest.indexOf("=") > -1) {
                    endpos = -1;
                    startpos = rest.indexOf("=");
                    singlefnuttpos = rest.indexOf("'", startpos);
                    doublefnuttpos = rest.indexOf('"', startpos);
                    spacepos = rest.indexOf(" ", startpos + 2);
                    if (spacepos > -1 && (spacepos < singlefnuttpos || singlefnuttpos == -1) && (spacepos < doublefnuttpos || doublefnuttpos == -1)) {
                        endpos = rest.indexOf(" ", startpos);
                    } else if (doublefnuttpos > -1 && (doublefnuttpos < singlefnuttpos || singlefnuttpos == -1) && (doublefnuttpos < spacepos || spacepos == -1)) {
                        endpos = rest.indexOf('"', rest.indexOf('"', startpos) + 1);
                    } else if (singlefnuttpos > -1 && (singlefnuttpos < doublefnuttpos || doublefnuttpos == -1) && (singlefnuttpos < spacepos || spacepos == -1)) {
                        endpos = rest.indexOf("'", rest.indexOf("'", startpos) + 1);
                    }
                    if (!endpos || endpos == -1 || endpos < startpos) {
                        endpos = rest.length;
                    }
                    done += rest.substring(0, startpos);
                    done += attributeValueMode(rest.substring(startpos, endpos + 1));
                    rest = rest.substr(endpos + 1);
                }
                return "<span style=color:" + attributecolor + ">" + done + rest + "</span>";
            }

            function attributeValueMode(txt) {
                return "<span style=color:" + attributevaluecolor + ">" + txt + "</span>";
            }

            function commentMode(txt) {
                return "<span style=color:" + commentcolor + ">" + txt + "</span>";
            }

            function cssMode(txt) {
                var rest = txt,
                    done = "",
                    s, e, comment, i, midz, c, cc;
                comment = new extract(rest, /\/\*/, "*/", commentMode, "W3CSSCOMMENTPOS");
                rest = comment.rest;
                while (rest.search("{") > -1) {
                    s = rest.search("{");
                    midz = rest.substr(s + 1);
                    cc = 1;
                    c = 0;
                    for (i = 0; i < midz.length; i++) {
                        if (midz.substr(i, 1) == "{") {
                            cc++;
                            c++
                        }
                        if (midz.substr(i, 1) == "}") {
                            cc--;
                        }
                        if (cc == 0) {
                            break;
                        }
                    }
                    if (cc != 0) {
                        c = 0;
                    }
                    e = s;
                    for (i = 0; i <= c; i++) {
                        e = rest.indexOf("}", e + 1);
                    }
                    if (e == -1) {
                        e = rest.length;
                    }
                    done += rest.substring(0, s + 1);
                    done += cssPropertyMode(rest.substring(s + 1, e));
                    rest = rest.substr(e);
                }
                rest = done + rest;
                rest = rest.replace(/{/g, "<span style=color:" + cssdelimitercolor + ">{</span>");
                rest = rest.replace(/}/g, "<span style=color:" + cssdelimitercolor + ">}</span>");
                for (i = 0; i < comment.arr.length; i++) {
                    rest = rest.replace("W3CSSCOMMENTPOS", comment.arr[i]);
                }
                return "<span style=color:" + cssselectorcolor + ">" + rest + "</span>";
            }

            function cssPropertyMode(txt) {
                var rest = txt,
                    done = "",
                    s, e, n, loop;
                if (rest.indexOf("{") > -1) {
                    return cssMode(rest);
                }
                while (rest.search(":") > -1) {
                    s = rest.search(":");
                    loop = true;
                    n = s;
                    while (loop == true) {
                        loop = false;
                        e = rest.indexOf(";", n);
                        if (rest.substring(e - 5, e + 1) == "&nbsp;") {
                            loop = true;
                            n = e + 1;
                        }
                    }
                    if (e == -1) {
                        e = rest.length;
                    }
                    done += rest.substring(0, s);
                    done += cssPropertyValueMode(rest.substring(s, e + 1));
                    rest = rest.substr(e + 1);
                }
                return "<span style=color:" + csspropertycolor + ">" + done + rest + "</span>";
            }

            function cssPropertyValueMode(txt) {
                var rest = txt,
                    done = "",
                    s;
                rest = "<span style=color:" + cssdelimitercolor + ">:</span>" + rest.substring(1);
                while (rest.search(/!important/i) > -1) {
                    s = rest.search(/!important/i);
                    done += rest.substring(0, s);
                    done += cssImportantMode(rest.substring(s, s + 10));
                    rest = rest.substr(s + 10);
                }
                result = done + rest;
                if (result.substr(result.length - 1, 1) == ";" && result.substr(result.length - 6, 6) != "&nbsp;" && result.substr(result.length - 4, 4) != "&lt;" && result.substr(result.length - 4, 4) != "&gt;" && result.substr(result.length - 5, 5) != "&amp;") {
                    result = result.substring(0, result.length - 1) + "<span style=color:" + cssdelimitercolor + ">;</span>";
                }
                return "<span style=color:" + csspropertyvaluecolor + ">" + result + "</span>";
            }

            function cssImportantMode(txt) {
                return "<span style=color:" + cssimportantcolor + ";font-weight:bold;>" + txt + "</span>";
            }

            function jsMode(txt) {
                var rest = txt,
                    done = "",
                    esc = [],
                    i, cc, tt = "",
                    sfnuttpos, dfnuttpos, compos, comlinepos, keywordpos, numpos, mypos, dotpos, y;
                for (i = 0; i < rest.length; i++) {
                    cc = rest.substr(i, 1);
                    if (cc == "\\") {
                        esc.push(rest.substr(i, 2));
                        cc = "W3JSESCAPE";
                        i++;
                    }
                    tt += cc;
                }
                rest = tt;
                y = 1;
                while (y == 1) {
                    sfnuttpos = getPos(rest, "'", "'", jsStringMode);
                    dfnuttpos = getPos(rest, '"', '"', jsStringMode);
                    compos = getPos(rest, /\/\*/, "*/", commentMode);
                    comlinepos = getPos(rest, /\/\//, "<br>", commentMode);
                    numpos = getNumPos(rest, jsNumberMode);
                    keywordpos = getKeywordPos("js", rest, jsKeywordMode);
                    dotpos = getDotPos(rest, jsPropertyMode);
                    if (Math.max(numpos[0], sfnuttpos[0], dfnuttpos[0], compos[0], comlinepos[0], keywordpos[0], dotpos[0]) == -1) {
                        break;
                    }
                    mypos = getMinPos(numpos, sfnuttpos, dfnuttpos, compos, comlinepos, keywordpos, dotpos);
                    if (mypos[0] == -1) {
                        break;
                    }
                    if (mypos[0] > -1) {
                        done += rest.substring(0, mypos[0]);
                        done += mypos[2](rest.substring(mypos[0], mypos[1]));
                        rest = rest.substr(mypos[1]);
                    }
                }
                rest = done + rest;
                for (i = 0; i < esc.length; i++) {
                    rest = rest.replace("W3JSESCAPE", esc[i]);
                }
                return "<span style=color:" + jscolor + ">" + rest + "</span>";
            }

            function jsStringMode(txt) {
                return "<span style=color:" + jsstringcolor + ">" + txt + "</span>";
            }

            function jsKeywordMode(txt) {
                return "<span style=color:" + jskeywordcolor + ">" + txt + "</span>";
            }

            function jsNumberMode(txt) {
                return "<span style=color:" + jsnumbercolor + ">" + txt + "</span>";
            }

            function jsPropertyMode(txt) {
                return "<span style=color:" + jspropertycolor + ">" + txt + "</span>";
            }

            function getDotPos(txt, func) {
                var x, i, j, s, e, arr = [".", "<", " ", ";", "(", "+", ")", "[", "]", ",", "&", ":", "{", "}", "/", "-", "*", "|", "%"];
                s = txt.indexOf(".");
                if (s > -1) {
                    x = txt.substr(s + 1);
                    for (j = 0; j < x.length; j++) {
                        cc = x[j];
                        for (i = 0; i < arr.length; i++) {
                            if (cc.indexOf(arr[i]) > -1) {
                                e = j;
                                return [s + 1, e + s + 1, func];
                            }
                        }
                    }
                }
                return [-1, -1, func];
            }

            function getMinPos() {
                var i, arr = [];
                for (i = 0; i < arguments.length; i++) {
                    if (arguments[i][0] > -1) {
                        if (arr.length == 0 || arguments[i][0] < arr[0]) {
                            arr = arguments[i];
                        }
                    }
                }
                if (arr.length == 0) {
                    arr = arguments[i];
                }
                return arr;
            }

            function getKeywordPos(typ, txt, func) {
                var words, i, pos, rpos = -1,
                    rpos2 = -1,
                    patt;
                if (typ == "js") {
                    words = ["abstract", "arguments", "boolean", "break", "byte", "case", "catch", "char", "class", "const", "continue", "debugger", "default", "delete",
                        "do", "double", "else", "enum", "eval", "export", "extends", "false", "final", "finally", "float", "for", "function", "goto", "if", "implements", "import",
                        "in", "instanceof", "int", "interface", "let", "long", "NaN", "native", "new", "null", "package", "private", "protected", "public", "return", "short", "static",
                        "super", "switch", "synchronized", "this", "throw", "throws", "transient", "true", "try", "typeof", "var", "void", "volatile", "while", "with", "yield"
                    ];
                }
                for (i = 0; i < words.length; i++) {
                    pos = txt.indexOf(words[i]);
                    if (pos > -1) {
                        patt = /\W/g;
                        if (txt.substr(pos + words[i].length, 1).match(patt) && txt.substr(pos - 1, 1).match(patt)) {
                            if (pos > -1 && (rpos == -1 || pos < rpos)) {
                                rpos = pos;
                                rpos2 = rpos + words[i].length;
                            }
                        }
                    }
                }
                return [rpos, rpos2, func];
            }

            function getPos(txt, start, end, func) {
                var s, e;
                s = txt.search(start);
                e = txt.indexOf(end, s + (end.length));
                if (e == -1) {
                    e = txt.length;
                }
                return [s, e + (end.length), func];
            }

            function getNumPos(txt, func) {
                var arr = ["<br>", " ", ";", "(", "+", ")", "[", "]", ",", "&", ":", "{", "}", "/", "-", "*", "|", "%", "="],
                    i, j, c, startpos = 0,
                    endpos, word;
                for (i = 0; i < txt.length; i++) {
                    for (j = 0; j < arr.length; j++) {
                        c = txt.substr(i, arr[j].length);
                        if (c == arr[j]) {
                            if (c == "-" && (txt.substr(i - 1, 1) == "e" || txt.substr(i - 1, 1) == "E")) {
                                continue;
                            }
                            endpos = i;
                            if (startpos < endpos) {
                                word = txt.substring(startpos, endpos);
                                if (!isNaN(word)) {
                                    return [startpos, endpos, func];
                                }
                            }
                            i += arr[j].length;
                            startpos = i;
                            i -= 1;
                            break;
                        }
                    }
                }
                return [-1, -1, func];
            }
        }
    </script>

		</script>
	</body>
</html>