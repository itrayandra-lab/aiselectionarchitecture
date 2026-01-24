function Ae(t,e){return function(){return t.apply(e,arguments)}}const{toString:Ge}=Object.prototype,{getPrototypeOf:ce}=Object,V=(t=>e=>{const n=Ge.call(e);return t[n]||(t[n]=n.slice(8,-1).toLowerCase())})(Object.create(null)),A=t=>(t=t.toLowerCase(),e=>V(e)===t),X=t=>e=>typeof e===t,{isArray:M}=Array,D=X("undefined");function Ze(t){return t!==null&&!D(t)&&t.constructor!==null&&!D(t.constructor)&&S(t.constructor.isBuffer)&&t.constructor.isBuffer(t)}const Ce=A("ArrayBuffer");function Qe(t){let e;return typeof ArrayBuffer<"u"&&ArrayBuffer.isView?e=ArrayBuffer.isView(t):e=t&&t.buffer&&Ce(t.buffer),e}const et=X("string"),S=X("function"),Oe=X("number"),Y=t=>t!==null&&typeof t=="object",tt=t=>t===!0||t===!1,z=t=>{if(V(t)!=="object")return!1;const e=ce(t);return(e===null||e===Object.prototype||Object.getPrototypeOf(e)===null)&&!(Symbol.toStringTag in t)&&!(Symbol.iterator in t)},nt=A("Date"),rt=A("File"),st=A("Blob"),it=A("FileList"),ot=t=>Y(t)&&S(t.pipe),at=t=>{let e;return t&&(typeof FormData=="function"&&t instanceof FormData||S(t.append)&&((e=V(t))==="formdata"||e==="object"&&S(t.toString)&&t.toString()==="[object FormData]"))},lt=A("URLSearchParams"),[ct,dt,ut,pt]=["ReadableStream","Request","Response","Headers"].map(A),ft=t=>t.trim?t.trim():t.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,"");function U(t,e,{allOwnKeys:n=!1}={}){if(t===null||typeof t>"u")return;let r,s;if(typeof t!="object"&&(t=[t]),M(t))for(r=0,s=t.length;r<s;r++)e.call(null,t[r],r,t);else{const i=n?Object.getOwnPropertyNames(t):Object.keys(t),o=i.length;let l;for(r=0;r<o;r++)l=i[r],e.call(null,t[l],l,t)}}function Fe(t,e){e=e.toLowerCase();const n=Object.keys(t);let r=n.length,s;for(;r-- >0;)if(s=n[r],e===s.toLowerCase())return s;return null}const L=typeof globalThis<"u"?globalThis:typeof self<"u"?self:typeof window<"u"?window:global,Ie=t=>!D(t)&&t!==L;function re(){const{caseless:t}=Ie(this)&&this||{},e={},n=(r,s)=>{const i=t&&Fe(e,s)||s;z(e[i])&&z(r)?e[i]=re(e[i],r):z(r)?e[i]=re({},r):M(r)?e[i]=r.slice():e[i]=r};for(let r=0,s=arguments.length;r<s;r++)arguments[r]&&U(arguments[r],n);return e}const ht=(t,e,n,{allOwnKeys:r}={})=>(U(e,(s,i)=>{n&&S(s)?t[i]=Ae(s,n):t[i]=s},{allOwnKeys:r}),t),mt=t=>(t.charCodeAt(0)===65279&&(t=t.slice(1)),t),gt=(t,e,n,r)=>{t.prototype=Object.create(e.prototype,r),t.prototype.constructor=t,Object.defineProperty(t,"super",{value:e.prototype}),n&&Object.assign(t.prototype,n)},yt=(t,e,n,r)=>{let s,i,o;const l={};if(e=e||{},t==null)return e;do{for(s=Object.getOwnPropertyNames(t),i=s.length;i-- >0;)o=s[i],(!r||r(o,t,e))&&!l[o]&&(e[o]=t[o],l[o]=!0);t=n!==!1&&ce(t)}while(t&&(!n||n(t,e))&&t!==Object.prototype);return e},bt=(t,e,n)=>{t=String(t),(n===void 0||n>t.length)&&(n=t.length),n-=e.length;const r=t.indexOf(e,n);return r!==-1&&r===n},xt=t=>{if(!t)return null;if(M(t))return t;let e=t.length;if(!Oe(e))return null;const n=new Array(e);for(;e-- >0;)n[e]=t[e];return n},wt=(t=>e=>t&&e instanceof t)(typeof Uint8Array<"u"&&ce(Uint8Array)),kt=(t,e)=>{const r=(t&&t[Symbol.iterator]).call(t);let s;for(;(s=r.next())&&!s.done;){const i=s.value;e.call(t,i[0],i[1])}},Tt=(t,e)=>{let n;const r=[];for(;(n=t.exec(e))!==null;)r.push(n);return r},vt=A("HTMLFormElement"),Rt=t=>t.toLowerCase().replace(/[-_\s]([a-z\d])(\w*)/g,function(n,r,s){return r.toUpperCase()+s}),fe=(({hasOwnProperty:t})=>(e,n)=>t.call(e,n))(Object.prototype),Et=A("RegExp"),Le=(t,e)=>{const n=Object.getOwnPropertyDescriptors(t),r={};U(n,(s,i)=>{let o;(o=e(s,i,t))!==!1&&(r[i]=o||s)}),Object.defineProperties(t,r)},St=t=>{Le(t,(e,n)=>{if(S(t)&&["arguments","caller","callee"].indexOf(n)!==-1)return!1;const r=t[n];if(S(r)){if(e.enumerable=!1,"writable"in e){e.writable=!1;return}e.set||(e.set=()=>{throw Error("Can not rewrite read-only method '"+n+"'")})}})},At=(t,e)=>{const n={},r=s=>{s.forEach(i=>{n[i]=!0})};return M(t)?r(t):r(String(t).split(e)),n},Ct=()=>{},Ot=(t,e)=>t!=null&&Number.isFinite(t=+t)?t:e;function Ft(t){return!!(t&&S(t.append)&&t[Symbol.toStringTag]==="FormData"&&t[Symbol.iterator])}const It=t=>{const e=new Array(10),n=(r,s)=>{if(Y(r)){if(e.indexOf(r)>=0)return;if(!("toJSON"in r)){e[s]=r;const i=M(r)?[]:{};return U(r,(o,l)=>{const u=n(o,s+1);!D(u)&&(i[l]=u)}),e[s]=void 0,i}}return r};return n(t,0)},Lt=A("AsyncFunction"),Bt=t=>t&&(Y(t)||S(t))&&S(t.then)&&S(t.catch),Be=((t,e)=>t?setImmediate:e?((n,r)=>(L.addEventListener("message",({source:s,data:i})=>{s===L&&i===n&&r.length&&r.shift()()},!1),s=>{r.push(s),L.postMessage(n,"*")}))(`axios@${Math.random()}`,[]):n=>setTimeout(n))(typeof setImmediate=="function",S(L.postMessage)),Pt=typeof queueMicrotask<"u"?queueMicrotask.bind(L):typeof process<"u"&&process.nextTick||Be,a={isArray:M,isArrayBuffer:Ce,isBuffer:Ze,isFormData:at,isArrayBufferView:Qe,isString:et,isNumber:Oe,isBoolean:tt,isObject:Y,isPlainObject:z,isReadableStream:ct,isRequest:dt,isResponse:ut,isHeaders:pt,isUndefined:D,isDate:nt,isFile:rt,isBlob:st,isRegExp:Et,isFunction:S,isStream:ot,isURLSearchParams:lt,isTypedArray:wt,isFileList:it,forEach:U,merge:re,extend:ht,trim:ft,stripBOM:mt,inherits:gt,toFlatObject:yt,kindOf:V,kindOfTest:A,endsWith:bt,toArray:xt,forEachEntry:kt,matchAll:Tt,isHTMLForm:vt,hasOwnProperty:fe,hasOwnProp:fe,reduceDescriptors:Le,freezeMethods:St,toObjectSet:At,toCamelCase:Rt,noop:Ct,toFiniteNumber:Ot,findKey:Fe,global:L,isContextDefined:Ie,isSpecCompliantForm:Ft,toJSONObject:It,isAsyncFn:Lt,isThenable:Bt,setImmediate:Be,asap:Pt};function m(t,e,n,r,s){Error.call(this),Error.captureStackTrace?Error.captureStackTrace(this,this.constructor):this.stack=new Error().stack,this.message=t,this.name="AxiosError",e&&(this.code=e),n&&(this.config=n),r&&(this.request=r),s&&(this.response=s,this.status=s.status?s.status:null)}a.inherits(m,Error,{toJSON:function(){return{message:this.message,name:this.name,description:this.description,number:this.number,fileName:this.fileName,lineNumber:this.lineNumber,columnNumber:this.columnNumber,stack:this.stack,config:a.toJSONObject(this.config),code:this.code,status:this.status}}});const Pe=m.prototype,Me={};["ERR_BAD_OPTION_VALUE","ERR_BAD_OPTION","ECONNABORTED","ETIMEDOUT","ERR_NETWORK","ERR_FR_TOO_MANY_REDIRECTS","ERR_DEPRECATED","ERR_BAD_RESPONSE","ERR_BAD_REQUEST","ERR_CANCELED","ERR_NOT_SUPPORT","ERR_INVALID_URL"].forEach(t=>{Me[t]={value:t}});Object.defineProperties(m,Me);Object.defineProperty(Pe,"isAxiosError",{value:!0});m.from=(t,e,n,r,s,i)=>{const o=Object.create(Pe);return a.toFlatObject(t,o,function(u){return u!==Error.prototype},l=>l!=="isAxiosError"),m.call(o,t.message,e,n,r,s),o.cause=t,o.name=t.name,i&&Object.assign(o,i),o};const Mt=null;function se(t){return a.isPlainObject(t)||a.isArray(t)}function $e(t){return a.endsWith(t,"[]")?t.slice(0,-2):t}function he(t,e,n){return t?t.concat(e).map(function(s,i){return s=$e(s),!n&&i?"["+s+"]":s}).join(n?".":""):e}function $t(t){return a.isArray(t)&&!t.some(se)}const Nt=a.toFlatObject(a,{},null,function(e){return/^is[A-Z]/.test(e)});function G(t,e,n){if(!a.isObject(t))throw new TypeError("target must be an object");e=e||new FormData,n=a.toFlatObject(n,{metaTokens:!0,dots:!1,indexes:!1},!1,function(g,h){return!a.isUndefined(h[g])});const r=n.metaTokens,s=n.visitor||d,i=n.dots,o=n.indexes,u=(n.Blob||typeof Blob<"u"&&Blob)&&a.isSpecCompliantForm(e);if(!a.isFunction(s))throw new TypeError("visitor must be a function");function c(f){if(f===null)return"";if(a.isDate(f))return f.toISOString();if(!u&&a.isBlob(f))throw new m("Blob is not supported. Use a Buffer instead.");return a.isArrayBuffer(f)||a.isTypedArray(f)?u&&typeof Blob=="function"?new Blob([f]):Buffer.from(f):f}function d(f,g,h){let b=f;if(f&&!h&&typeof f=="object"){if(a.endsWith(g,"{}"))g=r?g:g.slice(0,-2),f=JSON.stringify(f);else if(a.isArray(f)&&$t(f)||(a.isFileList(f)||a.endsWith(g,"[]"))&&(b=a.toArray(f)))return g=$e(g),b.forEach(function(T,O){!(a.isUndefined(T)||T===null)&&e.append(o===!0?he([g],O,i):o===null?g:g+"[]",c(T))}),!1}return se(f)?!0:(e.append(he(h,g,i),c(f)),!1)}const p=[],y=Object.assign(Nt,{defaultVisitor:d,convertValue:c,isVisitable:se});function w(f,g){if(!a.isUndefined(f)){if(p.indexOf(f)!==-1)throw Error("Circular reference detected in "+g.join("."));p.push(f),a.forEach(f,function(b,k){(!(a.isUndefined(b)||b===null)&&s.call(e,b,a.isString(k)?k.trim():k,g,y))===!0&&w(b,g?g.concat(k):[k])}),p.pop()}}if(!a.isObject(t))throw new TypeError("data must be an object");return w(t),e}function me(t){const e={"!":"%21","'":"%27","(":"%28",")":"%29","~":"%7E","%20":"+","%00":"\0"};return encodeURIComponent(t).replace(/[!'()~]|%20|%00/g,function(r){return e[r]})}function de(t,e){this._pairs=[],t&&G(t,this,e)}const Ne=de.prototype;Ne.append=function(e,n){this._pairs.push([e,n])};Ne.toString=function(e){const n=e?function(r){return e.call(this,r,me)}:me;return this._pairs.map(function(s){return n(s[0])+"="+n(s[1])},"").join("&")};function Ht(t){return encodeURIComponent(t).replace(/%3A/gi,":").replace(/%24/g,"$").replace(/%2C/gi,",").replace(/%20/g,"+").replace(/%5B/gi,"[").replace(/%5D/gi,"]")}function He(t,e,n){if(!e)return t;const r=n&&n.encode||Ht;a.isFunction(n)&&(n={serialize:n});const s=n&&n.serialize;let i;if(s?i=s(e,n):i=a.isURLSearchParams(e)?e.toString():new de(e,n).toString(r),i){const o=t.indexOf("#");o!==-1&&(t=t.slice(0,o)),t+=(t.indexOf("?")===-1?"?":"&")+i}return t}class ge{constructor(){this.handlers=[]}use(e,n,r){return this.handlers.push({fulfilled:e,rejected:n,synchronous:r?r.synchronous:!1,runWhen:r?r.runWhen:null}),this.handlers.length-1}eject(e){this.handlers[e]&&(this.handlers[e]=null)}clear(){this.handlers&&(this.handlers=[])}forEach(e){a.forEach(this.handlers,function(r){r!==null&&e(r)})}}const De={silentJSONParsing:!0,forcedJSONParsing:!0,clarifyTimeoutError:!1},Dt=typeof URLSearchParams<"u"?URLSearchParams:de,Ut=typeof FormData<"u"?FormData:null,jt=typeof Blob<"u"?Blob:null,_t={isBrowser:!0,classes:{URLSearchParams:Dt,FormData:Ut,Blob:jt},protocols:["http","https","file","blob","url","data"]},ue=typeof window<"u"&&typeof document<"u",ie=typeof navigator=="object"&&navigator||void 0,zt=ue&&(!ie||["ReactNative","NativeScript","NS"].indexOf(ie.product)<0),qt=typeof WorkerGlobalScope<"u"&&self instanceof WorkerGlobalScope&&typeof self.importScripts=="function",Wt=ue&&window.location.href||"http://localhost",Jt=Object.freeze(Object.defineProperty({__proto__:null,hasBrowserEnv:ue,hasStandardBrowserEnv:zt,hasStandardBrowserWebWorkerEnv:qt,navigator:ie,origin:Wt},Symbol.toStringTag,{value:"Module"})),v={...Jt,..._t};function Kt(t,e){return G(t,new v.classes.URLSearchParams,Object.assign({visitor:function(n,r,s,i){return v.isNode&&a.isBuffer(n)?(this.append(r,n.toString("base64")),!1):i.defaultVisitor.apply(this,arguments)}},e))}function Vt(t){return a.matchAll(/\w+|\[(\w*)]/g,t).map(e=>e[0]==="[]"?"":e[1]||e[0])}function Xt(t){const e={},n=Object.keys(t);let r;const s=n.length;let i;for(r=0;r<s;r++)i=n[r],e[i]=t[i];return e}function Ue(t){function e(n,r,s,i){let o=n[i++];if(o==="__proto__")return!0;const l=Number.isFinite(+o),u=i>=n.length;return o=!o&&a.isArray(s)?s.length:o,u?(a.hasOwnProp(s,o)?s[o]=[s[o],r]:s[o]=r,!l):((!s[o]||!a.isObject(s[o]))&&(s[o]=[]),e(n,r,s[o],i)&&a.isArray(s[o])&&(s[o]=Xt(s[o])),!l)}if(a.isFormData(t)&&a.isFunction(t.entries)){const n={};return a.forEachEntry(t,(r,s)=>{e(Vt(r),s,n,0)}),n}return null}function Yt(t,e,n){if(a.isString(t))try{return(e||JSON.parse)(t),a.trim(t)}catch(r){if(r.name!=="SyntaxError")throw r}return(n||JSON.stringify)(t)}const j={transitional:De,adapter:["xhr","http","fetch"],transformRequest:[function(e,n){const r=n.getContentType()||"",s=r.indexOf("application/json")>-1,i=a.isObject(e);if(i&&a.isHTMLForm(e)&&(e=new FormData(e)),a.isFormData(e))return s?JSON.stringify(Ue(e)):e;if(a.isArrayBuffer(e)||a.isBuffer(e)||a.isStream(e)||a.isFile(e)||a.isBlob(e)||a.isReadableStream(e))return e;if(a.isArrayBufferView(e))return e.buffer;if(a.isURLSearchParams(e))return n.setContentType("application/x-www-form-urlencoded;charset=utf-8",!1),e.toString();let l;if(i){if(r.indexOf("application/x-www-form-urlencoded")>-1)return Kt(e,this.formSerializer).toString();if((l=a.isFileList(e))||r.indexOf("multipart/form-data")>-1){const u=this.env&&this.env.FormData;return G(l?{"files[]":e}:e,u&&new u,this.formSerializer)}}return i||s?(n.setContentType("application/json",!1),Yt(e)):e}],transformResponse:[function(e){const n=this.transitional||j.transitional,r=n&&n.forcedJSONParsing,s=this.responseType==="json";if(a.isResponse(e)||a.isReadableStream(e))return e;if(e&&a.isString(e)&&(r&&!this.responseType||s)){const o=!(n&&n.silentJSONParsing)&&s;try{return JSON.parse(e)}catch(l){if(o)throw l.name==="SyntaxError"?m.from(l,m.ERR_BAD_RESPONSE,this,null,this.response):l}}return e}],timeout:0,xsrfCookieName:"XSRF-TOKEN",xsrfHeaderName:"X-XSRF-TOKEN",maxContentLength:-1,maxBodyLength:-1,env:{FormData:v.classes.FormData,Blob:v.classes.Blob},validateStatus:function(e){return e>=200&&e<300},headers:{common:{Accept:"application/json, text/plain, */*","Content-Type":void 0}}};a.forEach(["delete","get","head","post","put","patch"],t=>{j.headers[t]={}});const Gt=a.toObjectSet(["age","authorization","content-length","content-type","etag","expires","from","host","if-modified-since","if-unmodified-since","last-modified","location","max-forwards","proxy-authorization","referer","retry-after","user-agent"]),Zt=t=>{const e={};let n,r,s;return t&&t.split(`
`).forEach(function(o){s=o.indexOf(":"),n=o.substring(0,s).trim().toLowerCase(),r=o.substring(s+1).trim(),!(!n||e[n]&&Gt[n])&&(n==="set-cookie"?e[n]?e[n].push(r):e[n]=[r]:e[n]=e[n]?e[n]+", "+r:r)}),e},ye=Symbol("internals");function H(t){return t&&String(t).trim().toLowerCase()}function q(t){return t===!1||t==null?t:a.isArray(t)?t.map(q):String(t)}function Qt(t){const e=Object.create(null),n=/([^\s,;=]+)\s*(?:=\s*([^,;]+))?/g;let r;for(;r=n.exec(t);)e[r[1]]=r[2];return e}const en=t=>/^[-_a-zA-Z0-9^`|~,!#$%&'*+.]+$/.test(t.trim());function ee(t,e,n,r,s){if(a.isFunction(r))return r.call(this,e,n);if(s&&(e=n),!!a.isString(e)){if(a.isString(r))return e.indexOf(r)!==-1;if(a.isRegExp(r))return r.test(e)}}function tn(t){return t.trim().toLowerCase().replace(/([a-z\d])(\w*)/g,(e,n,r)=>n.toUpperCase()+r)}function nn(t,e){const n=a.toCamelCase(" "+e);["get","set","has"].forEach(r=>{Object.defineProperty(t,r+n,{value:function(s,i,o){return this[r].call(this,e,s,i,o)},configurable:!0})})}let E=class{constructor(e){e&&this.set(e)}set(e,n,r){const s=this;function i(l,u,c){const d=H(u);if(!d)throw new Error("header name must be a non-empty string");const p=a.findKey(s,d);(!p||s[p]===void 0||c===!0||c===void 0&&s[p]!==!1)&&(s[p||u]=q(l))}const o=(l,u)=>a.forEach(l,(c,d)=>i(c,d,u));if(a.isPlainObject(e)||e instanceof this.constructor)o(e,n);else if(a.isString(e)&&(e=e.trim())&&!en(e))o(Zt(e),n);else if(a.isHeaders(e))for(const[l,u]of e.entries())i(u,l,r);else e!=null&&i(n,e,r);return this}get(e,n){if(e=H(e),e){const r=a.findKey(this,e);if(r){const s=this[r];if(!n)return s;if(n===!0)return Qt(s);if(a.isFunction(n))return n.call(this,s,r);if(a.isRegExp(n))return n.exec(s);throw new TypeError("parser must be boolean|regexp|function")}}}has(e,n){if(e=H(e),e){const r=a.findKey(this,e);return!!(r&&this[r]!==void 0&&(!n||ee(this,this[r],r,n)))}return!1}delete(e,n){const r=this;let s=!1;function i(o){if(o=H(o),o){const l=a.findKey(r,o);l&&(!n||ee(r,r[l],l,n))&&(delete r[l],s=!0)}}return a.isArray(e)?e.forEach(i):i(e),s}clear(e){const n=Object.keys(this);let r=n.length,s=!1;for(;r--;){const i=n[r];(!e||ee(this,this[i],i,e,!0))&&(delete this[i],s=!0)}return s}normalize(e){const n=this,r={};return a.forEach(this,(s,i)=>{const o=a.findKey(r,i);if(o){n[o]=q(s),delete n[i];return}const l=e?tn(i):String(i).trim();l!==i&&delete n[i],n[l]=q(s),r[l]=!0}),this}concat(...e){return this.constructor.concat(this,...e)}toJSON(e){const n=Object.create(null);return a.forEach(this,(r,s)=>{r!=null&&r!==!1&&(n[s]=e&&a.isArray(r)?r.join(", "):r)}),n}[Symbol.iterator](){return Object.entries(this.toJSON())[Symbol.iterator]()}toString(){return Object.entries(this.toJSON()).map(([e,n])=>e+": "+n).join(`
`)}get[Symbol.toStringTag](){return"AxiosHeaders"}static from(e){return e instanceof this?e:new this(e)}static concat(e,...n){const r=new this(e);return n.forEach(s=>r.set(s)),r}static accessor(e){const r=(this[ye]=this[ye]={accessors:{}}).accessors,s=this.prototype;function i(o){const l=H(o);r[l]||(nn(s,o),r[l]=!0)}return a.isArray(e)?e.forEach(i):i(e),this}};E.accessor(["Content-Type","Content-Length","Accept","Accept-Encoding","User-Agent","Authorization"]);a.reduceDescriptors(E.prototype,({value:t},e)=>{let n=e[0].toUpperCase()+e.slice(1);return{get:()=>t,set(r){this[n]=r}}});a.freezeMethods(E);function te(t,e){const n=this||j,r=e||n,s=E.from(r.headers);let i=r.data;return a.forEach(t,function(l){i=l.call(n,i,s.normalize(),e?e.status:void 0)}),s.normalize(),i}function je(t){return!!(t&&t.__CANCEL__)}function N(t,e,n){m.call(this,t??"canceled",m.ERR_CANCELED,e,n),this.name="CanceledError"}a.inherits(N,m,{__CANCEL__:!0});function _e(t,e,n){const r=n.config.validateStatus;!n.status||!r||r(n.status)?t(n):e(new m("Request failed with status code "+n.status,[m.ERR_BAD_REQUEST,m.ERR_BAD_RESPONSE][Math.floor(n.status/100)-4],n.config,n.request,n))}function rn(t){const e=/^([-+\w]{1,25})(:?\/\/|:)/.exec(t);return e&&e[1]||""}function sn(t,e){t=t||10;const n=new Array(t),r=new Array(t);let s=0,i=0,o;return e=e!==void 0?e:1e3,function(u){const c=Date.now(),d=r[i];o||(o=c),n[s]=u,r[s]=c;let p=i,y=0;for(;p!==s;)y+=n[p++],p=p%t;if(s=(s+1)%t,s===i&&(i=(i+1)%t),c-o<e)return;const w=d&&c-d;return w?Math.round(y*1e3/w):void 0}}function on(t,e){let n=0,r=1e3/e,s,i;const o=(c,d=Date.now())=>{n=d,s=null,i&&(clearTimeout(i),i=null),t.apply(null,c)};return[(...c)=>{const d=Date.now(),p=d-n;p>=r?o(c,d):(s=c,i||(i=setTimeout(()=>{i=null,o(s)},r-p)))},()=>s&&o(s)]}const J=(t,e,n=3)=>{let r=0;const s=sn(50,250);return on(i=>{const o=i.loaded,l=i.lengthComputable?i.total:void 0,u=o-r,c=s(u),d=o<=l;r=o;const p={loaded:o,total:l,progress:l?o/l:void 0,bytes:u,rate:c||void 0,estimated:c&&l&&d?(l-o)/c:void 0,event:i,lengthComputable:l!=null,[e?"download":"upload"]:!0};t(p)},n)},be=(t,e)=>{const n=t!=null;return[r=>e[0]({lengthComputable:n,total:t,loaded:r}),e[1]]},xe=t=>(...e)=>a.asap(()=>t(...e)),an=v.hasStandardBrowserEnv?((t,e)=>n=>(n=new URL(n,v.origin),t.protocol===n.protocol&&t.host===n.host&&(e||t.port===n.port)))(new URL(v.origin),v.navigator&&/(msie|trident)/i.test(v.navigator.userAgent)):()=>!0,ln=v.hasStandardBrowserEnv?{write(t,e,n,r,s,i){const o=[t+"="+encodeURIComponent(e)];a.isNumber(n)&&o.push("expires="+new Date(n).toGMTString()),a.isString(r)&&o.push("path="+r),a.isString(s)&&o.push("domain="+s),i===!0&&o.push("secure"),document.cookie=o.join("; ")},read(t){const e=document.cookie.match(new RegExp("(^|;\\s*)("+t+")=([^;]*)"));return e?decodeURIComponent(e[3]):null},remove(t){this.write(t,"",Date.now()-864e5)}}:{write(){},read(){return null},remove(){}};function cn(t){return/^([a-z][a-z\d+\-.]*:)?\/\//i.test(t)}function dn(t,e){return e?t.replace(/\/?\/$/,"")+"/"+e.replace(/^\/+/,""):t}function ze(t,e,n){let r=!cn(e);return t&&r||n==!1?dn(t,e):e}const we=t=>t instanceof E?{...t}:t;function P(t,e){e=e||{};const n={};function r(c,d,p,y){return a.isPlainObject(c)&&a.isPlainObject(d)?a.merge.call({caseless:y},c,d):a.isPlainObject(d)?a.merge({},d):a.isArray(d)?d.slice():d}function s(c,d,p,y){if(a.isUndefined(d)){if(!a.isUndefined(c))return r(void 0,c,p,y)}else return r(c,d,p,y)}function i(c,d){if(!a.isUndefined(d))return r(void 0,d)}function o(c,d){if(a.isUndefined(d)){if(!a.isUndefined(c))return r(void 0,c)}else return r(void 0,d)}function l(c,d,p){if(p in e)return r(c,d);if(p in t)return r(void 0,c)}const u={url:i,method:i,data:i,baseURL:o,transformRequest:o,transformResponse:o,paramsSerializer:o,timeout:o,timeoutMessage:o,withCredentials:o,withXSRFToken:o,adapter:o,responseType:o,xsrfCookieName:o,xsrfHeaderName:o,onUploadProgress:o,onDownloadProgress:o,decompress:o,maxContentLength:o,maxBodyLength:o,beforeRedirect:o,transport:o,httpAgent:o,httpsAgent:o,cancelToken:o,socketPath:o,responseEncoding:o,validateStatus:l,headers:(c,d,p)=>s(we(c),we(d),p,!0)};return a.forEach(Object.keys(Object.assign({},t,e)),function(d){const p=u[d]||s,y=p(t[d],e[d],d);a.isUndefined(y)&&p!==l||(n[d]=y)}),n}const qe=t=>{const e=P({},t);let{data:n,withXSRFToken:r,xsrfHeaderName:s,xsrfCookieName:i,headers:o,auth:l}=e;e.headers=o=E.from(o),e.url=He(ze(e.baseURL,e.url),t.params,t.paramsSerializer),l&&o.set("Authorization","Basic "+btoa((l.username||"")+":"+(l.password?unescape(encodeURIComponent(l.password)):"")));let u;if(a.isFormData(n)){if(v.hasStandardBrowserEnv||v.hasStandardBrowserWebWorkerEnv)o.setContentType(void 0);else if((u=o.getContentType())!==!1){const[c,...d]=u?u.split(";").map(p=>p.trim()).filter(Boolean):[];o.setContentType([c||"multipart/form-data",...d].join("; "))}}if(v.hasStandardBrowserEnv&&(r&&a.isFunction(r)&&(r=r(e)),r||r!==!1&&an(e.url))){const c=s&&i&&ln.read(i);c&&o.set(s,c)}return e},un=typeof XMLHttpRequest<"u",pn=un&&function(t){return new Promise(function(n,r){const s=qe(t);let i=s.data;const o=E.from(s.headers).normalize();let{responseType:l,onUploadProgress:u,onDownloadProgress:c}=s,d,p,y,w,f;function g(){w&&w(),f&&f(),s.cancelToken&&s.cancelToken.unsubscribe(d),s.signal&&s.signal.removeEventListener("abort",d)}let h=new XMLHttpRequest;h.open(s.method.toUpperCase(),s.url,!0),h.timeout=s.timeout;function b(){if(!h)return;const T=E.from("getAllResponseHeaders"in h&&h.getAllResponseHeaders()),R={data:!l||l==="text"||l==="json"?h.responseText:h.response,status:h.status,statusText:h.statusText,headers:T,config:t,request:h};_e(function(I){n(I),g()},function(I){r(I),g()},R),h=null}"onloadend"in h?h.onloadend=b:h.onreadystatechange=function(){!h||h.readyState!==4||h.status===0&&!(h.responseURL&&h.responseURL.indexOf("file:")===0)||setTimeout(b)},h.onabort=function(){h&&(r(new m("Request aborted",m.ECONNABORTED,t,h)),h=null)},h.onerror=function(){r(new m("Network Error",m.ERR_NETWORK,t,h)),h=null},h.ontimeout=function(){let O=s.timeout?"timeout of "+s.timeout+"ms exceeded":"timeout exceeded";const R=s.transitional||De;s.timeoutErrorMessage&&(O=s.timeoutErrorMessage),r(new m(O,R.clarifyTimeoutError?m.ETIMEDOUT:m.ECONNABORTED,t,h)),h=null},i===void 0&&o.setContentType(null),"setRequestHeader"in h&&a.forEach(o.toJSON(),function(O,R){h.setRequestHeader(R,O)}),a.isUndefined(s.withCredentials)||(h.withCredentials=!!s.withCredentials),l&&l!=="json"&&(h.responseType=s.responseType),c&&([y,f]=J(c,!0),h.addEventListener("progress",y)),u&&h.upload&&([p,w]=J(u),h.upload.addEventListener("progress",p),h.upload.addEventListener("loadend",w)),(s.cancelToken||s.signal)&&(d=T=>{h&&(r(!T||T.type?new N(null,t,h):T),h.abort(),h=null)},s.cancelToken&&s.cancelToken.subscribe(d),s.signal&&(s.signal.aborted?d():s.signal.addEventListener("abort",d)));const k=rn(s.url);if(k&&v.protocols.indexOf(k)===-1){r(new m("Unsupported protocol "+k+":",m.ERR_BAD_REQUEST,t));return}h.send(i||null)})},fn=(t,e)=>{const{length:n}=t=t?t.filter(Boolean):[];if(e||n){let r=new AbortController,s;const i=function(c){if(!s){s=!0,l();const d=c instanceof Error?c:this.reason;r.abort(d instanceof m?d:new N(d instanceof Error?d.message:d))}};let o=e&&setTimeout(()=>{o=null,i(new m(`timeout ${e} of ms exceeded`,m.ETIMEDOUT))},e);const l=()=>{t&&(o&&clearTimeout(o),o=null,t.forEach(c=>{c.unsubscribe?c.unsubscribe(i):c.removeEventListener("abort",i)}),t=null)};t.forEach(c=>c.addEventListener("abort",i));const{signal:u}=r;return u.unsubscribe=()=>a.asap(l),u}},hn=function*(t,e){let n=t.byteLength;if(n<e){yield t;return}let r=0,s;for(;r<n;)s=r+e,yield t.slice(r,s),r=s},mn=async function*(t,e){for await(const n of gn(t))yield*hn(n,e)},gn=async function*(t){if(t[Symbol.asyncIterator]){yield*t;return}const e=t.getReader();try{for(;;){const{done:n,value:r}=await e.read();if(n)break;yield r}}finally{await e.cancel()}},ke=(t,e,n,r)=>{const s=mn(t,e);let i=0,o,l=u=>{o||(o=!0,r&&r(u))};return new ReadableStream({async pull(u){try{const{done:c,value:d}=await s.next();if(c){l(),u.close();return}let p=d.byteLength;if(n){let y=i+=p;n(y)}u.enqueue(new Uint8Array(d))}catch(c){throw l(c),c}},cancel(u){return l(u),s.return()}},{highWaterMark:2})},Z=typeof fetch=="function"&&typeof Request=="function"&&typeof Response=="function",We=Z&&typeof ReadableStream=="function",yn=Z&&(typeof TextEncoder=="function"?(t=>e=>t.encode(e))(new TextEncoder):async t=>new Uint8Array(await new Response(t).arrayBuffer())),Je=(t,...e)=>{try{return!!t(...e)}catch{return!1}},bn=We&&Je(()=>{let t=!1;const e=new Request(v.origin,{body:new ReadableStream,method:"POST",get duplex(){return t=!0,"half"}}).headers.has("Content-Type");return t&&!e}),Te=64*1024,oe=We&&Je(()=>a.isReadableStream(new Response("").body)),K={stream:oe&&(t=>t.body)};Z&&(t=>{["text","arrayBuffer","blob","formData","stream"].forEach(e=>{!K[e]&&(K[e]=a.isFunction(t[e])?n=>n[e]():(n,r)=>{throw new m(`Response type '${e}' is not supported`,m.ERR_NOT_SUPPORT,r)})})})(new Response);const xn=async t=>{if(t==null)return 0;if(a.isBlob(t))return t.size;if(a.isSpecCompliantForm(t))return(await new Request(v.origin,{method:"POST",body:t}).arrayBuffer()).byteLength;if(a.isArrayBufferView(t)||a.isArrayBuffer(t))return t.byteLength;if(a.isURLSearchParams(t)&&(t=t+""),a.isString(t))return(await yn(t)).byteLength},wn=async(t,e)=>{const n=a.toFiniteNumber(t.getContentLength());return n??xn(e)},kn=Z&&(async t=>{let{url:e,method:n,data:r,signal:s,cancelToken:i,timeout:o,onDownloadProgress:l,onUploadProgress:u,responseType:c,headers:d,withCredentials:p="same-origin",fetchOptions:y}=qe(t);c=c?(c+"").toLowerCase():"text";let w=fn([s,i&&i.toAbortSignal()],o),f;const g=w&&w.unsubscribe&&(()=>{w.unsubscribe()});let h;try{if(u&&bn&&n!=="get"&&n!=="head"&&(h=await wn(d,r))!==0){let R=new Request(e,{method:"POST",body:r,duplex:"half"}),F;if(a.isFormData(r)&&(F=R.headers.get("content-type"))&&d.setContentType(F),R.body){const[I,_]=be(h,J(xe(u)));r=ke(R.body,Te,I,_)}}a.isString(p)||(p=p?"include":"omit");const b="credentials"in Request.prototype;f=new Request(e,{...y,signal:w,method:n.toUpperCase(),headers:d.normalize().toJSON(),body:r,duplex:"half",credentials:b?p:void 0});let k=await fetch(f);const T=oe&&(c==="stream"||c==="response");if(oe&&(l||T&&g)){const R={};["status","statusText","headers"].forEach(pe=>{R[pe]=k[pe]});const F=a.toFiniteNumber(k.headers.get("content-length")),[I,_]=l&&be(F,J(xe(l),!0))||[];k=new Response(ke(k.body,Te,I,()=>{_&&_(),g&&g()}),R)}c=c||"text";let O=await K[a.findKey(K,c)||"text"](k,t);return!T&&g&&g(),await new Promise((R,F)=>{_e(R,F,{data:O,headers:E.from(k.headers),status:k.status,statusText:k.statusText,config:t,request:f})})}catch(b){throw g&&g(),b&&b.name==="TypeError"&&/fetch/i.test(b.message)?Object.assign(new m("Network Error",m.ERR_NETWORK,t,f),{cause:b.cause||b}):m.from(b,b&&b.code,t,f)}}),ae={http:Mt,xhr:pn,fetch:kn};a.forEach(ae,(t,e)=>{if(t){try{Object.defineProperty(t,"name",{value:e})}catch{}Object.defineProperty(t,"adapterName",{value:e})}});const ve=t=>`- ${t}`,Tn=t=>a.isFunction(t)||t===null||t===!1,Ke={getAdapter:t=>{t=a.isArray(t)?t:[t];const{length:e}=t;let n,r;const s={};for(let i=0;i<e;i++){n=t[i];let o;if(r=n,!Tn(n)&&(r=ae[(o=String(n)).toLowerCase()],r===void 0))throw new m(`Unknown adapter '${o}'`);if(r)break;s[o||"#"+i]=r}if(!r){const i=Object.entries(s).map(([l,u])=>`adapter ${l} `+(u===!1?"is not supported by the environment":"is not available in the build"));let o=e?i.length>1?`since :
`+i.map(ve).join(`
`):" "+ve(i[0]):"as no adapter specified";throw new m("There is no suitable adapter to dispatch the request "+o,"ERR_NOT_SUPPORT")}return r},adapters:ae};function ne(t){if(t.cancelToken&&t.cancelToken.throwIfRequested(),t.signal&&t.signal.aborted)throw new N(null,t)}function Re(t){return ne(t),t.headers=E.from(t.headers),t.data=te.call(t,t.transformRequest),["post","put","patch"].indexOf(t.method)!==-1&&t.headers.setContentType("application/x-www-form-urlencoded",!1),Ke.getAdapter(t.adapter||j.adapter)(t).then(function(r){return ne(t),r.data=te.call(t,t.transformResponse,r),r.headers=E.from(r.headers),r},function(r){return je(r)||(ne(t),r&&r.response&&(r.response.data=te.call(t,t.transformResponse,r.response),r.response.headers=E.from(r.response.headers))),Promise.reject(r)})}const Ve="1.8.2",Q={};["object","boolean","number","function","string","symbol"].forEach((t,e)=>{Q[t]=function(r){return typeof r===t||"a"+(e<1?"n ":" ")+t}});const Ee={};Q.transitional=function(e,n,r){function s(i,o){return"[Axios v"+Ve+"] Transitional option '"+i+"'"+o+(r?". "+r:"")}return(i,o,l)=>{if(e===!1)throw new m(s(o," has been removed"+(n?" in "+n:"")),m.ERR_DEPRECATED);return n&&!Ee[o]&&(Ee[o]=!0,console.warn(s(o," has been deprecated since v"+n+" and will be removed in the near future"))),e?e(i,o,l):!0}};Q.spelling=function(e){return(n,r)=>(console.warn(`${r} is likely a misspelling of ${e}`),!0)};function vn(t,e,n){if(typeof t!="object")throw new m("options must be an object",m.ERR_BAD_OPTION_VALUE);const r=Object.keys(t);let s=r.length;for(;s-- >0;){const i=r[s],o=e[i];if(o){const l=t[i],u=l===void 0||o(l,i,t);if(u!==!0)throw new m("option "+i+" must be "+u,m.ERR_BAD_OPTION_VALUE);continue}if(n!==!0)throw new m("Unknown option "+i,m.ERR_BAD_OPTION)}}const W={assertOptions:vn,validators:Q},C=W.validators;let B=class{constructor(e){this.defaults=e,this.interceptors={request:new ge,response:new ge}}async request(e,n){try{return await this._request(e,n)}catch(r){if(r instanceof Error){let s={};Error.captureStackTrace?Error.captureStackTrace(s):s=new Error;const i=s.stack?s.stack.replace(/^.+\n/,""):"";try{r.stack?i&&!String(r.stack).endsWith(i.replace(/^.+\n.+\n/,""))&&(r.stack+=`
`+i):r.stack=i}catch{}}throw r}}_request(e,n){typeof e=="string"?(n=n||{},n.url=e):n=e||{},n=P(this.defaults,n);const{transitional:r,paramsSerializer:s,headers:i}=n;r!==void 0&&W.assertOptions(r,{silentJSONParsing:C.transitional(C.boolean),forcedJSONParsing:C.transitional(C.boolean),clarifyTimeoutError:C.transitional(C.boolean)},!1),s!=null&&(a.isFunction(s)?n.paramsSerializer={serialize:s}:W.assertOptions(s,{encode:C.function,serialize:C.function},!0)),n.allowAbsoluteUrls!==void 0||(this.defaults.allowAbsoluteUrls!==void 0?n.allowAbsoluteUrls=this.defaults.allowAbsoluteUrls:n.allowAbsoluteUrls=!0),W.assertOptions(n,{baseUrl:C.spelling("baseURL"),withXsrfToken:C.spelling("withXSRFToken")},!0),n.method=(n.method||this.defaults.method||"get").toLowerCase();let o=i&&a.merge(i.common,i[n.method]);i&&a.forEach(["delete","get","head","post","put","patch","common"],f=>{delete i[f]}),n.headers=E.concat(o,i);const l=[];let u=!0;this.interceptors.request.forEach(function(g){typeof g.runWhen=="function"&&g.runWhen(n)===!1||(u=u&&g.synchronous,l.unshift(g.fulfilled,g.rejected))});const c=[];this.interceptors.response.forEach(function(g){c.push(g.fulfilled,g.rejected)});let d,p=0,y;if(!u){const f=[Re.bind(this),void 0];for(f.unshift.apply(f,l),f.push.apply(f,c),y=f.length,d=Promise.resolve(n);p<y;)d=d.then(f[p++],f[p++]);return d}y=l.length;let w=n;for(p=0;p<y;){const f=l[p++],g=l[p++];try{w=f(w)}catch(h){g.call(this,h);break}}try{d=Re.call(this,w)}catch(f){return Promise.reject(f)}for(p=0,y=c.length;p<y;)d=d.then(c[p++],c[p++]);return d}getUri(e){e=P(this.defaults,e);const n=ze(e.baseURL,e.url,e.allowAbsoluteUrls);return He(n,e.params,e.paramsSerializer)}};a.forEach(["delete","get","head","options"],function(e){B.prototype[e]=function(n,r){return this.request(P(r||{},{method:e,url:n,data:(r||{}).data}))}});a.forEach(["post","put","patch"],function(e){function n(r){return function(i,o,l){return this.request(P(l||{},{method:e,headers:r?{"Content-Type":"multipart/form-data"}:{},url:i,data:o}))}}B.prototype[e]=n(),B.prototype[e+"Form"]=n(!0)});let Rn=class Xe{constructor(e){if(typeof e!="function")throw new TypeError("executor must be a function.");let n;this.promise=new Promise(function(i){n=i});const r=this;this.promise.then(s=>{if(!r._listeners)return;let i=r._listeners.length;for(;i-- >0;)r._listeners[i](s);r._listeners=null}),this.promise.then=s=>{let i;const o=new Promise(l=>{r.subscribe(l),i=l}).then(s);return o.cancel=function(){r.unsubscribe(i)},o},e(function(i,o,l){r.reason||(r.reason=new N(i,o,l),n(r.reason))})}throwIfRequested(){if(this.reason)throw this.reason}subscribe(e){if(this.reason){e(this.reason);return}this._listeners?this._listeners.push(e):this._listeners=[e]}unsubscribe(e){if(!this._listeners)return;const n=this._listeners.indexOf(e);n!==-1&&this._listeners.splice(n,1)}toAbortSignal(){const e=new AbortController,n=r=>{e.abort(r)};return this.subscribe(n),e.signal.unsubscribe=()=>this.unsubscribe(n),e.signal}static source(){let e;return{token:new Xe(function(s){e=s}),cancel:e}}};function En(t){return function(n){return t.apply(null,n)}}function Sn(t){return a.isObject(t)&&t.isAxiosError===!0}const le={Continue:100,SwitchingProtocols:101,Processing:102,EarlyHints:103,Ok:200,Created:201,Accepted:202,NonAuthoritativeInformation:203,NoContent:204,ResetContent:205,PartialContent:206,MultiStatus:207,AlreadyReported:208,ImUsed:226,MultipleChoices:300,MovedPermanently:301,Found:302,SeeOther:303,NotModified:304,UseProxy:305,Unused:306,TemporaryRedirect:307,PermanentRedirect:308,BadRequest:400,Unauthorized:401,PaymentRequired:402,Forbidden:403,NotFound:404,MethodNotAllowed:405,NotAcceptable:406,ProxyAuthenticationRequired:407,RequestTimeout:408,Conflict:409,Gone:410,LengthRequired:411,PreconditionFailed:412,PayloadTooLarge:413,UriTooLong:414,UnsupportedMediaType:415,RangeNotSatisfiable:416,ExpectationFailed:417,ImATeapot:418,MisdirectedRequest:421,UnprocessableEntity:422,Locked:423,FailedDependency:424,TooEarly:425,UpgradeRequired:426,PreconditionRequired:428,TooManyRequests:429,RequestHeaderFieldsTooLarge:431,UnavailableForLegalReasons:451,InternalServerError:500,NotImplemented:501,BadGateway:502,ServiceUnavailable:503,GatewayTimeout:504,HttpVersionNotSupported:505,VariantAlsoNegotiates:506,InsufficientStorage:507,LoopDetected:508,NotExtended:510,NetworkAuthenticationRequired:511};Object.entries(le).forEach(([t,e])=>{le[e]=t});function Ye(t){const e=new B(t),n=Ae(B.prototype.request,e);return a.extend(n,B.prototype,e,{allOwnKeys:!0}),a.extend(n,e,null,{allOwnKeys:!0}),n.create=function(s){return Ye(P(t,s))},n}const x=Ye(j);x.Axios=B;x.CanceledError=N;x.CancelToken=Rn;x.isCancel=je;x.VERSION=Ve;x.toFormData=G;x.AxiosError=m;x.Cancel=x.CanceledError;x.all=function(e){return Promise.all(e)};x.spread=En;x.isAxiosError=Sn;x.mergeConfig=P;x.AxiosHeaders=E;x.formToJSON=t=>Ue(a.isHTMLForm(t)?new FormData(t):t);x.getAdapter=Ke.getAdapter;x.HttpStatusCode=le;x.default=x;const{Axios:In,AxiosError:Ln,CanceledError:Bn,isCancel:Pn,CancelToken:Mn,VERSION:$n,all:Nn,Cancel:Hn,isAxiosError:Dn,spread:Un,toFormData:jn,AxiosHeaders:_n,HttpStatusCode:zn,formToJSON:qn,getAdapter:Wn,mergeConfig:Jn}=x;window.axios=x;window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest";document.addEventListener("DOMContentLoaded",()=>{const t=document.getElementById("search-trigger"),e=document.getElementById("close-search"),n=document.getElementById("search-overlay"),r=document.getElementById("trending-section");t.addEventListener("click",s=>{s.preventDefault(),window.innerWidth<640&&(r.style.opacity="0",r.style.transform="translateY(-10px)",setTimeout(()=>{r.classList.add("hidden")},300)),n.classList.remove("hidden"),requestAnimationFrame(()=>{n.classList.add("opacity-100"),document.getElementById("search-input").focus()})}),e.addEventListener("click",()=>{n.classList.remove("opacity-100"),setTimeout(()=>{n.classList.add("hidden"),window.innerWidth<640&&(r.classList.remove("hidden"),requestAnimationFrame(()=>{r.style.opacity="1",r.style.transform="translateY(0)"}))},200)}),document.addEventListener("keydown",s=>{s.key==="Escape"&&!n.classList.contains("hidden")&&e.click()})});class An{constructor(){this.apiEndpoint="https://text.pollinations.ai/",this.isProcessing=!1,this.selectedText="",this.replyText="",this.isOpen=!1,this.isDragging=!1,this.isResizing=!1,this.dragOffset={x:0,y:0},this.chatHistory=[],this.loadingInterval=null,this.timerInterval=null,this.typingInterval=null,this.startTime=null,this.maxHistoryLength=10}init(){document.readyState==="loading"?document.addEventListener("DOMContentLoaded",()=>this.initializeChat()):this.initializeChat()}initializeChat(){if(typeof $>"u"){console.error("jQuery is required for AI Chat");return}this.createFloatingButton(),this.createChatWidget(),this.bindEvents()}createFloatingButton(){const e=$(`
            <div id="aiFloatingBtn" style="
                position: fixed;
                bottom: 20px;
                right: 20px;
                width: 60px;
                height: 60px;
                background: white;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                box-shadow: 0 4px 20px rgba(0,0,0,0.15);
                z-index: 1000;
                transition: all 0.3s ease;
                border: 2px solid #f0f0f0;
            ">
                <img src="/assets/img/ai-icon.png" alt="AI" style="width: 35px; height: 35px; border-radius: 50%;">
            </div>
        `);$("body").append(e),e.on("click",()=>this.toggleChat()),e.on("mouseenter",function(){$(this).css("transform","scale(1.1)")}).on("mouseleave",function(){$(this).css("transform","scale(1)")})}createChatWidget(){const e=$(`
            <div id="aiChatWidget" style="
                position: fixed;
                bottom: 90px;
                right: 20px;
                width: 350px;
                height: 500px;
                min-width: 300px;
                min-height: 400px;
                background: white;
                border-radius: 16px;
                box-shadow: 0 8px 32px rgba(0,0,0,0.12);
                z-index: 999;
                display: none;
                flex-direction: column;
                overflow: hidden;
                border: 1px solid #e1e5e9;
                resize: both;
            ">
                <div id="chatHeader" style="
                    background: white;
                    color: #333;
                    padding: 16px 20px;
                    cursor: move;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    user-select: none;
                    border-bottom: 1px solid #e1e5e9;
                ">
                    <div style="display: flex; align-items: center;">
                        <img src="/assets/img/ai-icon.png" alt="AI" style="width: 20px; height: 20px; border-radius: 50%; margin-right: 8px;">
                        <span style="font-weight: 600; font-size: 16px;">Airay</span>
                    </div>
                    <div style="display: flex; gap: 8px;">
                        <button id="minimizeBtn" style="
                            background: #f5f5f5;
                            border: none;
                            color: #666;
                            width: 24px;
                            height: 24px;
                            border-radius: 4px;
                            cursor: pointer;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">−</button>
                        <button id="closeBtn" style="
                            background: #f5f5f5;
                            border: none;
                            color: #666;
                            width: 24px;
                            height: 24px;
                            border-radius: 4px;
                            cursor: pointer;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        ">×</button>
                    </div>
                </div>
                
                <div id="replyInfo" style="
                    display: none;
                    background: #f8fafc;
                    border-bottom: 1px solid #e2e8f0;
                    padding: 12px 16px;
                    position: relative;
                ">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                        <div style="flex: 1;">
                            <div style="
                                font-size: 11px;
                                color: #64748b;
                                font-weight: 500;
                                margin-bottom: 6px;
                                display: flex;
                                align-items: center;
                                gap: 4px;
                            ">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#1E90FF" stroke-width="2">
                                    <path d="M3 10h10a8 8 0 0 1 8 8v2M3 10l6 6M3 10l6-6"/>
                                </svg>
                                Membalas Airay
                            </div>
                            <div id="replyContent" style="
                                font-size: 13px;
                                color: #334155;
                                line-height: 1.4;
                                background: white;
                                padding: 8px 12px;
                                border-radius: 8px;
                                border: 1px solid #e2e8f0;
                                max-height: 60px;
                                overflow-y: auto;
                            "></div>
                        </div>
                        <button id="closeReply" style="
                            background: #f1f5f9;
                            border: 1px solid #e2e8f0;
                            color: #64748b;
                            cursor: pointer;
                            padding: 4px 6px;
                            margin-left: 12px;
                            border-radius: 6px;
                            font-size: 12px;
                            transition: all 0.2s;
                            width: 24px;
                            height: 24px;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                        " onmouseover="this.style.background='#e2e8f0'; this.style.color='#475569'" onmouseout="this.style.background='#f1f5f9'; this.style.color='#64748b'">×</button>
                    </div>
                </div>

                <div id="chatMessages" style="
                    flex: 1;
                    padding: 16px;
                    overflow-y: auto;
                    background: #fafbfc;
                ">
                    <div class="ai-message" style="margin-bottom: 16px;">
                        <div style="
                            background: white;
                            padding: 12px 16px;
                            border-radius: 12px;
                            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                            font-size: 14px;
                            line-height: 1.4;
                        ">
                            <div style="display: flex; align-items: center; margin-bottom: 8px;">
                                <img src="/assets/img/ai-icon.png" alt="AI" style="width: 16px; height: 16px; border-radius: 50%; margin-right: 6px;">
                                <span style="font-weight: 600; color: #1E90FF;">Airay</span>
                            </div>
                            Halo! Saya Ray AI, asisten virtual yang siap membantu Anda. Silakan ajukan pertanyaan atau pilih teks untuk mendapatkan bantuan.
                            <div style="margin-top: 8px;">
                                <small style="
                                    color: #64748b;
                                    font-size: 11px;
                                    display: flex;
                                    align-items: center;
                                    gap: 4px;
                                ">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#1E90FF" stroke-width="2">
                                        <path d="M9 12l2 2 4-4"/>
                                        <circle cx="12" cy="12" r="10"/>
                                    </svg>
                                    Saya akan mengingat percakapan kita untuk konteks yang lebih baik
                                </small>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="chatInput" style="
                    padding: 16px;
                    border-top: 1px solid #e1e5e9;
                    background: white;
                ">
                    <div style="position: relative;">
                        <textarea id="messageInput" placeholder="Tulis pertanyaan Anda..." style="
                            width: 100%;
                            border: 1px solid #d1d5db;
                            border-radius: 12px;
                            padding: 10px 50px 10px 16px;
                            font-size: 14px;
                            outline: none;
                            transition: border-color 0.2s;
                            resize: none;
                            min-height: 40px;
                            max-height: 120px;
                            font-family: inherit;
                        "></textarea>
                        <button id="sendBtn" style="
                            position: absolute;
                            right: 8px;
                            top: 50%;
                            transform: translateY(-50%);
                            background: #1E90FF;
                            border: none;
                            color: white;
                            width: 32px;
                            height: 32px;
                            border-radius: 50%;
                            cursor: pointer;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            transition: background 0.2s;
                        ">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m3 3 3 9-3 9 19-9Z"/>
                                <path d="m6 12 13 0"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        `);$("body").append(e)}bindEvents(){let e;$(document).on("mouseup",n=>{clearTimeout(e),e=setTimeout(()=>{const r=this.getSelectedText(),s=$(n.target);r.trim().length>0&&(s.closest("#aiChatWidget").length>0?this.showCopyButton(n,r):(this.selectedText=r,this.isOpen&&this.showReply(r)))},100)}),$(document).on("click",n=>{$(n.target).closest(".copy-button").length||$(".copy-button").remove()}),$(document).on("click",".reply-btn",n=>{const r=$(n.target).closest(".reply-btn").data("message");this.showReply(r),$("#messageInput").focus()}),$(document).on("click",".copy-message-btn",n=>{const r=$(n.target).closest(".copy-message-btn").data("message");this.copyMessageWithFormat(r,n.target)}),$(document).on("click",".copy-plain-btn",n=>{const r=$(n.target).closest(".copy-plain-btn").data("message");this.copyPlainText(r,n.target)}),$(document).on("click",".copy-editor-btn",n=>{const r=$(n.target).closest(".copy-editor-btn").data("message");this.copyMessageWithFormat(r,n.target)}),$("#sendBtn").on("click",()=>this.sendMessage()),$("#messageInput").on("keydown",n=>{if(n.ctrlKey&&n.keyCode===32){n.preventDefault();const r=n.target,s=r.selectionStart,i=r.selectionEnd,o=r.value;r.value=o.substring(0,s)+`
`+o.substring(i),r.selectionStart=r.selectionEnd=s+1,this.autoResize(r)}else n.keyCode===13&&!n.shiftKey&&!n.ctrlKey&&(n.preventDefault(),this.sendMessage())}),$("#messageInput").on("input",n=>{this.autoResize(n.target)}),$("#closeBtn").on("click",()=>this.closeChat()),$("#minimizeBtn").on("click",()=>this.minimizeChat()),$("#closeReply").on("click",()=>this.closeReply()),this.makeDraggable(),$("#messageInput").on("focus",function(){$(this).css("border-color","#1E90FF")}).on("blur",function(){$(this).css("border-color","#d1d5db")}),$("#sendBtn").on("mouseenter",function(){$(this).css("background","#4169E1")}).on("mouseleave",function(){$(this).css("background","#1E90FF")})}autoResize(e){e.style.height="auto",e.style.height=Math.min(e.scrollHeight,120)+"px"}showCopyButton(e,n){$(".copy-button").remove();const r=$(`
            <div class="copy-button" style="
                position: absolute;
                top: ${e.pageY+10}px;
                left: ${e.pageX}px;
                background: white;
                border: 1px solid #e2e8f0;
                border-radius: 8px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
                z-index: 10000;
                overflow: hidden;
                min-width: 140px;
            ">
                <div class="copy-plain-option" style="
                    padding: 8px 12px;
                    cursor: pointer;
                    font-size: 12px;
                    color: #374151;
                    display: flex;
                    align-items: center;
                    gap: 6px;
                    transition: background 0.2s;
                " onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='white'">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="14" height="14" x="8" y="8" rx="2" ry="2"/>
                        <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/>
                    </svg> Copy Text
                </div>
                <div class="copy-editor-option" style="
                    padding: 8px 12px;
                    cursor: pointer;
                    font-size: 12px;
                    color: #374151;
                    display: flex;
                    align-items: center;
                    gap: 6px;
                    border-top: 1px solid #e5e7eb;
                    transition: background 0.2s;
                " onmouseover="this.style.background='#f3f4f6'" onmouseout="this.style.background='white'">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                        <path d="m15 5 4 4"/>
                    </svg> Copy for Editor
                </div>
            </div>
        `);$("body").append(r),r.find(".copy-plain-option").on("click",()=>{const s=this.cleanTextForReply(n);navigator.clipboard.writeText(s).then(()=>{r.html('<div style="padding: 8px 12px; color: #10b981; font-size: 12px;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m9 12 2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg> Copied!</div>'),setTimeout(()=>{r.remove()},1e3)}).catch(()=>{r.html('<div style="padding: 8px 12px; color: #ef4444; font-size: 12px;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m21 21-6-6m0 0L9 9m6 6 6-6M15 15l-6-6"/></svg> Error!</div>'),setTimeout(()=>{r.remove()},1e3)})}),r.find(".copy-editor-option").on("click",()=>{const s=this.formatSelectedTextForSummernote(n);this.copyToClipboardWithHTML(s,n).then(()=>{r.html('<div style="padding: 8px 12px; color: #10b981; font-size: 12px;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m9 12 2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg> Copied for Editor!</div>'),setTimeout(()=>{r.remove()},1e3)}).catch(()=>{r.html('<div style="padding: 8px 12px; color: #ef4444; font-size: 12px;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m21 21-6-6m0 0L9 9m6 6 6-6M15 15l-6-6"/></svg> Error!</div>'),setTimeout(()=>{r.remove()},1e3)})}),setTimeout(()=>{r.remove()},5e3)}formatSelectedTextForSummernote(e){if(e.includes("<")&&e.includes(">"))return this.formatForSummernote(e);{let n=e.replace(/\n/g,"<br>").trim();return n.length>0&&(!n.includes("<br>")||n.split("<br>").length<=2?n="<p>"+n+"</p>":n=n.split("<br>").filter(s=>s.trim().length>0).map(s=>"<p>"+s.trim()+"</p>").join("")),n}}makeDraggable(){const e=$("#aiChatWidget");$("#chatHeader").on("mousedown",r=>{this.isDragging=!0;const s=e[0].getBoundingClientRect();this.dragOffset.x=r.clientX-s.left,this.dragOffset.y=r.clientY-s.top,e.css("transition","none"),$("body").css("user-select","none")}),$(document).on("mousemove",r=>{if(!this.isDragging)return;const s=r.clientX-this.dragOffset.x,i=r.clientY-this.dragOffset.y,o=window.innerWidth-e.outerWidth(),l=window.innerHeight-e.outerHeight(),u=Math.max(0,Math.min(s,o)),c=Math.max(0,Math.min(i,l));e.css({left:u+"px",top:c+"px",right:"auto",bottom:"auto"})}),$(document).on("mouseup",()=>{this.isDragging&&(this.isDragging=!1,e.css("transition","all 0.3s ease"),$("body").css("user-select","auto"))})}getSelectedText(){return window.getSelection?window.getSelection().toString():document.selection?document.selection.createRange().text:""}toggleChat(){this.isOpen?this.closeChat():this.openChat()}openChat(){$("#aiChatWidget").css("display","flex").hide().fadeIn(300),this.isOpen=!0,this.selectedText&&this.showReply(this.selectedText),setTimeout(()=>{$("#messageInput").focus()},350)}closeChat(){$("#aiChatWidget").fadeOut(300),this.isOpen=!1,this.closeReply(),this.typingInterval&&(clearInterval(this.typingInterval),this.typingInterval=null),this.timerInterval&&(clearInterval(this.timerInterval),this.timerInterval=null),this.loadingInterval&&(clearInterval(this.loadingInterval),this.loadingInterval=null)}minimizeChat(){$("#aiChatWidget").fadeOut(300),this.isOpen=!1}showReply(e){const n=this.cleanTextForReply(e);this.replyText=e,document.getElementById("replyContent").textContent=n,document.getElementById("replyInfo").style.display="block";const r=document.getElementById("replyInfo");r.style.maxHeight="0px",r.style.overflow="hidden",r.style.transition="max-height 0.3s ease-out",setTimeout(()=>{r.style.maxHeight="200px"},10)}clearChatHistory(){this.chatHistory=[],console.log("Chat history cleared")}getChatHistoryInfo(){return{totalChats:this.chatHistory.length,maxHistory:this.maxHistoryLength,oldestChat:this.chatHistory.length>0?new Date(this.chatHistory[0].timestamp).toLocaleString("id-ID"):null,newestChat:this.chatHistory.length>0?new Date(this.chatHistory[this.chatHistory.length-1].timestamp).toLocaleString("id-ID"):null}}copyPlainText(e,n){const r=this.cleanTextForReply(e);navigator.clipboard.writeText(r).then(()=>{const s=n.innerHTML;n.innerHTML='<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m9 12 2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>Copied!',n.style.background="#d4edda",n.style.borderColor="#c3e6cb",n.style.color="#155724",setTimeout(()=>{n.innerHTML=s,n.style.background="#f8f9fa",n.style.borderColor="#e9ecef",n.style.color="#6c757d"},2e3)}).catch(s=>{console.error("Failed to copy text: ",s);const i=n.innerHTML;n.innerHTML='<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m21 21-6-6m0 0L9 9m6 6 6-6M15 15l-6-6"/></svg>Error',n.style.background="#f8d7da",n.style.borderColor="#f5c6cb",n.style.color="#721c24",setTimeout(()=>{n.innerHTML=i,n.style.background="#f8f9fa",n.style.borderColor="#e9ecef",n.style.color="#6c757d"},2e3)})}copyMessageWithFormat(e,n){const r=this.formatForSummernote(e);this.copyToClipboardWithHTML(r,e).then(()=>{const s=n.innerHTML;n.innerHTML='<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m9 12 2 2 4-4"/><circle cx="12" cy="12" r="10"/></svg>Copied!',n.style.background="#d4edda",n.style.borderColor="#c3e6cb",n.style.color="#155724",setTimeout(()=>{n.innerHTML=s,n.style.background="#f8f9fa",n.style.borderColor="#e9ecef",n.style.color="#6c757d"},2e3)}).catch(s=>{console.error("Failed to copy text: ",s);const i=n.innerHTML;n.innerHTML='<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;"><path d="m21 21-6-6m0 0L9 9m6 6 6-6M15 15l-6-6"/></svg>Error',n.style.background="#f8d7da",n.style.borderColor="#f5c6cb",n.style.color="#721c24",setTimeout(()=>{n.innerHTML=i,n.style.background="#f8f9fa",n.style.borderColor="#e9ecef",n.style.color="#6c757d"},2e3)})}formatForSummernote(e){let n=this.formatResponse(e);return n=n.replace(/<br\s*\/?>/g,"<br>").replace(/\n/g,"<br>").replace(/<\/p><br>/g,"</p>").replace(/<br><p>/g,"<p>").replace(/(<p[^>]*>)\s*(<br>)+/g,"$1").replace(/(<br>)+\s*(<\/p>)/g,"$2").replace(/(<br>){2,}/g,"</p><p>").replace(/^(<br>)+|(<br>)+$/g,"").trim(),!n.startsWith("<p")&&!n.includes("<h")&&n.length>0&&(n="<p>"+n+"</p>"),n}async copyToClipboardWithHTML(e,n){try{if(navigator.clipboard&&window.ClipboardItem){const r=new ClipboardItem({"text/html":new Blob([e],{type:"text/html"}),"text/plain":new Blob([this.cleanTextForReply(n)],{type:"text/plain"})});await navigator.clipboard.write([r])}else await this.fallbackCopyHTML(e,n)}catch{await navigator.clipboard.writeText(this.cleanTextForReply(n))}}async fallbackCopyHTML(e,n){return new Promise((r,s)=>{const i=document.createElement("div");i.innerHTML=e,i.style.position="absolute",i.style.left="-9999px",i.contentEditable=!0,document.body.appendChild(i);const o=document.createRange();o.selectNodeContents(i);const l=window.getSelection();l.removeAllRanges(),l.addRange(o);try{document.execCommand("copy")?r():s(new Error("Copy command failed"))}catch(u){s(u)}finally{l.removeAllRanges(),document.body.removeChild(i)}})}cleanTextForReply(e){const n=document.createElement("div");return n.innerHTML=e,(n.textContent||n.innerText||"").replace(/\*\*(.*?)\*\*/g,"$1").replace(/\*(.*?)\*/g,"$1").replace(/`(.*?)`/g,"$1").replace(/#{1,6}\s/g,"").replace(/\[([^\]]+)\]\([^)]+\)/g,"$1").replace(/~~(.*?)~~/g,"$1").replace(/__(.*?)__/g,"$1").trim()}closeReply(){this.replyText="",this.selectedText="";const e=document.getElementById("replyInfo");e&&(e.style.transition="max-height 0.3s ease-out",e.style.maxHeight="0px",setTimeout(()=>{e.style.display="none",e.style.maxHeight=""},300))}async sendMessage(){const e=$("#messageInput"),n=e.val().trim();if(!n||this.isProcessing)return;let r=n,s=n,i=this.replyText;this.replyText?(r=this.buildContextualPrompt(n,this.replyText),this.closeReply()):r=this.buildContextualPrompt(n),this.isProcessing=!0,this.addMessage("user",s,i),e.val(""),this.autoResize(e[0]),this.showTyping();try{const o=await this.callAI(r);this.hideTyping(),this.addMessage("ai",o);const l={user:this.cleanTextForReply(s),ai:this.cleanTextForReply(o),timestamp:Date.now(),originalUser:s,originalAI:o};this.chatHistory.push(l),this.chatHistory.length>this.maxHistoryLength&&(this.chatHistory=this.chatHistory.slice(-this.maxHistoryLength))}catch(o){this.hideTyping(),this.addMessage("error","Maaf, terjadi kesalahan: "+o.message)}this.isProcessing=!1}getRecentHistory(){if(this.chatHistory.length===0)return"percakapan baru";const e=Math.min(5,this.chatHistory.length);return this.chatHistory.slice(-e).map((r,s)=>{const i=this.cleanTextForReply(r.user),o=this.cleanTextForReply(r.ai);return`[${s+1}] User: "${i}" | AI: "${o}"`}).join(" ")}buildContextualPrompt(e,n=null){let r="";if(this.chatHistory.length>0){const s=this.getRecentHistory();r+=`KONTEKS PERCAKAPAN SEBELUMNYA:
${s}

`}if(n){const s=this.cleanTextForReply(n);r+=`MEMBALAS PESAN: "${s}"

`}return r+=`PERTANYAAN SAAT INI: ${e}`,r}async callAI(e){const r=`${this.apiEndpoint}${encodeURIComponent(e)}?model=openai&temperature=0.7&system=${encodeURIComponent(`Anda adalah Ray AI, asisten author yang membantu menjawab pertanyaan dalam Bahasa Indonesia. 

ATURAN IDENTITAS:
- Jika ditanya siapa Anda, jawab: "Saya Ray AI, asisten author yang siap membantu Anda"
- Jangan pernah menyebut diri sebagai AI Assistant atau nama lain

ATURAN KONTEKS PERCAKAPAN:
- Anda memiliki akses ke riwayat percakapan sebelumnya
- Gunakan konteks percakapan untuk memberikan jawaban yang relevan dan berkesinambungan
- Jika ada referensi ke pesan sebelumnya, pahami konteksnya
- Jangan ulangi informasi yang sudah diberikan kecuali diminta

ATURAN FORMAT JAWABAN:
- Hindari membuat tabel dalam jawaban
- Untuk teks tebal gunakan **teks tebal**
- Untuk teks miring gunakan *teks miring*
- Untuk daftar gunakan - atau 1. 2. 3.
- Gunakan paragraf yang jelas dan mudah dibaca
- Jawaban maksimal 300 kata kecuali diminta lebih detail

GAYA KOMUNIKASI:
- Ramah dan profesional
- Gunakan Bahasa Indonesia yang baik dan benar
- Berikan jawaban yang informatif dan membantu
- Tunjukkan pemahaman terhadap konteks percakapan
- Jika merujuk ke percakapan sebelumnya, lakukan dengan natural`)}`,s=await fetch(r);if(!s.ok)throw new Error(`HTTP ${s.status}`);let i=await s.text();return i=this.cleanPollinationsAds(i),i}cleanPollinationsAds(e){return e.replace(/---Support Pollinations\.AI:---🌸 Ad 🌸Powered by Pollinations\.AI free text APIs\. Support our mission to keep AI accessible for everyone\./gi,"").replace(/---Support Pollinations\.AI:---.*?Pollinations\.AI.*?everyone\./gi,"").replace(/🌸 Ad 🌸.*?Pollinations\.AI.*?everyone\./gi,"").replace(/Powered by Pollinations\.AI.*?everyone\./gi,"").replace(/Support our mission to keep AI accessible for everyone\./gi,"").replace(/---Support Pollinations\.AI:---/gi,"").replace(/🌸 Ad 🌸/gi,"").replace(/\n{3,}/g,`

`).replace(/^\s+|\s+$/g,"").trim()}addMessage(e,n,r=null){const s=$("#chatMessages"),i=new Date().toLocaleTimeString("id-ID",{hour:"2-digit",minute:"2-digit"});let o="";if(e==="user"){let l="";r&&(l=`
                    <div style="
                        background: rgba(255, 255, 255, 0.5);
                        border-left: 3px solid rgba(14, 165, 233, 0.4);
                        padding: 8px 10px;
                        margin-bottom: 8px;
                        border-radius: 6px;
                        backdrop-filter: blur(20px);
                        -webkit-backdrop-filter: blur(20px);
                        border: 1px solid rgba(255, 255, 255, 0.3);
                    ">
                        <div style="
                            font-size: 10px;
                            color: rgba(15, 23, 42, 0.7);
                            font-weight: 500;
                            margin-bottom: 3px;
                        ">Airay</div>
                        <div style="
                            font-size: 12px;
                            color: rgba(15, 23, 42, 0.8);
                            line-height: 1.3;
                        ">${this.truncateText(r,60)}</div>
                    </div>
                `),o=`
                <div class="user-message" style="margin-bottom: 16px; text-align: right;">
                    <div style="
                        background: #e0f2fe;
                        color: #0f172a;
                        padding: 12px 16px;
                        border-radius: 12px;
                        display: inline-block;
                        max-width: 80%;
                        font-size: 14px;
                        line-height: 1.4;
                        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                    ">
                        ${l}
                        ${this.escapeHtml(n)}
                    </div>
                    <div style="font-size: 11px; color: #9ca3af; margin-top: 4px;">
                        ${i}
                    </div>
                </div>
            `}else e==="ai"?o=`
                <div class="ai-message" style="margin-bottom: 16px;">
                    <div style="
                        background: white;
                        padding: 12px 16px;
                        border-radius: 12px;
                        display: inline-block;
                        max-width: 80%;
                        font-size: 14px;
                        line-height: 1.4;
                        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                    ">
                        <div style="display: flex; align-items: center; margin-bottom: 8px;">
                            <img src="/assets/img/ai-icon.png" alt="AI" style="width: 16px; height: 16px; border-radius: 50%; margin-right: 6px;">
                            <span style="font-weight: 600; color: #1E90FF; font-size: 12px;">Airay</span>
                        </div>
                        ${this.formatResponse(n)}
                        <div style="margin-top: 12px; display: flex; gap: 6px; flex-wrap: wrap;">
                            <button class="reply-btn" data-message="${this.escapeHtml(n)}" style="
                                background: #f8f9fa;
                                border: 1px solid #e9ecef;
                                color: #6c757d;
                                padding: 4px 8px;
                                border-radius: 12px;
                                font-size: 11px;
                                cursor: pointer;
                                transition: all 0.2s;
                            ">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;">
                                    <path d="M3 10h10a8 8 0 0 1 8 8v2M3 10l6 6M3 10l6-6"/>
                                </svg>Balas
                            </button>
                            <button class="copy-plain-btn" data-message="${this.escapeHtml(n)}" style="
                                background: #f8f9fa;
                                border: 1px solid #e9ecef;
                                color: #6c757d;
                                padding: 4px 8px;
                                border-radius: 12px;
                                font-size: 11px;
                                cursor: pointer;
                                transition: all 0.2s;
                            ">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;">
                                    <rect width="14" height="14" x="8" y="8" rx="2" ry="2"/>
                                    <path d="M4 16c-1.1 0-2-.9-2-2V4c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2"/>
                                </svg>Copy
                            </button>
                            <button class="copy-editor-btn" data-message="${this.escapeHtml(n)}" style="
                                background: #f8f9fa;
                                border: 1px solid #e9ecef;
                                color: #6c757d;
                                padding: 4px 8px;
                                border-radius: 12px;
                                font-size: 11px;
                                cursor: pointer;
                                transition: all 0.2s;
                            ">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 4px;">
                                    <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/>
                                    <path d="m15 5 4 4"/>
                                </svg>Copy Editor
                            </button>
                        </div>
                    </div>
                    <div style="font-size: 11px; color: #9ca3af; margin-top: 4px;">
                        ${i}
                    </div>
                </div>
            `:e==="error"&&(o=`
                <div class="error-message" style="margin-bottom: 16px;">
                    <div style="
                        background: #fef2f2;
                        color: #dc2626;
                        padding: 12px 16px;
                        border-radius: 12px;
                        display: inline-block;
                        max-width: 80%;
                        font-size: 14px;
                        border: 1px solid #fecaca;
                    ">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 6px;">
                            <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/>
                            <path d="M12 9v4"/>
                            <path d="m12 17 .01 0"/>
                        </svg>
                        ${this.escapeHtml(n)}
                    </div>
                </div>
            `);s.append(o),s.scrollTop(s[0].scrollHeight)}showTyping(){this.startTime=Date.now(),$("#chatMessages").append(`
            <div id="typingIndicator" class="ai-message" style="margin-bottom: 16px;">
                <div style="
                    background: white;
                    padding: 12px 16px;
                    border-radius: 12px;
                    display: inline-block;
                    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
                ">
                    <div style="display: flex; align-items: center; margin-bottom: 8px;">
                        <img src="/assets/img/ai-icon.png" alt="AI" style="width: 16px; height: 16px; border-radius: 50%; margin-right: 6px;">
                        <span style="font-weight: 600; color: #1E90FF; font-size: 12px;">Airay</span>
                    </div>
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div style="display: flex; align-items: center; gap: 8px;">
                            <div class="typing-dots">
                                <span></span><span></span><span></span>
                            </div>
                            <span style="font-size: 13px; color: #6b7280; font-style: italic;">Sedang memproses...</span>
                        </div>
                        <div id="loadingTimer" style="
                            font-size: 11px;
                            color: #9ca3af;
                            font-family: monospace;
                            background: #f3f4f6;
                            padding: 2px 6px;
                            border-radius: 8px;
                        ">0.00s</div>
                    </div>
                </div>
            </div>
        `),$("#chatMessages").scrollTop($("#chatMessages")[0].scrollHeight),this.timerInterval=setInterval(()=>{const n=(Date.now()-this.startTime)/1e3;$("#loadingTimer").text(`${n.toFixed(2)}s`)},10)}hideTyping(){this.loadingInterval&&(clearInterval(this.loadingInterval),this.loadingInterval=null),this.timerInterval&&(clearInterval(this.timerInterval),this.timerInterval=null),$("#typingIndicator").remove()}formatResponse(e){return e.replace(/\n/g,"<br>").replace(/\*\*(.*?)\*\*/g,"<strong>$1</strong>").replace(/\*(.*?)\*/g,"<em>$1</em>").replace(/`(.*?)`/g,'<code style="background: #f1f3f4; padding: 2px 4px; border-radius: 3px; font-family: monospace;">$1</code>')}truncateText(e,n=50){const r=this.cleanTextForReply(e);return r.length<=n?r:r.substring(0,n)+"..."}escapeHtml(e){const n=document.createElement("div");return n.textContent=e,n.innerHTML}}const Cn=()=>{typeof window<"u"&&(window.aiChat=new An,window.aiChat.init())};Cn();const Se=()=>{if(document.head.querySelector("#ai-chat-styles"))return;const t=document.createElement("style");t.id="ai-chat-styles",t.textContent=`
.typing-dots {
    display: flex;
    align-items: center;
    gap: 4px;
}
.typing-dots span {
    height: 6px;
    width: 6px;
    background: #1E90FF;
    border-radius: 50%;
    animation: typing 1.4s infinite ease-in-out;
}
.typing-dots span:nth-child(1) { animation-delay: -0.32s; }
.typing-dots span:nth-child(2) { animation-delay: -0.16s; }
@keyframes typing {
    0%, 80%, 100% { transform: scale(0.8); opacity: 0.5; }
    40% { transform: scale(1); opacity: 1; }
}

#chatMessages::-webkit-scrollbar {
    width: 4px;
}
#chatMessages::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 2px;
}
#chatMessages::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 2px;
}
#chatMessages::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

.reply-btn:hover {
    background: #e9ecef !important;
    border-color: #1E90FF !important;
    color: #1E90FF !important;
}

.copy-plain-btn:hover {
    background: #e9ecef !important;
    border-color: #6c757d !important;
    color: #495057 !important;
}

.copy-editor-btn:hover {
    background: #e9ecef !important;
    border-color: #28a745 !important;
    color: #28a745 !important;
}

/* Custom scrollbar for textarea */
#messageInput::-webkit-scrollbar {
    width: 6px;
}
#messageInput::-webkit-scrollbar-track {
    background: #f1f3f4;
    border-radius: 3px;
}
#messageInput::-webkit-scrollbar-thumb {
    background: #1E90FF;
    border-radius: 3px;
}
#messageInput::-webkit-scrollbar-thumb:hover {
    background: #4169E1;
}

/* Enhanced typing animation */
.typing-dots {
    display: flex;
    align-items: center;
    gap: 3px;
}
.typing-dots span {
    height: 6px;
    width: 6px;
    background: #1E90FF;
    border-radius: 50%;
    animation: typing 1.2s infinite ease-in-out;
}
.typing-dots span:nth-child(1) { animation-delay: -0.24s; }
.typing-dots span:nth-child(2) { animation-delay: -0.12s; }
@keyframes typing {
    0%, 80%, 100% { 
        transform: scale(0.6); 
        opacity: 0.4; 
    }
    40% { 
        transform: scale(1); 
        opacity: 1; 
    }
}

@media (max-width: 768px) {
    #aiChatWidget {
        width: calc(100vw - 20px) !important;
        height: calc(100vh - 100px) !important;
        right: 10px !important;
        bottom: 80px !important;
    }
    #aiFloatingBtn {
        bottom: 10px !important;
        right: 10px !important;
        width: 50px !important;
        height: 50px !important;
    }
    #aiFloatingBtn img {
        width: 28px !important;
        height: 28px !important;
    }
}
`,document.head.appendChild(t)};document.readyState==="loading"?document.addEventListener("DOMContentLoaded",Se):Se();
