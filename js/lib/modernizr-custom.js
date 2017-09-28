/*! modernizr 3.5.0 (Custom Build) | MIT *
 * https://modernizr.com/download/?-cssgrid_cssgridlegacy-flexbox-svg-setclasses !*/
!function(e,n,t){function r(e,n){return typeof e===n}function s(){var e,n,t,s,o,i,l;for(var a in w)if(w.hasOwnProperty(a)){if(e=[],n=w[a],n.name&&(e.push(n.name.toLowerCase()),n.options&&n.options.aliases&&n.options.aliases.length))for(t=0;t<n.options.aliases.length;t++)e.push(n.options.aliases[t].toLowerCase());for(s=r(n.fn,"function")?n.fn():n.fn,o=0;o<e.length;o++)i=e[o],l=i.split("."),1===l.length?Modernizr[l[0]]=s:(!Modernizr[l[0]]||Modernizr[l[0]]instanceof Boolean||(Modernizr[l[0]]=new Boolean(Modernizr[l[0]])),Modernizr[l[0]][l[1]]=s),C.push((s?"":"no-")+l.join("-"))}}function o(e){var n=x.className,t=Modernizr._config.classPrefix||"";if(_&&(n=n.baseVal),Modernizr._config.enableJSClass){var r=new RegExp("(^|\\s)"+t+"no-js(\\s|$)");n=n.replace(r,"$1"+t+"js$2")}Modernizr._config.enableClasses&&(n+=" "+t+e.join(" "+t),_?x.className.baseVal=n:x.className=n)}function i(e,n){return!!~(""+e).indexOf(n)}function l(){return"function"!=typeof n.createElement?n.createElement(arguments[0]):_?n.createElementNS.call(n,"http://www.w3.org/2000/svg",arguments[0]):n.createElement.apply(n,arguments)}function a(e){return e.replace(/([a-z])-([a-z])/g,function(e,n,t){return n+t.toUpperCase()}).replace(/^-/,"")}function f(e,n){return function(){return e.apply(n,arguments)}}function u(e,n,t){var s;for(var o in e)if(e[o]in n)return t===!1?e[o]:(s=n[e[o]],r(s,"function")?f(s,t||n):s);return!1}function c(e){return e.replace(/([A-Z])/g,function(e,n){return"-"+n.toLowerCase()}).replace(/^ms-/,"-ms-")}function d(n,t,r){var s;if("getComputedStyle"in e){s=getComputedStyle.call(e,n,t);var o=e.console;if(null!==s)r&&(s=s.getPropertyValue(r));else if(o){var i=o.error?"error":"log";o[i].call(o,"getComputedStyle returning null, its possible modernizr test results are inaccurate")}}else s=!t&&n.currentStyle&&n.currentStyle[r];return s}function p(){var e=n.body;return e||(e=l(_?"svg":"body"),e.fake=!0),e}function m(e,t,r,s){var o,i,a,f,u="modernizr",c=l("div"),d=p();if(parseInt(r,10))for(;r--;)a=l("div"),a.id=s?s[r]:u+(r+1),c.appendChild(a);return o=l("style"),o.type="text/css",o.id="s"+u,(d.fake?d:c).appendChild(o),d.appendChild(c),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(n.createTextNode(e)),c.id=u,d.fake&&(d.style.background="",d.style.overflow="hidden",f=x.style.overflow,x.style.overflow="hidden",x.appendChild(d)),i=t(c,e),d.fake?(d.parentNode.removeChild(d),x.style.overflow=f,x.offsetHeight):c.parentNode.removeChild(c),!!i}function g(n,r){var s=n.length;if("CSS"in e&&"supports"in e.CSS){for(;s--;)if(e.CSS.supports(c(n[s]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var o=[];s--;)o.push("("+c(n[s])+":"+r+")");return o=o.join(" or "),m("@supports ("+o+") { #modernizr { position: absolute; } }",function(e){return"absolute"==d(e,null,"position")})}return t}function v(e,n,s,o){function f(){c&&(delete T.style,delete T.modElem)}if(o=r(o,"undefined")?!1:o,!r(s,"undefined")){var u=g(e,s);if(!r(u,"undefined"))return u}for(var c,d,p,m,v,y=["modernizr","tspan","samp"];!T.style&&y.length;)c=!0,T.modElem=l(y.shift()),T.style=T.modElem.style;for(p=e.length,d=0;p>d;d++)if(m=e[d],v=T.style[m],i(m,"-")&&(m=a(m)),T.style[m]!==t){if(o||r(s,"undefined"))return f(),"pfx"==n?m:!0;try{T.style[m]=s}catch(h){}if(T.style[m]!=v)return f(),"pfx"==n?m:!0}return f(),!1}function y(e,n,t,s,o){var i=e.charAt(0).toUpperCase()+e.slice(1),l=(e+" "+E.join(i+" ")+i).split(" ");return r(n,"string")||r(n,"undefined")?v(l,n,s,o):(l=(e+" "+N.join(i+" ")+i).split(" "),u(l,n,t))}function h(e,n,r){return y(e,t,t,n,r)}var C=[],w=[],S={_version:"3.5.0",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,n){var t=this;setTimeout(function(){n(t[e])},0)},addTest:function(e,n,t){w.push({name:e,fn:n,options:t})},addAsyncTest:function(e){w.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=S,Modernizr=new Modernizr;var x=n.documentElement,_="svg"===x.nodeName.toLowerCase(),b="Moz O ms Webkit",E=S._config.usePrefixes?b.split(" "):[];S._cssomPrefixes=E;var N=S._config.usePrefixes?b.toLowerCase().split(" "):[];S._domPrefixes=N;var P={elem:l("modernizr")};Modernizr._q.push(function(){delete P.elem});var T={style:P.elem.style};Modernizr._q.unshift(function(){delete T.style}),S.testAllProps=y,S.testAllProps=h,Modernizr.addTest("cssgridlegacy",h("grid-columns","10px",!0)),Modernizr.addTest("cssgrid",h("grid-template-rows","none",!0)),Modernizr.addTest("flexbox",h("flexBasis","1px",!0)),Modernizr.addTest("svg",!!n.createElementNS&&!!n.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect),s(),o(C),delete S.addTest,delete S.addAsyncTest;for(var z=0;z<Modernizr._q.length;z++)Modernizr._q[z]();e.Modernizr=Modernizr}(window,document);