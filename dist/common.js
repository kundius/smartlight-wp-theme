/*! For license information please see common.js.LICENSE.txt */
(()=>{var t={6414:(t,e,r)=>{"use strict";var n=r(1440),o=r.n(n),i=r(4486),a=r.n(i),s=r(3493),c=r.n(s),u=(r(2010),"undefined"!=typeof globalThis&&globalThis||"undefined"!=typeof self&&self||void 0!==u&&u),l="URLSearchParams"in u,d="Symbol"in u&&"iterator"in Symbol,p="FileReader"in u&&"Blob"in u&&function(){try{return new Blob,!0}catch(t){return!1}}(),f="FormData"in u,h="ArrayBuffer"in u;if(h)var y=["[object Int8Array]","[object Uint8Array]","[object Uint8ClampedArray]","[object Int16Array]","[object Uint16Array]","[object Int32Array]","[object Uint32Array]","[object Float32Array]","[object Float64Array]"],m=ArrayBuffer.isView||function(t){return t&&y.indexOf(Object.prototype.toString.call(t))>-1};function v(t){if("string"!=typeof t&&(t=String(t)),/[^a-z0-9\-#$%&'*+.^_`|~!]/i.test(t)||""===t)throw new TypeError('Invalid character in header field name: "'+t+'"');return t.toLowerCase()}function g(t){return"string"!=typeof t&&(t=String(t)),t}function b(t){var e={next:function(){var e=t.shift();return{done:void 0===e,value:e}}};return d&&(e[Symbol.iterator]=function(){return e}),e}function w(t){this.map={},t instanceof w?t.forEach((function(t,e){this.append(e,t)}),this):Array.isArray(t)?t.forEach((function(t){this.append(t[0],t[1])}),this):t&&Object.getOwnPropertyNames(t).forEach((function(e){this.append(e,t[e])}),this)}function x(t){if(t.bodyUsed)return Promise.reject(new TypeError("Already read"));t.bodyUsed=!0}function j(t){return new Promise((function(e,r){t.onload=function(){e(t.result)},t.onerror=function(){r(t.error)}}))}function _(t){var e=new FileReader,r=j(e);return e.readAsArrayBuffer(t),r}function E(t){if(t.slice)return t.slice(0);var e=new Uint8Array(t.byteLength);return e.set(new Uint8Array(t)),e.buffer}function A(){return this.bodyUsed=!1,this._initBody=function(t){var e;this.bodyUsed=this.bodyUsed,this._bodyInit=t,t?"string"==typeof t?this._bodyText=t:p&&Blob.prototype.isPrototypeOf(t)?this._bodyBlob=t:f&&FormData.prototype.isPrototypeOf(t)?this._bodyFormData=t:l&&URLSearchParams.prototype.isPrototypeOf(t)?this._bodyText=t.toString():h&&p&&(e=t)&&DataView.prototype.isPrototypeOf(e)?(this._bodyArrayBuffer=E(t.buffer),this._bodyInit=new Blob([this._bodyArrayBuffer])):h&&(ArrayBuffer.prototype.isPrototypeOf(t)||m(t))?this._bodyArrayBuffer=E(t):this._bodyText=t=Object.prototype.toString.call(t):this._bodyText="",this.headers.get("content-type")||("string"==typeof t?this.headers.set("content-type","text/plain;charset=UTF-8"):this._bodyBlob&&this._bodyBlob.type?this.headers.set("content-type",this._bodyBlob.type):l&&URLSearchParams.prototype.isPrototypeOf(t)&&this.headers.set("content-type","application/x-www-form-urlencoded;charset=UTF-8"))},p&&(this.blob=function(){var t=x(this);if(t)return t;if(this._bodyBlob)return Promise.resolve(this._bodyBlob);if(this._bodyArrayBuffer)return Promise.resolve(new Blob([this._bodyArrayBuffer]));if(this._bodyFormData)throw new Error("could not read FormData body as blob");return Promise.resolve(new Blob([this._bodyText]))},this.arrayBuffer=function(){return this._bodyArrayBuffer?x(this)||(ArrayBuffer.isView(this._bodyArrayBuffer)?Promise.resolve(this._bodyArrayBuffer.buffer.slice(this._bodyArrayBuffer.byteOffset,this._bodyArrayBuffer.byteOffset+this._bodyArrayBuffer.byteLength)):Promise.resolve(this._bodyArrayBuffer)):this.blob().then(_)}),this.text=function(){var t,e,r,n=x(this);if(n)return n;if(this._bodyBlob)return t=this._bodyBlob,r=j(e=new FileReader),e.readAsText(t),r;if(this._bodyArrayBuffer)return Promise.resolve(function(t){for(var e=new Uint8Array(t),r=new Array(e.length),n=0;n<e.length;n++)r[n]=String.fromCharCode(e[n]);return r.join("")}(this._bodyArrayBuffer));if(this._bodyFormData)throw new Error("could not read FormData body as text");return Promise.resolve(this._bodyText)},f&&(this.formData=function(){return this.text().then(S)}),this.json=function(){return this.text().then(JSON.parse)},this}w.prototype.append=function(t,e){t=v(t),e=g(e);var r=this.map[t];this.map[t]=r?r+", "+e:e},w.prototype.delete=function(t){delete this.map[v(t)]},w.prototype.get=function(t){return t=v(t),this.has(t)?this.map[t]:null},w.prototype.has=function(t){return this.map.hasOwnProperty(v(t))},w.prototype.set=function(t,e){this.map[v(t)]=g(e)},w.prototype.forEach=function(t,e){for(var r in this.map)this.map.hasOwnProperty(r)&&t.call(e,this.map[r],r,this)},w.prototype.keys=function(){var t=[];return this.forEach((function(e,r){t.push(r)})),b(t)},w.prototype.values=function(){var t=[];return this.forEach((function(e){t.push(e)})),b(t)},w.prototype.entries=function(){var t=[];return this.forEach((function(e,r){t.push([r,e])})),b(t)},d&&(w.prototype[Symbol.iterator]=w.prototype.entries);var L=["DELETE","GET","HEAD","OPTIONS","POST","PUT"];function T(t,e){if(!(this instanceof T))throw new TypeError('Please use the "new" operator, this DOM object constructor cannot be called as a function.');var r,n,o=(e=e||{}).body;if(t instanceof T){if(t.bodyUsed)throw new TypeError("Already read");this.url=t.url,this.credentials=t.credentials,e.headers||(this.headers=new w(t.headers)),this.method=t.method,this.mode=t.mode,this.signal=t.signal,o||null==t._bodyInit||(o=t._bodyInit,t.bodyUsed=!0)}else this.url=String(t);if(this.credentials=e.credentials||this.credentials||"same-origin",!e.headers&&this.headers||(this.headers=new w(e.headers)),this.method=(n=(r=e.method||this.method||"GET").toUpperCase(),L.indexOf(n)>-1?n:r),this.mode=e.mode||this.mode||null,this.signal=e.signal||this.signal,this.referrer=null,("GET"===this.method||"HEAD"===this.method)&&o)throw new TypeError("Body not allowed for GET or HEAD requests");if(this._initBody(o),!("GET"!==this.method&&"HEAD"!==this.method||"no-store"!==e.cache&&"no-cache"!==e.cache)){var i=/([?&])_=[^&]*/;i.test(this.url)?this.url=this.url.replace(i,"$1_="+(new Date).getTime()):this.url+=(/\?/.test(this.url)?"&":"?")+"_="+(new Date).getTime()}}function S(t){var e=new FormData;return t.trim().split("&").forEach((function(t){if(t){var r=t.split("="),n=r.shift().replace(/\+/g," "),o=r.join("=").replace(/\+/g," ");e.append(decodeURIComponent(n),decodeURIComponent(o))}})),e}function O(t,e){if(!(this instanceof O))throw new TypeError('Please use the "new" operator, this DOM object constructor cannot be called as a function.');e||(e={}),this.type="default",this.status=void 0===e.status?200:e.status,this.ok=this.status>=200&&this.status<300,this.statusText=void 0===e.statusText?"":""+e.statusText,this.headers=new w(e.headers),this.url=e.url||"",this._initBody(t)}T.prototype.clone=function(){return new T(this,{body:this._bodyInit})},A.call(T.prototype),A.call(O.prototype),O.prototype.clone=function(){return new O(this._bodyInit,{status:this.status,statusText:this.statusText,headers:new w(this.headers),url:this.url})},O.error=function(){var t=new O(null,{status:0,statusText:""});return t.type="error",t};var k=[301,302,303,307,308];O.redirect=function(t,e){if(-1===k.indexOf(e))throw new RangeError("Invalid status code");return new O(null,{status:e,headers:{location:t}})};var q=u.DOMException;try{new q}catch(t){(q=function(t,e){this.message=t,this.name=e;var r=Error(t);this.stack=r.stack}).prototype=Object.create(Error.prototype),q.prototype.constructor=q}function C(t,e){return new Promise((function(r,n){var o=new T(t,e);if(o.signal&&o.signal.aborted)return n(new q("Aborted","AbortError"));var i=new XMLHttpRequest;function a(){i.abort()}i.onload=function(){var t,e,n={status:i.status,statusText:i.statusText,headers:(t=i.getAllResponseHeaders()||"",e=new w,t.replace(/\r?\n[\t ]+/g," ").split("\r").map((function(t){return 0===t.indexOf("\n")?t.substr(1,t.length):t})).forEach((function(t){var r=t.split(":"),n=r.shift().trim();if(n){var o=r.join(":").trim();e.append(n,o)}})),e)};n.url="responseURL"in i?i.responseURL:n.headers.get("X-Request-URL");var o="response"in i?i.response:i.responseText;setTimeout((function(){r(new O(o,n))}),0)},i.onerror=function(){setTimeout((function(){n(new TypeError("Network request failed"))}),0)},i.ontimeout=function(){setTimeout((function(){n(new TypeError("Network request failed"))}),0)},i.onabort=function(){setTimeout((function(){n(new q("Aborted","AbortError"))}),0)},i.open(o.method,function(t){try{return""===t&&u.location.href?u.location.href:t}catch(e){return t}}(o.url),!0),"include"===o.credentials?i.withCredentials=!0:"omit"===o.credentials&&(i.withCredentials=!1),"responseType"in i&&(p?i.responseType="blob":h&&o.headers.get("Content-Type")&&-1!==o.headers.get("Content-Type").indexOf("application/octet-stream")&&(i.responseType="arraybuffer")),!e||"object"!=typeof e.headers||e.headers instanceof w?o.headers.forEach((function(t,e){i.setRequestHeader(e,t)})):Object.getOwnPropertyNames(e.headers).forEach((function(t){i.setRequestHeader(t,g(e.headers[t]))})),o.signal&&(o.signal.addEventListener("abort",a),i.onreadystatechange=function(){4===i.readyState&&o.signal.removeEventListener("abort",a)}),i.send(void 0===o._bodyInit?null:o._bodyInit)}))}function B(t,e){var r=Object.keys(t);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(t);e&&(n=n.filter((function(e){return Object.getOwnPropertyDescriptor(t,e).enumerable}))),r.push.apply(r,n)}return r}function P(t){for(var e=1;e<arguments.length;e++){var r=null!=arguments[e]?arguments[e]:{};e%2?B(Object(r),!0).forEach((function(e){D(t,e,r[e])})):Object.getOwnPropertyDescriptors?Object.defineProperties(t,Object.getOwnPropertyDescriptors(r)):B(Object(r)).forEach((function(e){Object.defineProperty(t,e,Object.getOwnPropertyDescriptor(r,e))}))}return t}function D(t,e,r){return e in t?Object.defineProperty(t,e,{value:r,enumerable:!0,configurable:!0,writable:!0}):t[e]=r,t}C.polyfill=!0,u.fetch||(u.fetch=C,u.Headers=w,u.Request=T,u.Response=O);var U=function(t){return!!t&&!!(t.offsetWidth||t.offsetHeight||t.getClientRects().length)};o()(),a()(document.querySelectorAll(".js-header"),(function(t){var e=parseInt(window.getComputedStyle(t).getPropertyValue("top")),r=c()((function(){window.pageYOffset>e?t.classList.add("header_fixed"):t.classList.remove("header_fixed")}),10);window.addEventListener("scroll",r)})),a()(document.querySelectorAll(".js-drawer"),(function(t){var e=document.querySelector(".js-drawer-toggle"),r=!1,n=function(e){!t.contains(e.target)&&U(t)&&o()},o=function(){t.classList.remove("header__drawer_opened"),e.classList.remove("header__toggle_close"),document.removeEventListener("click",n),r=!1};e.addEventListener("click",(function(i){i.stopPropagation(),r?o():(t.classList.add("header__drawer_opened"),e.classList.add("header__toggle_close"),document.addEventListener("click",n),r=!0)})),a()(t.querySelectorAll("[data-next]"),(function(e){e.addEventListener("click",(function(){a()(t.querySelectorAll("[data-parent]"),(function(t){"root"!==t.dataset.parent&&t.classList.remove("header-drawer_opened")})),t.querySelector('[data-parent="'.concat(e.dataset.next,'"]')).classList.add("header-drawer_opened")}))}))}));var F=function t(e){var r=this;!function(t,e){if(!(t instanceof e))throw new TypeError("Cannot call a class as a function")}(this,t),D(this,"promise",null),D(this,"playing",!1),D(this,"acceleration",0),D(this,"queue",[]),D(this,"run",(function(){if(r.queue.length){var t=r.queue[0];0===t.progress&&"function"==typeof t.onStart&&t.onStart(),t.progress+=r.step+r.acceleration,t.progress>1&&(t.progress=1),t.callback(t.progress),1===t.progress&&("function"==typeof t.onEnd&&t.onEnd(),r.queue.shift()),requestAnimationFrame(r.run)}else r.playing=!1})),D(this,"add",(function(t,e){r.queue.push(P(P({},e),{},{progress:0,callback:t})),r.acceleration=r.step*r.queue.length-r.step})),D(this,"play",(function(){r.playing||(r.playing=!0,r.run())})),D(this,"destroy",(function(){r.queue=[]})),this.step=parseFloat(e.velocity)/60};function I(t,e){var r=e.querySelector("[data-modal-close]"),n=e.querySelector('[name="form"]'),o=function(r){e.contains(r.target)||!U(e)||t.contains(r.target)||(a(),i())},i=function(){document.removeEventListener("click",o)},a=function(){e.classList.remove("_opened")};t.addEventListener("click",(function(){e.classList.add("_opened"),n&&(n.value=t.dataset.modalForm?t.dataset.modalForm:"Форма в модальном окне"),document.addEventListener("click",o)})),r.addEventListener("click",a)}a()(document.querySelectorAll("[data-slider]"),(function(t){var e=this,r=Object.assign({vertical:!1,velocity:1,span:1},function(t){var e=t.split(";").map((function(t){return t.trim()})),r={};return a()(e,(function(t){var e=t.split(":").map((function(t){return t.trim()}));2===e.length&&(r[e[0]]=e[1])})),r}(t.dataset.slider)),n=t.querySelectorAll("[data-slider-item]"),o=t.querySelector("[data-slider-wrapper]"),i=t.querySelectorAll("[data-slider-control]"),s=0,c=new F(r),u=[],l=[],d=[];a()(i,(function(t){"previous"==t.dataset.sliderControl&&u.push(t),"next"==t.dataset.sliderControl&&l.push(t),!isNaN(parseFloat(t.dataset.sliderControl))&&isFinite(t.dataset.sliderControl)&&d.push(t)})),a()(u,(function(t){return t.addEventListener("click",(function(){return p()}))})),a()(l,(function(t){return t.addEventListener("click",(function(){return f()}))})),a()(d,(function(t){return t.addEventListener("click",(function(){return h(t.dataset.sliderControl)}))}));var p=function(){if(s!==(s-r.span+n.length)%n.length)for(var t=0;t<r.span;t++)y((s-1+n.length)%n.length,1)},f=function(){if(s!==(s+r.span)%n.length)for(var t=0;t<r.span;t++)y((s+1)%n.length,-1)},h=function(t){if(s!==t){var e=Math.abs(t-s);if(t>s)for(var r=0;r<e;r++)y((s+1)%n.length,-1);if(t<s)for(var o=0;o<e;o++)y((s-1+n.length)%n.length,1)}},y=function(i,u){var l=s;s=parseInt(i),c.add(function(t,e,i){if(a()(d,(function(t){t.classList.remove("_active"),t.dataset.sliderControl==e&&t.classList.add("_active")})),a()(n,(function(r,n){u<0?(n===t&&(r.style.order=-1),n>t&&(r.style.order=null),n<t&&(r.style.order=1)):(n===e&&(r.style.order=-2),n>e&&(r.style.order=-1),n<e&&(r.style.order=null))})),r.vertical){var s=u<0?n[t].offsetHeight:n[e].offsetHeight,c=u<0?s*i:s-s*i;o.style.transform="translate3d(0px, -".concat(c,"px, 0px)")}else{var l=u<0?n[t].offsetWidth:n[e].offsetWidth,p=u<0?l*i:l-l*i;o.style.transform="translate3d(-".concat(p,"px, 0px, 0px)")}}.bind(e,l,s),{onStart:t.dispatchEvent(new CustomEvent("slide.start",{detail:{retreat:l,active:s}})),onEnd:t.dispatchEvent(new CustomEvent("slide.end",{detail:{retreat:l,active:s}}))}),c.play()};y(s,1),t.slider={previous:p,next:f,show:h}})),a()(document.querySelectorAll(".js-img-to-svg"),(function(t){var e=new XMLHttpRequest;e.onreadystatechange=function(){if(4==this.readyState&&200==this.status){var e=document.createElement("div");e.innerHTML=this.responseText;var r=e.querySelector("svg");t.parentNode.insertBefore(r,t.nextSibling),t.parentNode.removeChild(t)}},e.open("GET",t.src,!0),e.send()})),a()(document.querySelectorAll(".js-main-projects"),(function(t){var e=t.querySelector(".js-main-projects-prev"),r=t.querySelector(".js-main-projects-next"),n=t.querySelectorAll(".js-main-projects-item"),o=1,i=window.matchMedia("(max-width: 960px)").matches?"5":"8",s=Math.ceil(n.length/i),c=function(t){o=t,a()(n,(function(t,e){!function(t){return t>=i*o-i&&t<i*o}(e)?t.classList.remove("_visible"):t.classList.add("_visible")}))};c(1),e.addEventListener("click",(function(){c(1===o?s:o-1)})),r.addEventListener("click",(function(){c(o===s?1:o+1)}))})),a()(document.querySelectorAll(".js-scroll"),(function(t){var e=document.querySelector(".js-header"),r=0;if(t.dataset.target){var n=document.querySelector(t.dataset.target);n&&(r=n.offsetTop-e.offsetHeight)}t.addEventListener("click",(function(){window.scroll({top:r,left:0,behavior:"smooth"})}))})),a()(document.querySelectorAll(".js-masonry-grid"),(function(t){for(var e=0;e<t.children.length;e++){for(var r=t.children[e],n=parseInt(window.getComputedStyle(r).getPropertyValue("padding-top")),o=null,i=0;i<e;i++)t.children[i].offsetLeft===r.offsetLeft&&(o=t.children[i]);if(o){var a=o.getBoundingClientRect().height,s=o.children[0].getBoundingClientRect().height;s<a&&(r.style.marginTop="-".concat(a-s-n,"px"))}}})),a()(document.querySelectorAll(".js-sticky-action"),(function(t){t.querySelector(".js-sticky-action-close").addEventListener("click",(function(){t.classList.add("_hidden")}))})),a()(document.querySelectorAll(".js-cube"),(function(t){var e=.82*t.offsetWidth/2,r=t.querySelector(".js-cube-front"),n=t.querySelector(".js-cube-back");t.style.transform="translateZ(-".concat(e,"px)"),r.style.transform="translateZ(".concat(e,"px)"),n.style.transform="translateY(-".concat(e,"px) rotateX(90deg)"),t.addEventListener("mouseenter",(function(){t.style.transform="rotateX(-90deg) translateY(".concat(e,"px)")})),t.addEventListener("mouseleave",(function(){t.style.transform="translateZ(-".concat(e,"px)")}))})),a()(document.querySelectorAll("[data-project]"),(function(t){var e=t.dataset.project,r=t.dataset.projectIndex||0;t.addEventListener("click",(function(t){t.preventDefault();var n=document.createElement("div");n.classList.add("modal-project");var o=document.createElement("div");o.classList.add("modal-project__overlay");var i=document.createElement("button");i.classList.add("modal-project__close");var a=document.createElement("div");a.classList.add("modal-project__body");var s=document.createElement("div");s.classList.add("project-details");var c=document.createElement("div");c.classList.add("project-details__gallery");var u=document.createElement("div");u.classList.add("project-details__info");var l=document.createElement("div");l.classList.add("project-details__title");var d=document.createElement("div");d.classList.add("project-details__desc");var p=document.createElement("img");p.classList.add("project-details__image");var f=document.createElement("button");f.classList.add("ui-slider-nav","ui-slider-nav_small","project-details__previous");var h=document.createElement("span");h.classList.add("ui-arrow-left");var y=document.createElement("button");y.classList.add("ui-slider-nav","ui-slider-nav_small","project-details__next");var m=document.createElement("span");m.classList.add("ui-arrow-right"),y.appendChild(m),f.appendChild(h),u.appendChild(l),u.appendChild(d),c.appendChild(p),c.appendChild(f),c.appendChild(y),s.appendChild(c),s.appendChild(u),a.appendChild(s),n.appendChild(o),n.appendChild(i),n.appendChild(a),document.body.appendChild(n),i.addEventListener("click",(function(){n.parentElement.removeChild(n)})),o.addEventListener("click",(function(){n.parentElement.removeChild(n)}));var v=function(t){var e=document.createElement("img");a.classList.add("modal-project__body_loading"),e.onload=function(){p.src=t,a.classList.remove("modal-project__body_loading")},e.src=t},g=new FormData;g.append("id",e),g.append("action","get_project"),fetch(myajax.url,{method:"POST",body:g}).then((function(t){return t.json()})).then((function(t){l.innerHTML=t.post.post_title,d.innerHTML=t.post.post_excerpt,p.src=t.gallery[r].url,f.addEventListener("click",(function(){r=(r-1+t.gallery.length)%t.gallery.length,v(t.gallery[r].url)})),y.addEventListener("click",(function(){r=(r+1)%t.gallery.length,v(t.gallery[r].url)}))}))}))})),a()(document.querySelectorAll("[data-modal]"),(function(t){document.querySelector(t.dataset.modal),I(t,document.querySelector(t.dataset.modal))})),a()(document.querySelectorAll(".js-form"),(function(t){var e=t.querySelectorAll("span.wpcf7-form-control-wrap"),r=[];t.addEventListener("submit",(function(n){n.preventDefault(),a()(e,(function(t){return t.classList.remove("_validation-error")})),a()(r,(function(t){t.parentNode&&t.parentNode.removeChild(t)})),r=[],fetch(t.action,{method:"POST",body:new FormData(t)}).then((function(t){return t.json()})).then((function(e){var n=function(t,e){t.classList.add("_validation-error");var n=document.createElement("span");n.classList.add("ui-form-error"),n.innerHTML=e,r.push(n),t.appendChild(n);var o=document.createElement("span");o.classList.add("ui-form-error__close"),n.appendChild(o),o.addEventListener("click",(function(t){t.stopPropagation(),n.parentNode.removeChild(n)}))};"mail_sent"==e.status&&("function"==typeof ym&&ym(56370736,"reachGoal","TARGET"),t.reset(),t.classList.add("_validation-mail_sent"),setTimeout((function(){t.classList.remove("_validation-mail_sent")}),5e3)),"acceptance_missing"!=e.status&&"mail_failed"!=e.status||n(t.querySelector(".wpcf7-form-control-wrap.submit"),e.message),"validation_failed"==e.status&&a()(e.invalidFields,(function(e){n(t.querySelector(e.into),e.message)}))}))}))}));var R=document.querySelectorAll(".js-call-or-modal");R.length&&R.forEach((function(t){window.matchMedia("(min-width: 768px)").matches?I(t,document.querySelector(t.dataset.target)):t.addEventListener("click",(function(){window.location.href="tel:".concat(t.dataset.tel)}))}))},2705:(t,e,r)=>{var n=r(5639).Symbol;t.exports=n},7412:t=>{t.exports=function(t,e){for(var r=-1,n=null==t?0:t.length;++r<n&&!1!==e(t[r],r,t););return t}},4636:(t,e,r)=>{var n=r(2545),o=r(5694),i=r(1469),a=r(4144),s=r(5776),c=r(6719),u=Object.prototype.hasOwnProperty;t.exports=function(t,e){var r=i(t),l=!r&&o(t),d=!r&&!l&&a(t),p=!r&&!l&&!d&&c(t),f=r||l||d||p,h=f?n(t.length,String):[],y=h.length;for(var m in t)!e&&!u.call(t,m)||f&&("length"==m||d&&("offset"==m||"parent"==m)||p&&("buffer"==m||"byteLength"==m||"byteOffset"==m)||s(m,y))||h.push(m);return h}},9881:(t,e,r)=>{var n=r(7816),o=r(9291)(n);t.exports=o},8483:(t,e,r)=>{var n=r(5063)();t.exports=n},7816:(t,e,r)=>{var n=r(8483),o=r(3674);t.exports=function(t,e){return t&&n(t,e,o)}},4239:(t,e,r)=>{var n=r(2705),o=r(9607),i=r(2333),a=n?n.toStringTag:void 0;t.exports=function(t){return null==t?void 0===t?"[object Undefined]":"[object Null]":a&&a in Object(t)?o(t):i(t)}},9454:(t,e,r)=>{var n=r(4239),o=r(7005);t.exports=function(t){return o(t)&&"[object Arguments]"==n(t)}},8749:(t,e,r)=>{var n=r(4239),o=r(1780),i=r(7005),a={};a["[object Float32Array]"]=a["[object Float64Array]"]=a["[object Int8Array]"]=a["[object Int16Array]"]=a["[object Int32Array]"]=a["[object Uint8Array]"]=a["[object Uint8ClampedArray]"]=a["[object Uint16Array]"]=a["[object Uint32Array]"]=!0,a["[object Arguments]"]=a["[object Array]"]=a["[object ArrayBuffer]"]=a["[object Boolean]"]=a["[object DataView]"]=a["[object Date]"]=a["[object Error]"]=a["[object Function]"]=a["[object Map]"]=a["[object Number]"]=a["[object Object]"]=a["[object RegExp]"]=a["[object Set]"]=a["[object String]"]=a["[object WeakMap]"]=!1,t.exports=function(t){return i(t)&&o(t.length)&&!!a[n(t)]}},280:(t,e,r)=>{var n=r(5726),o=r(6916),i=Object.prototype.hasOwnProperty;t.exports=function(t){if(!n(t))return o(t);var e=[];for(var r in Object(t))i.call(t,r)&&"constructor"!=r&&e.push(r);return e}},2545:t=>{t.exports=function(t,e){for(var r=-1,n=Array(t);++r<t;)n[r]=e(r);return n}},7561:(t,e,r)=>{var n=r(7990),o=/^\s+/;t.exports=function(t){return t?t.slice(0,n(t)+1).replace(o,""):t}},7518:t=>{t.exports=function(t){return function(e){return t(e)}}},4290:(t,e,r)=>{var n=r(6557);t.exports=function(t){return"function"==typeof t?t:n}},9291:(t,e,r)=>{var n=r(8612);t.exports=function(t,e){return function(r,o){if(null==r)return r;if(!n(r))return t(r,o);for(var i=r.length,a=e?i:-1,s=Object(r);(e?a--:++a<i)&&!1!==o(s[a],a,s););return r}}},5063:t=>{t.exports=function(t){return function(e,r,n){for(var o=-1,i=Object(e),a=n(e),s=a.length;s--;){var c=a[t?s:++o];if(!1===r(i[c],c,i))break}return e}}},1957:(t,e,r)=>{var n="object"==typeof r.g&&r.g&&r.g.Object===Object&&r.g;t.exports=n},9607:(t,e,r)=>{var n=r(2705),o=Object.prototype,i=o.hasOwnProperty,a=o.toString,s=n?n.toStringTag:void 0;t.exports=function(t){var e=i.call(t,s),r=t[s];try{t[s]=void 0;var n=!0}catch(t){}var o=a.call(t);return n&&(e?t[s]=r:delete t[s]),o}},5776:t=>{var e=/^(?:0|[1-9]\d*)$/;t.exports=function(t,r){var n=typeof t;return!!(r=null==r?9007199254740991:r)&&("number"==n||"symbol"!=n&&e.test(t))&&t>-1&&t%1==0&&t<r}},5726:t=>{var e=Object.prototype;t.exports=function(t){var r=t&&t.constructor;return t===("function"==typeof r&&r.prototype||e)}},6916:(t,e,r)=>{var n=r(5569)(Object.keys,Object);t.exports=n},1167:(t,e,r)=>{t=r.nmd(t);var n=r(1957),o=e&&!e.nodeType&&e,i=o&&t&&!t.nodeType&&t,a=i&&i.exports===o&&n.process,s=function(){try{return i&&i.require&&i.require("util").types||a&&a.binding&&a.binding("util")}catch(t){}}();t.exports=s},2333:t=>{var e=Object.prototype.toString;t.exports=function(t){return e.call(t)}},5569:t=>{t.exports=function(t,e){return function(r){return t(e(r))}}},5639:(t,e,r)=>{var n=r(1957),o="object"==typeof self&&self&&self.Object===Object&&self,i=n||o||Function("return this")();t.exports=i},7990:t=>{var e=/\s/;t.exports=function(t){for(var r=t.length;r--&&e.test(t.charAt(r)););return r}},3279:(t,e,r)=>{var n=r(3218),o=r(7771),i=r(4841),a=Math.max,s=Math.min;t.exports=function(t,e,r){var c,u,l,d,p,f,h=0,y=!1,m=!1,v=!0;if("function"!=typeof t)throw new TypeError("Expected a function");function g(e){var r=c,n=u;return c=u=void 0,h=e,d=t.apply(n,r)}function b(t){return h=t,p=setTimeout(x,e),y?g(t):d}function w(t){var r=t-f;return void 0===f||r>=e||r<0||m&&t-h>=l}function x(){var t=o();if(w(t))return j(t);p=setTimeout(x,function(t){var r=e-(t-f);return m?s(r,l-(t-h)):r}(t))}function j(t){return p=void 0,v&&c?g(t):(c=u=void 0,d)}function _(){var t=o(),r=w(t);if(c=arguments,u=this,f=t,r){if(void 0===p)return b(f);if(m)return clearTimeout(p),p=setTimeout(x,e),g(f)}return void 0===p&&(p=setTimeout(x,e)),d}return e=i(e)||0,n(r)&&(y=!!r.leading,l=(m="maxWait"in r)?a(i(r.maxWait)||0,e):l,v="trailing"in r?!!r.trailing:v),_.cancel=function(){void 0!==p&&clearTimeout(p),h=0,c=f=u=p=void 0},_.flush=function(){return void 0===p?d:j(o())},_}},4486:(t,e,r)=>{var n=r(7412),o=r(9881),i=r(4290),a=r(1469);t.exports=function(t,e){return(a(t)?n:o)(t,i(e))}},6557:t=>{t.exports=function(t){return t}},5694:(t,e,r)=>{var n=r(9454),o=r(7005),i=Object.prototype,a=i.hasOwnProperty,s=i.propertyIsEnumerable,c=n(function(){return arguments}())?n:function(t){return o(t)&&a.call(t,"callee")&&!s.call(t,"callee")};t.exports=c},1469:t=>{var e=Array.isArray;t.exports=e},8612:(t,e,r)=>{var n=r(3560),o=r(1780);t.exports=function(t){return null!=t&&o(t.length)&&!n(t)}},4144:(t,e,r)=>{t=r.nmd(t);var n=r(5639),o=r(5062),i=e&&!e.nodeType&&e,a=i&&t&&!t.nodeType&&t,s=a&&a.exports===i?n.Buffer:void 0,c=(s?s.isBuffer:void 0)||o;t.exports=c},3560:(t,e,r)=>{var n=r(4239),o=r(3218);t.exports=function(t){if(!o(t))return!1;var e=n(t);return"[object Function]"==e||"[object GeneratorFunction]"==e||"[object AsyncFunction]"==e||"[object Proxy]"==e}},1780:t=>{t.exports=function(t){return"number"==typeof t&&t>-1&&t%1==0&&t<=9007199254740991}},3218:t=>{t.exports=function(t){var e=typeof t;return null!=t&&("object"==e||"function"==e)}},7005:t=>{t.exports=function(t){return null!=t&&"object"==typeof t}},3448:(t,e,r)=>{var n=r(4239),o=r(7005);t.exports=function(t){return"symbol"==typeof t||o(t)&&"[object Symbol]"==n(t)}},6719:(t,e,r)=>{var n=r(8749),o=r(7518),i=r(1167),a=i&&i.isTypedArray,s=a?o(a):n;t.exports=s},3674:(t,e,r)=>{var n=r(4636),o=r(280),i=r(8612);t.exports=function(t){return i(t)?n(t):o(t)}},7771:(t,e,r)=>{var n=r(5639);t.exports=function(){return n.Date.now()}},5062:t=>{t.exports=function(){return!1}},3493:(t,e,r)=>{var n=r(3279),o=r(3218);t.exports=function(t,e,r){var i=!0,a=!0;if("function"!=typeof t)throw new TypeError("Expected a function");return o(r)&&(i="leading"in r?!!r.leading:i,a="trailing"in r?!!r.trailing:a),n(t,e,{leading:i,maxWait:e,trailing:a})}},4841:(t,e,r)=>{var n=r(7561),o=r(3218),i=r(3448),a=/^[-+]0x[0-9a-f]+$/i,s=/^0b[01]+$/i,c=/^0o[0-7]+$/i,u=parseInt;t.exports=function(t){if("number"==typeof t)return t;if(i(t))return NaN;if(o(t)){var e="function"==typeof t.valueOf?t.valueOf():t;t=o(e)?e+"":e}if("string"!=typeof t)return 0===t?t:+t;t=n(t);var r=s.test(t);return r||c.test(t)?u(t.slice(2),r?2:8):a.test(t)?NaN:+t}},5607:()=>{},2010:function(t){t.exports=function(){"use strict";var t=window,e=t.document,r=new function(){function r(t,e){return t.replace(/\{(\d+)\}/g,(function(t,r){return e[r]||t}))}function n(t){return t.join(" - ")}function o(e){t.console.log(e)}function i(t){for(var r=e.querySelectorAll(t),n=0;n<r.length;n++)r[n].style.display="none"}var a="navigator.share(): ",s="This feature is not supported on this browser or operating system.";function c(t){return encodeURIComponent(t)}function u(t){return decodeURIComponent(t)}this.i=function(){for(var r=e.querySelectorAll(".share-btn"),n=r.length;n--;)l(r[n]);t.navigator.clipboard||(i('[data-id="copy"]'),o("navigator.clipboard(): "+s)),t.navigator.canShare||(i('[data-id="share"]'),o(a+s))};var l=function(t){for(var e=t.querySelectorAll("a"),r=e.length;r--;)d(e[r],{id:"",url:p(t),title:f(t),desc:h(t)})},d=function(t,e){e.id=b(t,"data-id"),e.id&&(v(t,"click"),g(t,"click",e))},p=function(e){return b(e,"data-url")||t.location.href||" "},f=function(t){return b(t,"data-title")||e.title||" "},h=function(t){var r=e.querySelector("meta[name=description]");return b(t,"data-desc")||r&&b(r,"content")||" "},y=0,m={},v=function(t,e){var r=t.getAttribute("data-sharebtn-ref");r&&(t.removeEventListener?t.removeEventListener(e,m[r]):t.detachEvent("on"+e,m[r+"ie"]))},g=function(t,e,r){function n(){w(r.id,r.url,r.title,r.desc)}function o(){n.call(t)}var i=t.getAttribute("data-sharebtn-ref");i||(i=++y,t.setAttribute("data-sharebtn-ref",i)),m[i]=n,m[i+"ie"]=o,t.addEventListener?t.addEventListener(e,n):t.attachEvent("on"+e,o)},b=function(t,e){return t.getAttribute(e)},w=function(e,i,s,l){var d=c(i),p=c(l),f=c(s),h=f||p||"";switch(e){case"fb":x(r("https://www.facebook.com/sharer/sharer.php?u={0}&quote={1}",[d,f]),s);break;case"vk":x(r("https://vk.com/share.php?url={0}&title={1}",[d,n([f,p])]),s);break;case"tw":x(r("https://twitter.com/intent/tweet?url={0}&text={1}",[d,n([f,p])]),s);break;case"tg":x(r("https://t.me/share/url?url={0}&text={1}",[d,n([f,p])]),s);break;case"pk":x(r("https://getpocket.com/edit?url={0}&title={1}",[d,n([f,p])]),s);break;case"re":x(r("https://reddit.com/submit?url={0}&title={1}",[d,f]),s);break;case"ev":x(r("https://www.evernote.com/clip.action?url={0}&t={1}",[d,f]),s);break;case"in":x(r("https://www.linkedin.com/shareArticle?mini=true&url={0}&title={1}&summary={2}&source={0}",[d,f,n([f,p])]),s);break;case"pi":x(r("https://pinterest.com/pin/create/button/?url={0}&media={0}&description={1}",[d,n([f,p])]),s);break;case"sk":x(r("https://web.skype.com/share?url={0}&source=button&text={1}",[d,n([f,p])]),s);break;case"wa":x(r("https://wa.me/?text={0}%20{1}",[n([f,p]),d]),s);break;case"ok":x(r("https://connect.ok.ru/dk?st.cmd=WidgetSharePreview&service=odnoklassniki&st.shareUrl={0}",[d]),s);break;case"tu":x(r("https://www.tumblr.com/widgets/share/tool?posttype=link&title={0}&caption={0}&content={1}&canonicalUrl={1}&shareSource=tumblr_share_button",[n([f,p]),d]),s);break;case"hn":x(r("https://news.ycombinator.com/submitlink?t={0}&u={1}",[n([f,p]),d]),s);break;case"xi":x(r("https://www.xing.com/app/user?op=share;url={0};title={1}",[d,n([f,p])]),s);break;case"mail":0<f.length&&0<p.length&&(h=n([f,p])),0<d.length&&(h=h+" / "+d),t.location.href=r("mailto:?subject={0}&body={1}",[f,h]);break;case"print":t.print();break;case"copy":t.navigator.clipboard.writeText(u(d));break;case"share":var y={title:h=u(n([f,p])),text:h,url:u(d)};t.navigator.share(y).then((function(){})).catch((function(t){o(a+"Error")}))}},x=function(n,o){var i=void 0!==t.screenLeft?t.screenLeft:screen.left,a=void 0!==t.screenTop?t.screenTop:screen.top,s=t.innerWidth||e.documentElement.clientWidth||screen.width,c=t.innerHeight||e.documentElement.clientHeight||screen.height;null!==(i=t.open(n,"",r("resizable,toolbar=yes,location=yes,scrollbars=yes,menubar=yes,width={0},height={1},top={2},left={3}",[600,400,c/3-400/3+a,s/2-300+i])))&&i.focus&&i.focus()}};return r.i(),{update:function(){r.i()}}}()},1440:function(t,e){var r,n;n=this,void 0===(r=function(){return n.svg4everybody=function(){function t(t,e,r){if(r){var n=document.createDocumentFragment(),o=!e.hasAttribute("viewBox")&&r.getAttribute("viewBox");o&&e.setAttribute("viewBox",o);for(var i=r.cloneNode(!0);i.childNodes.length;)n.appendChild(i.firstChild);t.appendChild(n)}}function e(e){e.onreadystatechange=function(){if(4===e.readyState){var r=e._cachedDocument;r||((r=e._cachedDocument=document.implementation.createHTMLDocument("")).body.innerHTML=e.responseText,e._cachedTarget={}),e._embeds.splice(0).map((function(n){var o=e._cachedTarget[n.id];o||(o=e._cachedTarget[n.id]=r.getElementById(n.id)),t(n.parent,n.svg,o)}))}},e.onreadystatechange()}function r(t){for(var e=t;"svg"!==e.nodeName.toLowerCase()&&(e=e.parentNode););return e}return function(n){var o,i=Object(n),a=window.top!==window.self;o="polyfill"in i?i.polyfill:/\bTrident\/[567]\b|\bMSIE (?:9|10)\.0\b/.test(navigator.userAgent)||(navigator.userAgent.match(/\bEdge\/12\.(\d+)\b/)||[])[1]<10547||(navigator.userAgent.match(/\bAppleWebKit\/(\d+)\b/)||[])[1]<537||/\bEdge\/.(\d+)\b/.test(navigator.userAgent)&&a;var s={},c=window.requestAnimationFrame||setTimeout,u=document.getElementsByTagName("use"),l=0;o&&function n(){for(var a=0;a<u.length;){var d=u[a],p=d.parentNode,f=r(p),h=d.getAttribute("xlink:href")||d.getAttribute("href");if(!h&&i.attributeName&&(h=d.getAttribute(i.attributeName)),f&&h){if(o)if(!i.validate||i.validate(h,f,d)){p.removeChild(d);var y=h.split("#"),m=y.shift(),v=y.join("#");if(m.length){var g=s[m];g||((g=s[m]=new XMLHttpRequest).open("GET",m),g.send(),g._embeds=[]),g._embeds.push({parent:p,svg:f,id:v}),e(g)}else t(p,f,document.getElementById(v))}else++a,++l}else++a}(!u.length||u.length-l>0)&&c(n,67)}()}}()}.apply(e,[]))||(t.exports=r)},1026:(t,e,r)=>{"use strict";t.exports=r.p+"img/advantages-0.svg"},1825:(t,e,r)=>{"use strict";t.exports=r.p+"img/advantages-1.svg"},2044:(t,e,r)=>{"use strict";t.exports=r.p+"img/advantages-2.svg"},4476:(t,e,r)=>{"use strict";t.exports=r.p+"img/advantages-3.svg"},6139:(t,e,r)=>{"use strict";t.exports=r.p+"img/advantages-4.svg"},7177:(t,e,r)=>{"use strict";t.exports=r.p+"img/cottage-lighting.jpg"},7006:(t,e,r)=>{"use strict";t.exports=r.p+"img/cottage-lighting.svg"},9293:(t,e,r)=>{"use strict";t.exports=r.p+"img/creator.png"},9271:(t,e,r)=>{"use strict";t.exports=r.p+"img/lamp.svg"},7582:(t,e,r)=>{"use strict";t.exports=r.p+"img/logo.svg"},583:(t,e,r)=>{"use strict";t.exports=r.p+"img/office-lighting.jpg"},3346:(t,e,r)=>{"use strict";t.exports=r.p+"img/office-lighting.svg"},6438:(t,e,r)=>{"use strict";t.exports=r.p+"img/partner-1.png"},6867:(t,e,r)=>{"use strict";t.exports=r.p+"img/partner-2.png"},2546:(t,e,r)=>{"use strict";t.exports=r.p+"img/partner-3.png"},905:(t,e,r)=>{"use strict";t.exports=r.p+"img/partner-4.png"},2837:(t,e,r)=>{"use strict";t.exports=r.p+"img/partner-5.png"},8357:(t,e,r)=>{"use strict";t.exports=r.p+"img/partner-6.png"},2530:(t,e,r)=>{"use strict";t.exports=r.p+"img/scheme-1.svg"},5948:(t,e,r)=>{"use strict";t.exports=r.p+"img/scheme-2.svg"},5090:(t,e,r)=>{"use strict";t.exports=r.p+"img/scheme-3.svg"},8817:(t,e,r)=>{"use strict";t.exports=r.p+"img/scheme-4.svg"},8398:(t,e,r)=>{"use strict";t.exports=r.p+"img/scheme-5.svg"},5470:(t,e,r)=>{"use strict";t.exports=r.p+"img/sprite.svg"},7695:(t,e,r)=>{"use strict";t.exports=r.p+"img/street-lighting.jpg"}},e={};function r(n){var o=e[n];if(void 0!==o)return o.exports;var i=e[n]={id:n,loaded:!1,exports:{}};return t[n].call(i.exports,i,i.exports,r),i.loaded=!0,i.exports}r.n=t=>{var e=t&&t.__esModule?()=>t.default:()=>t;return r.d(e,{a:e}),e},r.d=(t,e)=>{for(var n in e)r.o(e,n)&&!r.o(t,n)&&Object.defineProperty(t,n,{enumerable:!0,get:e[n]})},r.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(t){if("object"==typeof window)return window}}(),r.o=(t,e)=>Object.prototype.hasOwnProperty.call(t,e),r.nmd=t=>(t.paths=[],t.children||(t.children=[]),t),r.p="/wp-content/themes/smartlight-wp-theme/dist/",r(6414),r(5607),r(5470),r(7582),r(9293),r(3346),r(583),r(9271),r(7006),r(7177),r(7695),r(1026),r(1825),r(2044),r(4476),r(6139),r(6438),r(6867),r(2546),r(905),r(2837),r(8357),r(2530),r(5948),r(5090),r(8817),r(8398)})();