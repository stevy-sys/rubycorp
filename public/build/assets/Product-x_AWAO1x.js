import{g as y,T as U,o as a,c as V,w as F,a as e,t as h,f as l,k as B,e as n,l as m,u as s,h as k,v as M,s as $,F as x,j as _}from"./app-BVnfo1GW.js";import{_ as j}from"./AdminLayout-DpBkCw2F.js";import"./ResponsiveNavLink-DVR7THN6.js";const q={class:"flex justify-end mb-5"},A={key:0},D={class:"bg-black mb-5"},E={class:"lg:py-0"},S={class:"bg-black rounded-lg shadow border md:mt-0"},L={class:"w-full p-6 sm:p-8"},N=e("h1",{class:"text-xl font-bold leading-tight tracking-tight md:text-2xl text-white-900"}," Imorter votre produit ",-1),R={class:"flex"},T={class:"w-1/2 mx-2"},I={class:"my-2"},P=e("label",{for:"email",class:"block mb-2 text-sm font-medium text-white-900"},"nom",-1),z={class:"my-2"},G=e("label",{for:"password",class:"block mb-2 text-sm font-medium text-white-900"},"description",-1),H={class:"flex items-center justify-between"},J={key:0,class:""},K=e("label",{for:"password",class:"block mb-2 text-sm font-medium text-white-900"},"prix €",-1),O={class:"flex items-start"},Q={class:"flex items-center h-5"},W=["checked"],X=e("div",{class:"ml-3 text-sm"},[e("label",{for:"remember",class:"text-white-500 dark:text-gray-300"},"gratuit ?")],-1),Y={class:"items-start mt-5"},Z=e("div",null,[e("label",{for:"password",class:"block mb-2 text-sm font-medium text-white-900"},"Choisir categorie")],-1),ee=e("option",{selected:""},"Choisir categorie",-1),re=["value"],te={class:"w-1/2"},oe=e("div",{class:"border w-full h-[150px] my-1"},null,-1),se=e("button",{type:"submit",class:"border hover:bg-white hover:text-black w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"},"Enregistrer",-1),ae={class:"flex flex-wrap"},de=["src"],ce={__name:"Product",props:{products:Array,categories:Array},setup(v){const b=v,c=y(!1),p=y(""),o=U({name:"",description:"",base64:"",price:10,is_free:!0,categorie:""}),w=()=>{o.transform(i=>({...i})).post(route("admin.store.product"),{onFinish:()=>o.reset("password")})},C=i=>{var d;const r=(d=i.target.files)==null?void 0:d[0];if(r){const u=new FileReader;u.onload=g=>{var f;o.base64=(f=g.target)==null?void 0:f.result},u.onerror=g=>{console.error("Error: ",g)},u.readAsDataURL(r)}};return(i,t)=>(a(),V(j,null,{default:F(()=>[e("div",q,[e("div",{onClick:t[0]||(t[0]=r=>c.value=!c.value),class:"cursor-pointer border px-5 rounded hover:text-black hover:bg-white"},h(c.value?"fermer":"uploader"),1)]),c.value?(a(),l("div",A,[e("section",D,[e("div",E,[e("div",S,[e("div",L,[N,e("form",{onSubmit:B(w,["prevent"]),class:"space-y-4 md:space-y-6",action:"#"},[e("div",R,[e("div",T,[e("div",I,[P,n(e("input",{"onUpdate:modelValue":t[1]||(t[1]=r=>s(o).name=r),type:"texte",name:"name",id:"name",class:"bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"nom de photo",required:""},null,512),[[m,s(o).name]])]),e("div",z,[G,n(e("textarea",{"onUpdate:modelValue":t[2]||(t[2]=r=>s(o).description=r),type:"texte",name:"slug",id:"slug",placeholder:"votre-slug-lug",class:"bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",required:""},null,512),[[m,s(o).description]])]),e("div",H,[s(o).is_free?k("",!0):(a(),l("div",J,[K,n(e("input",{"onUpdate:modelValue":t[3]||(t[3]=r=>s(o).price=r),type:"texte",name:"slug",id:"slug",placeholder:"votre-slug-lug",class:"p-2.5 bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",required:""},null,512),[[m,s(o).price]])])),e("div",O,[e("div",Q,[n(e("input",{"onUpdate:modelValue":t[4]||(t[4]=r=>s(o).is_free=r),checked:i.remember,id:"remember","aria-describedby":"remember",type:"checkbox",class:"w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"},null,8,W),[[M,s(o).is_free]])]),X])]),e("div",Y,[Z,e("div",null,[n(e("select",{"onUpdate:modelValue":t[5]||(t[5]=r=>s(o).categorie=r),id:"countries",class:"bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"},[ee,(a(!0),l(x,null,_(b.categories,(r,d)=>(a(),l("option",{key:d,value:r.id},h(r.name),9,re))),128))],512),[[$,s(o).categorie]])])])]),e("div",te,[oe,e("button",{onClick:t[6]||(t[6]=r=>p.value.click()),type:"button",class:"border px-1 rounded"},"uploder"),e("input",{onChange:C,ref_key:"upload",ref:p,class:"border px-1 hidden rounded",type:"file"},null,544)])]),se],32)])])])])])):k("",!0),e("div",ae,[(a(!0),l(x,null,_(b.products,(r,d)=>(a(),l("div",{key:d,class:"border mx-3 my-5 w-[200px] h-[200px] bg-red-500 border-none"},[e("img",{class:"w-[200px] h-[200px]",src:`/storage/data/image/${r.name}`,alt:"",srcset:""},null,8,de)]))),128))])]),_:1}))}};export{ce as default};
