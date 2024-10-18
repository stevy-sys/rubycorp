import{Q as D,g as o,d as F,o as l,c as N,w as f,a as e,t as w,b as r,u as d,f as a,j as C,F as $,h as x,e as V,l as z,p as T,m as L}from"./app-z4L3ct2k.js";import{_ as O}from"./ModalLayout-CU0s_Xa3.js";import{_ as P}from"./AppLayout-Bw0GtzyK.js";import{E as R,d as U,P as H}from"./Picker-DpbWF_Qu.js";import{_ as Q}from"./_plugin-vue_export-helper-DlAUqK2U.js";import{I as p}from"./iconify-Cn61QZuq.js";import"./ResponsiveNavLink-CnflJbBM.js";const h=n=>(T("data-v-87023eb2"),n=n(),L(),n),q={class:"flex text-white w-[100%]"},G={class:"w-full"},J={class:"flex items-center"},K={class:"w-[100px] h-[100px] relative rounded-full bg-red-500"},W=["src"],X=h(()=>e("span",{class:"w-[20px] border bg-green-500 h-[20px] right-[6px] bottom-[6px] absolute rounded-full"},null,-1)),Y={class:"w-[75%] pl-10"},Z=h(()=>e("h1",{class:"text-2xl"},"Aphrodite",-1)),ee={class:"text-sm"},te={class:"flex justify-center wrap"},se={class:"w-[100px] h-[100px] mx-1 bg-red-400 border"},oe=["src"],le={class:"flex justify-center"},ae={key:0,class:"mt-10 flex"},ne={class:"min-w-[50px]"},ie=["src"],re={class:"mx-5"},de={class:"relative max-w-[50%] min-w-[100px] py-5 px-5 border rounded-tr-[20px] rounded-bl-[20px] min-h-[50px]"},ce=["src"],ue=h(()=>e("span",{class:"text-sm ml-5 text-white mt-3"},"20:45",-1)),pe={key:1,class:"mt-10"},me={class:"mx-5 justify-end flex"},xe={class:"relative z-40 bg-red-400 max-w-[50%] py-5 px-5 rounded-tl-[20px] rounded-br-[20px] min-h-[50px]"},he={key:0,class:"justify-end flex"},_e=["src"],ve=h(()=>e("span",{class:"justify-end mt-3 flex text-sm mr-5 text-white"},"20:45",-1)),fe={key:0,class:"flex w-full mt-2 h-20 bg-[#1e293b] text-black z-50 border-none rounded-t-2xl"},we={class:"relative text-xs ml-5 mx-2 w-[30px] p-4 h-[30px] bg-green"},ge={class:"border rounded border-black w-[50px] h-[50px]"},be=["src"],ye={class:"flex justify-end items-center mt-2"},ke={class:"flex justify-start"},Ce={class:"ml-1"},$e={class:"w-[90%] ml-5 flex items-center"},je={class:"text-black w-full rounded-2xl"},Ie={class:"relative w-full"},Me={key:0,class:"absolute right-2 bottom-[50px] z-[9999]"},Se={__name:"Message",props:{conversations:{type:Array},count:{type:Number},media:{type:Array}},setup(n){const j=n,g=D(),_=o(!1),I=new R(U);o("");const M=i=>{u.value+=i.native},b=o(null),c=o(null),S=async i=>{const s=i.target.files[0];if(s){const t=new FileReader;t.onload=async()=>{c.value=await t.result},t.readAsDataURL(s)}},y=o(j.conversations.messages),u=o("");o(null),o(!1);const m=o(null),k=F(()=>(console.log(g),g.props.config||{})),B=async()=>{const i={message:u.value,file:c.value},s=await window.axios.post("/user/sendMessage",i);y.value.push(s.data.message),u.value=await"",await E()},E=()=>{m.value&&(m.value.scrollTop=m.value.scrollHeight)};o(!1);const v=o(!1);return(i,s)=>(l(),N(P,{showSidebar:!0},{default:f(()=>[e("div",q,[e("div",G,[e("div",J,[e("div",K,[e("img",{class:"w-[100px] h-[100px] rounded-full",src:`/storage/data/image/${k.value.pdp}`},null,8,W),X]),e("div",Y,[Z,e("span",ee,w(n.count)+" messages",1)]),e("div",{onClick:s[2]||(s[2]=t=>v.value=!0),class:"relative"},[r(d(p),{onClick:s[0]||(s[0]=()=>{}),class:"w-10 h-10 text-white-500 transition duration-75 group-hover:text-white dark:group-hover:text-white",icon:"solar:gallery-bold"}),r(O,{classes:"text-white w-auto lg:w-[50%]",isOpen:v.value},{content:f(()=>[e("div",te,[(l(!0),a($,null,C(n.media,t=>(l(),a("div",se,[e("img",{class:"w-[100px] h-[100px]",src:`/storage/data/image/${t.name}`},null,8,oe)]))),256))])]),footer:f(()=>[e("div",le,[e("button",{class:"px-3 py-2 rounded-lg bg-blue-400",onClick:s[1]||(s[1]=t=>v.value=!1)},"fermer")])]),_:1},8,["isOpen"])])]),e("div",{ref_key:"chatContainer",ref:m,class:"chat-container"},[(l(!0),a($,null,C(y.value,(t,A)=>(l(),a("div",{key:A},[i.$attrs.auth.user.id!==t.user_id?(l(),a("div",ae,[e("div",ne,[e("img",{class:"w-[50px] h-[50px] rounded-full",src:`/storage/data/image/${k.value.pdp}`},null,8,ie)]),e("div",re,[e("div",de,w(t.message),1),t.mediable&&t.mediable.length>0?(l(),a("img",{key:0,class:"w-[25%] h-auto border rounded mt-3",src:`/storage/data/image/${t.mediable[0].name}`},null,8,ce)):x("",!0),ue])])):(l(),a("div",pe,[e("div",me,[e("div",xe,w(t.message),1)]),t.mediable&&t.mediable.length>0?(l(),a("div",he,[e("img",{class:"w-[25%] h-auto border border-red-400 rounded mt-3 mr-5",src:`/storage/data/image/${t.mediable[0].name}`},null,8,_e)])):x("",!0),ve]))]))),128))],512),c.value?(l(),a("div",fe,[e("div",we,[e("div",ge,[e("img",{class:"w-[50px] h-[50px]",src:c.value,alt:"",srcset:""},null,8,be)]),r(d(p),{onClick:s[3]||(s[3]=t=>c.value=null),class:"cursor-pointer absolute top-[10px] right-[6px] left-0 w-6 h-6 text-white",icon:"carbon:close-outline"})])])):x("",!0),e("div",ye,[e("div",ke,[e("div",Ce,[r(d(p),{onClick:s[4]||(s[4]=t=>{b.value.click()}),class:"cursor-pointer w-10 h-10 text-white-500 transition duration-75 group-hover:text-white dark:group-hover:text-white",icon:"gravity-ui:picture"}),e("input",{type:"file",ref_key:"fileInput",ref:b,onChange:S,class:"hidden"},null,544)])]),e("div",$e,[e("div",je,[e("div",Ie,[_.value?(l(),a("span",Me,[r(d(H),{data:d(I),set:"twitter",onSelect:M},null,8,["data"])])):x("",!0),V(e("input",{"onUpdate:modelValue":s[5]||(s[5]=t=>u.value=t),class:"border-none text-black w-full rounded-2xl pr-10 pl-4 py-2",type:"text"},null,512),[[z,u.value]]),r(d(p),{onClick:s[6]||(s[6]=t=>_.value=!_.value),class:"absolute right-3 top-1/2 transform -translate-y-1/2 w-6 h-6 text-[#1e293b]",icon:"fluent:emoji-smile-slight-24-filled"})])]),e("div",{onClick:B,class:"cursor-pointer w-10 h-10"},[r(d(p),{class:"w-10 h-10 text-red-400 text-[#1e293b] ml-1",icon:"fluent:send-48-filled"})])])])])])]),_:1}))}},ze=Q(Se,[["__scopeId","data-v-87023eb2"]]);export{ze as default};
