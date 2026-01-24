function ve(t,e){return function(){return t.apply(e,arguments)}}const{toString:Ge}=Object.prototype,{getPrototypeOf:ce}=Object,V=(t=>e=>{const n=Ge.call(e);return t[n]||(t[n]=n.slice(8,-1).toLowerCase())})(Object.create(null)),v=t=>(t=t.toLowerCase(),e=>V(e)===t),X=t=>e=>typeof e===t,{isArray:H}=Array,D=X("undefined");function Qe(t){return t!==null&&!D(t)&&t.constructor!==null&&!D(t.constructor)&&A(t.constructor.isBuffer)&&t.constructor.isBuffer(t)}const Ce=v("ArrayBuffer");function Ze(t){let e;return typeof ArrayBuffer<"u"&&ArrayBuffer.isView?e=ArrayBuffer.isView(t):e=t&&t.buffer&&Ce(t.buffer),e}const et=X("string"),A=X("function"),Oe=X("number"),Y=t=>t!==null&&typeof t=="object",tt=t=>t===!0||t===!1,z=t=>{if(V(t)!=="object")return!1;const e=ce(t);return(e===null||e===Object.prototype||Object.getPrototypeOf(e)===null)&&!(Symbol.toStringTag in t)&&!(Symbol.iterator in t)},nt=v("Date"),st=v("File"),rt=v("Blob"),it=v("FileList"),ot=t=>Y(t)&&A(t.pipe),at=t=>{let e;return t&&(typeof FormData=="function"&&t instanceof FormData||A(t.append)&&((e=V(t))==="formdata"||e==="object"&&A(t.toString)&&t.toString()==="[object FormData]"))},lt=v("URLSearchParams"),[ct,dt,ut,pt]=["ReadableStream","Request","Response","Headers"].map(v),ft=t=>t.trim?t.trim():t.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,"");function U(t,e,{allOwnKeys:n=!1}={}){if(t===null||typeof t>"u")return;let s,r;if(typeof t!="object"&&(t=[t]),H(t))for(s=0,r=t.length;s<r;s++)e.call(null,t[s],s,t);else{const i=n?Object.getOwnPropertyNames(t):Object.keys(t),o=i.length;let l;for(s=0;s<o;s++)l=i[s],e.call(null,t[l],l,t)}}function Fe(t,e){e=e.toLowerCase();const n=Object.keys(t);let s=n.length,r;for(;s-- >0;)if(r=n[s],e===r.toLowerCase())return r;return null}const L=typeof globalThis<"u"?globalThis:typeof self<"u"?self:typeof window<"u"?window:global,Ie=t=>!D(t)&&t!==L;function se(){const{caseless:t}=Ie(this)&&this||{},e={},n=(s,r)=>{const i=t&&Fe(e,r)||r;z(e[i])&&z(s)?e[i]=se(e[i],s):z(s)?e[i]=se({},s):H(s)?e[i]=s.slice():e[i]=s};for(let s=0,r=arguments.length;s<r;s++)arguments[s]&&U(arguments[s],n);return e}const ht=(t,e,n,{allOwnKeys:s}={})=>(U(e,(r,i)=>{n&&A(r)?t[i]=ve(r,n):t[i]=r},{allOwnKeys:s}),t),mt=t=>(t.charCodeAt(0)===65279&&(t=t.slice(1)),t),gt=(t,e,n,s)=>{t.prototype=Object.create(e.prototype,s),t.prototype.constructor=t,Object.defineProperty(t,"super",{value:e.prototype}),n&&Object.assign(t.prototype,n)},yt=(t,e,n,s)=>{let r,i,o;const l={};if(e=e||{},t==null)return e;do{for(r=Object.getOwnPropertyNames(t),i=r.length;i-- >0;)o=r[i],(!s||s(o,t,e))&&!l[o]&&(e[o]=t[o],l[o]=!0);t=n!==!1&&ce(t)}while(t&&(!n||n(t,e))&&t!==Object.prototype);return e},bt=(t,e,n)=>{t=String(t),(n===void 0||n>t.length)&&(n=t.length),n-=e.length;const s=t.indexOf(e,n);return s!==-1&&s===n},xt=t=>{if(!t)return null;if(H(t))return t;let e=t.length;if(!Oe(e))return null;const n=new Array(e);for(;e-- >0;)n[e]=t[e];return n},wt=(t=>e=>t&&e instanceof t)(typeof Uint8Array<"u"&&ce(Uint8Array)),Tt=(t,e)=>{const s=(t&&t[Symbol.iterator]).call(t);let r;for(;(r=s.next())&&!r.done;){const i=r.value;e.call(t,i[0],i[1])}},Rt=(t,e)=>{let n;const s=[];for(;(n=t.exec(e))!==null;)s.push(n);return s},kt=v("HTMLFormElement"),Et=t=>t.toLowerCase().replace(/[-_\s]([a-z\d])(\w*)/g,function(n,s,r){return s.toUpperCase()+r}),fe=(({hasOwnProperty:t})=>(e,n)=>t.call(e,n))(Object.prototype),St=v("RegExp"),Le=(t,e)=>{const n=Object.getOwnPropertyDescriptors(t),s={};U(n,(r,i)=>{let o;(o=e(r,i,t))!==!1&&(s[i]=o||r)}),Object.defineProperties(t,s)},At=t=>{Le(t,(e,n)=>{if(A(t)&&["arguments","caller","callee"].indexOf(n)!==-1)return!1;const s=t[n];if(A(s)){if(e.enumerable=!1,"writable"in e){e.writable=!1;return}e.set||(e.set=()=>{throw Error("Can not rewrite read-only method '"+n+"'")})}})},vt=(t,e)=>{const n={},s=r=>{r.forEach(i=>{n[i]=!0})};return H(t)?s(t):s(String(t).split(e)),n},Ct=()=>{},Ot=(t,e)=>t!=null&&Number.isFinite(t=+t)?t:e;function Ft(t){return!!(t&&A(t.append)&&t[Symbol.toStringTag]==="FormData"&&t[Symbol.iterator])}const It=t=>{const e=new Array(10),n=(s,r)=>{if(Y(s)){if(e.indexOf(s)>=0)return;if(!("toJSON"in s)){e[r]=s;const i=H(s)?[]:{};return U(s,(o,l)=>{const u=n(o,r+1);!D(u)&&(i[l]=u)}),e[r]=void 0,i}}return s};return n(t,0)},Lt=v("AsyncFunction"),Pt=t=>t&&(Y(t)||A(t))&&A(t.then)&&A(t.catch),Pe=((t,e)=>t?setImmediate:e?((n,s)=>(L.addEventListener("message",({source:r,data:i})=>{r===L&&i===n&&s.length&&s.shift()()},!1),r=>{s.push(r),L.postMessage(n,"*")}))(`axios@${Math.random()}`,[]):n=>setTimeout(n))(typeof setImmediate=="function",A(L.postMessage)),$t=typeof queueMicrotask<"u"?queueMicrotask.bind(L):typeof process<"u"&&process.nextTick||Pe,a={isArray:H,isArrayBuffer:Ce,isBuffer:Qe,isFormData:at,isArrayBufferView:Ze,isString:et,isNumber:Oe,isBoolean:tt,isObject:Y,isPlainObject:z,isReadableStream:ct,isRequest:dt,isResponse:ut,isHeaders:pt,isUndefined:D,isDate:nt,isFile:st,isBlob:rt,isRegExp:St,isFunction:A,isStream:ot,isURLSearchParams:lt,isTypedArray:wt,isFileList:it,forEach:U,merge:se,extend:ht,trim:ft,stripBOM:mt,inherits:gt,toFlatObject:yt,kindOf:V,kindOfTest:v,endsWith:bt,toArray:xt,forEachEntry:Tt,matchAll:Rt,isHTMLForm:kt,hasOwnProperty:fe,hasOwnProp:fe,reduceDescriptors:Le,freezeMethods:At,toObjectSet:vt,toCamelCase:Et,noop:Ct,toFiniteNumber:Ot,findKey:Fe,global:L,isContextDefined:Ie,isSpecCompliantForm:Ft,toJSONObject:It,isAsyncFn:Lt,isThenable:Pt,setImmediate:Pe,asap:$t};function m(t,e,n,s,r){Error.call(this),Error.captureStackTrace?Error.captureStackTrace(this,this.constructor):this.stack=new Error().stack,this.message=t,this.name="AxiosError",e&&(this.code=e),n&&(this.config=n),s&&(this.request=s),r&&(this.response=r,this.status=r.status?r.status:null)}a.inherits(m,Error,{toJSON:function(){return{message:this.message,name:this.name,description:this.description,number:this.number,fileName:this.fileName,lineNumber:this.lineNumber,columnNumber:this.columnNumber,stack:this.stack,config:a.toJSONObject(this.config),code:this.code,status:this.status}}});const $e=m.prototype,Ne={};["ERR_BAD_OPTION_VALUE","ERR_BAD_OPTION","ECONNABORTED","ETIMEDOUT","ERR_NETWORK","ERR_FR_TOO_MANY_REDIRECTS","ERR_DEPRECATED","ERR_BAD_RESPONSE","ERR_BAD_REQUEST","ERR_CANCELED","ERR_NOT_SUPPORT","ERR_INVALID_URL"].forEach(t=>{Ne[t]={value:t}});Object.defineProperties(m,Ne);Object.defineProperty($e,"isAxiosError",{value:!0});m.from=(t,e,n,s,r,i)=>{const o=Object.create($e);return a.toFlatObject(t,o,function(u){return u!==Error.prototype},l=>l!=="isAxiosError"),m.call(o,t.message,e,n,s,r),o.cause=t,o.name=t.name,i&&Object.assign(o,i),o};const Nt=null;function re(t){return a.isPlainObject(t)||a.isArray(t)}function He(t){return a.endsWith(t,"[]")?t.slice(0,-2):t}function he(t,e,n){return t?t.concat(e).map(function(r,i){return r=He(r),!n&&i?"["+r+"]":r}).join(n?".":""):e}function Ht(t){return a.isArray(t)&&!t.some(re)}const Bt=a.toFlatObject(a,{},null,function(e){return/^is[A-Z]/.test(e)});function G(t,e,n){if(!a.isObject(t))throw new TypeError("target must be an object");e=e||new FormData,n=a.toFlatObject(n,{metaTokens:!0,dots:!1,indexes:!1},!1,function(g,h){return!a.isUndefined(h[g])});const s=n.metaTokens,r=n.visitor||d,i=n.dots,o=n.indexes,u=(n.Blob||typeof Blob<"u"&&Blob)&&a.isSpecCompliantForm(e);if(!a.isFunction(r))throw new TypeError("visitor must be a function");function c(f){if(f===null)return"";if(a.isDate(f))return f.toISOString();if(!u&&a.isBlob(f))throw new m("Blob is not supported. Use a Buffer instead.");return a.isArrayBuffer(f)||a.isTypedArray(f)?u&&typeof Blob=="function"?new Blob([f]):Buffer.from(f):f}function d(f,g,h){let b=f;if(f&&!h&&typeof f=="object"){if(a.endsWith(g,"{}"))g=s?g:g.slice(0,-2),f=JSON.stringify(f);else if(a.isArray(f)&&Ht(f)||(a.isFileList(f)||a.endsWith(g,"[]"))&&(b=a.toArray(f)))return g=He(g),b.forEach(function(R,O){!(a.isUndefined(R)||R===null)&&e.append(o===!0?he([g],O,i):o===null?g:g+"[]",c(R))}),!1}return re(f)?!0:(e.append(he(h,g,i),c(f)),!1)}const p=[],y=Object.assign(Bt,{defaultVisitor:d,convertValue:c,isVisitable:re});function w(f,g){if(!a.isUndefined(f)){if(p.indexOf(f)!==-1)throw Error("Circular reference detected in "+g.join("."));p.push(f),a.forEach(f,function(b,T){(!(a.isUndefined(b)||b===null)&&r.call(e,b,a.isString(T)?T.trim():T,g,y))===!0&&w(b,g?g.concat(T):[T])}),p.pop()}}if(!a.isObject(t))throw new TypeError("data must be an object");return w(t),e}function me(t){const e={"!":"%21","'":"%27","(":"%28",")":"%29","~":"%7E","%20":"+","%00":"\0"};return encodeURIComponent(t).replace(/[!'()~]|%20|%00/g,function(s){return e[s]})}function de(t,e){this._pairs=[],t&&G(t,this,e)}const Be=de.prototype;Be.append=function(e,n){this._pairs.push([e,n])};Be.toString=function(e){const n=e?function(s){return e.call(this,s,me)}:me;return this._pairs.map(function(r){return n(r[0])+"="+n(r[1])},"").join("&")};function Mt(t){return encodeURIComponent(t).replace(/%3A/gi,":").replace(/%24/g,"$").replace(/%2C/gi,",").replace(/%20/g,"+").replace(/%5B/gi,"[").replace(/%5D/gi,"]")}function Me(t,e,n){if(!e)return t;const s=n&&n.encode||Mt;a.isFunction(n)&&(n={serialize:n});const r=n&&n.serialize;let i;if(r?i=r(e,n):i=a.isURLSearchParams(e)?e.toString():new de(e,n).toString(s),i){const o=t.indexOf("#");o!==-1&&(t=t.slice(0,o)),t+=(t.indexOf("?")===-1?"?":"&")+i}return t}class ge{constructor(){this.handlers=[]}use(e,n,s){return this.handlers.push({fulfilled:e,rejected:n,synchronous:s?s.synchronous:!1,runWhen:s?s.runWhen:null}),this.handlers.length-1}eject(e){this.handlers[e]&&(this.handlers[e]=null)}clear(){this.handlers&&(this.handlers=[])}forEach(e){a.forEach(this.handlers,function(s){s!==null&&e(s)})}}const De={silentJSONParsing:!0,forcedJSONParsing:!0,clarifyTimeoutError:!1},Dt=typeof URLSearchParams<"u"?URLSearchParams:de,Ut=typeof FormData<"u"?FormData:null,_t=typeof Blob<"u"?Blob:null,jt={isBrowser:!0,classes:{URLSearchParams:Dt,FormData:Ut,Blob:_t},protocols:["http","https","file","blob","url","data"]},ue=typeof window<"u"&&typeof document<"u",ie=typeof navigator=="object"&&navigator||void 0,zt=ue&&(!ie||["ReactNative","NativeScript","NS"].indexOf(ie.product)<0),qt=typeof WorkerGlobalScope<"u"&&self instanceof WorkerGlobalScope&&typeof self.importScripts=="function",Wt=ue&&window.location.href||"http://localhost",Jt=Object.freeze(Object.defineProperty({__proto__:null,hasBrowserEnv:ue,hasStandardBrowserEnv:zt,hasStandardBrowserWebWorkerEnv:qt,navigator:ie,origin:Wt},Symbol.toStringTag,{value:"Module"})),k={...Jt,...jt};function Kt(t,e){return G(t,new k.classes.URLSearchParams,Object.assign({visitor:function(n,s,r,i){return k.isNode&&a.isBuffer(n)?(this.append(s,n.toString("base64")),!1):i.defaultVisitor.apply(this,arguments)}},e))}function Vt(t){return a.matchAll(/\w+|\[(\w*)]/g,t).map(e=>e[0]==="[]"?"":e[1]||e[0])}function Xt(t){const e={},n=Object.keys(t);let s;const r=n.length;let i;for(s=0;s<r;s++)i=n[s],e[i]=t[i];return e}function Ue(t){function e(n,s,r,i){let o=n[i++];if(o==="__proto__")return!0;const l=Number.isFinite(+o),u=i>=n.length;return o=!o&&a.isArray(r)?r.length:o,u?(a.hasOwnProp(r,o)?r[o]=[r[o],s]:r[o]=s,!l):((!r[o]||!a.isObject(r[o]))&&(r[o]=[]),e(n,s,r[o],i)&&a.isArray(r[o])&&(r[o]=Xt(r[o])),!l)}if(a.isFormData(t)&&a.isFunction(t.entries)){const n={};return a.forEachEntry(t,(s,r)=>{e(Vt(s),r,n,0)}),n}return null}function Yt(t,e,n){if(a.isString(t))try{return(e||JSON.parse)(t),a.trim(t)}catch(s){if(s.name!=="SyntaxError")throw s}return(n||JSON.stringify)(t)}const _={transitional:De,adapter:["xhr","http","fetch"],transformRequest:[function(e,n){const s=n.getContentType()||"",r=s.indexOf("application/json")>-1,i=a.isObject(e);if(i&&a.isHTMLForm(e)&&(e=new FormData(e)),a.isFormData(e))return r?JSON.stringify(Ue(e)):e;if(a.isArrayBuffer(e)||a.isBuffer(e)||a.isStream(e)||a.isFile(e)||a.isBlob(e)||a.isReadableStream(e))return e;if(a.isArrayBufferView(e))return e.buffer;if(a.isURLSearchParams(e))return n.setContentType("application/x-www-form-urlencoded;charset=utf-8",!1),e.toString();let l;if(i){if(s.indexOf("application/x-www-form-urlencoded")>-1)return Kt(e,this.formSerializer).toString();if((l=a.isFileList(e))||s.indexOf("multipart/form-data")>-1){const u=this.env&&this.env.FormData;return G(l?{"files[]":e}:e,u&&new u,this.formSerializer)}}return i||r?(n.setContentType("application/json",!1),Yt(e)):e}],transformResponse:[function(e){const n=this.transitional||_.transitional,s=n&&n.forcedJSONParsing,r=this.responseType==="json";if(a.isResponse(e)||a.isReadableStream(e))return e;if(e&&a.isString(e)&&(s&&!this.responseType||r)){const o=!(n&&n.silentJSONParsing)&&r;try{return JSON.parse(e)}catch(l){if(o)throw l.name==="SyntaxError"?m.from(l,m.ERR_BAD_RESPONSE,this,null,this.response):l}}return e}],timeout:0,xsrfCookieName:"XSRF-TOKEN",xsrfHeaderName:"X-XSRF-TOKEN",maxContentLength:-1,maxBodyLength:-1,env:{FormData:k.classes.FormData,Blob:k.classes.Blob},validateStatus:function(e){return e>=200&&e<300},headers:{common:{Accept:"application/json, text/plain, */*","Content-Type":void 0}}};a.forEach(["delete","get","head","post","put","patch"],t=>{_.headers[t]={}});const Gt=a.toObjectSet(["age","authorization","content-length","content-type","etag","expires","from","host","if-modified-since","if-unmodified-since","last-modified","location","max-forwards","proxy-authorization","referer","retry-after","user-agent"]),Qt=t=>{const e={};let n,s,r;return t&&t.split(`
`).forEach(function(o){r=o.indexOf(":"),n=o.substring(0,r).trim().toLowerCase(),s=o.substring(r+1).trim(),!(!n||e[n]&&Gt[n])&&(n==="set-cookie"?e[n]?e[n].push(s):e[n]=[s]:e[n]=e[n]?e[n]+", "+s:s)}),e},ye=Symbol("internals");function M(t){return t&&String(t).trim().toLowerCase()}function q(t){return t===!1||t==null?t:a.isArray(t)?t.map(q):String(t)}function Zt(t){const e=Object.create(null),n=/([^\s,;=]+)\s*(?:=\s*([^,;]+))?/g;let s;for(;s=n.exec(t);)e[s[1]]=s[2];return e}const en=t=>/^[-_a-zA-Z0-9^`|~,!#$%&'*+.]+$/.test(t.trim());function ee(t,e,n,s,r){if(a.isFunction(s))return s.call(this,e,n);if(r&&(e=n),!!a.isString(e)){if(a.isString(s))return e.indexOf(s)!==-1;if(a.isRegExp(s))return s.test(e)}}function tn(t){return t.trim().toLowerCase().replace(/([a-z\d])(\w*)/g,(e,n,s)=>n.toUpperCase()+s)}function nn(t,e){const n=a.toCamelCase(" "+e);["get","set","has"].forEach(s=>{Object.defineProperty(t,s+n,{value:function(r,i,o){return this[s].call(this,e,r,i,o)},configurable:!0})})}let S=class{constructor(e){e&&this.set(e)}set(e,n,s){const r=this;function i(l,u,c){const d=M(u);if(!d)throw new Error("header name must be a non-empty string");const p=a.findKey(r,d);(!p||r[p]===void 0||c===!0||c===void 0&&r[p]!==!1)&&(r[p||u]=q(l))}const o=(l,u)=>a.forEach(l,(c,d)=>i(c,d,u));if(a.isPlainObject(e)||e instanceof this.constructor)o(e,n);else if(a.isString(e)&&(e=e.trim())&&!en(e))o(Qt(e),n);else if(a.isHeaders(e))for(const[l,u]of e.entries())i(u,l,s);else e!=null&&i(n,e,s);return this}get(e,n){if(e=M(e),e){const s=a.findKey(this,e);if(s){const r=this[s];if(!n)return r;if(n===!0)return Zt(r);if(a.isFunction(n))return n.call(this,r,s);if(a.isRegExp(n))return n.exec(r);throw new TypeError("parser must be boolean|regexp|function")}}}has(e,n){if(e=M(e),e){const s=a.findKey(this,e);return!!(s&&this[s]!==void 0&&(!n||ee(this,this[s],s,n)))}return!1}delete(e,n){const s=this;let r=!1;function i(o){if(o=M(o),o){const l=a.findKey(s,o);l&&(!n||ee(s,s[l],l,n))&&(delete s[l],r=!0)}}return a.isArray(e)?e.forEach(i):i(e),r}clear(e){const n=Object.keys(this);let s=n.length,r=!1;for(;s--;){const i=n[s];(!e||ee(this,this[i],i,e,!0))&&(delete this[i],r=!0)}return r}normalize(e){const n=this,s={};return a.forEach(this,(r,i)=>{const o=a.findKey(s,i);if(o){n[o]=q(r),delete n[i];return}const l=e?tn(i):String(i).trim();l!==i&&delete n[i],n[l]=q(r),s[l]=!0}),this}concat(...e){return this.constructor.concat(this,...e)}toJSON(e){const n=Object.create(null);return a.forEach(this,(s,r)=>{s!=null&&s!==!1&&(n[r]=e&&a.isArray(s)?s.join(", "):s)}),n}[Symbol.iterator](){return Object.entries(this.toJSON())[Symbol.iterator]()}toString(){return Object.entries(this.toJSON()).map(([e,n])=>e+": "+n).join(`
`)}get[Symbol.toStringTag](){return"AxiosHeaders"}static from(e){return e instanceof this?e:new this(e)}static concat(e,...n){const s=new this(e);return n.forEach(r=>s.set(r)),s}static accessor(e){const s=(this[ye]=this[ye]={accessors:{}}).accessors,r=this.prototype;function i(o){const l=M(o);s[l]||(nn(r,o),s[l]=!0)}return a.isArray(e)?e.forEach(i):i(e),this}};S.accessor(["Content-Type","Content-Length","Accept","Accept-Encoding","User-Agent","Authorization"]);a.reduceDescriptors(S.prototype,({value:t},e)=>{let n=e[0].toUpperCase()+e.slice(1);return{get:()=>t,set(s){this[n]=s}}});a.freezeMethods(S);function te(t,e){const n=this||_,s=e||n,r=S.from(s.headers);let i=s.data;return a.forEach(t,function(l){i=l.call(n,i,r.normalize(),e?e.status:void 0)}),r.normalize(),i}function _e(t){return!!(t&&t.__CANCEL__)}function B(t,e,n){m.call(this,t??"canceled",m.ERR_CANCELED,e,n),this.name="CanceledError"}a.inherits(B,m,{__CANCEL__:!0});function je(t,e,n){const s=n.config.validateStatus;!n.status||!s||s(n.status)?t(n):e(new m("Request failed with status code "+n.status,[m.ERR_BAD_REQUEST,m.ERR_BAD_RESPONSE][Math.floor(n.status/100)-4],n.config,n.request,n))}function sn(t){const e=/^([-+\w]{1,25})(:?\/\/|:)/.exec(t);return e&&e[1]||""}function rn(t,e){t=t||10;const n=new Array(t),s=new Array(t);let r=0,i=0,o;return e=e!==void 0?e:1e3,function(u){const c=Date.now(),d=s[i];o||(o=c),n[r]=u,s[r]=c;let p=i,y=0;for(;p!==r;)y+=n[p++],p=p%t;if(r=(r+1)%t,r===i&&(i=(i+1)%t),c-o<e)return;const w=d&&c-d;return w?Math.round(y*1e3/w):void 0}}function on(t,e){let n=0,s=1e3/e,r,i;const o=(c,d=Date.now())=>{n=d,r=null,i&&(clearTimeout(i),i=null),t.apply(null,c)};return[(...c)=>{const d=Date.now(),p=d-n;p>=s?o(c,d):(r=c,i||(i=setTimeout(()=>{i=null,o(r)},s-p)))},()=>r&&o(r)]}const J=(t,e,n=3)=>{let s=0;const r=rn(50,250);return on(i=>{const o=i.loaded,l=i.lengthComputable?i.total:void 0,u=o-s,c=r(u),d=o<=l;s=o;const p={loaded:o,total:l,progress:l?o/l:void 0,bytes:u,rate:c||void 0,estimated:c&&l&&d?(l-o)/c:void 0,event:i,lengthComputable:l!=null,[e?"download":"upload"]:!0};t(p)},n)},be=(t,e)=>{const n=t!=null;return[s=>e[0]({lengthComputable:n,total:t,loaded:s}),e[1]]},xe=t=>(...e)=>a.asap(()=>t(...e)),an=k.hasStandardBrowserEnv?((t,e)=>n=>(n=new URL(n,k.origin),t.protocol===n.protocol&&t.host===n.host&&(e||t.port===n.port)))(new URL(k.origin),k.navigator&&/(msie|trident)/i.test(k.navigator.userAgent)):()=>!0,ln=k.hasStandardBrowserEnv?{write(t,e,n,s,r,i){const o=[t+"="+encodeURIComponent(e)];a.isNumber(n)&&o.push("expires="+new Date(n).toGMTString()),a.isString(s)&&o.push("path="+s),a.isString(r)&&o.push("domain="+r),i===!0&&o.push("secure"),document.cookie=o.join("; ")},read(t){const e=document.cookie.match(new RegExp("(^|;\\s*)("+t+")=([^;]*)"));return e?decodeURIComponent(e[3]):null},remove(t){this.write(t,"",Date.now()-864e5)}}:{write(){},read(){return null},remove(){}};function cn(t){return/^([a-z][a-z\d+\-.]*:)?\/\//i.test(t)}function dn(t,e){return e?t.replace(/\/?\/$/,"")+"/"+e.replace(/^\/+/,""):t}function ze(t,e,n){let s=!cn(e);return t&&s||n==!1?dn(t,e):e}const we=t=>t instanceof S?{...t}:t;function N(t,e){e=e||{};const n={};function s(c,d,p,y){return a.isPlainObject(c)&&a.isPlainObject(d)?a.merge.call({caseless:y},c,d):a.isPlainObject(d)?a.merge({},d):a.isArray(d)?d.slice():d}function r(c,d,p,y){if(a.isUndefined(d)){if(!a.isUndefined(c))return s(void 0,c,p,y)}else return s(c,d,p,y)}function i(c,d){if(!a.isUndefined(d))return s(void 0,d)}function o(c,d){if(a.isUndefined(d)){if(!a.isUndefined(c))return s(void 0,c)}else return s(void 0,d)}function l(c,d,p){if(p in e)return s(c,d);if(p in t)return s(void 0,c)}const u={url:i,method:i,data:i,baseURL:o,transformRequest:o,transformResponse:o,paramsSerializer:o,timeout:o,timeoutMessage:o,withCredentials:o,withXSRFToken:o,adapter:o,responseType:o,xsrfCookieName:o,xsrfHeaderName:o,onUploadProgress:o,onDownloadProgress:o,decompress:o,maxContentLength:o,maxBodyLength:o,beforeRedirect:o,transport:o,httpAgent:o,httpsAgent:o,cancelToken:o,socketPath:o,responseEncoding:o,validateStatus:l,headers:(c,d,p)=>r(we(c),we(d),p,!0)};return a.forEach(Object.keys(Object.assign({},t,e)),function(d){const p=u[d]||r,y=p(t[d],e[d],d);a.isUndefined(y)&&p!==l||(n[d]=y)}),n}const qe=t=>{const e=N({},t);let{data:n,withXSRFToken:s,xsrfHeaderName:r,xsrfCookieName:i,headers:o,auth:l}=e;e.headers=o=S.from(o),e.url=Me(ze(e.baseURL,e.url),t.params,t.paramsSerializer),l&&o.set("Authorization","Basic "+btoa((l.username||"")+":"+(l.password?unescape(encodeURIComponent(l.password)):"")));let u;if(a.isFormData(n)){if(k.hasStandardBrowserEnv||k.hasStandardBrowserWebWorkerEnv)o.setContentType(void 0);else if((u=o.getContentType())!==!1){const[c,...d]=u?u.split(";").map(p=>p.trim()).filter(Boolean):[];o.setContentType([c||"multipart/form-data",...d].join("; "))}}if(k.hasStandardBrowserEnv&&(s&&a.isFunction(s)&&(s=s(e)),s||s!==!1&&an(e.url))){const c=r&&i&&ln.read(i);c&&o.set(r,c)}return e},un=typeof XMLHttpRequest<"u",pn=un&&function(t){return new Promise(function(n,s){const r=qe(t);let i=r.data;const o=S.from(r.headers).normalize();let{responseType:l,onUploadProgress:u,onDownloadProgress:c}=r,d,p,y,w,f;function g(){w&&w(),f&&f(),r.cancelToken&&r.cancelToken.unsubscribe(d),r.signal&&r.signal.removeEventListener("abort",d)}let h=new XMLHttpRequest;h.open(r.method.toUpperCase(),r.url,!0),h.timeout=r.timeout;function b(){if(!h)return;const R=S.from("getAllResponseHeaders"in h&&h.getAllResponseHeaders()),E={data:!l||l==="text"||l==="json"?h.responseText:h.response,status:h.status,statusText:h.statusText,headers:R,config:t,request:h};je(function(I){n(I),g()},function(I){s(I),g()},E),h=null}"onloadend"in h?h.onloadend=b:h.onreadystatechange=function(){!h||h.readyState!==4||h.status===0&&!(h.responseURL&&h.responseURL.indexOf("file:")===0)||setTimeout(b)},h.onabort=function(){h&&(s(new m("Request aborted",m.ECONNABORTED,t,h)),h=null)},h.onerror=function(){s(new m("Network Error",m.ERR_NETWORK,t,h)),h=null},h.ontimeout=function(){let O=r.timeout?"timeout of "+r.timeout+"ms exceeded":"timeout exceeded";const E=r.transitional||De;r.timeoutErrorMessage&&(O=r.timeoutErrorMessage),s(new m(O,E.clarifyTimeoutError?m.ETIMEDOUT:m.ECONNABORTED,t,h)),h=null},i===void 0&&o.setContentType(null),"setRequestHeader"in h&&a.forEach(o.toJSON(),function(O,E){h.setRequestHeader(E,O)}),a.isUndefined(r.withCredentials)||(h.withCredentials=!!r.withCredentials),l&&l!=="json"&&(h.responseType=r.responseType),c&&([y,f]=J(c,!0),h.addEventListener("progress",y)),u&&h.upload&&([p,w]=J(u),h.upload.addEventListener("progress",p),h.upload.addEventListener("loadend",w)),(r.cancelToken||r.signal)&&(d=R=>{h&&(s(!R||R.type?new B(null,t,h):R),h.abort(),h=null)},r.cancelToken&&r.cancelToken.subscribe(d),r.signal&&(r.signal.aborted?d():r.signal.addEventListener("abort",d)));const T=sn(r.url);if(T&&k.protocols.indexOf(T)===-1){s(new m("Unsupported protocol "+T+":",m.ERR_BAD_REQUEST,t));return}h.send(i||null)})},fn=(t,e)=>{const{length:n}=t=t?t.filter(Boolean):[];if(e||n){let s=new AbortController,r;const i=function(c){if(!r){r=!0,l();const d=c instanceof Error?c:this.reason;s.abort(d instanceof m?d:new B(d instanceof Error?d.message:d))}};let o=e&&setTimeout(()=>{o=null,i(new m(`timeout ${e} of ms exceeded`,m.ETIMEDOUT))},e);const l=()=>{t&&(o&&clearTimeout(o),o=null,t.forEach(c=>{c.unsubscribe?c.unsubscribe(i):c.removeEventListener("abort",i)}),t=null)};t.forEach(c=>c.addEventListener("abort",i));const{signal:u}=s;return u.unsubscribe=()=>a.asap(l),u}},hn=function*(t,e){let n=t.byteLength;if(n<e){yield t;return}let s=0,r;for(;s<n;)r=s+e,yield t.slice(s,r),s=r},mn=async function*(t,e){for await(const n of gn(t))yield*hn(n,e)},gn=async function*(t){if(t[Symbol.asyncIterator]){yield*t;return}const e=t.getReader();try{for(;;){const{done:n,value:s}=await e.read();if(n)break;yield s}}finally{await e.cancel()}},Te=(t,e,n,s)=>{const r=mn(t,e);let i=0,o,l=u=>{o||(o=!0,s&&s(u))};return new ReadableStream({async pull(u){try{const{done:c,value:d}=await r.next();if(c){l(),u.close();return}let p=d.byteLength;if(n){let y=i+=p;n(y)}u.enqueue(new Uint8Array(d))}catch(c){throw l(c),c}},cancel(u){return l(u),r.return()}},{highWaterMark:2})},Q=typeof fetch=="function"&&typeof Request=="function"&&typeof Response=="function",We=Q&&typeof ReadableStream=="function",yn=Q&&(typeof TextEncoder=="function"?(t=>e=>t.encode(e))(new TextEncoder):async t=>new Uint8Array(await new Response(t).arrayBuffer())),Je=(t,...e)=>{try{return!!t(...e)}catch{return!1}},bn=We&&Je(()=>{let t=!1;const e=new Request(k.origin,{body:new ReadableStream,method:"POST",get duplex(){return t=!0,"half"}}).headers.has("Content-Type");return t&&!e}),Re=64*1024,oe=We&&Je(()=>a.isReadableStream(new Response("").body)),K={stream:oe&&(t=>t.body)};Q&&(t=>{["text","arrayBuffer","blob","formData","stream"].forEach(e=>{!K[e]&&(K[e]=a.isFunction(t[e])?n=>n[e]():(n,s)=>{throw new m(`Response type '${e}' is not supported`,m.ERR_NOT_SUPPORT,s)})})})(new Response);const xn=async t=>{if(t==null)return 0;if(a.isBlob(t))return t.size;if(a.isSpecCompliantForm(t))return(await new Request(k.origin,{method:"POST",body:t}).arrayBuffer()).byteLength;if(a.isArrayBufferView(t)||a.isArrayBuffer(t))return t.byteLength;if(a.isURLSearchParams(t)&&(t=t+""),a.isString(t))return(await yn(t)).byteLength},wn=async(t,e)=>{const n=a.toFiniteNumber(t.getContentLength());return n??xn(e)},Tn=Q&&(async t=>{let{url:e,method:n,data:s,signal:r,cancelToken:i,timeout:o,onDownloadProgress:l,onUploadProgress:u,responseType:c,headers:d,withCredentials:p="same-origin",fetchOptions:y}=qe(t);c=c?(c+"").toLowerCase():"text";let w=fn([r,i&&i.toAbortSignal()],o),f;const g=w&&w.unsubscribe&&(()=>{w.unsubscribe()});let h;try{if(u&&bn&&n!=="get"&&n!=="head"&&(h=await wn(d,s))!==0){let E=new Request(e,{method:"POST",body:s,duplex:"half"}),F;if(a.isFormData(s)&&(F=E.headers.get("content-type"))&&d.setContentType(F),E.body){const[I,j]=be(h,J(xe(u)));s=Te(E.body,Re,I,j)}}a.isString(p)||(p=p?"include":"omit");const b="credentials"in Request.prototype;f=new Request(e,{...y,signal:w,method:n.toUpperCase(),headers:d.normalize().toJSON(),body:s,duplex:"half",credentials:b?p:void 0});let T=await fetch(f);const R=oe&&(c==="stream"||c==="response");if(oe&&(l||R&&g)){const E={};["status","statusText","headers"].forEach(pe=>{E[pe]=T[pe]});const F=a.toFiniteNumber(T.headers.get("content-length")),[I,j]=l&&be(F,J(xe(l),!0))||[];T=new Response(Te(T.body,Re,I,()=>{j&&j(),g&&g()}),E)}c=c||"text";let O=await K[a.findKey(K,c)||"text"](T,t);return!R&&g&&g(),await new Promise((E,F)=>{je(E,F,{data:O,headers:S.from(T.headers),status:T.status,statusText:T.statusText,config:t,request:f})})}catch(b){throw g&&g(),b&&b.name==="TypeError"&&/fetch/i.test(b.message)?Object.assign(new m("Network Error",m.ERR_NETWORK,t,f),{cause:b.cause||b}):m.from(b,b&&b.code,t,f)}}),ae={http:Nt,xhr:pn,fetch:Tn};a.forEach(ae,(t,e)=>{if(t){try{Object.defineProperty(t,"name",{value:e})}catch{}Object.defineProperty(t,"adapterName",{value:e})}});const ke=t=>`- ${t}`,Rn=t=>a.isFunction(t)||t===null||t===!1,Ke={getAdapter:t=>{t=a.isArray(t)?t:[t];const{length:e}=t;let n,s;const r={};for(let i=0;i<e;i++){n=t[i];let o;if(s=n,!Rn(n)&&(s=ae[(o=String(n)).toLowerCase()],s===void 0))throw new m(`Unknown adapter '${o}'`);if(s)break;r[o||"#"+i]=s}if(!s){const i=Object.entries(r).map(([l,u])=>`adapter ${l} `+(u===!1?"is not supported by the environment":"is not available in the build"));let o=e?i.length>1?`since :
`+i.map(ke).join(`
`):" "+ke(i[0]):"as no adapter specified";throw new m("There is no suitable adapter to dispatch the request "+o,"ERR_NOT_SUPPORT")}return s},adapters:ae};function ne(t){if(t.cancelToken&&t.cancelToken.throwIfRequested(),t.signal&&t.signal.aborted)throw new B(null,t)}function Ee(t){return ne(t),t.headers=S.from(t.headers),t.data=te.call(t,t.transformRequest),["post","put","patch"].indexOf(t.method)!==-1&&t.headers.setContentType("application/x-www-form-urlencoded",!1),Ke.getAdapter(t.adapter||_.adapter)(t).then(function(s){return ne(t),s.data=te.call(t,t.transformResponse,s),s.headers=S.from(s.headers),s},function(s){return _e(s)||(ne(t),s&&s.response&&(s.response.data=te.call(t,t.transformResponse,s.response),s.response.headers=S.from(s.response.headers))),Promise.reject(s)})}const Ve="1.8.2",Z={};["object","boolean","number","function","string","symbol"].forEach((t,e)=>{Z[t]=function(s){return typeof s===t||"a"+(e<1?"n ":" ")+t}});const Se={};Z.transitional=function(e,n,s){function r(i,o){return"[Axios v"+Ve+"] Transitional option '"+i+"'"+o+(s?". "+s:"")}return(i,o,l)=>{if(e===!1)throw new m(r(o," has been removed"+(n?" in "+n:"")),m.ERR_DEPRECATED);return n&&!Se[o]&&(Se[o]=!0,console.warn(r(o," has been deprecated since v"+n+" and will be removed in the near future"))),e?e(i,o,l):!0}};Z.spelling=function(e){return(n,s)=>(console.warn(`${s} is likely a misspelling of ${e}`),!0)};function kn(t,e,n){if(typeof t!="object")throw new m("options must be an object",m.ERR_BAD_OPTION_VALUE);const s=Object.keys(t);let r=s.length;for(;r-- >0;){const i=s[r],o=e[i];if(o){const l=t[i],u=l===void 0||o(l,i,t);if(u!==!0)throw new m("option "+i+" must be "+u,m.ERR_BAD_OPTION_VALUE);continue}if(n!==!0)throw new m("Unknown option "+i,m.ERR_BAD_OPTION)}}const W={assertOptions:kn,validators:Z},C=W.validators;let P=class{constructor(e){this.defaults=e,this.interceptors={request:new ge,response:new ge}}async request(e,n){try{return await this._request(e,n)}catch(s){if(s instanceof Error){let r={};Error.captureStackTrace?Error.captureStackTrace(r):r=new Error;const i=r.stack?r.stack.replace(/^.+\n/,""):"";try{s.stack?i&&!String(s.stack).endsWith(i.replace(/^.+\n.+\n/,""))&&(s.stack+=`
`+i):s.stack=i}catch{}}throw s}}_request(e,n){typeof e=="string"?(n=n||{},n.url=e):n=e||{},n=N(this.defaults,n);const{transitional:s,paramsSerializer:r,headers:i}=n;s!==void 0&&W.assertOptions(s,{silentJSONParsing:C.transitional(C.boolean),forcedJSONParsing:C.transitional(C.boolean),clarifyTimeoutError:C.transitional(C.boolean)},!1),r!=null&&(a.isFunction(r)?n.paramsSerializer={serialize:r}:W.assertOptions(r,{encode:C.function,serialize:C.function},!0)),n.allowAbsoluteUrls!==void 0||(this.defaults.allowAbsoluteUrls!==void 0?n.allowAbsoluteUrls=this.defaults.allowAbsoluteUrls:n.allowAbsoluteUrls=!0),W.assertOptions(n,{baseUrl:C.spelling("baseURL"),withXsrfToken:C.spelling("withXSRFToken")},!0),n.method=(n.method||this.defaults.method||"get").toLowerCase();let o=i&&a.merge(i.common,i[n.method]);i&&a.forEach(["delete","get","head","post","put","patch","common"],f=>{delete i[f]}),n.headers=S.concat(o,i);const l=[];let u=!0;this.interceptors.request.forEach(function(g){typeof g.runWhen=="function"&&g.runWhen(n)===!1||(u=u&&g.synchronous,l.unshift(g.fulfilled,g.rejected))});const c=[];this.interceptors.response.forEach(function(g){c.push(g.fulfilled,g.rejected)});let d,p=0,y;if(!u){const f=[Ee.bind(this),void 0];for(f.unshift.apply(f,l),f.push.apply(f,c),y=f.length,d=Promise.resolve(n);p<y;)d=d.then(f[p++],f[p++]);return d}y=l.length;let w=n;for(p=0;p<y;){const f=l[p++],g=l[p++];try{w=f(w)}catch(h){g.call(this,h);break}}try{d=Ee.call(this,w)}catch(f){return Promise.reject(f)}for(p=0,y=c.length;p<y;)d=d.then(c[p++],c[p++]);return d}getUri(e){e=N(this.defaults,e);const n=ze(e.baseURL,e.url,e.allowAbsoluteUrls);return Me(n,e.params,e.paramsSerializer)}};a.forEach(["delete","get","head","options"],function(e){P.prototype[e]=function(n,s){return this.request(N(s||{},{method:e,url:n,data:(s||{}).data}))}});a.forEach(["post","put","patch"],function(e){function n(s){return function(i,o,l){return this.request(N(l||{},{method:e,headers:s?{"Content-Type":"multipart/form-data"}:{},url:i,data:o}))}}P.prototype[e]=n(),P.prototype[e+"Form"]=n(!0)});let En=class Xe{constructor(e){if(typeof e!="function")throw new TypeError("executor must be a function.");let n;this.promise=new Promise(function(i){n=i});const s=this;this.promise.then(r=>{if(!s._listeners)return;let i=s._listeners.length;for(;i-- >0;)s._listeners[i](r);s._listeners=null}),this.promise.then=r=>{let i;const o=new Promise(l=>{s.subscribe(l),i=l}).then(r);return o.cancel=function(){s.unsubscribe(i)},o},e(function(i,o,l){s.reason||(s.reason=new B(i,o,l),n(s.reason))})}throwIfRequested(){if(this.reason)throw this.reason}subscribe(e){if(this.reason){e(this.reason);return}this._listeners?this._listeners.push(e):this._listeners=[e]}unsubscribe(e){if(!this._listeners)return;const n=this._listeners.indexOf(e);n!==-1&&this._listeners.splice(n,1)}toAbortSignal(){const e=new AbortController,n=s=>{e.abort(s)};return this.subscribe(n),e.signal.unsubscribe=()=>this.unsubscribe(n),e.signal}static source(){let e;return{token:new Xe(function(r){e=r}),cancel:e}}};function Sn(t){return function(n){return t.apply(null,n)}}function An(t){return a.isObject(t)&&t.isAxiosError===!0}const le={Continue:100,SwitchingProtocols:101,Processing:102,EarlyHints:103,Ok:200,Created:201,Accepted:202,NonAuthoritativeInformation:203,NoContent:204,ResetContent:205,PartialContent:206,MultiStatus:207,AlreadyReported:208,ImUsed:226,MultipleChoices:300,MovedPermanently:301,Found:302,SeeOther:303,NotModified:304,UseProxy:305,Unused:306,TemporaryRedirect:307,PermanentRedirect:308,BadRequest:400,Unauthorized:401,PaymentRequired:402,Forbidden:403,NotFound:404,MethodNotAllowed:405,NotAcceptable:406,ProxyAuthenticationRequired:407,RequestTimeout:408,Conflict:409,Gone:410,LengthRequired:411,PreconditionFailed:412,PayloadTooLarge:413,UriTooLong:414,UnsupportedMediaType:415,RangeNotSatisfiable:416,ExpectationFailed:417,ImATeapot:418,MisdirectedRequest:421,UnprocessableEntity:422,Locked:423,FailedDependency:424,TooEarly:425,UpgradeRequired:426,PreconditionRequired:428,TooManyRequests:429,RequestHeaderFieldsTooLarge:431,UnavailableForLegalReasons:451,InternalServerError:500,NotImplemented:501,BadGateway:502,ServiceUnavailable:503,GatewayTimeout:504,HttpVersionNotSupported:505,VariantAlsoNegotiates:506,InsufficientStorage:507,LoopDetected:508,NotExtended:510,NetworkAuthenticationRequired:511};Object.entries(le).forEach(([t,e])=>{le[e]=t});function Ye(t){const e=new P(t),n=ve(P.prototype.request,e);return a.extend(n,P.prototype,e,{allOwnKeys:!0}),a.extend(n,e,null,{allOwnKeys:!0}),n.create=function(r){return Ye(N(t,r))},n}const x=Ye(_);x.Axios=P;x.CanceledError=B;x.CancelToken=En;x.isCancel=_e;x.VERSION=Ve;x.toFormData=G;x.AxiosError=m;x.Cancel=x.CanceledError;x.all=function(e){return Promise.all(e)};x.spread=Sn;x.isAxiosError=An;x.mergeConfig=N;x.AxiosHeaders=S;x.formToJSON=t=>Ue(a.isHTMLForm(t)?new FormData(t):t);x.getAdapter=Ke.getAdapter;x.HttpStatusCode=le;x.default=x;const{Axios:In,AxiosError:Ln,CanceledError:Pn,isCancel:$n,CancelToken:Nn,VERSION:Hn,all:Bn,Cancel:Mn,isAxiosError:Dn,spread:Un,toFormData:_n,AxiosHeaders:jn,HttpStatusCode:zn,formToJSON:qn,getAdapter:Wn,mergeConfig:Jn}=x;window.axios=x;window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest";document.addEventListener("DOMContentLoaded",()=>{const t=document.getElementById("search-trigger"),e=document.getElementById("close-search"),n=document.getElementById("search-overlay"),s=document.getElementById("trending-section");t.addEventListener("click",r=>{r.preventDefault(),window.innerWidth<640&&(s.style.opacity="0",s.style.transform="translateY(-10px)",setTimeout(()=>{s.classList.add("hidden")},300)),n.classList.remove("hidden"),requestAnimationFrame(()=>{n.classList.add("opacity-100"),document.getElementById("search-input").focus()})}),e.addEventListener("click",()=>{n.classList.remove("opacity-100"),setTimeout(()=>{n.classList.add("hidden"),window.innerWidth<640&&(s.classList.remove("hidden"),requestAnimationFrame(()=>{s.style.opacity="1",s.style.transform="translateY(0)"}))},200)}),document.addEventListener("keydown",r=>{r.key==="Escape"&&!n.classList.contains("hidden")&&e.click()})});class vn{constructor(){this.apiEndpoint="https://text.pollinations.ai/",this.isProcessing=!1,this.selectedText="",this.replyText="",this.isOpen=!1,this.isDragging=!1,this.isResizing=!1,this.dragOffset={x:0,y:0},this.chatHistory=[],this.loadingInterval=null,this.timerInterval=null,this.typingInterval=null,this.startTime=null,this.maxHistoryLength=10}init(){document.readyState==="loading"?document.addEventListener("DOMContentLoaded",()=>this.initializeChat()):this.initializeChat()}initializeChat(){if(typeof $>"u"){console.error("jQuery is required for AI Chat");return}this.createFloatingButton(),this.createChatWidget(),this.bindEvents()}createFloatingButton(){const e=$(`
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
                            <i class="fa fa-paper-plane" style="font-size: 11px;"></i>
                        </button>
                    </div>
                </div>
            </div>
        `);$("body").append(e)}bindEvents(){let e;$(document).on("mouseup",n=>{clearTimeout(e),e=setTimeout(()=>{const s=this.getSelectedText(),r=$(n.target);s.trim().length>0&&(r.closest("#aiChatWidget").length>0?this.showCopyButton(n,s):(this.selectedText=s,this.isOpen&&this.showReply(s)))},100)}),$(document).on("click",n=>{$(n.target).closest(".copy-button").length||$(".copy-button").remove()}),$(document).on("click",".reply-btn",n=>{const s=$(n.target).closest(".reply-btn").data("message");this.showReply(s),$("#messageInput").focus()}),$(document).on("click",".copy-message-btn",n=>{const s=$(n.target).closest(".copy-message-btn").data("message");this.copyMessageWithFormat(s,n.target)}),$(document).on("click",".copy-plain-btn",n=>{const s=$(n.target).closest(".copy-plain-btn").data("message");this.copyPlainText(s,n.target)}),$(document).on("click",".copy-editor-btn",n=>{const s=$(n.target).closest(".copy-editor-btn").data("message");this.copyMessageWithFormat(s,n.target)}),$("#sendBtn").on("click",()=>this.sendMessage()),$("#messageInput").on("keydown",n=>{if(n.ctrlKey&&n.keyCode===32){n.preventDefault();const s=n.target,r=s.selectionStart,i=s.selectionEnd,o=s.value;s.value=o.substring(0,r)+`
`+o.substring(i),s.selectionStart=s.selectionEnd=r+1,this.autoResize(s)}else n.keyCode===13&&!n.shiftKey&&!n.ctrlKey&&(n.preventDefault(),this.sendMessage())}),$("#messageInput").on("input",n=>{this.autoResize(n.target)}),$("#closeBtn").on("click",()=>this.closeChat()),$("#minimizeBtn").on("click",()=>this.minimizeChat()),$("#closeReply").on("click",()=>this.closeReply()),this.makeDraggable(),$("#messageInput").on("focus",function(){$(this).css("border-color","#1E90FF")}).on("blur",function(){$(this).css("border-color","#d1d5db")}),$("#sendBtn").on("mouseenter",function(){$(this).css("background","#4169E1")}).on("mouseleave",function(){$(this).css("background","#1E90FF")})}autoResize(e){e.style.height="auto",e.style.height=Math.min(e.scrollHeight,120)+"px"}showCopyButton(e,n){$(".copy-button").remove();const s=$(`
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
                    <i class="fa fa-copy"></i> Copy Text
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
                    <i class="fa fa-edit"></i> Copy for Editor
                </div>
            </div>
        `);$("body").append(s),s.find(".copy-plain-option").on("click",()=>{const r=this.cleanTextForReply(n);navigator.clipboard.writeText(r).then(()=>{s.html('<div style="padding: 8px 12px; color: #10b981; font-size: 12px;"><i class="fa fa-check"></i> Copied!</div>'),setTimeout(()=>{s.remove()},1e3)}).catch(()=>{s.html('<div style="padding: 8px 12px; color: #ef4444; font-size: 12px;"><i class="fa fa-times"></i> Error!</div>'),setTimeout(()=>{s.remove()},1e3)})}),s.find(".copy-editor-option").on("click",()=>{const r=this.formatSelectedTextForSummernote(n);this.copyToClipboardWithHTML(r,n).then(()=>{s.html('<div style="padding: 8px 12px; color: #10b981; font-size: 12px;"><i class="fa fa-check"></i> Copied for Editor!</div>'),setTimeout(()=>{s.remove()},1e3)}).catch(()=>{s.html('<div style="padding: 8px 12px; color: #ef4444; font-size: 12px;"><i class="fa fa-times"></i> Error!</div>'),setTimeout(()=>{s.remove()},1e3)})}),setTimeout(()=>{s.remove()},5e3)}formatSelectedTextForSummernote(e){if(e.includes("<")&&e.includes(">"))return this.formatForSummernote(e);{let n=e.replace(/\n/g,"<br>").trim();return n.length>0&&(!n.includes("<br>")||n.split("<br>").length<=2?n="<p>"+n+"</p>":n=n.split("<br>").filter(r=>r.trim().length>0).map(r=>"<p>"+r.trim()+"</p>").join("")),n}}makeDraggable(){const e=$("#aiChatWidget");$("#chatHeader").on("mousedown",s=>{this.isDragging=!0;const r=e[0].getBoundingClientRect();this.dragOffset.x=s.clientX-r.left,this.dragOffset.y=s.clientY-r.top,e.css("transition","none"),$("body").css("user-select","none")}),$(document).on("mousemove",s=>{if(!this.isDragging)return;const r=s.clientX-this.dragOffset.x,i=s.clientY-this.dragOffset.y,o=window.innerWidth-e.outerWidth(),l=window.innerHeight-e.outerHeight(),u=Math.max(0,Math.min(r,o)),c=Math.max(0,Math.min(i,l));e.css({left:u+"px",top:c+"px",right:"auto",bottom:"auto"})}),$(document).on("mouseup",()=>{this.isDragging&&(this.isDragging=!1,e.css("transition","all 0.3s ease"),$("body").css("user-select","auto"))})}getSelectedText(){return window.getSelection?window.getSelection().toString():document.selection?document.selection.createRange().text:""}toggleChat(){this.isOpen?this.closeChat():this.openChat()}openChat(){$("#aiChatWidget").css("display","flex").hide().fadeIn(300),this.isOpen=!0,this.selectedText&&this.showReply(this.selectedText),setTimeout(()=>{$("#messageInput").focus()},350)}closeChat(){$("#aiChatWidget").fadeOut(300),this.isOpen=!1,this.closeReply(),this.typingInterval&&(clearInterval(this.typingInterval),this.typingInterval=null),this.timerInterval&&(clearInterval(this.timerInterval),this.timerInterval=null),this.loadingInterval&&(clearInterval(this.loadingInterval),this.loadingInterval=null)}minimizeChat(){$("#aiChatWidget").fadeOut(300),this.isOpen=!1}showReply(e){const n=this.cleanTextForReply(e);this.replyText=e,document.getElementById("replyContent").textContent=n,document.getElementById("replyInfo").style.display="block";const s=document.getElementById("replyInfo");s.style.maxHeight="0px",s.style.overflow="hidden",s.style.transition="max-height 0.3s ease-out",setTimeout(()=>{s.style.maxHeight="200px"},10)}clearChatHistory(){this.chatHistory=[],console.log("Chat history cleared")}getChatHistoryInfo(){return{totalChats:this.chatHistory.length,maxHistory:this.maxHistoryLength,oldestChat:this.chatHistory.length>0?new Date(this.chatHistory[0].timestamp).toLocaleString("id-ID"):null,newestChat:this.chatHistory.length>0?new Date(this.chatHistory[this.chatHistory.length-1].timestamp).toLocaleString("id-ID"):null}}copyPlainText(e,n){const s=this.cleanTextForReply(e);navigator.clipboard.writeText(s).then(()=>{const r=n.innerHTML;n.innerHTML='<i class="fa fa-check" style="margin-right: 4px;"></i>Copied!',n.style.background="#d4edda",n.style.borderColor="#c3e6cb",n.style.color="#155724",setTimeout(()=>{n.innerHTML=r,n.style.background="#f8f9fa",n.style.borderColor="#e9ecef",n.style.color="#6c757d"},2e3)}).catch(r=>{console.error("Failed to copy text: ",r);const i=n.innerHTML;n.innerHTML='<i class="fa fa-times" style="margin-right: 4px;"></i>Error',n.style.background="#f8d7da",n.style.borderColor="#f5c6cb",n.style.color="#721c24",setTimeout(()=>{n.innerHTML=i,n.style.background="#f8f9fa",n.style.borderColor="#e9ecef",n.style.color="#6c757d"},2e3)})}copyMessageWithFormat(e,n){const s=this.formatForSummernote(e);this.copyToClipboardWithHTML(s,e).then(()=>{const r=n.innerHTML;n.innerHTML='<i class="fa fa-check" style="margin-right: 4px;"></i>Copied!',n.style.background="#d4edda",n.style.borderColor="#c3e6cb",n.style.color="#155724",setTimeout(()=>{n.innerHTML=r,n.style.background="#f8f9fa",n.style.borderColor="#e9ecef",n.style.color="#6c757d"},2e3)}).catch(r=>{console.error("Failed to copy text: ",r);const i=n.innerHTML;n.innerHTML='<i class="fa fa-times" style="margin-right: 4px;"></i>Error',n.style.background="#f8d7da",n.style.borderColor="#f5c6cb",n.style.color="#721c24",setTimeout(()=>{n.innerHTML=i,n.style.background="#f8f9fa",n.style.borderColor="#e9ecef",n.style.color="#6c757d"},2e3)})}formatForSummernote(e){let n=this.formatResponse(e);return n=n.replace(/<br\s*\/?>/g,"<br>").replace(/\n/g,"<br>").replace(/<\/p><br>/g,"</p>").replace(/<br><p>/g,"<p>").replace(/(<p[^>]*>)\s*(<br>)+/g,"$1").replace(/(<br>)+\s*(<\/p>)/g,"$2").replace(/(<br>){2,}/g,"</p><p>").replace(/^(<br>)+|(<br>)+$/g,"").trim(),!n.startsWith("<p")&&!n.includes("<h")&&n.length>0&&(n="<p>"+n+"</p>"),n}async copyToClipboardWithHTML(e,n){try{if(navigator.clipboard&&window.ClipboardItem){const s=new ClipboardItem({"text/html":new Blob([e],{type:"text/html"}),"text/plain":new Blob([this.cleanTextForReply(n)],{type:"text/plain"})});await navigator.clipboard.write([s])}else await this.fallbackCopyHTML(e,n)}catch{await navigator.clipboard.writeText(this.cleanTextForReply(n))}}async fallbackCopyHTML(e,n){return new Promise((s,r)=>{const i=document.createElement("div");i.innerHTML=e,i.style.position="absolute",i.style.left="-9999px",i.contentEditable=!0,document.body.appendChild(i);const o=document.createRange();o.selectNodeContents(i);const l=window.getSelection();l.removeAllRanges(),l.addRange(o);try{document.execCommand("copy")?s():r(new Error("Copy command failed"))}catch(u){r(u)}finally{l.removeAllRanges(),document.body.removeChild(i)}})}cleanTextForReply(e){const n=document.createElement("div");return n.innerHTML=e,(n.textContent||n.innerText||"").replace(/\*\*(.*?)\*\*/g,"$1").replace(/\*(.*?)\*/g,"$1").replace(/`(.*?)`/g,"$1").replace(/#{1,6}\s/g,"").replace(/\[([^\]]+)\]\([^)]+\)/g,"$1").replace(/~~(.*?)~~/g,"$1").replace(/__(.*?)__/g,"$1").trim()}closeReply(){this.replyText="",this.selectedText="";const e=document.getElementById("replyInfo");e&&(e.style.transition="max-height 0.3s ease-out",e.style.maxHeight="0px",setTimeout(()=>{e.style.display="none",e.style.maxHeight=""},300))}async sendMessage(){const e=$("#messageInput"),n=e.val().trim();if(!n||this.isProcessing)return;let s=n,r=n,i=this.replyText;this.replyText?(s=this.buildContextualPrompt(n,this.replyText),this.closeReply()):s=this.buildContextualPrompt(n),this.isProcessing=!0,this.addMessage("user",r,i),e.val(""),this.autoResize(e[0]),this.showTyping();try{const o=await this.callAI(s);this.hideTyping(),this.addMessage("ai",o);const l={user:this.cleanTextForReply(r),ai:this.cleanTextForReply(o),timestamp:Date.now(),originalUser:r,originalAI:o};this.chatHistory.push(l),this.chatHistory.length>this.maxHistoryLength&&(this.chatHistory=this.chatHistory.slice(-this.maxHistoryLength))}catch(o){this.hideTyping(),this.addMessage("error","Maaf, terjadi kesalahan: "+o.message)}this.isProcessing=!1}getRecentHistory(){if(this.chatHistory.length===0)return"percakapan baru";const e=Math.min(5,this.chatHistory.length);return this.chatHistory.slice(-e).map((s,r)=>{const i=this.cleanTextForReply(s.user),o=this.cleanTextForReply(s.ai);return`[${r+1}] User: "${i}" | AI: "${o}"`}).join(" ")}buildContextualPrompt(e,n=null){let s="";if(this.chatHistory.length>0){const r=this.getRecentHistory();s+=`KONTEKS PERCAKAPAN SEBELUMNYA:
${r}

`}if(n){const r=this.cleanTextForReply(n);s+=`MEMBALAS PESAN: "${r}"

`}return s+=`PERTANYAAN SAAT INI: ${e}`,s}async callAI(e){const s=`${this.apiEndpoint}${encodeURIComponent(e)}?model=openai&temperature=0.7&system=${encodeURIComponent(`Anda adalah Ray AI, asisten author yang membantu menjawab pertanyaan dalam Bahasa Indonesia. 

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
- Jika merujuk ke percakapan sebelumnya, lakukan dengan natural`)}`,r=await fetch(s);if(!r.ok)throw new Error(`HTTP ${r.status}`);let i=await r.text();return i=this.cleanPollinationsAds(i),i}cleanPollinationsAds(e){return e.replace(/---Support Pollinations\.AI:---🌸 Ad 🌸Powered by Pollinations\.AI free text APIs\. Support our mission to keep AI accessible for everyone\./gi,"").replace(/---Support Pollinations\.AI:---.*?Pollinations\.AI.*?everyone\./gi,"").replace(/🌸 Ad 🌸.*?Pollinations\.AI.*?everyone\./gi,"").replace(/Powered by Pollinations\.AI.*?everyone\./gi,"").replace(/Support our mission to keep AI accessible for everyone\./gi,"").replace(/---Support Pollinations\.AI:---/gi,"").replace(/🌸 Ad 🌸/gi,"").replace(/\n{3,}/g,`

`).replace(/^\s+|\s+$/g,"").trim()}addMessage(e,n,s=null){const r=$("#chatMessages"),i=new Date().toLocaleTimeString("id-ID",{hour:"2-digit",minute:"2-digit"});let o="";if(e==="user"){let l="";s&&(l=`
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
                        ">${this.truncateText(s,60)}</div>
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
                                <i class="fa fa-reply" style="margin-right: 4px;"></i>Balas
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
                                <i class="fa fa-copy" style="margin-right: 4px;"></i>Copy
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
                                <i class="fa fa-edit" style="margin-right: 4px;"></i>Copy Editor
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
                        <i class="fa fa-exclamation-triangle" style="margin-right: 6px;"></i>
                        ${this.escapeHtml(n)}
                    </div>
                </div>
            `);r.append(o),r.scrollTop(r[0].scrollHeight)}showTyping(){this.startTime=Date.now(),$("#chatMessages").append(`
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
        `),$("#chatMessages").scrollTop($("#chatMessages")[0].scrollHeight),this.timerInterval=setInterval(()=>{const n=(Date.now()-this.startTime)/1e3;$("#loadingTimer").text(`${n.toFixed(2)}s`)},10)}hideTyping(){this.loadingInterval&&(clearInterval(this.loadingInterval),this.loadingInterval=null),this.timerInterval&&(clearInterval(this.timerInterval),this.timerInterval=null),$("#typingIndicator").remove()}formatResponse(e){return e.replace(/\n/g,"<br>").replace(/\*\*(.*?)\*\*/g,"<strong>$1</strong>").replace(/\*(.*?)\*/g,"<em>$1</em>").replace(/`(.*?)`/g,'<code style="background: #f1f3f4; padding: 2px 4px; border-radius: 3px; font-family: monospace;">$1</code>')}truncateText(e,n=50){const s=this.cleanTextForReply(e);return s.length<=n?s:s.substring(0,n)+"..."}escapeHtml(e){const n=document.createElement("div");return n.textContent=e,n.innerHTML}}const Cn=()=>{typeof window<"u"&&(window.aiChat=new vn,window.aiChat.init())};Cn();const Ae=()=>{if(document.head.querySelector("#ai-chat-styles"))return;const t=document.createElement("style");t.id="ai-chat-styles",t.textContent=`
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
`,document.head.appendChild(t)};document.readyState==="loading"?document.addEventListener("DOMContentLoaded",Ae):Ae();
