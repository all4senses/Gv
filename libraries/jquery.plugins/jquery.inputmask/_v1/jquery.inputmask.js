/*
 Input Mask plugin for jquery
 http://github.com/RobinHerbots/jquery.inputmask
 Copyright (c) 2010 - 2013 Robin Herbots
 Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
 Version: 1.3.22
*/
(function(f){void 0==f.fn.inputmask&&(f.inputmask={defaults:{placeholder:"_",optionalmarker:{start:"[",end:"]"},escapeChar:"\\",mask:null,oncomplete:f.noop,onincomplete:f.noop,oncleared:f.noop,repeat:0,greedy:!0,autoUnmask:!1,clearMaskOnLostFocus:!0,insertMode:!0,clearIncomplete:!1,aliases:{},onKeyUp:f.noop,onKeyDown:f.noop,showMaskOnFocus:!0,showMaskOnHover:!0,onKeyValidation:f.noop,numericInput:!1,radixPoint:"",rightAlignNumerics:!0,definitions:{9:{validator:"[0-9]",cardinality:1},a:{validator:"[A-Za-z\u0410-\u044f\u0401\u0451]",
cardinality:1},"*":{validator:"[A-Za-z\u0410-\u044f\u0401\u04510-9]",cardinality:1}},keyCode:{ALT:18,BACKSPACE:8,CAPS_LOCK:20,COMMA:188,COMMAND:91,COMMAND_LEFT:91,COMMAND_RIGHT:93,CONTROL:17,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,INSERT:45,LEFT:37,MENU:93,NUMPAD_ADD:107,NUMPAD_DECIMAL:110,NUMPAD_DIVIDE:111,NUMPAD_ENTER:108,NUMPAD_MULTIPLY:106,NUMPAD_SUBTRACT:109,PAGE_DOWN:34,PAGE_UP:33,PERIOD:190,RIGHT:39,SHIFT:16,SPACE:32,TAB:9,UP:38,WINDOWS:91},ignorables:[9,13,19,27,33,34,35,36,37,
38,39,40,45,46,93,112,113,114,115,116,117,118,119,120,121,122,123],getMaskLength:function(f,A,L){var I=f.length;!A&&1<L&&(I+=f.length*(L-1));return I}},val:f.fn.val,escapeRegex:function(f){return f.replace(RegExp("(\\/|\\.|\\*|\\+|\\?|\\||\\(|\\)|\\[|\\]|\\{|\\}|\\\\)","gim"),"\\$1")}},f.fn.inputmask=function(u,A){var L,I;function H(e,b){var c=a.aliases[e];return c?(c.alias&&H(c.alias),f.extend(!0,a,c),f.extend(!0,a,b),!0):!1}function J(){var e=!1,b=0,c=a.mask.toString();1==c.length&&!1==a.greedy&&
(a.placeholder="");for(var c=f.map(c.split(""),function(c){var f=[];if(c==a.escapeChar)e=true;else if(c!=a.optionalmarker.start&&c!=a.optionalmarker.end||e){var D=a.definitions[c];if(D&&!e)for(c=0;c<D.cardinality;c++)f.push(y(b+c));else{f.push(c);e=false}b=b+f.length;return f}}),D=c.slice(),n=1;n<a.repeat&&a.greedy;n++)D=D.concat(c.slice());return D}function O(){var e=!1,b=!1,c=!1;return f.map(a.mask.toString().split(""),function(f){var n=[];if(f==a.escapeChar)b=!0;else if(f==a.optionalmarker.start&&
!b)c=e=!0;else if(f==a.optionalmarker.end&&!b)e=!1,c=!0;else{var g=a.definitions[f];if(g&&!b){for(var h=g.prevalidator,j=h?h.length:0,k=1;k<g.cardinality;k++){var m=j>=k?h[k-1]:[],d=m.validator,m=m.cardinality;n.push({fn:d?"string"==typeof d?RegExp(d):new function(){this.test=d}:/./,cardinality:m?m:1,optionality:e,newBlockMarker:!0==e?c:!1,offset:0,casing:g.casing,def:g.definitionSymbol|f});!0==e&&(c=!1)}n.push({fn:g.validator?"string"==typeof g.validator?RegExp(g.validator):new function(){this.test=
g.validator}:/./,cardinality:g.cardinality,optionality:e,newBlockMarker:c,offset:0,casing:g.casing,def:g.definitionSymbol|f})}else n.push({fn:null,cardinality:0,optionality:e,newBlockMarker:c,offset:0,casing:null,def:f}),b=!1;c=!1;return n}})}function B(e,b,c,f){var g=!1;if(0<=e&&e<p(c)){for(var l=e%h.length,s=b?1:0,j="",k=h[l].cardinality;k>s;k--)j+=v(c,l-(k-1));b&&(j+=b);g=null!=h[l].fn?h[l].fn.test(j,c,e,f,a):!1}setTimeout(function(){a.onKeyValidation.call(this,g,a)},0);return g}function s(e){e=
h[e%h.length];return void 0!=e?e.fn:!1}function y(e){return a.placeholder.charAt(e%a.placeholder.length)}function p(e){return a.getMaskLength(g,a.greedy,a.repeat,e,a)}function w(e,a){var c=p(e);if(a>=c)return c;for(var f=a;++f<c&&!s(f););return f}function M(e,a){var c=a;if(0>=c)return 0;for(;0<--c&&!s(c););return c}function E(e,a,c){var f=h[a%h.length],g=c;if(void 0!=g)switch(f.casing){case "upper":g=c.toUpperCase();break;case "lower":g=c.toLowerCase()}e[a]=g}function v(a,b,c){c&&(b=S(a,b));return a[b]}
function S(a,b,c){if(c)for(;0>b&&a.length<p(a);){c=g.length-1;for(b=g.length;void 0!==g[c];)a.unshift(g[c--])}else for(;void 0==a[b]&&a.length<p(a);)for(c=0;void 0!==g[c];)a.push(g[c++]);return b}function z(a,b,c){a._valueSet(b.join(""));void 0!=c&&l(a,c)}function T(a,b,c){for(var f=p(a);b<c&&b<f;b++)E(a,b,v(g.slice(),b))}function K(a,b){E(a,b,v(g,b%h.length))}function o(e,b,c,D){var n=f(e).data("inputmask").isRTL,l=P(e._valueGet(),n).split(""),o=p(b);if(n){var j=l.reverse();j.length=o;for(var k=
0;k<o;k++){var m=(o-(k+1))%h.length;null==h[m].fn&&j[k]!=v(g,m)?(j.splice(k,0,v(g,m)),j.length=o):j[k]=j[k]||v(g,m)}l=j.reverse()}T(b,0,b.length);b.length=g.length;for(var d=j=-1,t,u=l.length,m=0==u?o:-1,k=0;k<u;k++)for(var q=d+1;q<o;q++)if(s(q)){var F=l[k];!1!==(t=B(q,F,b,!c))?(!0!==t&&(q=void 0!=t.pos?t.pos:q,F=void 0!=t.c?t.c:F),E(b,q,F),j=d=q):(K(b,q),F==y(q)&&(m=d=q));break}else if(K(b,q),j==d&&(j=q),d=q,l[k]==v(b,q))break;if(!1==a.greedy){k=P(b.join(""),n).split("");l=k.length;for(d=0;d<l;d++)b[d]=
k[d];b.length=k.length}c&&z(e,b);return n?a.numericInput?""!=a.radixPoint&&-1!=f.inArray(a.radixPoint,b)&&!0!==D?f.inArray(a.radixPoint,b):w(b,o):w(b,m):w(b,j)}function W(a){return f.inputmask.escapeRegex.call(this,a)}function P(a,b){return b?a.replace(RegExp("^("+W(g.join(""))+")*"),""):a.replace(RegExp("("+W(g.join(""))+")*$"),"")}function U(a,b){o(a,b,!1);var c=b.slice(),g,n;if(f(a).data("inputmask").isRTL)for(n=0;n<=c.length-1;n++)if(g=n%h.length,h[g].optionality)if(!s(n)||!B(n,b[n],b,!0))c.splice(0,
1);else break;else break;else for(n=c.length-1;0<=n;n--)if(g=n%h.length,h[g].optionality)if(!s(n)||!B(n,b[n],b,!0))c.pop();else break;else break;z(a,c)}function X(a,b){var c=a[0];if(h&&(!0===b||!a.hasClass("hasDatepicker"))){var l=g.slice();o(c,l);return f.map(l,function(a,b){return s(b)&&B(b,a,l,!0)?a:null}).join("")}return c._valueGet()}function l(e,b,c){var g=e.jquery&&0<e.length?e[0]:e;if("number"==typeof b)f(e).is(":visible")&&(c="number"==typeof c?c:b,!1==a.insertMode&&b==c&&c++,g.setSelectionRange?
Q?(setTimeout(function(){g.selectionStart=b;g.selectionEnd=Q?b:c},10),L=b,I=c):(g.selectionStart=b,g.selectionEnd=c):g.createTextRange&&(e=g.createTextRange(),e.collapse(!0),e.moveEnd("character",c),e.moveStart("character",b),e.select()));else{if(!f(e).is(":visible"))return{begin:0,end:0};g.setSelectionRange?(b=g.selectionStart,c=g.selectionEnd):document.selection&&document.selection.createRange&&(e=document.selection.createRange(),b=0-e.duplicate().moveStart("character",-1E5),c=b+e.text.length);
return{begin:b,end:c}}}function R(a){for(var b=!0,a=a._valueGet(),c=a.length,f=0;f<c;f++)if(s(f)&&a.charAt(f)==y(f)){b=!1;break}return b}function V(e){function b(a){a=f._data(a).events;f.each(a,function(a,d){f.each(d,function(a,d){if("inputmask"==d.namespace){var b=d.handler;d.handler=function(){return this.readOnly||this.disabled?!1:b.apply(this,arguments)}}})})}function c(a){var d;Object.getOwnPropertyDescriptor&&(d=Object.getOwnPropertyDescriptor(a,"value"));if(d&&d.get)a._valueGet||(a._valueGet=
d.get,a._valueSet=d.set,Object.defineProperty(a,"value",{get:function(){var a=f(this),d=f(this).data("inputmask");return d&&d.autoUnmask?a.inputmask("unmaskedvalue"):this._valueGet()!=d._buffer.join("")?this._valueGet():""},set:function(a){this._valueSet(a);f(this).triggerHandler("setvalue.inputmask")}}));else if(document.__lookupGetter__&&a.__lookupGetter__("value"))a._valueGet||(a._valueGet=a.__lookupGetter__("value"),a._valueSet=a.__lookupSetter__("value"),a.__defineGetter__("value",function(){var a=
f(this),d=f(this).data("inputmask");return d&&d.autoUnmask?a.inputmask("unmaskedvalue"):this._valueGet()!=d._buffer.join("")?this._valueGet():""}),a.__defineSetter__("value",function(a){this._valueSet(a);f(this).triggerHandler("setvalue.inputmask")}));else if(a._valueGet||(a._valueGet=function(){return this.value},a._valueSet=function(a){this.value=a}),!0!=f.fn.val.inputmaskpatch)f.fn.val=function(){if(arguments.length==0){var a=f(this);if(a.data("inputmask")){if(a.data("inputmask").autoUnmask)return a.inputmask("unmaskedvalue");
var d=f.inputmask.val.apply(a);return d!=a.data("inputmask")._buffer.join("")?d:""}return f.inputmask.val.apply(a)}var b=arguments;return this.each(function(){var a=f(this),d=f.inputmask.val.apply(a,b);a.data("inputmask")&&a.triggerHandler("setvalue.inputmask");return d})},f.extend(f.fn.val,{inputmaskpatch:!0})}function u(d,b){if(a.numericInput&&""!=a.radixPoint){var c=d._valueGet().indexOf(a.radixPoint);x=b.begin<=c||b.end<=c||-1==c}}function n(a,b,c){for(;!s(a)&&0<=a-1;)a--;for(var f=a;f<b&&f<p(d);f++)if(s(f)){K(d,
f);var e=w(d,f),i=v(d,e);if(i!=y(e))if(e<p(d)&&!1!==B(f,i,d,!0)&&h[f%h.length].def==h[e%h.length].def)E(d,f,v(d,e)),K(d,e);else{if(s(f))break}else if(void 0==c)break}else K(d,f);void 0!=c&&E(d,x?b:M(d,b),c);d=P(d.join(""),x).split("");0==d.length&&(d=g.slice());return a}function A(a,b,c,f){for(;a<=b&&a<p(d);a++)if(s(a)){var e=v(d,a);E(d,a,c);if(e!=y(a))if(c=w(d,a),c<p(d))if(!1!==B(c,e,d,!0)&&h[a%h.length].def==h[c%h.length].def)c=e;else if(s(c))break;else c=e;else break;else if(!0!==f)break}else K(d,
a);f=d.length;d=P(d.join(""),x).split("");0==d.length&&(d=g.slice());return b-(f-d.length)}function H(b){q=!1;var c=this,e=b.keyCode,h=l(c);u(c,h);if(e==a.keyCode.BACKSPACE||e==a.keyCode.DELETE||Z&&127==e){var r=p(d);if(0==h.begin&&h.end==r)d=g.slice(),z(c,d),l(c,o(c,d,!1));else if(1<h.end-h.begin||1==h.end-h.begin&&a.insertMode)T(d,h.begin,h.end),z(c,d,x?o(c,d,!1):h.begin);else{var i=Y?h.end:h.begin;e==a.keyCode.DELETE?(i<C&&(i=C),i<r&&(a.numericInput&&""!=a.radixPoint&&d[i]==a.radixPoint?(i=d.length-
1==i?i:w(d,i),i=n(i,r)):x?(i=A(C,i,y(i),!0),i=w(d,i)):i=n(i,r),z(c,d,i))):e==a.keyCode.BACKSPACE&&i>C&&(i-=1,a.numericInput&&""!=a.radixPoint&&d[i]==a.radixPoint?(i=A(C,d.length-1==i?i:i-1,y(i),!0),i++):x?(i=A(C,i,y(i),!0),i=d[i+1]==a.radixPoint?i+1:w(d,i)):i=n(i,r),z(c,d,i))}c._valueGet()==g.join("")&&f(c).trigger("cleared");b.preventDefault()}else e==a.keyCode.END||e==a.keyCode.PAGE_DOWN?setTimeout(function(){var e=o(c,d,!1,!0);!a.insertMode&&(e==p(d)&&!b.shiftKey)&&e--;l(c,b.shiftKey?h.begin:e,
e)},0):e==a.keyCode.HOME&&!b.shiftKey||e==a.keyCode.PAGE_UP?l(c,0,b.shiftKey?h.begin:0):e==a.keyCode.ESCAPE?(c._valueSet(N),l(c,0,o(c,d))):e==a.keyCode.INSERT?(a.insertMode=!a.insertMode,l(c,!a.insertMode&&h.begin==p(d)?h.begin-1:h.begin)):b.ctrlKey&&88==e?setTimeout(function(){l(c,o(c,d,!0))},0):a.insertMode||(e==a.keyCode.RIGHT?(r=h.begin==h.end?h.end+1:h.end,r=r<p(d)?r:h.end,l(c,b.shiftKey?h.begin:r,b.shiftKey?r+1:r)):e==a.keyCode.LEFT&&(r=h.begin-1,r=0<r?r:0,l(c,r,b.shiftKey?h.end:r)));a.onKeyDown.call(this,
b,d,a);F=-1!=f.inArray(e,a.ignorables)}function j(c){if(q)return!1;q=!0;var b=this,e=f(b),c=c||window.event,g=c.which||c.charCode||c.keyCode,h=String.fromCharCode(g);if(a.numericInput&&h==a.radixPoint){var i=b._valueGet().indexOf(a.radixPoint);l(b,w(d,-1!=i?i:p(d)))}if(c.metaKey||F)return!0;if(g){var k=l(b),m=p(d),g=!0;T(d,k.begin,k.end);if(x){var i=M(d,k.end),j;if(!1!==(j=B(i==m||v(d,i)==a.radixPoint?M(d,i):i,h,d,!1))){!0!==j&&(i=void 0!=j.pos?j.pos:i,h=void 0!=j.c?j.c:h);m=p(d);j=C;if(!0==a.insertMode){if(!0==
a.greedy)for(var o=d.slice();v(o,j,!0)!=y(j)&&j<=i;)j=j==m?m+1:w(d,j);j<=i&&(a.greedy||d.length<m)?(d[C]!=y(C)&&d.length<m&&(o=S(d,-1,x),0!=k.end&&(i+=o),m=d.length),n(j,i,h)):g=!1}else E(d,i,h);g&&(z(b,d,a.numericInput?i+1:i),setTimeout(function(){R(b)&&e.trigger("complete")},0))}}else if(i=w(d,k.begin-1),S(d,i,x),!1!==(j=B(i,h,d,!1))){!0!==j&&(i=void 0!=j.pos?j.pos:i,h=void 0!=j.c?j.c:h);if(!0==a.insertMode){k=p(d);for(o=d.slice();v(o,k,!0)!=y(k)&&k>=i;)k=0==k?-1:M(d,k);k>=i?A(i,d.length,h):g=!1}else E(d,
i,h);g&&(h=w(d,i),z(b,d,h),setTimeout(function(){R(b)&&e.trigger("complete")},0))}Q&&l(b,L,I);c.preventDefault()}}function k(c){var b=f(this),e=c.keyCode;a.onKeyUp.call(this,c,d,a);e==a.keyCode.TAB&&(b.hasClass("focus.inputmask")&&0==this._valueGet().length&&a.showMaskOnFocus)&&(d=g.slice(),z(this,d),x||l(this,0),N=this._valueGet())}var m=f(e);if(m.is(":input")){var d=g.slice();a.greedy=a.greedy?a.greedy:0==a.repeat;var t=m.attr("maxLength");p(d)>t&&-1<t&&(t<g.length&&(g.length=t),!1==a.greedy&&(a.repeat=
Math.round(t/g.length)),m.attr("maxLength",2*p(d)));m.data("inputmask",{tests:h,_buffer:g,greedy:a.greedy,repeat:a.repeat,autoUnmask:a.autoUnmask,definitions:a.definitions,isRTL:!1});c(e);var N=e._valueGet(),q=!1,F=!1,G=-1,C=w(d,-1);M(d,p(d));var x=!1;if("rtl"==e.dir||a.numericInput)("rtl"==e.dir||a.numericInput&&a.rightAlignNumerics)&&m.css("text-align","right"),e.dir="ltr",m.removeAttr("dir"),t=m.data("inputmask"),t.isRTL=!0,m.data("inputmask",t),x=!0;m.unbind(".inputmask");m.removeClass("focus.inputmask");
m.bind("mouseenter.inputmask",function(){if(!f(this).hasClass("focus.inputmask")&&a.showMaskOnHover){var c=this._valueGet().length;c<d.length&&(0==c&&(d=g.slice()),z(this,d))}}).bind("blur.inputmask",function(){var c=f(this),b=this._valueGet();c.removeClass("focus.inputmask");b!=N&&c.change();a.clearMaskOnLostFocus&&""!=b&&(b==g.join("")?this._valueSet(""):U(this,d));R(this)||(c.trigger("incomplete"),a.clearIncomplete&&(a.clearMaskOnLostFocus?this._valueSet(""):(d=g.slice(),z(this,d))))}).bind("focus.inputmask",
function(){var c=f(this),b=this._valueGet();if(a.showMaskOnFocus&&!c.hasClass("focus.inputmask")&&(!a.showMaskOnHover||a.showMaskOnHover&&""==b))b=b.length,b<d.length&&(0==b&&(d=g.slice()),l(this,o(this,d,!0)));c.addClass("focus.inputmask");N=this._valueGet()}).bind("mouseleave.inputmask",function(){var c=f(this);a.clearMaskOnLostFocus&&(c.hasClass("focus.inputmask")||(this._valueGet()==g.join("")||""==this._valueGet()?this._valueSet(""):U(this,d)))}).bind("click.inputmask",function(){var a=this;
setTimeout(function(){var c=l(a);if(c.begin==c.end){var b=c.begin;G=o(a,d,!1);u(a,c);x?l(a,b>G&&(!1!==B(b,d[b],d,!0)||!s(b))?b:G):l(a,b<G&&(!1!==B(b,d[b],d,!0)||!s(b))?b:G)}},0)}).bind("dblclick.inputmask",function(){var a=this;setTimeout(function(){l(a,0,G)},0)}).bind("keydown.inputmask",H).bind("keypress.inputmask",j).bind("keyup.inputmask",k).bind($+".inputmask dragdrop.inputmask drop.inputmask",function(){var a=this;setTimeout(function(){l(a,o(a,d,!0))},0)}).bind("setvalue.inputmask",function(){N=
this._valueGet();o(this,d,!0);this._valueGet()==g.join("")&&this._valueSet("")}).bind("complete.inputmask",a.oncomplete).bind("incomplete.inputmask",a.onincomplete).bind("cleared.inputmask",a.oncleared);var G=o(e,d,!0),J;try{J=document.activeElement}catch(O){}J===e?(m.addClass("focus.inputmask"),l(e,G)):a.clearMaskOnLostFocus&&(e._valueGet()==g.join("")?e._valueSet(""):U(e,d));b(e)}}var a=f.extend(!0,{},f.inputmask.defaults,A),$=function(a){var b=document.createElement("input"),a="on"+a,c=a in b;
c||(b.setAttribute(a,"return;"),c="function"==typeof b[a]);return c}("paste")?"paste":"input",Z=null!=navigator.userAgent.match(/iphone/i),Q=null!=navigator.userAgent.match(/android.*safari.*/i),Y;if(Q){var aa=navigator.userAgent.match(/safari.*/i);Y=533>=parseInt(RegExp(/[0-9]+/).exec(aa))}if("string"==typeof u)switch(u){case "mask":H(a.alias,A);var g=J(),h=O();return this.each(function(){V(this)});case "unmaskedvalue":return h=this.data("inputmask").tests,g=this.data("inputmask")._buffer,a.greedy=
this.data("inputmask").greedy,a.repeat=this.data("inputmask").repeat,a.definitions=this.data("inputmask").definitions,X(this);case "remove":return this.each(function(){var e=f(this),b=this;setTimeout(function(){if(e.data("inputmask")){h=e.data("inputmask").tests;g=e.data("inputmask")._buffer;a.greedy=e.data("inputmask").greedy;a.repeat=e.data("inputmask").repeat;a.definitions=e.data("inputmask").definitions;b._valueSet(X(e,!0));e.removeData("inputmask");e.unbind(".inputmask");e.removeClass("focus.inputmask");
var c;Object.getOwnPropertyDescriptor&&(c=Object.getOwnPropertyDescriptor(b,"value"));c&&c.get?b._valueGet&&Object.defineProperty(b,"value",{get:b._valueGet,set:b._valueSet}):document.__lookupGetter__&&b.__lookupGetter__("value")&&b._valueGet&&(b.__defineGetter__("value",b._valueGet),b.__defineSetter__("value",b._valueSet));delete b._valueGet;delete b._valueSet}},0)});case "getemptymask":return this.data("inputmask")?this.data("inputmask")._buffer.join(""):"";case "hasMaskedValue":return this.data("inputmask")?
!this.data("inputmask").autoUnmask:!1;case "isComplete":return h=this.data("inputmask").tests,g=this.data("inputmask")._buffer,a.greedy=this.data("inputmask").greedy,a.repeat=this.data("inputmask").repeat,a.definitions=this.data("inputmask").definitions,R(this[0]);default:return H(u,A)||(a.mask=u),g=J(),h=O(),this.each(function(){V(this)})}else{if("object"==typeof u)return a=f.extend(!0,{},f.inputmask.defaults,u),H(a.alias,u),g=J(),h=O(),this.each(function(){V(this)});if(void 0==u)return this.each(function(){var e=
f(this).attr("data-inputmask");if(e&&""!=e)try{var e=e.replace(RegExp("'","g"),'"'),b=f.parseJSON("{"+e+"}");a=f.extend(!0,{},f.inputmask.defaults,b);H(a.alias,b);a.alias=void 0;f(this).inputmask(a)}catch(c){}})}return this})})(jQuery);
