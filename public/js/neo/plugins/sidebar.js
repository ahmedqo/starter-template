Neo.Component({ctl:!0,tag:"neo-sidebar",tpl:'return function($CONTEXT$,$HELPER$,$EACH$,$SIZE$,$ESCAPE$,$ERROR$){var $TXT$=[],$JSX$=[],$INDEX$=0,$LINE$=0,$COL$=0;function $ADDTXT$($LINE$){if(!$TXT$[$INDEX$]){$TXT$[$INDEX$]=\'\'}$TXT$[$INDEX$]=($TXT$[$INDEX$]+$LINE$).replace(/\\n(:?\\s*\\n)+/g,\'\\n\')}function $ADDJSX$($LINE$){$JSX$[$INDEX$]=$LINE$,$INDEX$++}with($CONTEXT$||{}){try{$LINE$=1;$COL$=1;if($HELPER$["state"]["show"]){$LINE$=1;$COL$=21;$ADDTXT$("\\n<div ref=\\"content\\" part=\\"content\\" @click:propagation=\\"");$LINE$=2;$COL$=55;$ADDJSX$(() => {});$LINE$=2;$COL$=69;$ADDTXT$("\\">\\n<a aria-label=\\"anchor_link\\" href=\\"#\\" ref=\\"target\\" part=\\"target\\"></a>\\n<slot></slot>\\n</div>\\n");$LINE$=6;$COL$=1;}}catch(e){throw new $ERROR$([e.message,\'\\n\\tat\',\'Line:\',\'"\'+$LINE$+\'"\',\'Col:\',\'"\'+$COL$+\'"\'].join(\' \'))}}return [$TXT$,...$JSX$]}',css:'return function($CONTEXT$,$HELPER$,$EACH$,$SIZE$,$ESCAPE$,$ERROR$){var $TXT$=[],$JSX$=[],$INDEX$=0,$LINE$=0,$COL$=0;function $ADDTXT$($LINE$){if(!$TXT$[$INDEX$]){$TXT$[$INDEX$]=\'\'}$TXT$[$INDEX$]=($TXT$[$INDEX$]+$LINE$).replace(/\\n(:?\\s*\\n)+/g,\'\\n\')}function $ADDJSX$($LINE$){$JSX$[$INDEX$]=$LINE$,$INDEX$++}with($CONTEXT$||{}){try{$LINE$=1;$COL$=1;$ADDTXT$("<style>* {\\nbox-sizing: border-box;\\nfont-family: inherit;\\n}\\n\\n");$LINE$=6;$COL$=1;$EACH$($HELPER$["Theme"]["MEDIA"],function(_,media,$LOOP$){$LINE$=6;$COL$=35;$ADDTXT$("\\n@");$LINE$=7;$COL$=2;$ADDJSX$(media);$LINE$=7;$COL$=13;$ADDTXT$("keyframes opacity-off {\\n0% { opacity: 1; }\\n100% { opacity: 0; }\\n}\\n\\n@");$LINE$=12;$COL$=2;$ADDJSX$(media);$LINE$=12;$COL$=13;$ADDTXT$("keyframes slide-off {\\n0% {\\n");$LINE$=14;$COL$=1;$EACH$($HELPER$["Theme"]["MEDIA"],function(_,_media,$LOOP$){$LINE$=14;$COL$=36;$ADDTXT$("\\n");$LINE$=15;$COL$=1;$ADDJSX$(_media);$LINE$=15;$COL$=13;$ADDTXT$("transform: translateX(0px);\\n");$LINE$=16;$COL$=1;});$LINE$=16;$COL$=14;$ADDTXT$("\\n}\\n100% {\\n");$LINE$=19;$COL$=1;$EACH$($HELPER$["Theme"]["MEDIA"],function(_,_media,$LOOP$){$LINE$=19;$COL$=36;$ADDTXT$("\\n");$LINE$=20;$COL$=1;$ADDJSX$(_media);$LINE$=20;$COL$=13;$ADDTXT$("transform: translateX(");$LINE$=20;$COL$=35;$ADDJSX$($HELPER$["props"]["side"] === "end" ? document["documentElement"]["dir"] === "rtl" ? -20 : 20 : document["documentElement"]["dir"] === "rtl" ? 20 : -20);$LINE$=20;$COL$=166;$ADDTXT$("px);\\n");$LINE$=21;$COL$=1;});$LINE$=21;$COL$=14;$ADDTXT$("\\n}\\n}\\n\\n@");$LINE$=25;$COL$=2;$ADDJSX$(media);$LINE$=25;$COL$=13;$ADDTXT$("keyframes width-off {\\n0% { width: 240px; }\\n100% { width: 0; }\\n}\\n\\n@");$LINE$=30;$COL$=2;$ADDJSX$(media);$LINE$=30;$COL$=13;$ADDTXT$("keyframes opacity-on {\\n0% { opacity: 0; }\\n100% { opacity: 1; }\\n}\\n\\n@");$LINE$=35;$COL$=2;$ADDJSX$(media);$LINE$=35;$COL$=13;$ADDTXT$("keyframes slide-on {\\n0% {\\n");$LINE$=37;$COL$=1;$EACH$($HELPER$["Theme"]["MEDIA"],function(_,_media,$LOOP$){$LINE$=37;$COL$=36;$ADDTXT$("\\n");$LINE$=38;$COL$=1;$ADDJSX$(_media);$LINE$=38;$COL$=13;$ADDTXT$("transform: translateX(");$LINE$=38;$COL$=35;$ADDJSX$($HELPER$["props"]["side"] === "end" ? document["documentElement"]["dir"] === "rtl" ? -20 : 20 : document["documentElement"]["dir"] === "rtl" ? 20 : -20);$LINE$=38;$COL$=166;$ADDTXT$("px);\\n");$LINE$=39;$COL$=1;});$LINE$=39;$COL$=14;$ADDTXT$("\\n}\\n100% {\\n");$LINE$=42;$COL$=1;$EACH$($HELPER$["Theme"]["MEDIA"],function(_,_media,$LOOP$){$LINE$=42;$COL$=36;$ADDTXT$("\\n");$LINE$=43;$COL$=1;$ADDJSX$(_media);$LINE$=43;$COL$=13;$ADDTXT$("transform: translateX(0px);\\n");$LINE$=44;$COL$=1;});$LINE$=44;$COL$=14;$ADDTXT$("\\n}\\n}\\n\\n@");$LINE$=48;$COL$=2;$ADDJSX$(media);$LINE$=48;$COL$=13;$ADDTXT$("keyframes width-on {\\n0% { width: 0; }\\n100% { width: 240px; }\\n}\\n");$LINE$=52;$COL$=1;});$LINE$=52;$COL$=14;$ADDTXT$("\\n\\n");$LINE$=54;$COL$=1;if($HELPER$["state"]["show"]){$LINE$=54;$COL$=21;$ADDTXT$("\\n::-webkit-scrollbar {\\n");$LINE$=56;$COL$=1;$EACH$($HELPER$["Theme"]["MEDIA"],function(_,_media,$LOOP$){$LINE$=56;$COL$=36;$ADDTXT$("\\n");$LINE$=57;$COL$=1;$ADDJSX$(_media);$LINE$=57;$COL$=13;$ADDTXT$("appearance: none;\\n");$LINE$=58;$COL$=1;});$LINE$=58;$COL$=14;$ADDTXT$("\\nbackground: transparent;\\nheight: 5px;\\nwidth: 5px;\\n}\\n\\n::-webkit-scrollbar-track {\\nbackground: transparent;\\n}\\n\\n::-webkit-scrollbar-thumb {\\nborder-radius: 2px;\\nbackground: ");$LINE$=70;$COL$=13;$ADDJSX$($HELPER$["Theme"]["colors"]("GRAY", 300));$LINE$=70;$COL$=45;$ADDTXT$(";\\n}\\n\\n::-webkit-scrollbar-thumb:hover {\\nbackground: ");$LINE$=74;$COL$=13;$ADDJSX$($HELPER$["Theme"]["colors"]("GRAY", 400));$LINE$=74;$COL$=45;$ADDTXT$(";\\n}\\n");$LINE$=76;$COL$=1;}$LINE$=76;$COL$=12;$ADDTXT$("\\n\\n:host {\\ninset: 0;\\nwidth: 100%;\\ndisplay: flex;\\nheight: 100dvh;\\nposition: fixed;\\nbackdrop-filter: blur(5px);\\n");$LINE$=85;$COL$=1;if(!$HELPER$["props"]["expand"] || $HELPER$["props"]["expand"] && $HELPER$["props"]["stick"] && $HELPER$["state"]["init"]){$LINE$=85;$COL$=72;$ADDTXT$("\\npointer-events: none;\\n");$LINE$=87;$COL$=1;}$LINE$=87;$COL$=12;$ADDTXT$("\\nz-index: ");$LINE$=88;$COL$=10;$ADDJSX$($HELPER$["Theme"]["layer"]());$LINE$=88;$COL$=30;$ADDTXT$(";\\njustify-content: ");$LINE$=89;$COL$=18;$ADDJSX$($HELPER$["props"]["side"]);$LINE$=89;$COL$=35;$ADDTXT$(";\\nbackground: ");$LINE$=90;$COL$=13;$ADDJSX$($HELPER$["Theme"]["colors"]("BLACK", 60));$LINE$=90;$COL$=45;$ADDTXT$(";\\n");$LINE$=91;$COL$=1;if($HELPER$["state"]["init"]){$LINE$=91;$COL$=21;$ADDTXT$("\\nopacity: 0;\\n");$LINE$=93;$COL$=1;}else{$LINE$=93;$COL$=11;$ADDTXT$("\\n");$LINE$=94;$COL$=1;$EACH$($HELPER$["Theme"]["MEDIA"],function(_,_media,$LOOP$){$LINE$=94;$COL$=36;$ADDTXT$("\\n");$LINE$=95;$COL$=1;$ADDJSX$(_media);$LINE$=95;$COL$=13;$ADDTXT$("animation: opacity-");$LINE$=95;$COL$=32;$ADDJSX$($HELPER$["props"]["expand"] ? "on" : "off");$LINE$=95;$COL$=66;$ADDTXT$(" 200ms ease-in-out forwards;\\n");$LINE$=96;$COL$=1;});$LINE$=96;$COL$=14;$ADDTXT$("\\n");$LINE$=97;$COL$=1;}$LINE$=97;$COL$=12;$ADDTXT$("\\n}\\n\\n");$LINE$=100;$COL$=1;if($HELPER$["state"]["show"]){$LINE$=100;$COL$=21;$ADDTXT$("\\n[part=\\"target\\"] {\\nwidth: 0;\\nheight: 0;\\nopacity: 0;\\nleft: -9999px;\\nright: -9999px;\\ndisplay: block;\\nposition: fixed;\\n}\\n\\n[part=\\"content\\"] {\\nheight: 100%;\\nwidth: 16rem;\\ndisplay: flex;\\noverflow: overlay;\\nflex-direction: column;\\nbackground: ");$LINE$=117;$COL$=13;$ADDJSX$($HELPER$["Theme"]["colors"]("WHITE"));$LINE$=117;$COL$=41;$ADDTXT$(";\\nborder: 1px solid ");$LINE$=118;$COL$=19;$ADDJSX$($HELPER$["Theme"]["colors"]("BLACK", 20));$LINE$=118;$COL$=51;$ADDTXT$(";\\n");$LINE$=119;$COL$=1;$EACH$($HELPER$["Theme"]["MEDIA"],function(_,_media,$LOOP$){$LINE$=119;$COL$=36;$ADDTXT$("\\n");$LINE$=120;$COL$=1;$ADDJSX$(_media);$LINE$=120;$COL$=13;$ADDTXT$("box-shadow: 0px 8px 8px -8px ");$LINE$=120;$COL$=42;$ADDJSX$($HELPER$["Theme"]["colors"]("BLACK", 20));$LINE$=120;$COL$=74;$ADDTXT$(";\\n");$LINE$=121;$COL$=1;if($HELPER$["state"]["init"]){$LINE$=121;$COL$=21;$ADDTXT$("\\n");$LINE$=122;$COL$=1;$ADDJSX$(_media);$LINE$=122;$COL$=13;$ADDTXT$("transform: translateX(");$LINE$=122;$COL$=35;$ADDJSX$($HELPER$["props"]["side"] === "end" ? document["documentElement"]["dir"] === "rtl" ? -20 : 20 : document["documentElement"]["dir"] === "rtl" ? 20 : -20);$LINE$=122;$COL$=166;$ADDTXT$("px);\\n");$LINE$=123;$COL$=1;}else{$LINE$=123;$COL$=11;$ADDTXT$("\\n");$LINE$=124;$COL$=1;$ADDJSX$(_media);$LINE$=124;$COL$=13;$ADDTXT$("animation: slide-");$LINE$=124;$COL$=30;$ADDJSX$($HELPER$["props"]["expand"] ? "on" : "off");$LINE$=124;$COL$=64;$ADDTXT$(" 200ms ease-in-out forwards;\\n");$LINE$=125;$COL$=1;}$LINE$=125;$COL$=12;$ADDTXT$("\\n");$LINE$=126;$COL$=1;});$LINE$=126;$COL$=14;$ADDTXT$("\\n}\\n");$LINE$=128;$COL$=1;}$LINE$=128;$COL$=12;$ADDTXT$("\\n\\n");$LINE$=130;$COL$=1;if(!$HELPER$["props"]["stick"]){$LINE$=130;$COL$=23;$ADDTXT$("\\n@media (min-width: 1024px) {\\n:host {\\nz-index: 0;\\nposition: sticky;\\n");$LINE$=135;$COL$=1;if($HELPER$["state"]["init"]){$LINE$=135;$COL$=21;$ADDTXT$("\\nopacity: 1;\\nwidth: 240px;\\nmax-width: 240px;\\n");$LINE$=139;$COL$=1;}else{$LINE$=139;$COL$=11;$ADDTXT$("\\n");$LINE$=140;$COL$=1;$EACH$($HELPER$["Theme"]["MEDIA"],function(_,_media,$LOOP$){$LINE$=140;$COL$=36;$ADDTXT$("\\n");$LINE$=141;$COL$=1;$ADDJSX$(_media);$LINE$=141;$COL$=13;$ADDTXT$("animation: opacity-");$LINE$=141;$COL$=32;$ADDJSX$($HELPER$["props"]["expand"] ? "on" : "off");$LINE$=141;$COL$=66;$ADDTXT$(" 200ms ease-in-out forwards, width-");$LINE$=141;$COL$=101;$ADDJSX$($HELPER$["props"]["expand"] ? "on" : "off");$LINE$=141;$COL$=135;$ADDTXT$(" 200ms ease-in-out forwards;\\n");$LINE$=142;$COL$=1;});$LINE$=142;$COL$=14;$ADDTXT$("\\n");$LINE$=143;$COL$=1;}$LINE$=143;$COL$=12;$ADDTXT$("\\n}\\n\\n[part=\\"content\\"] {\\nwidth: 100%;\\n");$LINE$=148;$COL$=1;if($HELPER$["state"]["init"]){$LINE$=148;$COL$=21;$ADDTXT$("\\n");$LINE$=149;$COL$=1;$EACH$($HELPER$["Theme"]["MEDIA"],function(_,_media,$LOOP$){$LINE$=149;$COL$=36;$ADDTXT$("\\n");$LINE$=150;$COL$=1;$ADDJSX$(_media);$LINE$=150;$COL$=13;$ADDTXT$("transform: translateX(0px);\\n");$LINE$=151;$COL$=1;});$LINE$=151;$COL$=14;$ADDTXT$("\\n");$LINE$=152;$COL$=1;}$LINE$=152;$COL$=12;$ADDTXT$("\\n}\\n}\\n");$LINE$=155;$COL$=1;}$LINE$=155;$COL$=12;$ADDTXT$("</style>");}catch(e){throw new $ERROR$([e.message,\'\\n\\tat\',\'Line:\',\'"\'+$LINE$+\'"\',\'Col:\',\'"\'+$COL$+\'"\'].join(\' \'))}}return [$TXT$,...$JSX$]}'})({attrs:["side","stick"],props:{expand:matchMedia("(min-width: 1024px)").matches,side:"start",stick:!1},state:{show:matchMedia("(min-width: 1024px)").matches,init:!0},rules:{toggle(){this.props.expand=!this.props.expand},blur($){!this.root.contains($.target)&&this.props.expand&&this.rules.toggle()},resize(){matchMedia("(min-width: 1024px)").matches?this.show():this.hide()}},cycle:{created(){this.show=function(){this.props.expand=!0},this.hide=function(){this.props.expand=!1},this.toggle=this.rules.toggle},mounted(){this.hasAttribute("stick")?(this.cache.props.expand=!1,this.cache.state.show=!1):window.addEventListener("resize",this.rules.resize)},removed(){window.removeEventListener("click",this.rules.blur),window.removeEventListener("resize",this.rules.resize)},updated($,L,n,e){Neo.Helper.option({attrs:{side:()=>{this.props.side=n},stick:()=>{this.props.stick=Neo.Helper.truty(n)||this.hasAttribute("stick")&&!["false","null","undefined"].includes(this.getAttribute("stick"))}},state:{show:()=>{Neo.Wrapper&&Neo.Wrapper.rules[n?this.props.stick?"closed":"smonly":"opened"](),n&&this.refs.target.focus(),setTimeout(()=>{n?!this.props.stick&&matchMedia("(min-width: 1024px)").matches||window.addEventListener("click",this.rules.blur):window.removeEventListener("click",this.rules.blur)},0),this.emit("change:expand",{data:n})}},props:{stick:()=>{window[(n?"remove":"add")+"EventListener"]("resize",this.rules.resize),this.emit("change:stick",{data:n})},expand:()=>{this.state.init=!1,n?this.state.show=n:setTimeout(()=>{this.state.show=n},250)}}}[e],$)}}}).define();