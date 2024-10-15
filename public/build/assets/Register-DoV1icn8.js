import{T as p,g as f,o as b,f as g,b as i,u as t,w as n,a as e,k as y,e as a,l as d,i as m,F as w,Z as x,y as h}from"./app-263AeSRm.js";import{_ as k}from"./ModalLayout-BVzndHUv.js";const _=e("div",{class:"flex justify-center wrap"}," Une erreur s'est produit lors de l'inscription ",-1),v={class:"flex justify-center"},V={class:"bg-black"},U={class:"flex text-white flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0"},q={class:"w-full bg-black rounded-lg shadow border md:mt-0 sm:max-w-md xl:p-0"},j={class:"p-6 space-y-4 md:space-y-6 sm:p-8"},B=e("h1",{class:"text-xl font-bold leading-tight tracking-tight md:text-2xl text-white-900"}," Inscrivez-vous ",-1),F=e("label",{for:"name",class:"block mb-2 text-sm font-medium text-white-900"},"Your name",-1),I=e("label",{for:"email",class:"block mb-2 text-sm font-medium text-white-900"},"Your email",-1),N=e("label",{for:"password",class:"block mb-2 text-sm font-medium text-white-900"},"Your password",-1),T=e("label",{for:"password_confirmation",class:"block mb-2 text-sm font-medium text-white-900"},"confirm paswword",-1),Y=e("button",{type:"submit",class:"w-full text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"},"Inscription",-1),C={class:"text-sm font-light"},E={href:"#",class:"font-medium text-primary-600 hover:underline dark:text-primary-500"},$={__name:"Register",setup(M){const r=p({name:"",email:"",password:"",password_confirmation:"",terms:!1}),l=f(!1),c=()=>{r.post(route("register"),{onFinish:()=>r.reset("password","password_confirmation"),onError:u=>{l.value=!0}})};return(u,o)=>(b(),g(w,null,[i(t(x),{title:"Inscription"}),i(k,{classes:"text-white w-[50%]",isOpen:l.value},{content:n(()=>[_]),footer:n(()=>[e("div",v,[e("button",{class:"px-3 py-2 rounded-lg bg-blue-400",onClick:o[0]||(o[0]=s=>l.value=!1)},"fermer")])]),_:1},8,["isOpen"]),e("section",V,[e("div",U,[e("div",q,[e("div",j,[B,e("form",{onSubmit:y(c,["prevent"]),class:"space-y-4 md:space-y-6",action:"#"},[e("div",null,[F,a(e("input",{"onUpdate:modelValue":o[1]||(o[1]=s=>t(r).name=s),type:"texte",name:"name",id:"name",class:"bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"your name",required:""},null,512),[[d,t(r).name]])]),e("div",null,[I,a(e("input",{"onUpdate:modelValue":o[2]||(o[2]=s=>t(r).email=s),type:"email",name:"email",id:"email",class:"bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"name@company.com",required:""},null,512),[[d,t(r).email]])]),e("div",null,[N,a(e("input",{"onUpdate:modelValue":o[3]||(o[3]=s=>t(r).password=s),type:"password",name:"email",id:"password",class:"bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",placeholder:"*******",required:""},null,512),[[d,t(r).password]])]),e("div",null,[T,a(e("input",{"onUpdate:modelValue":o[4]||(o[4]=s=>t(r).password_confirmation=s),"form.password":"",type:"password",name:"password",id:"password_confirm",placeholder:"••••••••",class:"bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500",required:""},null,512),[[d,t(r).password_confirmation]])]),Y,e("p",C,[m(" Already registered? "),e("a",E,[i(t(h),{href:u.route("login")},{default:n(()=>[m("Sign in")]),_:1},8,["href"])])])],32)])])])])],64))}};export{$ as default};
