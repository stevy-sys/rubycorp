import{g as d,o as s,c as m,w as _,a as e,f as t,h as i,j as h,t as c,F as v,e as g,l as x}from"./app-CRG8-m-B.js";import{_ as w}from"./AppLayout--9Q884xb.js";import"./ResponsiveNavLink-DwEi84_s.js";import"./iconify-BNbmWbNy.js";const b={class:"flex h-screen overflow-hidden"},y={class:"w-full"},k={key:0},M={class:"h-[500px] overflow-y-auto p-4 pb-36"},j={key:0,class:"flex mb-4 cursor-pointer"},B=e("div",{class:"w-9 h-9 rounded-full flex items-center justify-center mr-2"},[e("img",{src:"https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato",alt:"User Avatar",class:"w-8 h-8 rounded-full"})],-1),C={class:"flex max-w-96 bg-white rounded-lg p-3 gap-3"},S={class:"text-gray-700"},V={key:1,class:"flex justify-end mb-4 cursor-pointer"},D={class:"flex max-w-[75%] bg-indigo-500 text-white rounded-lg p-3 gap-3"},F={key:1,class:"bg-black border-t border-gray-300 p-4"},L={class:"flex items-center"},E={__name:"Message",props:{conversations:Object},setup(u){const a=d(u.conversations.messages),l=d(null),p=async()=>{const r={message:l.value},n=await window.axios.post("/user/sendMessage",r);a.value.push(n.data.message),l.value=""};return(r,n)=>(s(),m(w,{showSidebar:!0},{default:_(()=>[e("div",b,[e("div",y,[a.value?i("",!0):(s(),t("div",k," Pas de messages pour le moment ")),e("div",M,[(s(!0),t(v,null,h(a.value,(o,f)=>(s(),t("div",{key:f},[r.$attrs.auth.user.id!==o.user_id?(s(),t("div",j,[B,e("div",C,[e("p",S,c(o.message),1)])])):(s(),t("div",V,[e("div",D,[e("p",null,c(o.message),1)])]))]))),128))]),a.value?(s(),t("div",F,[e("div",L,[g(e("input",{"onUpdate:modelValue":n[0]||(n[0]=o=>l.value=o),type:"text",placeholder:"Type a message...",class:"w-full text-black p-2 rounded-md focus:outline-none focus:border-blue-500"},null,512),[[x,l.value]]),e("button",{onClick:p,class:"bg-indigo-500 text-white px-4 py-2 rounded-md ml-2"},"Send")])])):i("",!0)])])]),_:1}))}};export{E as default};