import{T as m,g as d,o as c,f as u,b as a,u as e,w as r,F as p,Z as f,a as o,n as _,i as w,k as g}from"./app-JIn5gidd.js";import{A as b}from"./AuthenticationCard-CFqpnf9U.js";import{_ as x}from"./AuthenticationCardLogo-C-Za_UIT.js";import{_ as h,a as y}from"./TextInput-LWgVkdaY.js";import{_ as k}from"./InputLabel-B3sst53c.js";import{_ as v}from"./PrimaryButton-CCgctiE_.js";import"./_plugin-vue_export-helper-DlAUqK2U.js";const V=o("div",{class:"mb-4 text-sm text-gray-600 dark:text-gray-400"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),C={class:"flex justify-end mt-4"},j={__name:"ConfirmPassword",setup($){const s=m({password:""}),t=d(null),n=()=>{s.post(route("password.confirm"),{onFinish:()=>{s.reset(),t.value.focus()}})};return(A,i)=>(c(),u(p,null,[a(e(f),{title:"Secure Area"}),a(b,null,{logo:r(()=>[a(x)]),default:r(()=>[V,o("form",{onSubmit:g(n,["prevent"])},[o("div",null,[a(k,{for:"password",value:"Password"}),a(h,{id:"password",ref_key:"passwordInput",ref:t,modelValue:e(s).password,"onUpdate:modelValue":i[0]||(i[0]=l=>e(s).password=l),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),a(y,{class:"mt-2",message:e(s).errors.password},null,8,["message"])]),o("div",C,[a(v,{class:_(["ms-4",{"opacity-25":e(s).processing}]),disabled:e(s).processing},{default:r(()=>[w(" Confirm ")]),_:1},8,["class","disabled"])])],32)]),_:1})],64))}};export{j as default};