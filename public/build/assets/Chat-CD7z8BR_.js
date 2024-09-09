import{g as u,o as t,c as p,w as v,a as e,f as o,j as h,t as r,F as f,e as x,l as b,h as w}from"./app-CRG8-m-B.js";import{_ as y}from"./AdminLayout-Db5WUsVE.js";import"./ResponsiveNavLink-DwEi84_s.js";import"./iconify-BNbmWbNy.js";const k={class:"flex h-screen overflow-hidden"},C={class:"w-[40%] bg-black border-r border-gray-300"},M=e("header",{class:"p-4 border-b border-gray-300 flex justify-between items-center bg-black text-white"},[e("h1",{class:"text-2xl font-semibold"},"Chat Web"),e("div",{class:"relative"},[e("button",{id:"menuButton",class:"focus:outline-none"},[e("svg",{xmlns:"http://www.w3.org/2000/svg",class:"h-5 w-5 text-gray-100",viewBox:"0 0 20 20",fill:"currentColor"},[e("path",{d:"M10 12a2 2 0 100-4 2 2 0 000 4z"}),e("path",{d:"M2 10a2 2 0 012-2h12a2 2 0 012 2 2 2 0 01-2 2H4a2 2 0 01-2-2z"})])])])],-1),B={class:"overflow-y-auto h-screen p-3 mb-9 pb-20"},j=["onClick"],A=e("div",{class:"w-12 h-12 bg-gray-300 rounded-full mr-3"},[e("img",{src:"https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato",alt:"User Avatar",class:"w-12 h-12 rounded-full"})],-1),L={class:"flex-1"},U={class:"text-lg font-semibold"},V={class:"text-gray-600"},$={key:0,class:"w-full"},z={class:"bg-white p-4 text-gray-700"},D={class:"text-2xl font-semibold"},F={class:"h-[500px] overflow-y-auto p-4 pb-36"},N={key:0,class:"flex mb-4 cursor-pointer"},S=e("div",{class:"w-9 h-9 rounded-full flex items-center justify-center mr-2"},[e("img",{src:"https://placehold.co/200x/ffa8e4/ffffff.svg?text=ʕ•́ᴥ•̀ʔ&font=Lato",alt:"User Avatar",class:"w-8 h-8 rounded-full"})],-1),T={class:"flex max-w-96 bg-white rounded-lg p-3 gap-3"},E={class:"text-gray-700"},H={key:1,class:"flex justify-end mb-4 cursor-pointer"},W={class:"flex max-w-[75%] bg-indigo-500 text-white rounded-lg p-3 gap-3"},q={class:"bg-black border-t border-gray-300 p-4"},G={class:"flex items-center"},Q={__name:"Chat",props:{conversations:{type:Array}},setup(_){const i=u([]),d=u(""),n=u(null),g=async l=>{const a=await window.axios.get("/admin/getMessage/"+l.id);n.value=l,i.value=a.data.messages},m=async()=>{const l={message:d.value,conversation_id:n.value.id},a=await window.axios.post("/admin/sendMessage",l);i.value.push(a.data.message),n.value.last_message=a.data.message,d.value=""};return(l,a)=>(t(),p(y,null,{default:v(()=>[e("div",k,[e("div",C,[M,e("div",B,[(t(!0),o(f,null,h(_.conversations,(s,c)=>(t(),o("div",{key:c,onClick:I=>g(s),class:"flex items-center mb-4 cursor-pointer hover:bg-gray-700 p-2 rounded-md"},[A,e("div",L,[e("h2",U,r(s.user.name),1),e("p",V,r(s.last_message.message),1)])],8,j))),128))])]),n.value?(t(),o("div",$,[e("header",z,[e("h1",D,r(n.value.user.name),1)]),e("div",F,[(t(!0),o(f,null,h(i.value,(s,c)=>(t(),o("div",{key:c},[l.$attrs.auth.user.id!==s.user_id?(t(),o("div",N,[S,e("div",T,[e("p",E,r(s.message),1)])])):(t(),o("div",H,[e("div",W,[e("p",null,r(s.message),1)])]))]))),128))]),e("div",q,[e("div",G,[x(e("input",{"onUpdate:modelValue":a[0]||(a[0]=s=>d.value=s),type:"text",placeholder:"Type a message...",class:"w-full text-black p-2 rounded-md focus:outline-none focus:border-blue-500"},null,512),[[b,d.value]]),e("button",{onClick:m,class:"bg-indigo-500 text-white px-4 py-2 rounded-md ml-2"},"Send")])])])):w("",!0)])]),_:1}))}};export{Q as default};
