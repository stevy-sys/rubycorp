import{d as N,e as L,v as U,o as d,f as c,c as z,w as e,a as t,r as x,T as b,g as w,b as o,h as _,i as n,u as i,F as $,j as C,t as h,n as A}from"./app-mBY8x_ik.js";import{_ as W}from"./ActionMessage-BoZSD2c7.js";import{_ as E,a as H,b as T}from"./DialogModal-BVnjn5_8.js";import{_ as Y}from"./DangerButton-gFoRo1Nf.js";import{_ as q}from"./FormSection-0D1GdkCE.js";import{_ as G,a as J}from"./TextInput-C3yD5qi6.js";import{_ as S}from"./InputLabel-Df22ur8c.js";import{_ as B}from"./PrimaryButton-Bjx1fqpA.js";import{_ as P}from"./SecondaryButton-DIWSuITC.js";import{S as K}from"./SectionBorder--N2rMwz-.js";import"./SectionTitle-BW8avs_w.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const O=["value"],I={__name:"Checkbox",props:{checked:{type:[Array,Boolean],default:!1},value:{type:String,default:null}},emits:["update:checked"],setup(l,{emit:y}){const r=y,u=l,m=N({get(){return u.checked},set(f){r("update:checked",f)}});return(f,p)=>L((d(),c("input",{"onUpdate:modelValue":p[0]||(p[0]=v=>m.value=v),type:"checkbox",value:l.value,class:"rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"},null,8,O)),[[U,m.value]])}},Q={class:"bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4"},R={class:"sm:flex sm:items-start"},X=t("div",{class:"mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10"},[t("svg",{class:"h-6 w-6 text-red-600 dark:text-red-400",xmlns:"http://www.w3.org/2000/svg",fill:"none",viewBox:"0 0 24 24","stroke-width":"1.5",stroke:"currentColor"},[t("path",{"stroke-linecap":"round","stroke-linejoin":"round",d:"M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z"})])],-1),Z={class:"mt-3 text-center sm:mt-0 sm:ms-4 sm:text-start"},ee={class:"text-lg font-medium text-gray-900 dark:text-gray-100"},se={class:"mt-4 text-sm text-gray-600 dark:text-gray-400"},te={class:"flex flex-row justify-end px-6 py-4 bg-gray-100 dark:bg-gray-800 text-end"},oe={__name:"ConfirmationModal",props:{show:{type:Boolean,default:!1},maxWidth:{type:String,default:"2xl"},closeable:{type:Boolean,default:!0}},emits:["close"],setup(l,{emit:y}){const r=y,u=()=>{r("close")};return(m,f)=>(d(),z(E,{show:l.show,"max-width":l.maxWidth,closeable:l.closeable,onClose:u},{default:e(()=>[t("div",Q,[t("div",R,[X,t("div",Z,[t("h3",ee,[x(m.$slots,"title")]),t("div",se,[x(m.$slots,"content")])])])]),t("div",te,[x(m.$slots,"footer")])]),_:3},8,["show","max-width","closeable"]))}},ae={class:"col-span-6 sm:col-span-4"},ne={key:0,class:"col-span-6"},le={class:"mt-2 grid grid-cols-1 md:grid-cols-2 gap-4"},re={class:"flex items-center"},ie={class:"ms-2 text-sm text-gray-600 dark:text-gray-400"},de={key:0},ce={class:"mt-10 sm:mt-0"},ue={class:"space-y-6"},me={class:"break-all dark:text-white"},pe={class:"flex items-center ms-2"},fe={key:0,class:"text-sm text-gray-400"},ve=["onClick"],ke=["onClick"],ge=t("div",null," Please copy your new API token. For your security, it won't be shown again. ",-1),_e={key:0,class:"mt-4 bg-gray-100 dark:bg-gray-900 px-4 py-2 rounded font-mono text-sm text-gray-500 break-all"},he={class:"grid grid-cols-1 md:grid-cols-2 gap-4"},ye={class:"flex items-center"},xe={class:"ms-2 text-sm text-gray-600 dark:text-gray-400"},De={__name:"ApiTokenManager",props:{tokens:Array,availablePermissions:Array,defaultPermissions:Array},setup(l){const r=b({name:"",permissions:l.defaultPermissions}),u=b({permissions:[]}),m=b({}),f=w(!1),p=w(null),v=w(null),V=()=>{r.post(route("api-tokens.store"),{preserveScroll:!0,onSuccess:()=>{f.value=!0,r.reset()}})},j=k=>{u.permissions=k.abilities,p.value=k},D=()=>{u.put(route("api-tokens.update",p.value),{preserveScroll:!0,preserveState:!0,onSuccess:()=>p.value=null})},F=k=>{v.value=k},M=()=>{m.delete(route("api-tokens.destroy",v.value),{preserveScroll:!0,preserveState:!0,onSuccess:()=>v.value=null})};return(k,a)=>(d(),c("div",null,[o(q,{onSubmitted:V},{title:e(()=>[n(" Create API Token ")]),description:e(()=>[n(" API tokens allow third-party services to authenticate with our application on your behalf. ")]),form:e(()=>[t("div",ae,[o(S,{for:"name",value:"Name"}),o(G,{id:"name",modelValue:i(r).name,"onUpdate:modelValue":a[0]||(a[0]=s=>i(r).name=s),type:"text",class:"mt-1 block w-full",autofocus:""},null,8,["modelValue"]),o(J,{message:i(r).errors.name,class:"mt-2"},null,8,["message"])]),l.availablePermissions.length>0?(d(),c("div",ne,[o(S,{for:"permissions",value:"Permissions"}),t("div",le,[(d(!0),c($,null,C(l.availablePermissions,s=>(d(),c("div",{key:s},[t("label",re,[o(I,{checked:i(r).permissions,"onUpdate:checked":a[1]||(a[1]=g=>i(r).permissions=g),value:s},null,8,["checked","value"]),t("span",ie,h(s),1)])]))),128))])])):_("",!0)]),actions:e(()=>[o(W,{on:i(r).recentlySuccessful,class:"me-3"},{default:e(()=>[n(" Created. ")]),_:1},8,["on"]),o(B,{class:A({"opacity-25":i(r).processing}),disabled:i(r).processing},{default:e(()=>[n(" Create ")]),_:1},8,["class","disabled"])]),_:1}),l.tokens.length>0?(d(),c("div",de,[o(K),t("div",ce,[o(H,null,{title:e(()=>[n(" Manage API Tokens ")]),description:e(()=>[n(" You may delete any of your existing tokens if they are no longer needed. ")]),content:e(()=>[t("div",ue,[(d(!0),c($,null,C(l.tokens,s=>(d(),c("div",{key:s.id,class:"flex items-center justify-between"},[t("div",me,h(s.name),1),t("div",pe,[s.last_used_ago?(d(),c("div",fe," Last used "+h(s.last_used_ago),1)):_("",!0),l.availablePermissions.length>0?(d(),c("button",{key:1,class:"cursor-pointer ms-6 text-sm text-gray-400 underline",onClick:g=>j(s)}," Permissions ",8,ve)):_("",!0),t("button",{class:"cursor-pointer ms-6 text-sm text-red-500",onClick:g=>F(s)}," Delete ",8,ke)])]))),128))])]),_:1})])])):_("",!0),o(T,{show:f.value,onClose:a[3]||(a[3]=s=>f.value=!1)},{title:e(()=>[n(" API Token ")]),content:e(()=>[ge,k.$page.props.jetstream.flash.token?(d(),c("div",_e,h(k.$page.props.jetstream.flash.token),1)):_("",!0)]),footer:e(()=>[o(P,{onClick:a[2]||(a[2]=s=>f.value=!1)},{default:e(()=>[n(" Close ")]),_:1})]),_:1},8,["show"]),o(T,{show:p.value!=null,onClose:a[6]||(a[6]=s=>p.value=null)},{title:e(()=>[n(" API Token Permissions ")]),content:e(()=>[t("div",he,[(d(!0),c($,null,C(l.availablePermissions,s=>(d(),c("div",{key:s},[t("label",ye,[o(I,{checked:i(u).permissions,"onUpdate:checked":a[4]||(a[4]=g=>i(u).permissions=g),value:s},null,8,["checked","value"]),t("span",xe,h(s),1)])]))),128))])]),footer:e(()=>[o(P,{onClick:a[5]||(a[5]=s=>p.value=null)},{default:e(()=>[n(" Cancel ")]),_:1}),o(B,{class:A(["ms-3",{"opacity-25":i(u).processing}]),disabled:i(u).processing,onClick:D},{default:e(()=>[n(" Save ")]),_:1},8,["class","disabled"])]),_:1},8,["show"]),o(oe,{show:v.value!=null,onClose:a[8]||(a[8]=s=>v.value=null)},{title:e(()=>[n(" Delete API Token ")]),content:e(()=>[n(" Are you sure you would like to delete this API token? ")]),footer:e(()=>[o(P,{onClick:a[7]||(a[7]=s=>v.value=null)},{default:e(()=>[n(" Cancel ")]),_:1}),o(Y,{class:A(["ms-3",{"opacity-25":i(m).processing}]),disabled:i(m).processing,onClick:M},{default:e(()=>[n(" Delete ")]),_:1},8,["class","disabled"])]),_:1},8,["show"])]))}};export{De as default};
